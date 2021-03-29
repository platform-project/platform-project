<?php
class BuilderDataSource
{
    private $xml_location;
    private $data_array = array();

    public function __construct($xml_location)
    {
        $this->xml_location = $xml_location;
        if (!file_exists($this->xml_location))
        {
            throw new Exception("BuilderDataSource file does not exist");
        }
        $this->parse_xml();
    }

    public function getIdFromUserAgent($user_agent)
    {
        foreach ($this->data_array as $device_id=>$device_list)
        {
            $matched = false;
            foreach ($device_list as $list_item)
            {
                $match_found = @preg_match('/'.$list_item.'/i', $user_agent);
                if ($match_found === 1)
                {
                    $matched = true;
                }
                else if ($match_found === 0)
                {
                    $matched = false;
                    break;
                }
            }
            if ($matched === true)
            {
                return $device_id;
            }
        }
        return false;
    }

    private function parse_xml()
    {
        $simple_xml = simplexml_load_file($this->xml_location);
        foreach ($simple_xml->Builders as $builders)
        {
            foreach ($builders as $builder)
            {
                foreach ($builder as $devices)
                {
                    $list_array = array();
                    foreach ($devices->list as $list)
                    {
                        foreach ($list as $value)
                        {
                            $list_array[] = $value;
                        }
                    }
                    $this->data_array[(string)$devices['id']] = $list_array;
                }
            }
        }
        unset($simple_xml);
    }
}