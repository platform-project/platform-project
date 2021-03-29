<?php
require_once('BuilderDataSource.class.php');

class DeviceDetection
{
    private $user_agent_string;
    private $builder_data_obj;
    private $data_location;
    private $property_list = array();
    public function __construct($user_agent, $data_location = null, $memcache_host = "", $memcache_port = "")
    {
        if ($data_location == null)
        {
            //Load default location
            $default_data_location = dirname(__FILE__)."/datasource";
            $this->data_location = $default_data_location;
        }
        else
        {
            $this->data_location = $data_location;
        }
        $this->user_agent_string = $user_agent;
        if ($memcache_host != "" && $memcache_port != "")
        {
            $memcache = new Memcache();
            //We are already handling a connection failure so do not need the connect function to throw an error message.
            if (!$memcache->connect($memcache_host, $memcache_port))
            {
                $this->builder_data_obj = new BuilderDataSource($this->data_location."/BuilderDataSource.xml");
                $this->loadDeviceCapabilities($this->builder_data_obj->getIdFromUserAgent($this->user_agent_string));
                $this->property_list['from_cache'] = false;
            }
            else
            {
                $cached_capabilities = $memcache->get('openddr_'.$this->user_agent_string);
                if ($cached_capabilities === false)
                {
                    $this->builder_data_obj = new BuilderDataSource($this->data_location."/BuilderDataSource.xml");
                    $this->loadDeviceCapabilities($this->builder_data_obj->getIdFromUserAgent($this->user_agent_string));
                    $this->property_list['from_cache'] = false;
                    $memcache->set('openddr_'.$this->user_agent_string, $this->property_list, 0, 0);
                }
                else
                {
                    $this->property_list = $cached_capabilities;
                    $this->property_list['from_cache'] = true;
                }
            }
        }
        else
        {
            $this->builder_data_obj = new BuilderDataSource($this->data_location."/BuilderDataSource.xml");
            $this->loadDeviceCapabilities($this->builder_data_obj->getIdFromUserAgent($this->user_agent_string));
            $this->property_list['from_cache'] = false;
        }
    }

    public function getProperty($property_name)
    {
        if (isset($this->property_list['all']) && $this->property_list['all'] == true)
        {
            return false;
        }
        if (isset($this->property_list[$property_name]))
        {
            return $this->property_list[$property_name];
        }
    }

    public function getAllCapabilities()
    {
        return $this->property_list;
    }

    private function loadDeviceCapabilities($device_id = null)
    {
        if ($device_id === false)
        {
            $this->property_list['all'] = true;
        }
        else
        {
            $simple_xml = simplexml_load_file($this->data_location."/DeviceDataSource.xml");
            $device_element = $simple_xml->ODDR->xpath('//device[@id="'.$device_id.'"]');
            if (count($device_element) > 0)
            {
                foreach ($device_element[0] as $property)
                {
                    if (!isset($this->property_list[(string)$property['name']]))
                    {
                        $this->property_list[(string)$property['name']] = (string)$property['value'];
                    }
                }
            }
            else
            {
                $this->property_list['all'] = true;
            }
            if ((string)$device_element[0]['parentId'] != "root")
            {
                $this->loadDeviceCapabilities((string)$device_element[0]['parentId']);
            }
        }
    }


}