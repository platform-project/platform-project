<?php
/**
 * Loading platform sandbox system applications browser
 * @version     $Id: platform.php 40 2011-02-09 14:10:00Z biyi $
 * @package     Platform
 * @subpackage  System
 * @category    Application
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

 // initilizing platform for self-contained objects
platform_launch_initialize();
?>
<!DOCTYPE HTML>
<html lang="en" manifest="sandbox/system/applications/browser/cache.manifest" class="js canvas canvastext geolocation history websockets video audio localstorage webworkers applicationcache">
<head>
  <title>Platform Browser [platform://platform@<?php echo (strtolower(HOST)) ?>]</title>
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="default">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <?php html_add_link_css('http://'.HOST.'/sites/fonts/vendors/foundation-icons/foundation-icons.css?'.date('YmdHi')); ?>
  <?php html_add_link_css('http://'.HOST.'/sandbox/system/applications/browser/assets/css/style.css?'.date('YmdHi')); ?>
  <?php js_add_jquery_plugin_css("jgrowl"); ?>
  <link rel="shortcut icon" href="http://<?php echo HOST ?>/sites/icons/icon_platforms.png" type="image/x-icon" />
  <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->

<?php js_add_jquery(); ?>
<script src='https://code.responsivevoice.org/responsivevoice.js'></script>
<script type="text/javascript">
$(document).ready(function(){

  // UI Fixes

  // adjust page height
  $('#page').css('height', $(window).height() - 100 + "px");
  $('#page').css('overflow', "hidden");

  // adjust address bar
  $('#address-bar').css('width', $(window).width() - 200 + "px");
  urlprotocol('en://platform');
   $('#address-bar-input').keypress(function(e){
    enter_keycode = 13;
    if (e.which == enter_keycode){
      var address = $('#address-bar-input').val();
      urlprotocol(address);
    }
  });

  $('#location').click(function(){
    urlprotocol('tests://gmap');
  });

  $('#go').click(function(){
    var address = $('#address-bar-input').val();
    urlprotocol(address);
  });

  system_load('notification_network');

});
</script>
<?php

// Keybase.io
js_add('http://'.HOST.'/sandbox/system/languages/javascript/libraries/kbpgp/kbpgp-2.0.8-min.js');
 
// TODO: Geolocation Detection
// Test Link: https://maps.googleapis.com/maps/api/js?key=AlzaSyCzl78mQ2pspVcc3CHJBYVhS1mpg4pqsZs&v=3.19
js_add("https://maps.googleapis.com/maps/api/js?key=AIzaSyAo5nL84P30jpU1MCHcpF6vU-gN9IRn9WM&sensor=true"); 

?>
<script>
// Geolocation Detection Code Examples
// HTML5: JavaScript Detection
// http://www.w3schools.com/html/html5_geolocation.asp
// http://diveintohtml5.info/geolocation.html
// http://krister.fi/jquery.geolocator/
// http://www.sitepoint.com/geolocation-jquery-api-geoplugin
// http://www.geoplugin.com/webservices/javascript

// PHP: Geolocation Detection
// http://php.net/manual/en/book.geoip.php
// https://github.com/maxmind/
// https://packagist.org/packages/geoip/geoip
// https://packagist.org/packages/geoip2/geoip2
</script>

<?php js_add_jquery_plugin("jgrowl"); ?>

<script type="text/javascript">

(function($){

      $(document).ready(function(){
        responsiveVoice.speak();
        $.jGrowl("<br />You are currently running: <br /><br /><strong>Platform Browser</strong> <br /><br /><strong>Version</strong> <br />0.01<br /><br /><strong>Build</strong> <br /> rc-alpha-build-20120430",
          {
            header: 'System Notification',
            theme: 'smoke',
            lifetime: 5000,
            sticky: false
          }
        );

        /* Example Growl
        // This value can be true, false or a function to be used as a callback when the closer is clciked
        $.jGrowl.defaults.closer = function() {
          console.log("Closing everything!", this);
        };

        // A callback for logging notifications.
        $.jGrowl.defaults.log = function(e,m,o) {
          $('#logs').append("<div><strong>#" + $(e).attr('id') + "</strong> <em>" + (new Date()).getTime() + "</em>: " + m + " (" + o.theme + ")</div>")
        }

        $.jGrowl("Hello world!");
        $.jGrowl("This notification will live a little longer.", { life: 1000 });
        $.jGrowl("Sticky notification with a header", { header: 'A Header', sticky: true });
        $.jGrowl("Custom theme, and a whole bunch of callbacks...", {
          theme:  'manilla',
          speed:  'slow',
          beforeOpen: function(e,m,o) {
            console.log("I am going to be opened!", this);
          },
          open: function(e,m,o) {
            console.log("I have been opened!", this);
          },
          beforeClose: function(e,m,o) {
            console.log("I am going to be closed!", this);
          },
          close: function(e,m,o) {
            console.log("I have been closed!", this);
          }
        });

        $.jGrowl("Custom animation test...", {
          theme: 'manilla',
          speed: 'slow',
          animateOpen: {
            height: "show"
          },
          animateClose: {
            height: "hide"
          }
        });

        $.jGrowl("Looks like the iPhone.", {
          header: 'iPhone',
          theme: 'iphone'
        });


        $.jGrowl("This message will not open because we have a callback that returns false.", {
          beforeOpen: function() {
            console.log("Going to open a notification, but not really...");
          },
          open: function() {
            return false;
          }
        });

        $.jGrowl("This message will not close because we have a callback that returns false.", {
          beforeClose: function() {
            return false;
          }
        });

        $.jGrowl.defaults.closerTemplate = '<div>hide all notifications</div>';

        $('#test1').jGrowl("Testing a custom container (this one is sticky, and will also be prepended).", {
          closer: false,
          sticky: true,
          glue: 'before',
          speed: 2000,
          easing: 'easeInOutElastic',
          animateOpen: {
            height: "show",
            width: "show"
          },
          animateClose: {
            height: "hide",
            width: "show"
          }
        });

        $('#test1').jGrowl("Another custom container test.", {
          glue: 'before',
          speed: 2000,
          easing: 'easeInOutExpo',
          animateOpen: {
            height: "show",
            width: "show"
          },
          animateClose: {
            height: "hide",
            width: "show"
          }
        });

        $('#test2').jGrowl("Trying a background image.", {
          theme: 'smoke',
          closer: false
        });

        $('#test2').jGrowl("This demo notification uses images from the UI flora theme to create similar styled notifications.", {
          theme: 'flora',
          header: "Flora makes Fauna",
          closer: false
        }); */
      });
    })(jQuery);

