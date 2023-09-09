<?php
/**
 * This contains all javascript adapted functions
 * @version     $Id: javascript.php 40 2011-02-09 14:10:00Z biyi $
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


/** JavaScript Helper functions **/
function js_start($src=null, $type='text/javascript', $language='javascript'){
  if (!is_null($src)){
    $src_string = ' src="'.$src.'"';
  } else {
    $src_string = $src;
  }
  e('<script language="'.$language.'" type="'.$type.'"'.$src_string.'>');
}

function js_end(){
  e("</script>\n");
}

function js_funct($function_name){
  e("$function_name();");
}


function js_alert($message){
  js_start();
  e("alert('".$message."');");
  js_end();
}

function js_add($src=null){
  js_start($src);
  js_end();
}

function js_add_jquery($version="-1.4.2.min"){
  $cached = date("YmdHis");
  $local_src = "http://".HOST."/sandbox/system/languages/javascript/frameworks/jquery/src/jquery$version.js?$cached";
  $default_src = 'https://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js';
  js_start($local_src);
  js_end();
}

function js_add_jquery_ui($version="-1.8.11.custom.min"){
  $cached = date("YmdHis");
  $local_src = "http://".HOST."/sandbox/system/languages/javascript/frameworks/jquery/ui/jquery-ui$version.js?$cached";
  $default_src = '';
  js_start($local_src);
  js_end();
}

function js_add_jquery_plugin($plugin, $version=""){
  $cached = date("YmdHis");
  $local_src = "http://".HOST."/sandbox/system/languages/javascript/frameworks/jquery/plugins/$plugin/jquery.$plugin.js?$cached";
  js_start($local_src);
  js_end();
}

function js_add_jquery_plugin_css($plugin, $version=""){
  $cached = date("YmdHis");
  $local_css = "http://".HOST."/sandbox/system/languages/javascript/frameworks/jquery/plugins/$plugin/jquery.$plugin.css?$cached";
  html_add_link_css($local_css);
}

function js_post($url, $data){
  js_start();
    js_jquery_ajax($url, 'POST', http_build_query($data),
             'document.body', 'function(data){ $("#result").html(data)}');
  js_end();
}


function js_jquery_ajax($url, $type, $data, $context, $success, $async='false'){
  /*
   * Sample code
   *
   *
  $.ajax({
    url: 'test.html',
    type: 'POST',
    data: 'name=john&surname=doe',
    context: document.body,
    success: function(data){
      $('.result').html(data);
      $(this).addClass("done");
    }
  });
  */
?>
$.ajax({
  url: '<?php _e($url)?>',
  type: '<?php _e($type)?>',
  data: '<?php _e($data)?>',
  /*context: <?php _e($context)?>,*/
  success: <?php _e($success)?>,
  async: <?php _e($async)?>,
});
<?php
}

function js_accordion(){
  // An accordion that opens on pane at a time but also allows you to close a pane.
  $code_accordion = "

$('#accordion .content').hide();
$('#accordion .title').unbind();
$('#accordion .title').click(function() {
$('#accordion .content').slideUp();

if($(this).hasClass('active')) {
$(this).removeClass('active');
return;
}
$(this).addClass('active');
$(this).next().slideDown();
return false;
});

";

  e($code_accordion);
}
