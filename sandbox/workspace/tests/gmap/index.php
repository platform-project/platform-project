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
    <link rel="stylesheet" type="text/css" href="https://api.mapbox.com/mapbox-gl-js/v2.7.0/mapbox-gl.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://api.mapbox.com/mapbox-gl-js/v2.7.0/mapbox-gl.js"></script>
    <?php js_add_jquery(); ?>
    <?php js_add('gmap/assets/js/mapbox.js'); ?>  
  </head>
  <body>
    <script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.7.2/mapbox-gl-geocoder.min.js"></script>
    <script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-directions/v4.1.0/mapbox-gl-directions.js"></script>
    <link rel="stylesheet" type="text/css" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-directions/v4.1.0/mapbox-gl-directions.css">
    <div id="map_satellite"></div>
    <div id="map_street"></div>
    <div id="map_night"></div>
    <div id="directions_panel"></div>
    <div id="overlay_canvas">
      <div id="brand">
        <span class="navigator logo" style="background: transparent url('<?php echo image_data_uri("assets/images/map.png", "png"); ?>') no-repeat; display: block; width: 168px; height: 108px;"></span><span class="navigator text">navi<span style="color: rgb(118, 160, 213);">gate</span><!--<sup>&lt;maps&gt;</sup><sub>&lt;/maps&gt;</sub>--></span>
      </div>
      <div id="map_controls">
        <span class="control satellite"><a href="javascript:{}"><i class="fa-solid fa-satellite"></i> Satellite</a></span> &nbsp; 
        <span class="control street"><a href="javascript:{}"><i class="fa-solid fa-road"></i> Street</a></span> &nbsp; 
        <span class="control night"><a href="javascript:{}"><i class="fa-solid fa-moon"></i> Night</a></span> &nbsp; 
      </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js" integrity="sha512-yFjZbTYRCJodnuyGlsKamNE/LlEaEAxSUDe5+u61mV8zzqJVFOH7TnULE2/PP/l5vKWpUNnF4VGVkXh3MjgLsg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
      $(function (){
        $('#map_controls .control.satellite a').click(function(){
            $('#map_satellite').css('display', 'block');
            $('#map_street').css('display', 'none');
            $('#map_night').css('display', 'none');
        });

        $('#map_controls .control.street a').click(function(){
            $('#map_satellite').css('display', 'none');
            $('#map_street').css('display', 'block');
            $('#map_night').css('display', 'none');
        });

        $('#map_controls .control.night a').click(function(){
            $('#map_satellite').css('display', 'none');
            $('#map_street').css('display', 'none');
            $('#map_night').css('display', 'block');
        });
        
      });
    </script>
  </body>
</html>
<?php
  return ob_get_clean();
}

echo load_mapbox();
