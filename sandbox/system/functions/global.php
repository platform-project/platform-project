<?php
/**
 * This contains all the system-wide global functions
 * @version     $Id: global.php 40 2011-02-09 14:10:00Z biyi $
 * @package     Platform
 * @category    Function
 * @author      Biyi Akinpelu
 * @link        mailto:biyi@entilda.com
 * @copyright   Copyright (C) 2011 - 2012 The Platform Authors. All rights reserved.
 * @license     GNU Public Licence, see LICENSE.php
 * Platform is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 * See COPYRIGHT.php for copyright notices and details.
 */

/**
 * _global: This is a pseudo constructor
 * @param void
 *
 * @return void
 */
function _global(){

}

/**
 * using: Used to determine which processing method to implement
 * @param $string $directive
 *
 * @return boolean $use True if using stdlib False if using object(s)
 */
function using($directive='stdlib'){
  switch($directive){
    case 'object':
    case 'objects':
      $use = using_object();
      break;
    case 'stdlib':
    default:
      $use = using_stdlib();
      break;
  }
  return $use;
}

/**
 * using_stdlib: Used to determine if processing method uses standards
 * Also a pseudo-function call to using_standard_library()
 *
 * @param $string $directive
 *
 * @return boolean $use True if using stdlib False if using object(s)
 */
function using_stdlib(){
  return using_standard_library();
}

/**
 * using_object: Used to determine if processing method uses objects
 * @param void
 *
 * @return boolean $use True if using object(s) False if using stdlib
 */
function using_object(){
  return (!stristr(APP_ENGINE, 'std'));
}

/**
 * using: Used to determine which processing method to implement
 * @param $string $directive
 *
 * @return boolean $use True if using stdlib False if using object(s)
 */
function using_standard_library(){
  // TODO: Implement basic procedural implementation
  // only (no objects)
  return (stristr(APP_ENGINE, 'std'));
}

function exclude($array, $exclusion)
{
    foreach ($array as $i => $data)
    {
        foreach ($exclusion as $j => $exclude)
        {
            if (isset($array[$i]) && $array[$i] == $exclusion[$j])
            {
                unset($array[$i]);
            }
        }
    }
    return $array;
}

/** User helper functions **/
function random_hash($md5=false){
  srand(time(0));
  $random = rand(0, 9999999999);
  $hash_key = "hash:data.key:$random@entilda.com";
  return (($md5) ? md5($hash_key) : $hash_key);
}

function choose_random_user($user_lists){
  srand(time(0));
  return $user_lists[rand(0, count($user_lists)-2)];
}

function check_signup_inputs($errors)
{
  if($errors['username']=='' && $errors['password']=='' && $errors['c_password']==''
    && $errors['msisdn']=='' && $errors['email']=='' && $errors['terms_conditions']==''
    && $errors['role'] == '')
  {
     return true;
  }
  else{
     return false;
  }
}

function check_email_address($email) {
  // First, we check that there's one @ symbol, and that the lengths are right
  if (!preg_match("^[^@]{1,64}@[^@]{1,255}$", $email))
  {
    // Email invalid because wrong number of characters in one section, or wrong number of @ symbols.
    return false;
  }
  // Split it into sections to make life easier
  $email_array = explode("@", $email);
  $local_array = explode(".", $email_array[0]);
  for ($i = 0; $i < sizeof($local_array); $i++)
  {
     if (!preg_match("^(([A-Za-z0-9!#$%&'*+/=?^_`{|}~-][A-Za-z0-9!#$%&'*+/=?^_`{|}~\.-]{0,63})|(\"[^(\\|\")]{0,62}\"))$", $local_array[$i]))
     {
      return false;
     }
  }
  if (!preg_match("^\[?[0-9\.]+\]?$", $email_array[1]))
  {
    // Check if domain is IP. If not, it should be valid domain name
    $domain_array = explode(".", $email_array[1]);
    if (sizeof($domain_array) < 2)
    {
      return false; // Not enough parts to domain
    }
    for ($i = 0; $i < sizeof($domain_array); $i++)
    {
      if (!preg_match("^(([A-Za-z0-9][A-Za-z0-9-]{0,61}[A-Za-z0-9])|([A-Za-z0-9]+))$", $domain_array[$i]))
      {
        return false;
      }
    }
  }
  return true;
}

