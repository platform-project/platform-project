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
   * __construct: This is a constructor
   * @param void
   *
   * @return void
   */
  public function __construct(){
    //$this->launch_start_profiler();
    $this->launch_initialize();
    $this->launch_debug(true);
    //if (!IS_CLI) $this->launch_dispatch($_SERVER['QUERY_STRING']);
    //$this->launch_stop_profiler($xhprof_data);
  }

/**
 * launch: used to attach/include a file
 * @param string $file The file to launch and load
 *
 * @return void
 */
  public function launch($file){
    require_once "{$file}";
  }

/**
 * launch_php: used to attach/include a php file
 * @param string $file The php file to launch and load
 *
 * @return void
 */
  public function launch_php($file){
    $this->launch("{$file}.php");
  }

/**
 * launch_phtml: used to attach/include a phtml file
 * @param string $file The phtml file to launch and load
 *
 * @return void
 */
function launch_phtml($file){
  $this->launch("{$file}.phtml");
}

/**
 * launch_initialize: used to initialize bootstrapping process
 * @param void
 *
 * @return void
 */
function launch_initialize(){
  global $paths;
  foreach ($paths as $instance => $path)
  {
    $contents = $this->launch_list_php($path);
    if (is_dir($path))
    {
      if (!stristr($instance, 'templates')){ // excluding templates
        if (!empty($contents)){
          foreach ($contents as $file) {
            $full_filename = $path . DS . $file;
            $this->launch($full_filename);
          }
        }
      }
    } else {
      break;
    }
  }
}

/**
 * launch_list_php: used to list all php files contained within $path
 * @param string $path  The path to get all php file lists
 *
 * @return Mixed $contents Array containing the list of php files within $path
 */
function launch_list_php($path){
  $this->launch_php(PLATFORM_SANDBOX_SYSTEM_FUNCTIONS_PATH . DS . 'filesystem');
  $contents = list_files($path, 'php');
  return $contents;
}

/**
 * launch_dispatch: used to dispatch system requests
 * @param void
 *
 * @return void
 */
function launch_dispatch($request=null){
  switch($request){
    case 'platform':
      $this->launch_sandbox_system_index();
      break;
    case 'security':
      $this->launch_ip_authorization_checks();
      break;
    case 'browser':
    default:
      if (empty($request) || is_null($request)){
        $this->launch_browser();
      } else {
        $this->launch_sandbox_system_index();
        //benchmark_view();
      }
      break;
  }
}

/**
 * platform_launch_start_profiler: used to start system profiler
 * @param void
 *
 * @return void
 */
function launch_start_profiler(){
  xhprof_enable(XHPROF_FLAGS_CPU + XHPROF_FLAGS_MEMORY);
}

/**
 * platform_launch_stop_profiler: used to stop system profiler
 * @param Mixed $xhprof_data Data generated from profiling the system
 *
 * @return void
 */
function launch_stop_profiler(&$xhprof_data){
  $xhprof_data = xhprof_disable();
}

/**
 * platform_launch_debug: used to load the system debugger
 * @param string $status The path to list
 *
 * @return void
 */
function launch_debug($status=0){
  $this->launch_php('debug');
  switch($status){
    case 1:
      error_reporting(E_ALL | E_STRICT);
      ini_set("display", $status);
      break;
    case 0:  
    default:
      error_reporting($status);
      break;
  }
}

  /**
   * __construct: This is a destructor
   * @param void
   *
   * @return void
   */
  public function __destruct(){

  }

}
