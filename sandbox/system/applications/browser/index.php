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
<html lang="en" manifest="cache.manifest" class="js canvas canvastext geolocation history websockets video audio localstorage webworkers applicationcache">

<head>
    <meta charset="utf-8">
    <title>Platform Browser</title>
    <meta name="application-name" content="Platform Browser">
    <meta name="description" content="Platform Browser is web interface for the platform project.">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="assets/fonts/foundation-icons/foundation-icons.css" />
    <link rel="stylesheet" href="assets/fonts/font-awesome/css/font-awesome.css" />
    <link rel="stylesheet" href="assets/css/weather-icons.css" />
    <link rel="stylesheet" href="assets/css/style.css" />
    <link rel="" href="assets/css/jquery.jgrowl.css" />
    <link rel="manifest" href="manifest.json" />
    <meta name="theme-color">
    <!-- http://html5doctor.com/web-manifest-specification/#appname -->
    <link rel="shortcut icon" href="http://platform/sites/icons/icon_platforms.png" type="image/x-icon" />
    <link rel="apple-touch-icon" sizes="57x57" href="assets/icon/ios-icon-iphone.png" />
    <link rel="apple-touch-icon" sizes="72x72" href="assets/icon/ios-icon-ipad.png" />
    <link rel="apple-touch-icon" sizes="114x114" href="assets/icon/ios-icon-iphone@2x.png" />
    <link rel="apple-touch-icon" sizes="144x144" href="assets/icon/ios-icon-ipad@2x.png" />
    <link rel="apple-touch-icon" sizes="180x180" href="assets/icon/ios-icon-ipad@3x.png" />
    <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->

    <script type="text/javascript" src="assets/js/jquery/3.0.0/jquery.min.js"></script>
    <script src='https://code.responsivevoice.org/responsivevoice.js'></script>
    <script type="text/javascript" src="assets/js/media.js"></script>
    <script>
    $(function(){
        splash(3000);
        function splash(param) {
            var time = param;
            setTimeout(function () {
                window.location = "browser.html";
            }, time);
        }
    });
    </script>
</head>

<body>
    <div id="splash">
        <div class="splash_logo"></div>
    </div>
    <script src="assets/js/app.js"></script>
</body>
</html>
