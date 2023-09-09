<?php
/**
 * This contains all sajax specific functions
 * @version     $Id: sajax.php 40 2011-02-09 14:10:00Z biyi $
 * @package     Platform
 * @subpackage  SAJAX
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


// edit, modify and add all user-defined methods here
/*
//   Parameter:{template}   {outer_smarty_var}  {inner_smarty_var}  {indicator}
function execute($template, $smarty_var=null, $var=null, $parse=true){
  require_once FUNCTIONS_PATH . 'smarty.php';
  global $smarty;

  if ($parse){ // means - attempt to allocate variables as arrays to template
    assign($var);
  }
  $smarty->assign($smarty_var);
  $smarty->assign($smarty_var, $var);
  $smarty->assign($smarty_var, $template);
  $output = $smarty->fetch($template);
  return $output;
}

function assign($smarty_var, $parse=true){
  require_once FUNCTIONS_PATH . 'smarty.php';
  global $smarty;

  if ($parse && is_array($smarty_var)){
    foreach ($smarty_var as $k => $v){
      $smarty->assign($k, $v);
    }
  } else {
     $smarty->assign($smarty_var);
  }
}

function view($template, $smarty_var=null, $var=null){
  echo execute($template, $smarty_var, $var);
}

function register(){
  require_once LIBRARIES_PATH . 'sajax/sajax.php';
  $n = func_num_args();

  for ($i = 0; $i < $n; $i++){
    sajax_export(func_get_arg($i));
  }

}

function init($debug=false, $req='GET'){
  require_once LIBRARIES_PATH . 'sajax/sajax.php';
  $GLOBALS['sajax_request_type'] = $req;
  $GLOBALS['sajax_debug_mode'] = $debug;
  sajax_init();
  // Registering PHP functions with SAJAX
  register('view','execute','assign');
  sajax_handle_client_request();
}

init(0);
*/