// registering global variables
http = "http://";
https = "https://";

function urlprotocol(url){
  server = http + '<?php echo HOST ?>';
  address = $.trim(url);
  
  if (address == '') {
    address = server + "/?platform";
  }

  query_string = address.split("://");
  protocol = query_string[0];
  command = query_string[1];
  command = $.trim(command);
  switch(protocol){
    case '~':
    case 'e':
    case 'en':
    case 'platform':
      if (command.length === 0) {
        address = server + "/?platform";
      } else {
          switch(command){
            case 'platform':
               address = server + "/?platform";
               break;
            case 'applications':
            case 'framework':
            case 'help':
            case 'info':
            case 'libraries':
            case 'mirrors':
            case 'networks':
            case 'respository':
            case 'sandbox':
            case 'servers':
            case 'sites':
            case 'system':
            case 'workspace':
              address = server + "/?"+command;
              break;
          }
      }
      break;
    case 'apps':
      address = (command.length === 0)
                ? server + "/?applications"
                : server + "/sandbox/system/applications/" + command;
      break;
    case 'applications':
    case 'framework':
    case 'help':
    case 'info':
    case 'libraries':
    case 'mirrors':
    case 'networks':
    case 'respository':
    case 'sandbox':
    case 'servers':
    case 'sites':
    case 'system':
    case 'workspace':
      address = server + "/?" + protocol;
      break;

    case 'tests':
      address = server + "/sandbox/workspace/tests/" + command;
      break;

    case 'sh':
    case 'shell':
    case 'console':
      address = server + "/sandbox/system/applications/console?command=" + command;
      break;

    case 'radio':
    case 'fm':
        address = http + command + '.fm/';
        break;

    case 'pictures':
    case 'photo':
      address = server + "/sandbox/system/applications/photo/";
      break;

    case 'play':
    case 'video':
    case 'tube':
    case 'screen':
      address = server + "/sandbox/system/applications/video/";
      break;

    case 'stream':
      address = server + "/sandbox/workspace/tests/video/streaming?" + command;
      break;

    case protocol :
      address = protocols(protocol, command);
      break;

    default:
      address = server + "/?platform";
      break;
  }
  track();
  network_status();
  pageloader(address);
  console.log(address);
}

