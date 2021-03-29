<?php
/**
 * This contains all requests specific functions
 * @version     $Id: request.php 40 2011-02-09 14:10:00Z biyi $
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

function curl_post($url, array $post = array(), array $options = array()) { 
  $defaults = array( 
    CURLOPT_POST => 1, 
    CURLOPT_HEADER => 0, 
    CURLOPT_URL => $url, 
    CURLOPT_FRESH_CONNECT => 1, 
    CURLOPT_RETURNTRANSFER => 1, 
    CURLOPT_FORBID_REUSE => 1, 
    CURLOPT_TIMEOUT => 10, 
    CURLOPT_POSTFIELDS => http_build_query($post) 
  ); 

  $ch = curl_init(); 
  curl_setopt_array($ch, ($options + $defaults)); 
  if( ! $result = curl_exec($ch)) { 
    trigger_error(curl_error($ch)); 
  } 
  curl_close($ch); 
  return $result; 
}
