<?php
/**
 * Ebooks
 * Test case: Determine the optimal approach to implement an ebook reader
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
/**
 * Get ebooks online for your reading digest:
 * - www.it-ebooks.com
 * - www.elitebooks.com
 */
// initilizing platform for self-contained objects
platform_launch_initialize();
$app_path = PLATFORM_SANDBOX_SYSTEM_APPLICATIONS_PATH . DS . 'ebooks' . DS;
$app_uri = PLATFORM_SANDBOX_SYSTEM_APPLICATIONS_URI . DS . 'ebooks' . DS;
$documents_path = PLATFORM_SANDBOX_SYSTEM_APPLICATIONS_PATH . DS . 'ebooks' . DS . 'documents' . DS;
$documents_uri = PLATFORM_SANDBOX_SYSTEM_APPLICATIONS_URI . DS . 'ebooks' . DS . 'documents' . DS;
$request = isset($_GET['request']) ? $_GET['request'] : null;
$location = isset($_GET['location']) ? $_GET['location'] : null;

if ($request){
  $search_path = $documents_path;
  $ebooks = get_ebooks($search_path);
  $gallery = build_gallery($ebooks, $search_path);

  if (!empty($location)){
    $search_path = $location;
    $ebooks = get_ebooks($search_path);
    $gallery .= build_gallery($ebooks, $search_path);
  }

  if (!empty($gallery)){
    echo $gallery; die;
  } else {
    echo 'No ebook'; die;
  }
}

function get_ebooks($location){
  $ebook_files = find_filetype('pdf', $location);
  $ebook_files = array_unique($ebook_files);
  $c = 0;
  $ebooks = array();
  foreach ($ebook_files as $file){
    $ebook_path = dirname($file);
    $ebook_file = basename($file);

    $ebook = $ebook_path . DS . $ebook_file;
    $thumb = PLATFORM_SANDBOX_SYSTEM_APPLICATIONS_PATH . DS . 'ebooks' . DS . "assets/thumbnails/" . $ebook_file . ".jpg";
    $ebooks['thumb'][$c] = $thumb;
    $ebooks['ebook'][$c] = $ebook;
    if (!file_exists($thumb)){
      $command = "/usr/bin/gs -dSAFER -dBATCH -sDEVICE=jpeg -dTextAlphaBits=4 -dGraphicsAlphaBits=4 -r72 -sOutputFile=$thumb $ebook";
      exec($command, $output, $return);
    }
    $c++;
  }
  unset($ebook_files);
  return $ebooks;
}

function build_gallery($ebooks, $location){
  $c=0;
  ob_start();
  echo "<div>";
  foreach ($ebooks['thumb'] as $thumbnail){
    if (!file_exists($thumbnail)){
      $thumbnail = PLATFORM_BASE_PATH . 'assets/images/missing.png';
    }
    $uri_array = explode($location, $thumbnail);
    $thumbnail_url = $uri_array[1];
    $uri_array = explode($location, $ebooks['ebook'][$c]);
    $ebook_name = wordwrap(basename($ebooks['ebook'][$c]), 80);
    $ebook_url = $uri_array[1];
    $ebook_url = DS . $ebook_url;
    $ebook_name = substr($ebook_name, 0, strlen($ebook_name) - 4);
    $ebook_title = substr($ebook_name, 0, 34);
    $extra = '...';
    echo '<div id="ebook-'.$c.'" class="placeholder">
            <a class="ebook-item" title="'.$ebook_name.'" data-url="'.PLATFORM_SANDBOX_SYSTEM_APPLICATIONS_URI . DS . 'ebooks'. DS .'documents'.$ebook_url.'" href="javascript: {}">
              <img src="'.PLATFORM_SANDBOX_SYSTEM_APPLICATIONS_URI . DS . 'ebooks'. DS .'assets/thumbnails'.$ebook_url.'.jpg" border="0" title="'.$ebook_title.'" /><br />
              <span class="ebook-name">'. (strlen($ebook_name) < 34 ? $ebook_title : $ebook_title . $extra) .'</span>
            </a>
          </div>
          <br />';
          
    $c++;
  }
  echo "</div>";
  $gallery = ob_get_clean();
  return $gallery;
}

?>
<!DOCTYPE html>
<html lang="en"
><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Ebooks</title>
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Ubuntu:400,500,700,regular,bold&subset=Latin" />
<link rel="stylesheet" type="text/css" href="<?php echo PLATFORM_SANDBOX_SYSTEM_APPLICATIONS_URI ?>/ebooks/assets/css/app.css" />
<link rel="stylesheet" type="text/css" href="<?php echo PLATFORM_SANDBOX_SYSTEM_APPLICATIONS_URI ?>/ebooks/assets/css/fab.css" />
<link rel="stylesheet" type="text/css" href="<?php echo PLATFORM_SANDBOX_SYSTEM_APPLICATIONS_URI ?>/ebooks/assets/css/foundation.css" />
<link rel="stylesheet" type="text/css" href="<?php echo PLATFORM_SANDBOX_SYSTEM_APPLICATIONS_URI ?>/ebooks/assets/css/foundation-icons.css" />
</head>
<body class="app">
    <div id="wrapper">    
        <div id="previewer">
            <div style="clear: both"></div>
            <div class="floatingContainer">
                <div class="subActionButton file">
                <i class="icon fi-page"></i>
                <input type="file" id="addFile" title="Read an ebook" />
                </div><br />

                <!--
                <div class="subActionButton directory">
                <i class="icon fi-folder-add"></i>
                <input type="file" id="addDirectory" webkitdirectory directory multiple title="Add Directory" />
                <p class="floatingText"><span class="floatingTextBG">Add Directory</span></p>
                </div>-->

                <div class="actionButton"><i class="icon fi-plus"></i><p class="floatingText"><span class="floatingTextBG">More Ebooks</span></p></div>
            </div>
            <div class="toasts"><p class="floatingText"><span id="message"></span></p></div>
            <div id="gallery">
                
            </div>
        </div>
        <div id="reader">
            <iframe class="book" src="<?php echo PLATFORM_SANDBOX_SYSTEM_APPLICATIONS_URI ?>/ebooks/documents/index.html" width="80%" height="905"></iframe>
        </div>
    </div>
    <?php
    js_add_jquery();    // adding jquery library
    js_add_jquery_ui(); 
    ?>
    <script language="javascript" type="text/javascript" src="<?php echo PLATFORM_SANDBOX_SYSTEM_APPLICATIONS_URI ?>/ebooks/assets/js/app.js"></script>
    <script language="javascript" type="text/javascript" src="<?php echo PLATFORM_SANDBOX_SYSTEM_APPLICATIONS_URI ?>/ebooks/assets/js/fab.js"></script>
    <script language="javascript" type="text/javascript" src="<?php echo PLATFORM_SANDBOX_SYSTEM_APPLICATIONS_URI ?>/ebooks/assets/js/vendor/modernizr.js"></script>
</body>
</html>