function network_status(){
  (function poll() {
     setTimeout(function() {
         $.ajax({ 
            url: '/sandbox/workspace/tests/system/load.php', 
            type: 'POST', 
            data: 'request=network',
            success: function(data) {
              $(".benchmark #network").html(data);
            }, 
            complete: poll 
        });
      }, 20000);
  })();
}

function pageloader(address){
  $('iframe').attr('src', address);
  system_load('network');
  system_load('location');
  system_load('device');
  system_load('memory');
  system_load('pageload');
}

function track(){
  user_input = $('input[name=address-bar]').val();
  $.ajax({
    url: '/sandbox/workspace/tests/system/track.php',
    type: 'POST',
    data: 'input=' + user_input,
    async: true,
    success: function(data){},
    error: function(data){
      console.log('Error occured when requesting system/track.php');
    }
  });
}

function protocols(protocol, command){
  switch(protocol){
  // generic protocols
    case 'http':
    case 'https':
      // do nothing
      break;
                        
      case 'find':
      case 'search':
          address = http + 'www.bing.com?q=' + command;
          break;
      case 'bower':
          address = http + 'bower.io/search/?q=' + command;
          break;
      case 'wiki':
          address = http + 'en.wikipedia.org/wiki/' + command;
          break;

  // other protocols

  }
  return address;
}

function system_load(stack) {
  switch(stack){
    case 'network':
<?php
$network_success = '
function(data){
      $(".benchmark #network").html(data);
}
';
js_jquery_ajax('/sandbox/workspace/tests/system/load.php', 'POST', 'request=network', null, $network_success);
?>
      break;

    case 'notification_network':
<?php
$notification_network_success = '
function(data){
      $(".system-notification").html(data);
}
';
js_jquery_ajax('/sandbox/workspace/tests/system/notification.php', 'POST', 'request=network', null, $notification_network_success);
?>
      break;

    case 'location':
<?php
$location_success = '
function(data){
      $(".benchmark #location").html(data);
}
';
js_jquery_ajax('/sandbox/workspace/tests/system/load.php', 'POST', 'request=location', null, $location_success);
?>
      break;

    case 'device':
<?php
$device_success = '
function(data){
      $(".benchmark #device").html(data);
}
';
js_jquery_ajax('/sandbox/workspace/tests/system/load.php', 'POST', 'request=device', null, $device_success);
?>
      break;

    case 'memory':
<?php
$memory_success = '
function(data){
      $(".benchmark #memory").html(data);
}
';
js_jquery_ajax('/sandbox/workspace/tests/system/load.php', 'POST', 'request=memory', null, $memory_success);
?>
      break;

    case 'pageload':
<?php
$pageload_success = '
function(data){
      $(".benchmark #pageload").html(data);
}
';
js_jquery_ajax('/sandbox/workspace/tests/system/load.php', 'POST', 'request=pageload', null, $pageload_success);
?>
      break;
  }
}
</script>

