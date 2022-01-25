<?php
/**
 * Editor
 * Test case: Determine the optimal approach to implement an editor
 *
 * @version     $Id: index.php 40 2011-02-09 14:10:00Z biyi $
 * @package     Platform
 * @category    Tests
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

platform_launch_initialize();

function load_mapbox(){
  $content = file_get_contents('https://api.mapbox.com/styles/v1/bileckme/cjaj6vkteaj5z2smunv6u2sek.html?fresh=true&title=false&access_token=pk.eyJ1IjoiYmlsZWNrbWUiLCJhIjoiY2szMDFsM2VzMGw2aTNubW1kam1hdDFyeCJ9.S9Gj66W6-72sdRnfZfOXTg#17.0/-25.913036/28.138857/0');
  ob_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Ubuntu:400,500,700,regular,bold&subset=Latin">
    <link rel="stylesheet" type="text/css" href="assets/css/app.css" />
  </head>
  <body>
    <div id="map_canvas"><?php echo $content ?></div>
    <div id="directions_panel"></div>
    <div id="overlay_canvas">
      <div id="brand">
        <span class="navigator logo" style="background: transparent url('<?php echo image_data_uri("assets/images/map.png", "png"); ?>') no-repeat;"></span><span class="navigator text">navi<span style="color: rgb(118, 160, 213);">gate</span><!--<sup>&lt;maps&gt;</sup><sub>&lt;/maps&gt;</sub>--></span>
      </div>
      <div id="coordinate">
        <label for="latitude">Latitude</label> <span class="coords latitude">0.00000</span> 
        <label for="longitude">Longitude</label> <span class="coords longitude">0.00000</span> 
      </div>
    </div>
  </body>
</html>
<?php
  return ob_get_clean();
}

function load_googlemap(){
  ob_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Ubuntu:400,500,700,regular,bold&subset=Latin">
    <link rel="stylesheet" type="text/css" href="assets/css/app.css" />
    <?php js_add('https://maps.googleapis.com/maps/api/js?key=AIzaSyAo5nL84P30jpU1MCHcpF6vU-gN9IRn9WM&sensor=true&v=3.19'); ?>  
    <?php js_add_jquery(); ?>
    <?php js_add('assets/js/app.js'); ?>  
  </head>
  <body>
    <div id="map_canvas"></div>
    <div id="directions_panel"></div>
    <div id="overlay_canvas">
      <div id="brand">
        <span class="navigator logo" style="background: transparent url('<?php echo image_data_uri("assets/images/map.png", "png"); ?>') no-repeat;"></span><span class="navigator text">navi<span style="color: rgb(118, 160, 213);">gate</span><!--<sup>&lt;maps&gt;</sup><sub>&lt;/maps&gt;</sub>--></span>
      </div>
      <div id="coordinate">
        <label for="latitude">Latitude</label> <span class="coords latitude">0.00000</span> 
        <label for="longitude">Longitude</label> <span class="coords longitude">0.00000</span> 
      </div>
    </div>
  </body>
</html>
<?php
  return ob_get_clean();
}

echo load_mapbox();

//echo load_googlemap();
