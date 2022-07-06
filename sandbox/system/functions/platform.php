<?php
/**
 * This contains all platform specific functions
 * @version     $Id: platform.php 40 2011-02-09 14:10:00Z biyi $
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

/**
 * platform: This is a pseudo constructor
 * @param void
 *
 * @return void
 */
function platform(){
  global $paths;
  
  platform_launch_initialize();
  platform_launch_debug(false);
  if (!IS_CLI) platform_launch_dispatch($_SERVER['QUERY_STRING']);
  //debug_complete_stack($paths);
}

/**
 * platform_launch: used to attach/include a file
 * @param string $file The file to launch and load
 *
 * @return void
 */
function platform_launch($file){
  require_once "{$file}";
}

/**
 * platform_launch_php: used to attach/include a php file
 * @param string $file The php file to launch and load
 *
 * @return void
 */
function platform_launch_php($file){
  platform_launch("{$file}.php");
}

/**
 * platform_launch_phtml: used to attach/include a phtml file
 * @param string $file The phtml file to launch and load
 *
 * @return void
 */
function platform_launch_phtml($file){
  platform_launch("{$file}.phtml");
}

/**
 * platform_launch_application: used to execute system shell application
 * @param string $file The phtml file to launch and load
 *
 * @return mixed An array of standard output of system shell application
 */
function platform_launch_application($command){
  exec($command, $output, $return_value);
  // TODO:
  //   debug output from failed commands using $return_value
  return $output;
}

/**
 * platform_launch_autoload: used to dynamically load attached files
 * @param string $file The file object to launch and load
 *
 * @return void
 */
function platform_launch_autoload($file)
{
  global $paths;
  foreach ($paths as $instance => $path)
  {
    $filename = $path . DS . $file;
    if (file_exists($filename))
    {
      if (!stristr($instance, 'templates')){
        platform_launch_php($filename);
      }
      break;
    }
  }
}

/**
 * platform_launch_initialize: used to initialize bootstrapping process
 * @param void
 *
 * @return void
 */
function platform_launch_initialize(){
  global $paths;
  foreach ($paths as $instance => &$path) {
    $contents = platform_launch_list_php($path);
    if (is_dir($path)) { 
      if (!empty($contents)){
        foreach ($contents as $file) {
          $full_filename = $path . DS . $file;
          if (STDLIB == APP_ENGINE){ 
            $allowed = !stristr($instance, 'classes') && !stristr($instance, 'templates');
          } else {
            $allowed = !stristr($instance, 'templates');
          }

          if ($allowed){
            platform_launch($full_filename);
          }
        }
      }
    } else {
      continue;
    }
  }
  
  if (isset($_REQUEST['editor']) && $_REQUEST['editor'] == 'on') {
    $path = PLATFORM_SANDBOX_SYSTEM_APPLICATIONS_PATH . DS . 'editor' . DS ;
    platform_launch_php($path . 'index.php');
  }
}

/**
 * platform_launch_browser: used to launch system application browser
 * @param void
 *
 * @return void
 */
function platform_launch_browser(){
  $path = PLATFORM_SANDBOX_SYSTEM_APPLICATIONS_PATH . DS . 'browser' . DS ;
  $filename = $path . 'index.php';
  platform_launch($filename);
}

/**
 * platform_launch_dispatch: used to dispatch system requests
 * @param void
 *
 * @return void
 */
function platform_launch_dispatch($request=null){
  switch($request){
    case 'platform':
      platform_launch_sandbox_system_index();
      break;
    case 'security':
      platform_launch_ip_authorization_checks();
      break;
    case 'browser':
    default:
      if (empty($request) || is_null($request)){
        platform_launch_browser();
      } else {
        platform_launch_sandbox_system_index();
        //benchmark_view();
      }
      break;
  }
}

/**
 * platform_launch_path_to: used to dispatch system object listings
 * @param string $request The request path to load
 *
 * @return void
 */
