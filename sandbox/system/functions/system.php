<?php
/**
 * This contains all system specific functions
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

/**
 * _system: This is a pseudo constructor
 * @param void
 *
 * @return void
 */
function _system(){

}

function system_authenticate(){
  @session_start();
  global $auth, $subscription, $session, $smarty;
  if (!$auth->online($session) && !$auth->authorize($session)){
    if (is_null($_SESSION['auth_user'])){
      @header('Location: index.php?page=frontend&section=site&view=home');
      exit(0);
    }
  } else {
    $auth_user = $auth->retrieve_auth_user($session);
    $session->add_content('auth_user', $auth_user);
  }
}

function system_notification(){
  system_notification_render($_REQUEST['request']);
}

function system_notification_render($request){
  switch($request){
    case 'about':
    $build = date("Ymd");
    $title = "Platform Browser";
    $message = "<br />You are currently running: <br /><br />
               <strong>Platform Browser</strong> <br /><br />
               <strong>Version</strong> <br />0.01<br /><br />
               <strong>Build</strong> <br /> ".$build;
    notification_slider($title, $message, "'#about'", "mouseover");        
    case 'network':
      $network_status = network_is_online();
      $title = ($network_status) ? "Network Online" : "Network Offline";
      $message = ($network_status) ? "You are connected to the internet!" : "You seem to be disconnected from the internet!";
      notification_slider($title, $message, "'a.notification-indicator'", "mouseover");
      break;
  }
}

function system_device_detection($debug=false){
  platform_launch(PLATFORM_SANDBOX_SYSTEM_VENDORS_PATH . DS . PLATFORM_VENDORS_OPENDDR . DS . 'BuilderDataSource.class.php');
  platform_launch(PLATFORM_SANDBOX_SYSTEM_VENDORS_PATH . DS . PLATFORM_VENDORS_OPENDDR . DS . 'DeviceDetection.class.php');

  $device_detection = new DeviceDetection($_SERVER['HTTP_USER_AGENT']);
  $device_options = $device_detection->getAllCapabilities();
  $device_type = 'Unknown';
  if ($device_options['all']){
    $user_agent = detect_user_agent();
    $device_type = get_device_type();
    
  } else {
    $device_type = $device_options['vendor'] . ' ' . $device_options['model'];
  }

  if ($debug){
    echo "<h2>Device Info</h2>";
    echo "<h3>User Agent: ".$user_agent."</h3>";
    echo "<pre>";
    print_r($device_options);
    echo "</pre>";
  }
  unset($device_detection);
  return $device_type;
}

function system_track(){
  $system = PLATFORM_SANDBOX_SYSTEM_CACHES_PATH . DS . 'system.db';

  $db = db_create_sqlite($system);
  $ip = $_SERVER["REMOTE_ADDR"];
  $ua = detect_user_agent();
  $dt = system_device_detection();
  $uri = $_SERVER["REQUEST_URI"];
  $input = $_POST['input'];

  if( $ip == PLATFORM_WHOIS ) { $ip = $_SERVER["HTTP_X_REAL_IP"]; }
  if( count($_GET) > 0 ) { $get = print_r($_GET, true); }
  if( count($_POST) > 0 ) { $post = print_r($_POST, true); }

  $sql = "CREATE TABLE IF NOT EXISTS visits_".date("Y_m_d")." AS SELECT * FROM visits WHERE 0";
  db_query_sqlite($sql, $db);
  $sql = "INSERT INTO visits_".date("Y_m_d")." 
                 ( url, get, post, input, ua, dt, ip ) 
          VALUES 
                 ('".sqlite_escape_string($uri)."', 
                  '".sqlite_escape_string($get)."', 
                  '".sqlite_escape_string($post)."', 
                  '".sqlite_escape_string($input)."',
                  '".sqlite_escape_string($ua)."', 
                  '".sqlite_escape_string($dt)."', 
                  '".sqlite_escape_string($ip)."')";
  
  db_query_sqlite($sql, $db);
  unset( $db );
}

function system_location(){
  return "Home";
}
