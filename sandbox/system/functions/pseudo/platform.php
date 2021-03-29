<?php
/**
 * This contains all pseudo platform specific functions
 * @version     $Id: platform.php 40 2011-02-09 14:10:00Z biyi $
 * @package     Platform
 * @subpackage  Pseudo
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

function pl($file){
  platform_launch($file);
}

function pli(){
  if (!function_exists('platform_launch_initialize')){
    platform_launch_initialize();
  }
}

function pl_php($file){
  platform_launch_php($file);
}

function pl_phtml($file){
  platform_launch_phtml($file);
}

function pl_sys_tpl($template){
  platform_launch_sandbox_system_template($template);
}

function pl_sys_idx(){
  platform_launch_sandbox_system_index();
}