function platform_launch_path_to($request){
  $exclude_hidden = array('.AppleDouble', '.config', '.svn', '.git', '.chromium',
                          '.dude', '.icons', '.fonts', '.mac4lin', '.prebuilds',
                          '.torrents', '.trash');
  switch($request){
    case 'platform':
    default:
      $exclusions = array('services', 'laboratory', 'projects',
                          'README', 'TODO');
      $exclusions = array_merge($exclusions, $exclude_hidden);
      // TODO: dynamically load all listings, no hard-fixing listings
      // $path = PLATFORM_BASE_PATH . DS;
      // $pages = platform_launch_list_path($path, true, $exclusions);
      $pages = array('sandbox', 'servers', 'networks', 'sites',
                     'mirrors', 'help', 'info');
      platform_launch_listview_lists_exact($pages);
      break;
    case 'sandbox':
      $exclusions = array('README', 'TODO');
      $exclusions = array_merge($exclusions, $exclude_hidden);
      $path = PLATFORM_BASE_PATH . DS;
      platform_launch_listview_lists($path . $request, $exclusions);
      $pages = array(
                     'README' => $path . 'README',
                     'TODO' => $path . 'TODO',
                     );
      platform_launch_listview_lists_raw($pages);
      break;
    case 'servers':
      $exclusions = array();
      $exclusions = array_merge($exclusions, $exclude_hidden);
      $path = PLATFORM_BASE_PATH . DS;
      platform_launch_listicon_lists($path . $request, $exclusions);
      break;
    case 'sites':
      $exclusions = array('fonts', 'icons', 'images', 'logs', 'tmp');
      $exclusions = array_merge($exclusions, $exclude_hidden);
      $path = PLATFORM_BASE_PATH . DS;
      platform_launch_listicon_lists($path . $request, $exclusions);
      break;
    case 'networks':
      $exclusions = array();
      $exclusions = array_merge($exclusions, $exclude_hidden);
      $path = PLATFORM_BASE_PATH . DS;
      platform_launch_listview_lists($path . $request, $exclusions);
      network_create_nodes();
      break;
    case 'wireless':
      $exclusions = array();
      $exclusions = array_merge($exclusions, $exclude_hidden);
      $path = PLATFORM_NETWORKS_PATH . DS;
      platform_launch_listicon_lists($path . $request, $exclusions);
      break;
    case 'lan':
      $exclusions = array();
      $exclusions = array_merge($exclusions, $exclude_hidden);
      $path = PLATFORM_NETWORKS_PATH . DS;
      platform_launch_listicon_lists($path . $request, $exclusions);
      break;
    case 'social':
      $exclusions = array();
      $exclusions = array_merge($exclusions, $exclude_hidden);
      $path = PLATFORM_BASE_PATH . DS;
      platform_launch_listview_lists($path . $request, $exclusions);
      // rewrite output
      $pages = array('Yammer' => '/networks/social/yammer/');
      platform_launch_listview_lists_raw($pages);
      break;
    case 'help':
      $exclusions = array('wiki', 'manuals', 'documentations');
      $exclusions = array_merge($exclusions, $exclude_hidden);
      $path = PLATFORM_BASE_PATH . DS;
      platform_launch_listview_lists($path . $request, $exclusions);
      // rewrite output
      $pages = array('Wiki' => '/help/wiki/');
      platform_launch_listview_lists_raw($pages);
      break;
    case 'bugs':
      $exclusions = array();
      $exclusions = array_merge($exclusions, $exclude_hidden);
      $path = PLATFORM_BASE_PATH . DS;
      platform_launch_listview_lists($path . $request, $exclusions);
      // rewrite output
      $pages = array('JIRA' => '/help/bugs/jira/');
      platform_launch_listview_lists_raw($pages);
      break;
    case 'framework':
      $exclusions = array();
      $exclusions = array_merge($exclusions, $exclude_hidden);
      $path = PLATFORM_BASE_PATH . DS;
      platform_launch_listview_lists($path . $request, $exclusions);
      // rewrite output
      $pages = array(/*'Cake PHP'       => '/sandbox/framework/cakephp/',
                     'Code Igniter'   => '/sandbox/framework/codeigniter/',
                     'Django'         => '/sandbox/framework/django/',
                     'Drupal'         => '/sandbox/framework/drupal/',
                     'Laravel'        => '/sandbox/framework/laravel/',*/
                     'Phalcon'    => '/sandbox/framework/phalcon/',
                     /*'Ruby On Rails'  => '/sandbox/framework/rails/',
                     'Symfony'        => '/sandbox/framework/symfony/',
                     'Yii'            => '/sandbox/framework/yii/',*/
                     'Zend' => '/sandbox/framework/zf/');
      platform_launch_listview_lists_raw($pages);
      break;
    case 'library':
      $exclusions = array();
      $exclusions = array_merge($exclusions, $exclude_hidden);
      $path = PLATFORM_SANDBOX_PATH . DS;
      platform_launch_listview_lists($path . $request, $exclusions);
      break;
    case 'repository':
      $exclusions = array();
      $exclusions = array_merge($exclusions, $exclude_hidden);
      $path = PLATFORM_SANDBOX_PATH . DS;
      platform_launch_listview_lists($path . $request, $exclusions);
      // rewrite output
      $pages = array(
                     'README' => '/sandbox/repository/README',
                     'TODO' => '/sandbox/repository/TODO',
                     );
      platform_launch_listview_lists_raw($pages);
      break;
    case 'system':
      $exclusions = array('caches', 'classes', 'components', 'contributions', 'configurations', 'crons',
                          'daemons', 'databases', 'executables', 'extensions', 'functions', 
                          'hooks', 'languages', 'logs', 'migrations', 'schemas', 'services',
                          'structs', 'tests', 'templates', 'ui', 'vendors');
      $exclusions = array_merge($exclusions, $exclude_hidden);
      $path = PLATFORM_SANDBOX_PATH . DS;
      platform_launch_listview_lists($path . $request, $exclusions);
      break;
    case 'applications':
      $exclusions = array('browser', 'gnump3d', 'ktorrent','nagios',
                          'quicknote', 'sugarcrm', 'webmin');
      $exclusions = array_merge($exclusions, $exclude_hidden);
      platform_launch_listview_lists_applications($exclusions);
      break;
    case 'workspace':
      $exclusions = array('in-basket');
      $exclusions = array_merge($exclusions, $exclude_hidden);
      $path = PLATFORM_SANDBOX_PATH . DS;
      platform_launch_listview_lists($path . $request, $exclusions);
      // rewrite output
      $pages = array('README' => '/sandbox/workspace/README',
                     'TODO' => '/sandbox/workspace/TODO',
                     );
      platform_launch_listview_lists_raw($pages);
      break;
    case 'mirrors':
      $exclusions = array('b', 'f', 'hts-cache');
      $exclusions = array_merge($exclusions, $exclude_hidden);
      $path = PLATFORM_BASE_PATH . DS;
      platform_launch_listicon_lists($path . $request, $exclusions);
      break;
    case 'platforms':
      $pages = array('android');
      $exclusions = array_merge($exclusions, $exclude_hidden);
      platform_launch_listview_lists($pages);
      break;
  }

}

