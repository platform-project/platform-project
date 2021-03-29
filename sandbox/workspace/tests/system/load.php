<?php
/**
 * Tests system load
 * @version     $Id: load.php 40 2011-02-09 14:10:00Z biyi $
 * @package     Platform
 * @category    Tests
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

platform_launch_initialize();

switch($_REQUEST['request']){
  case 'network':
    benchmark_network_view();
    break;
  case 'location':
    benchmark_location_view();
    break;
  case 'device':
    benchmark_device_view();
    break;
  case 'pageload':
    benchmark_pageload_view();
    break;
  case 'memory':
    benchmark_memory_usage_view();
    break;
}