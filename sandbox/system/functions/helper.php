<?php
/**
 * This contains helper functions
 * @version     $Id: system.php 40 2011-02-09 14:10:00Z biyi $
 * @package     Platform
 * @category    Function
 * @author      Platform
 * @link        mailto:platform@entilda.com
 * @copyright   Copyright (C) 2011 - 2012 The Platform Authors. All rights reserved.
 * @license     GNU Public Licence, see LICENSE.php
 * Platform is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 * See COPYRIGHT.php for copyright notices and details.
 */

/** Print output helper functions **/
function e($string){
  echo $string;
}

function p($string){
  print($string);
}

function pr($array){
  print_r($array);
}

function _e($data, $debug=false){
  $data = ($debug) ? $data . NEW_LINE : $data;
  echo $data;
}

function _p($data, $debug=false){
  if ($debug) _e("<pre>", $debug);
  _e($data);
  if ($debug) _e("</pre>", $debug);
}

function _s($data, $debug=false){
  if ($debug) _e("<pre>", $debug);
  _e(htmlentities($data));
  if ($debug) _e("</pre>", $debug);
}

function _d($data, $debug=false){
  if ($debug) _e("<pre>", $debug);
  var_dump($data);
  if ($debug) _e("</pre>", $debug);
}

function _pr($data, $debug=false){
  if ($debug) _e("<pre>", $debug);
  print_r($data);
  if ($debug) _e("</pre>", $debug);
}

/** Browser helper functions **/
function browse_to($url){
  @header('Location:'.$url);
  exit;
}

function redirect_to($url, $delay=0){
  echo '<meta HTTP-EQUIV="REFRESH" content="'.$delay.'; url='.$url.'">';
  exit;
}

function get_current_url()
{
  /*$router = loader::load("router");
  $url = base::base_url()."/".$router->get_route();
  return $url;*/
}

function view_source($filename=null){
  is_null($filename) ? $_SERVER['SCRIPT_FILENAME'] : $filename;
  $command = '/usr/bin/php -s '.$filename;
  exec($command, $output, $return);
  return $output;
}

// gets the ip address of a client machine
function get_real_ip(){
  if (getenv('HTTP_CLIENT_IP')){
    $ip = getenv('HTTP_CLIENT_IP');
  } else if (getenv('HTTP_X_FORWARDED_FOR')){
    $ip = getenv('HTTP_X_FORWARDED_FOR');
  } else if (getenv('HTTP_X_FORWARDED')){
    $ip = getenv('HTTP_X_FORWARDED');
  } else if (getenv('HTTP_FORWARDED_FOR')){
    $ip = getenv('HTTP_FORWARDED_FOR');
  } else if (getenv('HTTP_FORWARDED')){
    $ip = getenv('HTTP_FORWARDED');
  } else if (getenv('REMOTE_ADDR')) {
    $ip = getenv('REMOTE_ADDR');
  } else {
     $ip = "MASKED IP: STEALTH MODE";
  }
  return $ip;
}

