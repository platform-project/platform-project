<?php
/**
 * Games
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
    <title>Games</title>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
    <meta name="description" content="Games">
    <meta name="author" content="The Platform Authors">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Ubuntu:400,500,700,regular,bold&subset=Latin" />
    <link rel="stylesheet" type="text/css" href="./assets/css/app.css" />
    <?php js_add_jquery(); ?>
</head>
<body>
    <div class="dashboard wrapper">
        
        <div class="games catalog">
            <h2>Online Games</h2>

            <div id="freeriderhd" class="item" title="Free Rider HD" data-href="https://www.freeriderhd.com/">
                <a href="https://www.freeriderhd.com/"><img src="assets/images/catalogs/free-rider-hd.png" border="0" alt="Free Rider HD" title="Free Rider HD" style="width: 300px; height: 180px;" /></a>
            </div>

            <div id="swoop" class="item" title="Swoop" data-href="https://playcanv.as/p/JtL2iqIH/">
                <a href="https://playcanv.as/p/JtL2iqIH/"><img src="assets/images/catalogs/swoop.png" border="0" alt="Swoop" title="Swoop" style="width: 300px; height: 180px;" /></a>
            </div>

            <div id="entanglement" class="item" title="Entanglement" data-href="http://entanglement.gopherwoodstudios.com/en-US-index.html">
                <a href="http://entanglement.gopherwoodstudios.com/en-US-index.html"><img src="assets/images/catalogs/entanglement.png" border="0" alt="Entanglement" title="Entanglement" style="width: 300px; height: 180px;" /></a>
            </div>
            
            <div id="polycraft" class="item" title="Poly Craft" data-href="http://polycraftgame.com/">
                <a href="http://polycraftgame.com/"><img src="assets/images/catalogs/polycraft.png" border="0" alt="Free Rider HD" title="Free Rider HD" style="width: 300px; height: 180px;" /></a>
            </div>
        </div>
    </div>
    <?php js_add('assets/js/app.js'); ?>
</body>
</html>