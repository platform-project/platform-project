<?php
/**
 * Loads the sandbox system applications photos index  page
 * @version     $Id: page.php 40 2011-02-09 14:10:00Z biyi $
 * @package     Platform
 * @subpackage  System
 * @category    Application
 * @author      The Platform Authors
 * @link        mailto:platform@entilda.com
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
define('SLIDESHOW_PATH', 'supersized/slideshow');
//PLATFORM_SANDBOX_WORKSPACE_URI
?>
<!DOCTYPE html>
<html>
<head>
<title>Photo Viewer</title>
<?php
js_add_jquery();    // adding jquery library
js_add_jquery_ui(); // adding jquery ui library
html_add_link_css(SLIDESHOW_PATH . DS . 'css/supersized.css', 'media="screen"');
html_add_link_css(SLIDESHOW_PATH . DS . 'theme/supersized.shutter.css', 'media="screen"');
html_add_js('https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js');
html_add_js(SLIDESHOW_PATH . DS . 'js/jquery.easing.min.js');
html_add_js(SLIDESHOW_PATH . DS . 'js/supersized.3.2.7.min.js');		
html_add_js(SLIDESHOW_PATH . DS . 'theme/supersized.shutter.min.js');
$cache_path = PLATFORM_SANDBOX_SYSTEM_CACHES_PATH . DS . 'photo';
$photo_files = find_filetype('jpg', PLATFORM_SANDBOX_WORKSPACE_PATH);

$c = 0;

?>	
		<script type="text/javascript">
			
			jQuery(function($){
				
				$.supersized({
				
					// Functionality
					slide_interval          :   3000,		// Length between transitions
					transition              :   3, 			// 0-None, 1-Fade, 2-Slide Top, 3-Slide Right, 4-Slide Bottom, 5-Slide Left, 6-Carousel Right, 7-Carousel Left
					transition_speed		:	700,		// Speed of transition
															   
					// Components							
					slide_links				:	'blank',	// Individual links for each slide (Options: false, 'num', 'name', 'blank')
					slides 					:  	[			// Slideshow Images
					

					<?php
					foreach ($photo_files as $file){
					  ++$c;
					  $photo_path = dirname($file);
					  $photo_file = basename($file);
					  $thumb_file = "thumb." . $photo_file;
					  $photo = $photo_path . DS . $photo_file;
					  $thumb = $cache_path . DS . $thumb_file;
					  $command = "/usr/bin/convert -thumbnail 200x200 " . $photo . " " . $thumb;
				      exec($command, $output, $return);

					  $photo_array = explode("/var/www/platform/", $photo);
					  $thumb_array = explode("/var/www/platform/", $thumb);
					  $photo = PLATFORM_URI . $photo_array[1];
				      $thumb = PLATFORM_URI . $thumb_array[1];
					  echo "{image : '$photo', title : 'Photo: $c', thumb : '$thumb', url : 'http://platform/'},
					  ";

					}
					?>
													
												]
					
				});
		    });
		    
		</script>
		
	</head>
	

<body>


	<!--Thumbnail Navigation-->
	<div id="prevthumb"></div>
	<div id="nextthumb"></div>
	
	<!--Arrow Navigation-->
	<a id="prevslide" class="load-item"></a>
	<a id="nextslide" class="load-item"></a>
	
	<div id="thumb-tray" class="load-item">
		<div id="thumb-back"></div>
		<div id="thumb-forward"></div>
	</div>
	
	<!--Time Bar-->
	<div id="progress-back" class="load-item">
		<div id="progress-bar"></div>
	</div>
	
	<!--Control Bar-->
	<div id="controls-wrapper" class="load-item">
		<div id="controls">
			
			<a id="play-button"><img id="pauseplay" src="<?php echo SLIDESHOW_PATH . DS ?>img/pause.png"/></a>
		
			<!--Slide counter-->
			<div id="slidecounter">
				<span class="slidenumber"></span> / <span class="totalslides"></span>
			</div>
			
			<!--Slide captions displayed here-->
			<div id="slidecaption"></div>
			
			<!--Thumb Tray button-->
			<a id="tray-button"><img id="tray-arrow" src="<?php echo SLIDESHOW_PATH . DS ?>img/button-tray-up.png"/></a>
			
			<!--Navigation-->
			<ul id="slide-list"></ul>
			
		</div>
	</div>

</body>
</html>
