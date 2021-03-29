<?php
/**
 * This contains all notification specific functions
 * @version     $Id: network.php 40 2011-02-09 14:10:00Z biyi $
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

function notification(){
  notification_growl();
}

function notification_growl(){
  js_add_jquery_plugin_css("jgrowl");
  js_add_jquery_plugin("jgrowl");
}

function notification_slider($title, $message, $element='window', $event='load'){
  notification_slider_css(); 
  notification_slider_js($element, $event); 
  notification_slider_html($title, $message); 
}

function notification_set($message){

}

function notification_slider_css(){
?>
<style>
/***********************************************/
/***    Notification Slider                  ***/
/***********************************************/
@import url(https://fonts.googleapis.com/css?family=Ubuntu);
@import url(https://fonts.googleapis.com/css?family=Architects+Daughter);
body { 
  font-family: 'Ubuntu', 'Architects Daughter', 'Helvetica Neue', Helvetica, Arial, serif, sans-serif;
}

#notification {
  min-height: 120px;
  width: 350px;
  position: fixed;
  right: -9999px
  right: -3000px;
  z-index: 200;
  bottom: 70px;
  color: #333;
  -moz-border-radius: 5px 5px 5px 5px;  
  -webkit-border-radius: 5px 5px 5px 5px;  
  border-radius: 5px 5px 5px 5px;
  moz-box-shadow: 1px 3px 10px #333;
  -webkit-box-shadow: 1px 3px 10px #333;
  box-shadow: 1px 3px 10px #333;
}

#notification h4 {
  padding: 0;
  margin: 0 0 5px;
}

#notification .slider_title {
  font-size: 12px;
  font-weight: bold;
  color: #FFF;
  background-color: #333;
  padding: 5px;
  -moz-border-radius: 5px 5px 0px 0px;  
  -webkit-border-radius: 5px 5px 0px 0px;  
  border-radius: 5px 5px 0px 0px;
}

#notification .slider_title_small {
  font-size: 12px;
  font-weight: normal;
  color: #333;
  padding: 5px;
  height: 70px
}

#notification .slider_title_small p{
  margin: 0px;
}

#notification .slider_title_small .popup-ad-details {
  font-weight: none;
  font-size: 12px;
  color:#333;
}

#notification .slider_title_small a {
  color: #09f !important;
  text-decoration: none !important;
  display: block;
  text-overflow: ellipsis;
  width: 60%;
  white-space: nowrap;
  overflow: hidden;
}

#notification .slider_title_small a:hover {
  color: #e18728 !important;
  text-decoration: none !important;
}

#notification .right {
  float: right;
}

#notification .slider_logo {
  float: left;
  padding: 6px 20px;
  width: 60px;
  height: 60px;
}

#notification .slider_content {
  padding-top: 5px;
  background-color: #F0F0F0;
  -moz-border-radius: 0px 0px 5px 5px;  
  -webkit-border-radius: 0px 0px 5px 5px;  
  border-radius: 0px 0px 5px 5px;
}

#notification .slider_footer {
  height: 30px;
  padding: 1px 15px 1px 15px;
  border-bottom: 5px solid #333;
  -moz-border-radius: 0px 0px 5px 5px;  
  -webkit-border-radius: 0px 0px 5px 5px;  
  border-radius: 0px 0px 5px 5px;
}

#notification .slider_footer .cancel {
  float: left;
  height: 25px;
  line-height: 23px;
  width: 120px;
  text-align: center;
  margin-bottom: 10px;
  background-color: #cc0000;
  -moz-border-radius: 5px 5px 5px 5px;  
  -webkit-border-radius: 5px 5px 5px 5px;  
  border-radius: 5px 5px 5px 5px;
}

#notification .slider_footer .continue {
  float: right;
  height: 25px;
  line-height: 23px;
  width: 120px;
  text-align: center;
  margin-bottom: 10px;
  background-color: #333;
  -moz-border-radius: 5px 5px 5px 5px;  
  -webkit-border-radius: 5px 5px 5px 5px;  
  border-radius: 5px 5px 5px 5px;
}

#notification .slider_footer a {
  color: #FFFFFF;
  text-decoration: none !important;
  font-size: 12px;
  font-weight: bold;
}

#notification .slider_footer a:hover {
  text-decoration: none;
}

.color-online {
  color: #28990c;
}

.color-offline {
  color: #cf3636;
}

.color-no-activity {
  color: #ccc;
}
</style>
<?php
}

function notification_slider_js($element='window', $event='load'){
?>
<script type="text/javascript">
var sliderVisible = false;
var hidden = false;

$(function () {
  $("div#notification").css('right', '-900px');
  $(<?php echo $element ?>).<?php echo $event ?>(function () {
    if (window.location.href.indexOf("slider") > -1){
      sliderVisible = true;
    }
    if (sliderVisible == false) {
        notification_action();
    }
  });
});

function notification_action() {
  $("div#notification").show();
  $("div#notification").animate({
      right: 45
  }, 400);
  sliderVisible = true;
}

function hide_notification_action() {
  $("div#notification").animate({
      right: -3e3
  }, 400);
}
</script>
<?php
}

function notification_slider_html($title, $message, $title_link='#', $buttons=array()){
?>
<div id="notification" style="right: -9999px">
  <div class="slider_title">
    <span>&nbsp;&nbsp;&nbsp;System Notification</span>
    <span class="right" style="cursor: pointer" onclick="hide_notification_action()"><img src="<?php echo HTTP_URI . HOST ?>/sites/icons/delete.png" border="0" alt="Close" /></span>
  </div>

  <div class="slider_content">
    <div class="slider_body">

      <img id="slide_image" class="slider_logo"src="<?php echo HTTP_URI . HOST ?>/sites/icons/application-128x128.png" alt="">

      <div class="slider_title_small">
          <h4><a href="<?php echo $title_link ?>" target="_blank" class="color-offline"><?php echo $title ?></a></h4>
          <p>
            <span class="notification-body"><?php echo $message ?></span>
          </p>
      </div>
    </div>
    <div class="slider_footer">
      <?php 
      if (in_array('cancel', $buttons)){?>
      	<div class="cancel">
          <a href="#cancel-link" target="_blank">Cancel</a>
      	</div>
      <?php
      }
      
      if (in_array('continue', $buttons)){?>
		<div class="continue">
          <a href="#continue-link" target="_blank">Continue</a>
      	</div>
      <?php
      }
      ?>
      
    </div>
  </div>

</div>
<?php
}