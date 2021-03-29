<?php
/**
 * Notifications
 * Test case: Determine the optimal use of displaying notifications
 *
 * @version     $Id: index.php 40 2011-02-09 14:10:00Z biyi $
 * @package     Platform
 * @category    Tests
 * @author      The Platform Authors
 * @link        mailto:platform@entilda.com
 * @copyright   Copyright (C) 2011 The Platform Authors. All rights reserved.
 * @license     GNU/GPL, see LICENSE.php
 * Platform is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 * See COPYRIGHT.php for copyright notices and details.
 */

// initilizing platform for self-contained objects
platform_launch_initialize();

js_add_jquery();    // adding jquery library
js_add_jquery_ui(); // adding jquery ui library

switch($_REQUEST['request']){
  case 'network':
    $network_status = network_is_online();
    $title = ($network_status) ? "Network Online" : "Network Offline";
    $message = ($network_status) ? "You are connected to the internet!" : "It seems like your internet connection is gone. Check your connection settings!";
    system_notification($title, $message);
    break;
}
?>
<!--<link rel="stylesheet" href="//cloud.typography.com/610186/691184/css/fonts.css">-->