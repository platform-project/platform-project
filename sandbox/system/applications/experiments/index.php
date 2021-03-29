<?php
/**
 * Experiments
 * Showcasing various types of experiments 
 *
 * @version     $Id: index.php 40 2011-02-09 14:10:00Z biyi $
 * @package     Platform
 * @category    Application
 * @author      The Platform Authors
 * @link        mailto:platform@entilda.com
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
    <title>Experiments</title>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
    <meta name="description" content="Experiments">
    <meta name="author" content="The Platform Authors">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Ubuntu:400,500,700,regular,bold&subset=Latin" />
    <link rel="stylesheet" type="text/css" href="assets/css/app.css"  />
</head>
<body>
    <div class="dashboard wrapper">
        
        <div class="experiments catalog">
            <h2>Online Experiments</h2>

            <div id="actual-ai" class="item" title="Actual AI" data-href="https://www.openprocessing.org/sketch/504352">
                <a href="https://www.openprocessing.org/sketch/504352"><img src="assets/images/catalogs/actual-ai.png" border="0" alt="Actual AI" title="Actual AI" style="width: 300px; height: 180px;" /></a>
            </div>

            <div id="solar-system" class="item" title="Solar System" data-href="#">
                <a href="#"><img src="assets/images/catalogs/solar-system.png" border="0" alt="Solar System" title="Solar System" style="width: 300px; height: 180px;" /></a>
            </div>

        </div>
    </div>
    <!-- References -->
    <!-- https://iosninja.wetransfer.com/downloads/dc8ee24ca84935d205865c48d06c639420171022152325/ca0da6 -->
    <script type="text/javascript" src="assets/js/app.js"></script>
</body>
</html>