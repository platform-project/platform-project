<?php
/**
 * This contains all network specific functions
 * @version     $Id: network.php 40 2011-02-09 14:10:00Z biyi $
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
 * gets the ip address of a client machine
 * @param void
 *
 * @return string $ip The ip address of the client machine
 */
function network_get_real_ip(){
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

/**
 * gets a list of all active nodes on the network
 * @param void
 *
 * @return array $ip An array ip address list of client machines connected to the network
 */
function network_get_active_nodes($network="192.168.1.0/24"){
  $command = "/usr/bin/fping -a -g {$network} 2> /dev/null";
  $nodes = shell_exec($command);
  $nodes = explode("\n", $nodes);
  foreach ($nodes as $i => $node){ 
    $node = trim($node);
    if (empty($node))
      unset($nodes[$i]);
  }
  return array_values($nodes);
}

/**
 * gets the ip address of a local machine
 * @param void
 *
 * @return array $ip The ip address of the local machine
 */
function network_get_sys_ip($inteface="eth0"){
  $command = "/sbin/ip addr show {$inteface} | gawk '/inet / {FS = \"/\"; $0 = $2; print $1}'";
  $nodes= shell_exec($command);
  $nodes = explode("\n", $nodes);
  foreach ($nodes as $i => $node){ 
    $node = trim($node);
    if (empty($node))
      unset($nodes[$i]);
  }
  return array_values($nodes);
}

/**
 * gets the ip address of a local machine
 * @param void
 *
 * @return array $ip The ip address of the local machine
 */
function network_get_sys_broadcast(){
  $command = "/sbin/ip addr | grep inet | grep brd | awk '{print $2}'";
  $nodes= shell_exec($command);
  $nodes = explode("\n", $nodes);
  foreach ($nodes as $i => $node){ 
    $node = trim($node);
    if (empty($node))
      unset($nodes[$i]);
  }
  return array_values($nodes);
}

/**
 * creates all visible/active network nodes on the current network
 * @param void
 *
 * @return void
 */
function network_create_nodes(){
  $is_wireless = false;
  $ip = network_get_sys_ip();
  if (!count($ip)){
    $ip = network_get_sys_ip('wlan0');
    $is_wireless = true;
  } else if (!count($ip)){
    $ip = network_get_sys_ip('ppp0');
  } else if (!count($ip)){
    $ip = network_get_sys_ip('lo');
  }

  $broadcast = network_get_sys_broadcast();
  $local_broadcast = "{$ip[0]}/24";

  $nodes = network_get_active_nodes($local_broadcast);
  foreach ($nodes as $node){
    if ($is_wireless){
      create_directory(PLATFORM_NETWORKS_PATH . DS . 'wireless' . DS . $node);
    } else {
      create_directory(PLATFORM_NETWORKS_PATH . DS . 'lan' . DS . $node);
    }
  }
}

/**
 * checks if network is up or down
 * @param string $ip ip address or hostname to check
 * @param boolean $verbose whether to display output to screen
 *
 * @return boolean true if network up or false if network is down
 */
function network_is_online($ip='google.com', $verbose=false){
  $command = '/bin/ping -c 1 -q '.$ip.' >/dev/null 2>&1 && echo "Online" || echo "Offline"';
  $output = shell_exec($command);
  if ($verbose) echo $output;
  return strtolower(trim($output)) == 'online' ? true : false;
}