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
  ob_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Ubuntu:400,500,700,regular,bold&subset=Latin">
    <link rel="stylesheet" type="text/css" href="/sandbox/workspace/tests/gmap/assets/css/app.css">
    <link rel="stylesheet" type="text/css" href="https://api.mapbox.com/mapbox-gl-js/v2.13.0/mapbox-gl.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://api.mapbox.com/mapbox-gl-js/v2.13.0/mapbox-gl.js"></script>
    <?php js_add_jquery(); ?>
    <?php js_add('gmap/assets/js/mapbox.js'); ?>  
  </head>
  <body>
    <script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v5.0.0/mapbox-gl-geocoder.min.js"></script>
    <script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-directions/v4.1.1/mapbox-gl-directions.js"></script>
    <link rel="stylesheet" type="text/css" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-directions/v4.1.1/mapbox-gl-directions.css">
    <link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v5.0.0/mapbox-gl-geocoder.css" type="text/css">
    <div id="map_satellite">
      <a class="control weather" href="javascript:{}">&nbsp;</a>
      <div class="windy-weather" 
        data-windywidget="windy-weather"
        data-thememode="dark"
        data-appid="bb55adfb185d93350bb6bf1911e36d73"
        data-spotid="18335"
        data-dayofweek="6"
        data-starthour="12"
        data-windunit="knots"
        data-tempunit="C"
        data-mode="full">
      </div>
      <script async="true" data-cfasync="false" type="text/javascript" src="https://windy.app/widgets-code/forecast/windy_weather_async.js?v13"></script>
    </div>
    <div id="map_street"></div>
    <div id="map_night"></div>
    <div id="map_weather">
    <div class="windy"
      data-windywidget="map"
      data-fullscreen="true"
      data-spots="showWindybar"
			data-route="true"
			data-nogesturehandling="true"
      data-appid="windyapp">
    </div>
<script async="true" data-cfasync="false" type="text/javascript" src="https://windy.app/widget3/windy_map_async.js"></script>
    </div>
    <div id="directions_panel"></div>
    <div id="overlay_canvas">
      <div id="brand">
        <a class="home" href="javascript:{}">
          <span class="navigator logo" style="background: transparent url('<?php echo image_data_uri("assets/images/map.png", "png"); ?>') no-repeat; display: block; width: 168px; height: 108px;"></span><span class="navigator text">navi<span style="color: rgb(118, 160, 213);">gate</span><!--<sup>&lt;maps&gt;</sup><sub>&lt;/maps&gt;</sub>--></span>
        </a>
      </div>
      <div id="map_controls">
        <span class="control satellite"><a href="javascript:{}"><i class="fa-solid fa-satellite"></i> Satellite</a></span> &nbsp; 
        <span class="control street"><a href="javascript:{}"><i class="fa-solid fa-road"></i> Street</a></span> &nbsp; 
        <span class="control night"><a href="javascript:{}"><i class="fa-solid fa-moon"></i> Night</a></span> &nbsp; 
        <span class="control weather"><a href="javascript:{}"><i class="fa-solid fa-sun"></i> Weather</a></span> &nbsp; 
      </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js" integrity="sha512-yFjZbTYRCJodnuyGlsKamNE/LlEaEAxSUDe5+u61mV8zzqJVFOH7TnULE2/PP/l5vKWpUNnF4VGVkXh3MjgLsg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
      $(function (){

        $('#brand .home').click(function(){
            location.reload(true);
        });

        $('#map_satellite .control.weather').click(function(){
            $('.windy-weather').toggle();
        });

        $('#map_controls .control.satellite a').click(function(){
            $('#map_satellite').css('display', 'block');
            $('#map_street').css('display', 'none');
            $('#map_night').css('display', 'none');
            $('#map_weather').css('display', 'none');
        });

        $('#map_controls .control.street a').click(function(){
            $('#map_satellite').css('display', 'none');
            $('#map_street').css('display', 'block');
            $('#map_night').css('display', 'none');
            $('#map_weather').css('display', 'none');
        });

        $('#map_controls .control.night a').click(function(){
            $('#map_satellite').css('display', 'none');
            $('#map_street').css('display', 'none');
            $('#map_night').css('display', 'block');
            $('#map_weather').css('display', 'none');
        });
        
        $('#map_controls .control.weather a').click(function(){
            $('#map_satellite').css('display', 'none');
            $('#map_street').css('display', 'none');
            $('#map_night').css('display', 'none');
            $('#map_weather').css('display', 'block');
        });
      });
    </script>
  </body>
</html>
<?php
  return ob_get_clean();
}

echo load_mapbox();