/**
 * platform_launch_back_paths: used to determine back paths relative
 * to system base path
 * @param void
 *
 * @return string $back_path The output of number of relative back paths
 */
function platform_launch_back_paths(){
  $base_path_array = explode('/', APPLICATION_BASE_PATH);
  $current_path_array = explode('/', getcwd());
  $back_count = count($base_path_array) - count($current_path_array);
  for($i=0; $i < abs($back_count); $i++){
    $back_path .= PDS . DS;
  }
  return $back_path;
}

/**
 * platform_launch_update_index: used to update system index
 * @param void
 *
 * @return Mixed The standard output of the result
 */
function platform_launch_update_index(){
  return platform_launch_application('updatedb');
}

/**
 * platform_launch_list_php: used to list all php files contained within $path
 * @param string $path  The path to get all php file lists
 *
 * @return Mixed $contents Array containing the list of php files within $path
 */
function platform_launch_list_php($path){
  platform_launch_php(PLATFORM_SANDBOX_SYSTEM_FUNCTIONS_PATH . DS . 'filesystem');
  $contents = list_files($path, 'php');
  return $contents;
}

/**
 * platform_launch_list_path: used to list all files contained within $path
 * @param string $path  The path to get all file lists
 * @param boolean $dir Determines whether to include a directory listings
 * @param array $exclusion A collection of paths to exclude from listings
 *
 * @return Mixed $contents Array containing the list of files within $path
 */
function platform_launch_list_path($path, $dir=false, $exclusion=null){
  platform_launch_php(PLATFORM_SANDBOX_SYSTEM_FUNCTIONS_PATH . DS . 'filesystem');
  $lists = array();
  $contents = read_path($path);
  if (!is_null($contents) && is_array($contents)){
    foreach($contents as $content){
      if (stristr($content, '.php') || stristr($content, '.txt') || stristr($content, '.css')
          || stristr($content, '.html')){

      } else {
        if ($dir && is_dir($path . DS . $content)){
          $lists[] = $content;
        }
      }
    }
  }
  return $lists;
}

/**
 * platform_launch_default_icon: used to display the default icon
 * (for templating only)
 * @param string $page  The page to load default icon
 *
 * @return void
 */
function platform_launch_default_icon($page=null){
  //e($page);
  switch($page)
  {
    case 'bugs':
    case 'networks':
    case 'wireless':
    case 'lan':
    case 'social':
    case 'sandbox':
    case 'servers':
    case 'sites':
    case 'mirrors':
    case 'system':
    case 'applications':
    case 'framework':
    case 'libraries':
    case 'platforms':

    ?>
    <div class="default_<?php e($page) ?>_icon"> </div>
    <?php
      break;
    default:
    ?>
    <div class="default_icon"> </div>
    <?php
      break;
  }
}