</head>
<body>
<div id="canvas">
  <div id="address">
    <span id="browse"></span> <a id="back" href="javascript: history.go(-1)"></a> <a id="forward" href="javascript: history.go(+1)"></a> <a id="refresh" href="javascript: history.go(0)"></a>  <div id="address-bar"><input id="address-bar-input" name="address-bar" value="platform://" autocomplete="on" /></div> <input id="go" name="go" type="submit" value="GO" />
  </div>
  <div class="clear"></div>
  <div id="page">
     
     <iframe id="site" name="site" src="http://<?php echo HOST ?>/sandbox/system/applications/browser/page.php"></iframe>
     <div class="system-notification"></div>
  </div>
  <a id="logo" href="http://platform.entilda.com"></a>
</div>

<div class="benchmark">
  <div id="network">
    <a href="javascript:{}" title="Internet Off" class="notification-indicator"><span class="network-no-activity"></span></a>
  </div>

  <div id="media">
    <a class="music icon" href="javascript:{}"><i class="fi-music"></i></a>
    <div class="music wrapper">
      <div id="ticker">
        <div class="album image">
          <i class="album icon fi-music" style="font-size: 48px; color: #f5f5f5; "></i>
          <div class="album artwork"></div>
        </div>
        <div class="album artist"></div>
        <div class="album track"></div>
      </div>

      <div class="controls">
        <a class="control play" href="javascript:{}"><i class="fi-play"></i></a>
        <a class="control pause" href="javascript:{}"><i class="fi-pause"></i></a>
        <a class="control stop" href="javascript:{}" onclick="responsiveVoice.speak('Stop');"><i class="fi-stop"></i></a>
        <a class="control scrolling" onclick="" href="javascript:{}" onclick="responsiveVoice.speak('Play music');"><marques>Play music</marques></a>
        <a class="control eject" href="javascript:{}"><i class="fi-eject"></i></a>
        <input type="file" id="addTrack" class="control" title="Play music" />
      </div>

      <audio controls loop name="media" src="">
        <source src="" type="audio/mp3;">
      </audio>
    </div>
  </div>

  <div id="photo">
    <a class="photo icon" href="javascript:{}" onclick="responsiveVoice.speak('View your photo gallery!');"><i class="fi-photo"></i></a>
    <div class="photo wrapper">

    </div>
  </div>

  <div id="player">
    <a class="player icon" href="javascript:{}" onclick="responsiveVoice.speak('Watch videos and play music!');"><i class="fi-play-video"></i></a>
    <div class="player wrapper">

    </div>
  </div>

  <div id="game">
    <a class="game icon" href="javascript:{}" onclick="responsiveVoice.speak('Play games!');"><i class="fa fa-gamepad"></i></a>
    <div class="game wrapper">

    </div>
  </div>

  <div id="launcher">
    <a class="launcher icon" href="javascript:{}"><i class="fa fa-rocket"></i></a>
    <div class="launcher wrapper">

    </div>
  </div>

  <div id="satellite">
    <a class="satellite icon" href="javascript:{}"><i class="fa fa-satellite"></i></a>
    <div class="satellite wrapper">

    </div>
  </div>

  <div id="weather">
    <a class="weather icon" href="javascript:{}" onclick="responsiveVoice.speak('Find out about the current weather today!');"><i class="wi wi-day-cloudy"></i></a>
    <div class="weather wrapper">

    </div>
  </div>

  <div id="info">
    <a class="info icon" href="javascript:{}" onclick="responsiveVoice.speak('Find out more information about this Platform instance!');"><i class="fi-info"></i></a>
    <div class="info wrapper">
      <div id="location" style="cursor: pointer" onclick="responsiveVoice.speak('Find out your location!');"></div>
      <div id="device"></div>
      <div id="memory"></div>
      <div id="pageload"></div>
      <div id="help" style="cursor: pointer" onclick="responsiveVoice.speak('See Documentation!');">
        <div class="help">
          <i class="fi-info fi-platform size-18"></i><span class="label">Documentation</span>
        </div>
      </div>
    </div>
  </div>
<div id="map" style="display: none"></div>
</body>
</html>
