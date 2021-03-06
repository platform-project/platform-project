<?php
/**
 * This is platform class implementation
 * @version     $Id: platform.php 40 2011-02-09 14:10:00Z biyi $
 * @package     Platform
 * @category    Class
 * @author      Biyi Akinpelu
 * @link        mailto:biyi@entilda.com
 * @copyright   Copyright (C) 2011 Entilda IT Solutions. All rights reserved.
 * @license     GNU/GPL, see LICENSE.php
 * Platform is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 * See COPYRIGHT.php for copyright notices and details.
 */
class Platform {
  /**
   * default class contructor
   * @access public
   * @param void
   * @return void
   */
  public function __construct(){
    platform();
  }

  /**
   * launch: used to attach/include a file
   * @param string $file The file to launch and load
   *
   * @return void
   */
  public function launch($file){
    platform_launch($file);
  }

  /**
   * launch: used to attach/include a php file
   * @param string $file The file to launch and load
   *
   * @return void
   */
  public function launch_php($file){
    platform_launch_php($file);
  }

  /**
   * default class destructor
   * @access public
   * @param void
   * @return void
   */
  public function __destruct(){

  }

}