/**
 * platform_launch_listview_lists_exact: used to list files in
 * exact order as indicate with $pages
 * @param array $pages  The pages to display in an exact order
 *
 * @return void
 */
function platform_launch_listview_lists_exact($pages=null){
  $request = $_SERVER['QUERY_STRING'];
  $pages = (!is_array($pages)) ? platform_launch_list_path(PLATFORM_BASE_PATH . DS . $request, true) : $pages;
?>
  <ul>
  <?php
  if (!is_null($pages) && is_array($pages)):
    foreach($pages as $page):
      if (stristr('readme', $page)):
          $url = platform_launch_load_raw_object($page);
      else:
          $url = HTTP_URI.$_SERVER['SERVER_NAME']."/?".$page;
      endif;
    ?>
      <li><a class="listview_link" href="<?php e($url) ?>"><span class="listview_<?php e($page) ?>"> </span><?php e(ucfirst($page)) ?></a></li>
    <?php
    endforeach;
  endif;
  ?>
  </ul>
 <?php
}

/**
 * platform_launch_listview_lists: used to list files in
 * exact order as indicate with $pages
 * @param string $path  The path to load listings
 * @param array $exclusion A collection of paths to exclude from listings
 *
 * @return void
 */
function platform_launch_listview_lists($path, $exclusion=null){
  $pages = platform_launch_list_path($path, true);
  $pages = exclude($pages, $exclusion);
?>
  <ul>
  <?php
  if (!is_null($pages) && is_array($pages)):
    foreach($pages as $page):
      if (stristr('readme', $page)):
          $url = platform_launch_load_raw_object($page);
      else:
          $url = HTTP_URI.$_SERVER['SERVER_NAME']."/?".$page;
      endif;
    ?>
      <li><a class="listview_link" href="<?php e($url) ?>"><span class="listview_<?php e($page) ?>"> </span><?php e(ucfirst($page)) ?></a></li>
    <?php
    endforeach;
  endif;
  ?>
  </ul>
 <?php
}

/**
 * platform_launch_listview_lists_raw: used to list files in raw format.
 * Output is executed as is in raw output format (not ideal for php files)
 * @param array $pages  The path to load listings
 *
 * @return void
 */
function platform_launch_listview_lists_raw($pages=null){
  $request = $_SERVER['QUERY_STRING'];
  $pages = (!is_array($pages)) ? platform_launch_list_path(PLATFORM_BASE_PATH . DS . $request, true) : $pages;
?>
  <ul>
  <?php
  if (!is_null($pages) && is_array($pages)):
    foreach($pages as $page => $link):
        if (!is_numeric($page)){
          $url = platform_launch_load_raw_object($link);
        } else {
          $url = null;
        }
    ?>
      <li><a class="listview_link" href="<?php e($url) ?>"><span class="listview_<?php e($page) ?>"> </span><?php e($page) ?></a></li>
    <?php
    endforeach;
  endif;
  ?>
  </ul>
 <?php
}

/**
 * platform_launch_listview_lists_applications: used to list applications.
 * Output is executed in php output format
 * @param array $exclusion A collection of paths to exclude from listings
 *
 * @return void
 */
function platform_launch_listview_lists_applications($exclusions=null){
  $request = $_SERVER['QUERY_STRING'];
  $pages = platform_launch_list_path(PLATFORM_SANDBOX_SYSTEM_PATH . DS . $request, true);
  $pages = exclude($pages, $exclusions);
?>
  <ul>
  <?php
  if (!is_null($pages) && is_array($pages)):
    foreach($pages as $page):
        if (stristr('readme', $page) || stristr('todo', $page)):
          $url = platform_launch_load_raw_object($page);
        else:
          $url = PLATFORM_SANDBOX_SYSTEM_URI . DS . $request . DS . $page;
        endif;
    ?>
      <li><a class="listview_link" href="<?php e($url) ?>"><span class="listview_applications"> </span><?php e($page) ?></a></li>
    <?php
    endforeach;
  endif;
  ?>
  </ul>
 <?php
}

/**
 * platform_launch_listview_lists_executables: used to list executables.
 * Output is executed in php output format
 * @param array $exclusion A collection of paths to exclude from listings
 *
 * @return void
 */