function set_msisdn_to_required($cell, $replacement, $placeHolder)
{
    //Get parameter lengths
    $clen = strlen($cell);
    $rlen = strlen($replacement);
    $plen = strlen($placeHolder);

    //Check if the idd is the first characters in the msisdn typed
    for ($k=0; $k<$rlen; $k++)
    {
        if ($replacement[$k] != $cell[$k])
        {
            //Fix the number eg: if it is 0821234567
            //is 27, return 27821234567
            return $replacement.substr($cell, $plen, $clen);
        }
    }

    return $cell;
}

function validate_msisdn($number, $idd="27")
{
    if ($idd == "")
    return false;

    //check if the MSISDN is numeric
    if (!is_numeric($number))
    return false;

    //Check if '0' or the idd  is the first characters in the msisdn typed
    if($number[0] != '0')
    {
       for ($k=0; $k<strlen($idd); $k++)
       {
           if ($idd[$k] != $number[$k])
           {
               return false;
            }
        }
    }
    //Make sure the number is at least 10 characters long, this might vary
    //on other countries, it's just a fail safe for now
    if (strlen($number) < 10)
    return false;

    //No spaces are allowed in cell numbers
    if (strpos($number, " "))
    return false;

    return true;
}

/**
 * Get MSISDN of mobile device from remote server.
 */
function scrypt($str_message)
{
    $len_str_message=strlen($str_message);
    $str_encrypted_message="";
    for ($position = 0;$position<$len_str_message;$position++)
    {
        $key_to_use = (($len_str_message+$position)+1);
        $key_to_use = (255+$key_to_use) % 255;
        $byte_to_be_encrypted = substr($str_message, $position, 1);
        $ascii_num_byte_to_encrypt = ord($byte_to_be_encrypted);
        $xored_byte = $ascii_num_byte_to_encrypt ^ $key_to_use;
        $encrypted_byte = chr($xored_byte);
        $str_encrypted_message .= $encrypted_byte;
    }
    return $str_encrypted_message;
}

/**
Opens a socket to any server ip and port then writes and reads data on that port
It uses parameters which may be configured as needed
By default these variables are:
$postserver="127.0.0.1";
$postpath="/folder/file.php";
$postport="80";
$posttimeout="10";
$postcontenttype="text/html";
*/
function post_data($data, $post_server="127.0.0.1", $post_path="/folder/file.php", $post_port="80", $post_timeout="10", $post_content_type="text/html")
{
    //open socket
    $fp = fsockopen($post_server, $post_port, $post_timeout);
    if ($fp)
    {
        //Make up data to write over socket
        $post_data = "POST $post_path HTTP/1.0\n";
        $post_data .= "Content-Type: ".$post_content_type."\n";
        $post_data .= "Content-length: ".strlen($data)."\n\n";
        $post_data .= $data . "\n";
        //Write data over socket
        fputs($fp, $post_data);
        //Read data passed back over socket
        $result = "";
        while (!feof($fp))
        {
            $result .= fgets($fp, 1024);
        }
        //Close socket
        fclose($fp);
        //Return results
        return $result;
    }

    return false;
}

function parse_xml($str, $tstr_start, $tstr_end)
{
  if ( ! strstr($str, $tstr_start) || !strstr($str, $tstr_end))
  {
    return ;
  }
  $start = strpos($str,$tstr_start) + strlen($tstr_start);
  $stop = strpos($str, $tstr_end, $start);
  $length = $stop - $start;
  return trim(substr($str, $start, $length));
}

/**
 * Converts an integer to float and returns the float precision as specified, default 2
 */
function int2float($val, $precision=2)
{
    $float = sprintf("%.".$precision."f", $val);
    return $float;
}

