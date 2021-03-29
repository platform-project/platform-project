<?php
/**
 * Loads the sandbox system applications photos index  page
 *
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

platform_launch_initialize();
define( 'SLIDESHOW_PATH', 'assets' );
$photo_files = array();
?>
<!DOCTYPE html>
<html>
<head>
<title>Photo Viewer</title>
<style>
	.slideshow {
        list-style-type: none;
    }
    /** SLIDESHOW **/
    
    .slideshow,
    .slideshow:after {
        top: -16px;
        /*Not sure why I needed this fix*/
        position: fixed;
        width: 100%;
        height: 100%;
        left: 0px;
        z-index: 0;
    }
    
    .slideshow li span {
        position: absolute;
        width: 100%;
        height: 100%;
        top: 0px;
        left: 0px;
        color: transparent;
        background-size: cover;
        background-position: 50% 50%;
        background-repeat: no-repeat;
        opacity: 0;
        z-index: 0;
        animation: imageAnimation 30s linear infinite 0s;
    }

<?php
$cache_path = PLATFORM_SANDBOX_SYSTEM_CACHES_PATH . DS . 'photo';
$photo_png = glob( PLATFORM_SANDBOX_WORKSPACE_PATH . '/photos/wallpapers/*.png' );
$photo_PNG = glob( PLATFORM_SANDBOX_WORKSPACE_PATH . '/photos/wallpapers/*.PNG' );
$photo_jpg = glob( PLATFORM_SANDBOX_WORKSPACE_PATH . '/photos/wallpapers/*.jpg' );
$photo_JPG = glob( PLATFORM_SANDBOX_WORKSPACE_PATH . '/photos/wallpapers/*.JPG' );

if (count($photo_png)){
	foreach ($photo_png as $photo) {
		$photo_files[] = $photo;
	}
}

if (count($photo_jpg)){
	foreach ($photo_jpg as $photo) {
		$photo_files[] = $photo;
	}
}

if (count($photo_PNG)){
	foreach ($photo_PNG as $photo) {
		$photo_files[] = $photo;
	}
}

if (count($photo_JPG)){
	foreach ($photo_JPG as $photo) {
		$photo_files[] = $photo;
	}
}
$c = 0;


foreach ( $photo_files as &$file ) {
	$photo_path = dirname( $file );
	$photo_file = basename( $file );
	$thumb_file = "thumb." . $photo_file;
	$photo = $photo_path . DS . $photo_file;
	$thumb = $cache_path . DS . $thumb_file;
	$command = "/usr/bin/convert -thumbnail 200 " . $photo . " " . $thumb;
	exec( $command, $output, $return );
	$photo_array = explode( "/var/www/platform/", $photo );
	$thumb_array = explode( "/var/www/platform/", $thumb );
	$photo = PLATFORM_URI . $photo_array[1];
	$thumb = PLATFORM_URI . $thumb_array[1];
	//echo "{image : '$photo', title : 'Photo: $c', thumb : '$thumb', url : 'http://platform/'}";
?>

    .slideshow li:nth-child(<?php echo $c+1 ?>) span {
        background-image: url("<?php echo $photo ?>");
		animation-delay: <?php echo $c * 6 ?>s;
    }

<?php
	$c++;
    unset($file);
} 

?>

    @keyframes imageAnimation {
        0% {
            opacity: 0;
            animation-timing-function: ease-in;
        }
        8% {
            opacity: 1;
            animation-timing-function: ease-out;
        }
        17% {
            opacity: 1
        }
        25% {
            opacity: 0
        }
        100% {
            opacity: 0
        }
    }
    
    @keyframes titleAnimation {
        0% {
            opacity: 0
        }
        8% {
            opacity: 1
        }
        17% {
            opacity: 1
        }
        19% {
            opacity: 0
        }
        100% {
            opacity: 0
        }
    }

    .no-cssanimations .cb-slideshow li span {
        opacity: 1;
    }

	body {
		background: black url("/var/www/platform/sandbox/workspace/photos/background-1600x1200.png") no-repeat;
		background-size: cover;
		width: 100%;
		height: 100%;
	}
		</style>

	</head>

<body>
<ul class="slideshow">
<?php 

    foreach ($photo_files as $file){
		++$c;
?>
<li><span><?php echo ($c == 2) ? $c : ""; ?></span></li>
<?php
	}
    
?>
</ul>

</body>
</html>
