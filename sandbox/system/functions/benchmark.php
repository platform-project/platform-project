<?php
/**
 * This contains all the system-wide benchmark functions
 * @version     $Id: benchmark.php 40 2011-02-09 14:10:00Z biyi $
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

function benchmark_pageload(){
  global $page_init, $page_load;

  $page_load = microtime();
  $page_load_time = $page_load - $page_init;

  return abs($page_load_time);
}

function benchmark_pageload_output($format="raw"){
  $page_load_time = benchmark_pageload();
  $raw = null;
  $xml = null;
  $html = null;
  switch($format) {
    case 'xml':
      $xml_start_tag = '<?xml version="1.0">';
      $xml .= $xml_start_tag;
      $xml .= '<page>';
      $xml .= '<attribute load="time"> '. $page_load_time . '</attribute>';
      $xml .= '</page>';
      $page_load_output = $xml;
      break;
    case 'html':
      $html .= '<div class="pageload"><i class="fi-page fi-platform size-18"></i><span class="label">Pageload:</span> ';
      $html .= '<span>' . $page_load_time . ' second(s)</span></div>';
      $page_load_output = $html;
      break;
    case 'raw':
    default:
      $raw = "Pageload: " . $page_load_time . " second(s)";
      $page_load_output = $raw;
      break;
  }

  return $page_load_output;
}

function benchmark_pageload_print(){
  print benchmark_pageload_output();
}

function benchmark_pageload_view(){
  print benchmark_pageload_output('html');
}

function benchmark_memory_usage() {
  return format_bytes(memory_get_usage(true));
}

function benchmark_memory_usage_output($format="raw"){
  $memory_usage = benchmark_memory_usage();
  $raw = null;
  $xml = null;
  $html = null;
  switch($format) {
    case 'xml':
      $xml_start_tag = '<?xml version="1.0">';
      $xml .= $xml_start_tag;
      $xml .= '<system>';
      $xml .= '<attribute memory="usage"> '. $memory_usage . '</attribute>';
      $xml .= '</system>';
      $memory_usage_output = $xml;
      break;
    case 'html':
      $html .= '<div class="memory"><i class="fi-database fi-platform size-18"></i><span class="label">Memory:</span> ';
      $html .= '<span>' . $memory_usage . ' used</span></div>';
      $memory_usage_output = $html;
      break;
    case 'raw':
    default:
      $raw = "Memory: " . $memory_usage . " used";
      $memory_usage_output = $raw;
      break;
  }

  return $memory_usage_output;
}

function benchmark_memory_usage_print(){
  print benchmark_memory_usage_output();
}

function benchmark_memory_usage_view(){
  print benchmark_memory_usage_output('html');
}

function benchmark_network(){
  return network_is_online();
}

function benchmark_network_output($format="raw"){
  $network_status = benchmark_network() ? 'Online' : 'Offline';
  if (strtolower(trim($network_status)) == 'online') {
    $network_indicator = '<a href="#" onclick="system_load(\'notification_network\'); return false;" title="Internet On" class="notification-indicator"><span class="network-online"></span></a>';
  } else {
    $network_indicator = '<a href="#" onclick="system_load(\'notification_network\'); return false;"  title="Internet Off" class="notification-indicator"><span class="network-offline"></span></a>';
  }

  $raw = null;
  $xml = null;
  $html = null;
  switch($format) {
    case 'xml':
      $xml_start_tag = '<?xml version="1.0">';
      $xml .= $xml_start_tag;
      $xml .= '<system>';
      $xml .= '<attribute network="status"> '. $network_status . '</attribute>';
      $xml .= '</system>';
      $network_output = $xml;
      break;
    case 'html':
      $html = '<div class="network">';
      $html .= $network_indicator;
      $html .= '</div>';
      $network_output = $html;
      break;
    case 'raw':
    default:
      $raw = "Network: " . $network_status . " &nbsp; ";
      $network_output = $raw;
      break;
  }
  return $network_output;
}

function benchmark_network_print(){
  print benchmark_network_output();
}

function benchmark_network_view(){
  print benchmark_network_output('html');
}

function benchmark_device_detect() {
  return system_device_detection();
}

function benchmark_device_output($format="raw"){
  $device_type = benchmark_device_detect();
  $raw = null;
  $xml = null;
  $html = null;
  switch($format) {
    case 'xml':
      $xml_start_tag = '<?xml version="1.0">';
      $xml .= $xml_start_tag;
      $xml .= '<system>';
      $xml .= '<attribute device="type"> '. $device_type . '</attribute>';
      $xml .= '</system>';
      $device_output = $xml;
      break;
    case 'html':
      $html .= '<div class="device"><i class="fi-laptop fi-platform size-18"></i><span class="label">Device:</span> ';
      $html .= '<span>' . $device_type . '</span></div>';
      $device_output = $html;
      break;
    case 'raw':
    default:
      $raw = "Device: " . $device_type . " &nbsp; ";
      $device_output = $raw;
      break;
  }
  return $device_output;
}

function benchmark_device_print(){
  print benchmark_device_output();
}

function benchmark_device_view(){
  print benchmark_device_output('html');
}

function benchmark_location_detect() {
  return system_location();
}

function benchmark_location_output($format="raw"){
  $location = benchmark_location_detect();
  $raw = null;
  $xml = null;
  $html = null;
  switch($format) {
    case 'xml':
      $xml_start_tag = '<?xml version="1.0">';
      $xml .= $xml_start_tag;
      $xml .= '<system>';
      $xml .= '<attribute location="coordinate"> '. $location . '</attribute>';
      $xml .= '</system>';
      $location_output = $xml;
      break;
    case 'html':
      $html .= '<div class="location"><i class="fi-marker fi-platform size-18"></i><span class="label">Location:</span> ';
      $html .= '<span>' . $location . '</span></div>';
      $location_output = $html;
      break;
    case 'raw':
    default:
      $raw = "Location: " . $location . " &nbsp; ";
      $location_output = $raw;
      break;
  }
  return $location_output;
}

function benchmark_location_print(){
  print benchmark_location_output();
}

function benchmark_location_view(){
  print benchmark_location_output('html');
}
