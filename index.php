<?php
/**
 * Loads the platform index page
 * @version     $Id: index.php 40 2011-02-09 14:10:00Z biyi $
 * @package     Platform
 * @category    PHP
 * @author      The Platform Authors
 * @link        mailto:platform@entilda.com
 * @copyright   Copyright (C) 2011 - 2012 The Platform Authors. All rights reserved.
 * @license     GNU Public Licence, see LICENSE.php
 * Platform is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 * See COPYRIGHT.php for copyright notices and details.
 */

require_once __DIR__ .'/sandbox/system/init.php';

/*
 * Determine and execute a generic method of implementation 
 */
switch( PLATFORM_ENGINE ) {
  case 'object':  // using object-orientation <strict adherence>
    require_once PLATFORM_SANDBOX_SYSTEM_CLASSES_PATH . DS . 'platform.php';
    $platform = new Platform();
    break;
  case 'objects': // using object-orientation <stdlib re-use>
    require_once PLATFORM_SANDBOX_SYSTEM_CLASSES_PATH . DS . 'standards/platform.php';
    $platform = new Platform();
    break;
  case 'stdlib': // using procedural <optimal use>
  default:
    require_once PLATFORM_SANDBOX_SYSTEM_FUNCTIONS_PATH . DS . 'platform.php';
    platform();
    break;
}


/**
 * Detect browser type
 */
if (!isset($_SERVER['QUERY_STRING'])){
  redirect_to('browser.html');
}
