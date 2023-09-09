<?php
/**
 * Loads the platform sandbox functions error page
 * @version     $Id: error.php 40 2011-02-09 14:10:00Z biyi $
 * @package     Platform
 * @category    PHP
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

function errors(){
  ini_set('display_errors', 0);
  ini_set('log_errors', 1);
  ini_set('error_log', PLATFORM_SANDBOX_SYSTEM_PATH . DS . 'logs/error_log_' . @date('Ymd') . '.log');
  error_reporting(E_ALL ^ E_NOTICE);
}

errors();
