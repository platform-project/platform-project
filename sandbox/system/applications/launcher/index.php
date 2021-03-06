<?php
/**
 * Platform Launcher
 * The Plaform Launcher app
 *
 * @version     $Id: index.php 40 2011-02-09 14:10:00Z biyi $
 * @package     Platform
 * @category    Application
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

// initilizing platform for self-contained objects
platform_launch_initialize();
?>
<!DOCTYPE html>
<html lang="en" data-ember-extension="1" data-cast-api-enabled="true">

<head>

    <title dir="ltr">Platform Launcher</title>

    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
    <meta name="description" content="Platform Launcher is a simple application.">
    <meta name="author" content="The Platform Authors">
    <meta name="application-name" content="Platform Launcher">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <meta name="csrf-param" content="authenticity_token">
    <meta name="csrf-token" content="8NNe3+xKvZax94JjHCMMwdCvEEQdZQ3OCzLzYkuj7c8xytzbgXHSHDXHvUdPljbNDGd0RlXRW21wb/m9twdpaA==">
    <meta name="pinterest" content="nopin">
    <meta name="referrer" content="origin">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- OG data should be in English, or we need to pass the supported locales in an array in og:locale:alternate -->
    <meta property="og:description" content="0.0 MB of files sent via Launcher">
    <meta property="og:title" content="Launcher.ipa" />
    <meta property="og:image" content="assets/images/icons/launcher-512x512.png" />
    <meta property="og:type" content="website">
    <meta property="fb:app_id" content="000000000000000">

    <link rel="icon" sizes="16x16 32x32" href="assets/images/favicon.png" />
    <link rel="mask-icon" href="assets/images/favicon.svg" color="#17181A" />
    <link rel="shortcut icon" href="assets/images/favicon.png" type="image/png" />
    <link rel="stylesheet" href="assets/css/foundation.min.css" type="text/css" />
    <link rel="stylesheet" href="assets/css/foundation-icons.css" type="text/css" />
    <link rel="stylesheet" href="assets/css/app.css" media="all" type="text/css" onerror="assetFailed(this)" />

</head>

<body onload="init();">
    <div id="viewport" class="space">

        <svg class="momentum" xmlns="http://www.w3.org/2000/svg">
            <defs>
                <symbol id="icon-folder" viewBox="0 0 512 512">
                    <path d="M390.5 144h-167c-4.7 0-10.7-9.9-18.5-19-7.1-8.3-14.7-13-20.5-13h-60.3c-15.5 0-28.2 8.9-28.2 24.3v234.6c0 15.5 12.7 29.1 28.2 29.1h266.3c15.5 0 25.5-13.6 25.5-29.1V168.8c0-15.5-10-24.8-25.5-24.8zm-266.3-16H179.3c3.9 0 8.6 1.6 14.3 8.3 12.1 14.3 15.5 23.7 29.9 23.7h167c6.6 0 9.5 2.2 9.5 8.8V192H112v-55.7c0-9 10.3-8.3 12.2-8.3zm266.3 256H124.2c-6.5 0-12.2-6.2-12.2-13.1V208h288v162.9c0 6-2.6 13.1-9.5 13.1z"></path>
                </symbol>
            </defs>
        </svg>
        <div id="atoms" class="pm-loader container" style="display: none">
            <div class="pm-loader-container">
                <div class="pm-loader-text">
                    <li style="display: none; opacity: 0;">Opening control valves to antimatter nacelles...</li>
                    <li style="display: none; opacity: 0;">Fastening seatbelts...</li>
                    <li style="display: inline-block; opacity: 1;">Distorting space-time continuum...</li>
                    <li style="display: none; opacity: 0;">Moving satellites into position...</li>
                    <li style="display: none; opacity: 0;">Resolving transporter buffer...</li>
                    <li style="display: none; opacity: 0;">Launching escape pods...</li>
                </div>
                <div class="pm-loader-atoms">
                    <div class="pm-loader-center-atom"></div>
                    <div class="pm-loader-orbit-1">
                        <div class="pm-loader-atom-1"></div>
                    </div>
                    <div class="pm-loader-orbit-2">
                        <div class="pm-loader-atom-2"></div>
                    </div>
                    <div class="pm-loader-orbit-3">
                        <div class="pm-loader-atom-3"></div>
                    </div>
                </div>
            </div>
        </div>

        <div id="analysis" class="container" style="display: none"></div>

        <a id="symbol" class="container" style="display: none"></a>

        <a id="spacebot" class="container" style="display: none"></a>

        <div id="elements" class="container" style="display: none"></div>

        <div id="camera" class="container">
            <canvas id="screen"></canvas>
        </div>

        <div class='app-root'>
            <div id="weather"></div>
        </div>

        <div id="controls">
            <a class="control alpha fi fi-alpha" href="javascript:{}" style="display: none"></a>
            <a class="control atom fi fi-atom" href="javascript:{}"></a>
            <a class="control element fi fi-element" href="javascript:{}"></a>
            <a class="control experiment fi fi-experiment" href="javascript:{}"></a>
            <a class="control explorer fi fi-explorer" href="javascript:{}"></a>
            <a class="control graph-pie fi fi-graph-pie" href="javascript:{}"></a>
            <a class="control microphone fi fi-microphone" href="javascript:{}"></a>
            <a class="control omega fi fi-omega" href="javascript:{}" style="display: none"></a>
            <a class="control sound fi fi-sound" href="javascript:{}"></a>
            <a class="control spacebot fi fi-social-reddit" href="javascript:{}"></a>
            <a class="control symbol fi fi-symbol" href="javascript:{}" style="display: none"></a>
            <a class="control time fi fi-clock" href="javascript:{}"></a>
            <a class="control zoom-out fi fi-zoom-out" href="javascript:{}"></a>
            <a class="control zoom-in fi fi-zoom-in" href="javascript:{}"></a>
            <a class="control magnifying-glass fi fi-magnifying-glass" href="javascript:{}"></a>
            <a class="control weather fi fi-cloud" href="javascript:{}"></a>
            <a class="control web fi fi-web" href="javascript:{}"></a>
            <a class="control widget fi fi-widget" href="javascript:{}"></a>
        </div>

        <div style="color: white" id="particles-js">

            <div id="milkyway" class="galaxy zoom zoom-moz" style="display: none">

                <div id="solar" class="system">

                    <a id="sun" class="solar star">
                        <span class="star name">Sun</span>
                    </a>

                    <a id="mercury" class="solar planet">
                        <span class="planet name">Mercury</span>
                    </a>

                    <a id="venus" class="solar planet">
                        <span class="planet name">Venus</span>
                    </a>

                    <a id="earth" class="solar planet" href="http://earth.plus360degrees.com/">
                        <span class="planet name">Earth</span>
                    </a>

                    <a id="mars" class="solar planet">
                        <span class="planet name">Mars</span>
                    </a>

                    <a id="jupiter" class="solar planet">
                        <span class="planet name">Jupiter</span>
                    </a>

                    <a id="saturn" class="solar planet">
                        <span class="planet name">Saturn</span>
                    </a>

                    <a id="uranus" class="solar planet">
                        <span class="planet name">Uranus</span>
                    </a>

                    <a id="neptune" class="solar planet">
                        <span class="planet name">Neptune</span>
                    </a>

                    <a id="pluto" class="solar planet">
                        <span class="planet name">Pluto</span>
                    </a>

                </div>

            </div>
        </div>
    </div>
    <!-- JS resources -->
    <script type="text/javascript" src="https://code.highcharts.com/highcharts.js"></script>
    <script type="text/javascript" src="https://code.highcharts.com/highcharts-more.js"></script>
    <script type="text/javascript" src="https://code.responsivevoice.org/responsivevoice.js"></script>
    <script type="text/javascript" src="assets/js/vendor/jquery.js"></script>
    <script type="text/javascript" src="assets/js/particles/particles.min.js"></script>
    <script type="text/javascript" src="assets/js/three/three.min.js"></script>
    <script type="text/javascript" src="assets/js/orbit.js"></script>
    <script type="text/javascript" src="assets/js/solar.js"></script>
    <script type="text/javascript" src="assets/js/app.js"></script>
    <!--References
https://threejs.org/editor/
https://jsfiddle.net/kmturley/N9YD3/
http://jsfiddle.net/_jered/8gby8jzk/
http://earth.plus360degrees.com/
https://www.gsmlondon.ac.uk/global-oil-map/#
http://planetpixelemporium.com/planets.html
https://processing.org/discourse/beta/num_1162399456.html
-->
</body>

</html>