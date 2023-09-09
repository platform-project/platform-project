<?php
/**
 * This contains all sanitization specific functions
 * @version     $Id: sanitize.php 40 2011-02-09 14:10:00Z biyi $
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

/** Sanitize helper functions **/

/**
 * sanitize data
 */
function sanitize($data){
  foreach ($data as $key => $input){
    if (!is_array($input)){
      $clean[$key] = check_plain($input);
    } else {
      $clean[$key] = sanitize($input);
    }
  }
  return $clean;
}

/**
 * clean data
 */
function clean(&$data){
  foreach($data as $key => $post){
    if (is_array($post)){
      clean($post);
    } else {
      $clean[$key] = strip_tags(mysql_real_escape_string($post, db_connection()));
    }
  }
  $data = $clean;
}

function clean_post($data){
  return sanitize($data);
}

function clean_sql($data){
  return mysql_real_escape_string($data);
}

function check_plain($text){
  return htmlspecialchars($text, ENT_QUOTES, 'UTF-8');
}