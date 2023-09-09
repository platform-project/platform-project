<?php
/**
 * This contains all the system-wide Log functions
 * @version     $Id: index.php 40 2011-02-09 14:10:00Z biyi $
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


function sys_log($content, $type = 'system') {
  $filename = null;
  $extension = 'log';
  $datestamp = date("Y-m-d");
  $timestamp = date('Y-m-d H:i:s');
  switch($type) {
    case "{$type}" :
    // constructs filename
    $filename = "{$type}-{$datestamp}.{$extension}";

    // opens the $filename in append mode and save the data into the file
    chmod(PLATFORM_SANDBOX_SYSTEM_LOGS_PATH . "/logs", 0777);
    $handle = fopen(PLATFORM_SANDBOX_SYSTEM_LOGS_PATH . $filename, 'a+');

    // constructs the data content
    $data = "[{$timestamp}] {$content}\n";
    if (fwrite($handle, $data) === false) {
      e("Cannot write to file ($filename)");
    }
    fclose($handle);
    break;
  }
  return $filename;
}
