<?php
/**
 * Loads the sandbox system applications video index  page
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

/**
 * Get the videos and their thumbnails
 *
 * Extracting thumbnails from video files
 * --------------------------------------
 * VLC (newer versions)
 * vlc /path/to/video/process.mp4 --rate=1 --video-filter=scene --vout=dummy --start-time=10 --stop-time=11 --scene-format=png --scene-ratio=24 --scene-prefix=snap --scene-path=C:\path\for\snapshots\ vlc://quit
 *
 * VLC (older versions)
 * vlc /path/to/video/process.mp4 -V image --start-time 0 --stop-time 1 --image-out-format
 *
 */
function get_videos($location){
  $cache_path = PLATFORM_SANDBOX_SYSTEM_CACHES_PATH . DS . 'video';
    
  $video_mkv = find_filetype('mkv', $location);
  $video_mp4 = find_filetype('mp4', $location);
  $video_m4v = find_filetype('m4v', $location);
  $video_files = array_merge($video_mkv, $video_mp4);
  $video_files = array_merge($video_files, $video_m4v);
  $video_files = array_unique($video_files);
    
  $c = 0;
  $clips = array();
  foreach ($video_files as $file){
    $video_path = dirname($file);
    $video_file = basename($file);

    $video = $video_path . DS . $video_file;
    if (stristr($video, 'jwplayer/demo.mp4')){ // skip
      continue;
    } else {
      $thumb = $cache_path . DS . substr($video_file, 0, 5)."-".$c.".png";
      $clips['thumb'][$c] = $thumb;
      $clips['video'][$c] = $video;
      $command = "/usr/bin/ffmpegthumbnailer -i'".$video."' -o'".$thumb."'";
      exec($command, $output, $return);
      $c++;
    }
  }
  //debug_print_array($video_files);
  //exit;
  //$video_out = sort_video_by_length($video_files);
  unset($video_files);
  return $clips;
}

function build_gallery($clips, $location){
  $c=0;
  ob_start();
  echo "<div>";
  foreach ($clips['thumb'] as $thumbnail){
    if (!file_exists($thumbnail)){
      $thumbnail = PLATFORM_BASE_PATH . 'assets/images/missing.png';
    }
    $uri_array = explode($location, $thumbnail);
    $thumbnail_url = $uri_array[1];
    $uri_array = explode($location, $clips['video'][$c]);
    $clip_name = wordwrap(basename($clips['video'][$c]), 80);
    $clip_url = $uri_array[1];
    $clip_url = DS . $clip_url;
    $clip_name = substr($clip_name, 0, strlen($clip_name) - 4);
    $clip_title = substr($clip_name, 0, 34);
    $extra = '...';
    echo '<div id="clip-'.$c.'" class="clip">
           <a class="clip-item" title="'.$clip_name.'" data-url="'.$clip_url.'">
            <img src="'.$thumbnail_url.'" border="0" />
            <span class="video-time"></span>
            <span class="video-name">'. (strlen($clip_name) < 34 ? $clip_title : $clip_title . $extra) .'</span>
            <span class="video-play"></span>
           </a>
          </div>
          <br />';
    $c++;
  }
  echo "</div>";
  $gallery = ob_get_clean();
  return $gallery;
}

$request = isset($_GET['request']) ? $_GET['request'] : null;
$location = isset($_GET['location']) ? $_GET['location'] : null;

if ($request){
  $search_path = PLATFORM_BASE_PATH;
  $clips = get_videos($search_path);
  $gallery = build_gallery($clips, $search_path);

  if (!empty($location)){
    $search_path = $location;
    $clips = get_videos($search_path);
    $gallery .= build_gallery($clips, $search_path);
  }

  if (!empty($gallery)){
    echo $gallery; die;
  } else {
    echo 'No video'; die;
  }
}
?>
<!DOCTYPE html>
<html>
  <head>
  <title>Media Player</title>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
  <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Ubuntu:400,500,700,regular,bold&subset=Latin" />
  <link rel="stylesheet" type="text/css" href="assets/css/app.css" />
  <link rel="stylesheet" type="text/css" href="assets/css/fab.css" />
  <link rel="stylesheet" type="text/css" href="assets/css/video.js/video-js.min.css" />
  <link rel="stylesheet" href="assets/css/foundation.css" />
  <link rel="stylesheet" href="assets/css/foundation-icons.css" />
  <?php js_add_jquery_plugin_css("jgrowl"); ?>
  </head>
  <body class="video app">
    <div id="wrapper">
      <div id="gallery" style="display: none">
        <div class="gallery-title"><i class="fi-list"></i> Gallery</div>
        <div class="gallery-body"></div>
      </div>
      <div id="splash"><i class="icon fi-play"></i></div>
      <div id="player"><video class="video-js vjs-default-skin" autoplay controls name="media" src=""><source src="" type="video/webm; codecs=vp8,vorbis"></video></div>
      <div style="clear: both"></div>
      <div class="floatingContainer">
        <div class="subActionButton file">
          <i class="icon fi-video"></i>
          <input type="file" id="addFile" title="Watch a Video" />
        </div>

        <div class="subActionButton directory">
          <i class="icon fi-folder-add"></i>
          <input type="file" id="addDirectory" webkitdirectory directory multiple title="Add Directory" />
          <!--<p class="floatingText"><span class="floatingTextBG">Add Directory</span></p>-->
        </div>

        <div class="actionButton"><i class="icon fi-plus"></i><p class="floatingText"><span class="floatingTextBG">More Videos</span></p></div>
      </div>

      <div id="ticker">

      </div>

      <div class="toasts"><p class="floatingText"><span id="message"></span></p></div>
    </div>
    
    <div id="bottom">
      <div id="controls">
        <div class="control video-panel">
          <a class="control button login" title="Login"></a> 
          <a class="control button playlist" title="Playlist"></a> 
          <a class="control button language" title="Language"></a> 
          <a class="control button favorite" title="Favorite"></a> 
          <a class="control button settings" title="Settings"></a> 
          <a class="control button player" title="Player"></a> 
          <a class="control button viewer" title="Viewer"></a> 
          <a class="control button screen" title="Screen Toggle"></a> 
        </div>
      </div>
    </div>
    <?php
    js_add_jquery();    // adding jquery library
    js_add_jquery_ui(); 
    js_add_jquery_plugin("jgrowl"); 
    ?>
  <script language="javascript" type="text/javascript" src="assets/js/app.js"></script>
  <script language="javascript" type="text/javascript" src="assets/js/fab.js"></script>
  <script language="javascript" type="text/javascript" src="assets/video.js/video.js"></script>
  <script language="javascript" type="text/javascript">
    videojs.options.flash.swf = "assets/video.js/video-js.swf";
  </script>
  <script language="javascript" type="text/javascript" src="assets/js/vendor/modernizr.js"></script>
  </body>
</html>