function get_device_type(){
  $device_type = 'Unknown';
  switch(true){
    // Windows
    case is_windows() && is_firefox() :
      $device_type = 'Windows Firefox';
      break;
    case is_windows() && is_chromium() :
      $device_type = 'Windows Chromium';
      break;
    case is_windows() && is_chrome() :
      $device_type = 'Windows Chrome';
      break;
    case is_windows() && is_safari() :
      $device_type = 'Windows Safari';
      break;
    case is_windows() && is_opera() :
      $device_type = 'Windows Opera';
      break;
    case is_windows() && is_ie() :
      $device_type = 'Windows IE';
      break;
    // Apple Macintosh
    case is_macintosh() && is_firefox() :
      $device_type = 'Apple Firefox';
      break;
    case is_macintosh() && is_chromium() :
      $device_type = 'Apple Chromium';
      break;
    case is_macintosh() && is_chrome() :
      $device_type = 'Apple Chrome';
      break;
    case is_macintosh() && is_safari() :
      $device_type = 'Apple Safari';
      break;
    case is_macintosh() && is_opera() :
      $device_type = 'Apple Opera';
      break;
    case is_macintosh() && is_ie() :
      $device_type = 'Apple IE';
      break;
    // Ubuntu
    case is_ubuntu() && is_firefox() :
      $device_type = 'Ubuntu Firefox';
      break;
    case is_ubuntu() && is_chromium() :
      $device_type = 'Ubuntu Chromium';
      break;
    case is_ubuntu() && is_chrome() :
      $device_type = 'Ubuntu Chrome';
      break;
    case is_ubuntu() && is_safari() :
      $device_type = 'Ubuntu Safari';
      break;
    case is_ubuntu() && is_opera() :
      $device_type = 'Ubuntu Opera';
      break;
    case is_ubuntu() && is_ie() :
      $device_type = 'Ubuntu IE';
      break;
    // Linux
    case is_linux() && is_firefox() :
      $device_type = 'Linux Firefox';
      break;
    case is_linux() && is_chromium() :
      $device_type = 'Linux Chromium';
      break;
    case is_linux() && is_chrome() :
      $device_type = 'Linux Chrome';
      break;
    case is_linux() && is_safari() :
      $device_type = 'Linux Safari';
      break;
    case is_linux() && is_opera() :
      $device_type = 'Linux Opera';
      break;
    case is_linux() && is_ie() :
      $device_type = 'Linux IE';
      break;
  } 
  return $device_type;
}

function detect($object, $type) {
  if ($object == 'browser'){
    return (strlen(stristr(detect_browser($type), $type)) > 0);
  }

  if ($object == 'os'){
    return (strlen(stristr(detect_os($type), $type)) > 0);
  }
}

function detect_user_agent(){
  $user_agent = getenv('HTTP_USER_AGENT');
  return $user_agent;
}

// detects the browser type of the client machine
function detect_browser($type=null) {
  $detected = false;
  $browser = strtolower(detect_user_agent());
  switch (true) {
    case strlen(stristr($browser, $type)) > 0:
      $detected = strlen(stristr($browser, $type)) > 0;
      break;

    default:
      $detected = false;
      break;
  }
  //$detected['browser']['name'] = stristr($browser, 'firefox');
  //$detected['browser']['detected'] = (strlen(stristr($browser, 'firefox')) > 0);
  return $detected;
}

// detects the operating system type of the client machine
function detect_os($type=null) {
  $detected = false;
  $os = strtolower(detect_user_agent());
  switch (true) {
    case stripos($os, $type):
      $detected = stristr($os, $type);
      break;

    default:
      $detected = false;
      break;
  }
  return $detected;
}

function is_post()
{
  if (count($_POST) > 0) return true;
  return false;
}

function is_get()
{
  if (count($_GET) > 0) return true;
  return false;
}

function is_chrome(){
  return detect_browser('chrome');
}

function is_chromium(){
  return detect_browser('chromium');
}

function is_firefox(){
  return is_ff();
}

function is_ff()
{
  return detect_browser('firefox');
}

function is_ff2()
{
  return detect_browser('firefox/2');
}

function is_ff3()
{
  return detect_browser('firefox/3');
}

function is_ie()
{
  return detect_browser('msie');
}

function is_ie6()
{
  return detect_browser('msie 6');
}

function is_ie7()
{
  return detect_browser('msie 7');
}

function is_ie8()
{
  return detect_browser('msie 8');
}

function is_ie9()
{
  return detect_browser('msie 9');
}

function is_opera()
{
  return detect_browser('opera');
}

function is_safari(){
  return detect_browser('safari');
}

function is_macintosh()
{
  return detect_os('macintosh');
}

function is_linux(){
  return detect_os('linux');
}

function is_windows(){
  return detect_os('windows');
}

function is_apple(){
  return detect_os('apple');
}

function is_ubuntu(){
  return detect_os('ubuntu');
}