function platform_launch_listview_lists_executables($exclusions=null){
  $request = $_SERVER['QUERY_STRING'];
  $pages = platform_launch_list_path(PLATFORM_SANDBOX_SYSTEM_PATH . DS . $request, true);
  $pages = exclude($pages, $exclusions);
?>
  <ul>
  <?php
  if (!is_null($pages) && is_array($pages)):
    foreach($pages as $page):
        if (stristr('readme', $page) || stristr('todo', $page)):
          $url = platform_launch_load_raw_object($page);
        else:
          $url = PLATFORM_SANDBOX_SYSTEM_URI . DS . $request . DS . $page;
        endif;
    ?>
      <li><a class="listview_link" href="<?php e($url) ?>"><span class="listview_executables"> </span><?php e($page) ?></a></li>
    <?php
    endforeach;
  endif;
  ?>
  </ul>
 <?php
}

/**
 * platform_launch_load_raw_object: converts file to URI format.
 * Output is executed in php output format
 * @param string $file The file to convert to URL
 *
 * @return string $file The converted URI format of $file
 */
function platform_launch_load_raw_object($file){
  $file = HTTP_URI.$_SERVER['SERVER_NAME']."$file";
  return $file;
}

/**
 * platform_launch_listicon_lists: Display HTML output for listings
 * @param string $path The path to list
 * @param string $exclusion A collection of paths to exclude from listings
 *
 * @return void
 */
function platform_launch_listicon_lists($path, $exclusion=null){
  $request = $_SERVER['QUERY_STRING'];
  $pages = platform_launch_list_path($path, true);
  $pages = exclude($pages, $exclusion);
?>
  <ul>
  <?php
  if (!is_null($pages) && is_array($pages)):
    foreach($pages as $page):
    ?>
      <li><a class="listicon_link" href="http://<?php e($_SERVER['SERVER_NAME']) ?>/<?php e($request) ?>/<?php e(strtolower($page)) ?>"><span class="listicon_<?php e($request) ?>_icon"> </span><?php e(strtolower($page)) ?></a></li>
    <?php
    endforeach;
  endif;
  ?>
  </ul>
 <?php
}

/**
 * platform_launch_debug: used to load the system debugger
 * @param string $status The path to list
 *
 * @return void
 */
function platform_launch_debug($status=0){
  platform_launch_php('debug');
  debug_php($status);
}

/**
 * platform_launch_log: used to create system logs to file
 * @param string $log The log
 * @param string $type The type of log to create
 *
 * @return void
 */
function platform_launch_log($log, $type='system'){
  sys_log($log, $type);
}

/**
 * platform_launch_redirect: used to redirect request to specific URL
 * @param string $url The URL to redirect to
 *
 * @return void
 */
function platform_launch_redirect($url){
  header('location:' . $url);
}

/**
 * platform_launch_ip_authorization_checks: used for IP authorizations
 * @param void
 *
 * @return void
 */
function platform_launch_ip_authorization_checks(){
  platform_launch_php('global');
  $ip = network_get_real_ip();
  $browser = detect_browser();

  switch($ip){
    // allowed ip addresses

    // from localhost
    case '127.0.0.1':
    case '127.0.1.1':

    // from starbright
    //case '10.10.50.121':
    case '10.10.50.192':
    case '10.10.50.193':

    // from ehonet
    case '192.168.43.1':
    case '192.168.43.2':
    case '192.168.43.42':
    case '192.168.43.65':
    case '192.168.43.174':

    // from ehonet-wifi
    case '10.10.2.200':
    case '10.10.2.210':
    case '10.10.2.220':
    case '10.10.2.222';
    case '10.10.2.225':
    case '10.10.2.230':
    case '10.10.2.240':
      //redirect_to('http://'.$_SERVER['HTTP_HOST'].'/platform/');
      break;
    default:
      redirect_to('http://www.entilda.com?api='.base64_encode(base64_encode(base64_encode(time()))).
                  '&encdata=true&tracking=enabled&cryptocheck='.base64_encode(base64_encode(base64_encode($ip))).'&detected='.$ip.'&client='.$browser);
      break;
  }
}

/**
 * platform_launch_sandbox_system_template: used to load HTML template
 * @param string $template The HTML template file to load
 *
 * @return void
 */
function platform_launch_sandbox_system_template($template){
  platform_launch_phtml(PLATFORM_SANDBOX_SYSTEM_TEMPLATES_PATH . DS . $template);
}

/**
 * platform_launch_sandbox_system_index: load the HTML page layout
 * @param void
 *
 * @return void
 */
function platform_launch_sandbox_system_index(){
  // loading sandbox system templates
  platform_launch_sandbox_system_template('header');
  platform_launch_sandbox_system_template('layout');
  platform_launch_sandbox_system_template('footer');
}