/**
This function was originally used to parse XML
It is now simply a method to get text between identified
starting and ending points, also in the form of text
*/
function get_text_between($fstr,$tstr_start,$tstr_end)
{
    if (strpos("x".$fstr, $tstr_start))
    {
        $start = strpos($fstr,$tstr_start) + strlen($tstr_start);
        if (strpos($fstr,$tstr_end, $start))
        {
            $stop = strpos($fstr,$tstr_end, $start);
            $length = $stop - $start;
            return trim(substr($fstr, $start, $length));
        }
    }

    return "";
}

/*
 *  This function returns an assert test data for sms gateway
 */
function assert_test_data(){
  return "<?xml version=\"1.0\" ?>
          <message>
            <version version=\"1.0\"/>
            <response type=\"application/mo\">
              <sysid>Platform</sysid>
              <uuid>platform</uuid>
              <service>test</service>
              <callback
                seqno=\"000000\"
                sent=\"20111204092021\"
                from=\"2782000000\"
                to=\"32000\"
                tag=\"8080\"
                value=\"100\"
                networkid=\"1\"
                adultrating=\"0\">
                <content type=\"text\">compress</content>
              </callback>
            </response>
          </message>
";
}

/*
$test_text = get_text_between(assert_test_data(), "<Content Type=\"TEXT\">", "<");
assert($test_text == "Pack");
assert(get_text_between("<tag>lekka!</tag>", "<tag>", "</tag>") == "lekka!");
assert(get_text_between("<tag>lekka!</tag>", "<non>", "</non>") == "");
assert(get_text_between("<iamsam>his name is sam</iamsam><tag>lekka!</tag>", "<tag>", "</tag>") == "lekka!");
assert(get_text_between("<iamsam>his name is sam</iamsam>
<tag>lekka!</tag>", "<tag>", "</tag>") == "lekka!");
*/

function error($desc)
{
  echo 'ERROR=>'.$desc;
}

function count_numeric_items(&$array){
  return is_array($array) ? count(array_filter(array_keys($array), 'is_numeric')) : 0;
}

  /*
   * @author : Jason Sheets <jsheets at shadonet dot com>
   *
   * @param unknown_type $xml
   * @return Array
   */
function simple_xml_to_array($sxml)
{
  $arr = array();
  if ($sxml) {
    foreach ($sxml as $k => $v) {
      if ($sxml['list']) {
        $arr[] = simple_xml_to_array($v);
      } else {
        $arr[$k] = simple_xml_to_array($v);
      }
    }
  }
  if (sizeof($arr) > 0) {
    return $arr;
  } else {
    return (string)$sxml;
  }
}

function all_empty()
{
  $args = func_get_args();
  foreach ($args as $item)
    if (!empty($item))
      return false;

  return true;
}

function generate_password ($length = 6)
{

  // start with a blank password
  $password = "";

  // define possible characters
  $possible = "0123456789bcdfghjkmnpqrstvwxyz!#@";

  // set up a counter
  $i = 0;

  // add random characters to $password until $length is reached
  while ($i < $length) {

    // pick a random character from the possible ones
    $char = substr($possible, mt_rand(0, strlen($possible)-1), 1);

    // we don't want this character if it's already in the password
    if (!strstr($password, $char)) {
      $password .= $char;
      $i++;
    }

  }

  // done!
  return $password;
}

function def(&$var, $default)
{
  $var= empty($var)?$default:$var;
}

/**
 * truncate text
 *
 * @param unknown_type $text
 * @param unknown_type $n
 * @return unknown
 */
function truncate($text,$n){
  return substr($text = substr($text,0,$n)
  ,0,
  strrpos($text,' ')
  );
}

function get_feed_parsed_by_google($url, $items=5, $nocache=0)
{
  $feedurl = "http://www.google.com/uds/Gfeeds?num={$items}&hl=en&output=json&q=".urlencode($url).
             "&v=1.0&nocache={$nocache}";
  $filedata = file_get_contents($feedurl);
  $djson = json_decode($filedata);
  return $djson;
}

function memory_usage() {
  $mem_usage = memory_get_usage(true);
  echo format_bytes($mem_usage);
  echo "<br/>";
}


