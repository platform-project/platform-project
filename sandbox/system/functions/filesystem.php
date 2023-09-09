<?php
/**
 * This contains all the system-wide filesystem functions
 * @version     $Id: debug.php 40 2011-02-09 14:10:00Z biyi $
 * @package     Platform
 * @category    Function
 * @author      Biyi Akinpelu
 * @link        mailto:biyi@entilda.com
 * @copyright   Copyright (C) 2011 - 2012 The Platform Authors. All rights reserved.
 * @license     GNU Public Licence, see LICENSE.php
 * Platform is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 * See COPYRIGHT.php for copyright notices and details.
 */

function count_directory($path)
{
  // function to count the number of directories within a path
  $dir = explode('/', $path);
  $count = 0;
  foreach ($dir AS $k){
    $count++;
  }
  return ($count - 1);
}

function create_file($file, $content, $command='create'){
  switch($command){
    case 'create':
      $f = fopen($file, 'w+');
      break;
    case 'append':
      $f = fopen($file, 'a');
      break;
  }
  fwrite($f, $content);
  fclose($f);
  chmod($file, 0777);
}

function create_directory($working_directory)
{
  // function create a directory to specific working directory
  do {
    $dir = $working_directory;

    while (!@mkdir($dir,0777)) {
      $dir = dirname($dir);
      if ($dir == '/' || is_dir($dir)) break;
    }
  } while ($dir != $working_directory);
}

function read_path($dir, $ext=null) {
  $file = null;
  $files = array();
  if ($root = @opendir($dir)){

    while ($file = readdir($root)){

      if($file == "." || $file == ".."){
        continue;
      }

      if (!is_null($ext) ){
        $extension = get_file_extension($file);
        if ($ext == $extension){
          $files[] = $file;
        }
      } else {
          $files[] = $file;
      }
    }
    array_multisort($files, SORT_ASC);
  }
  return $files;
}

function read_file($location)
{
  try
  {
    $data = fopen(getcwd()."/".$location, "r");
    $content = '';
    while (!feof($data))
    {
      $value = fgets($data, 1024);
      {
        $content .= $value;
      }
    }
    fclose($data);
    return $content;
  }
  catch (Exception $e)
  {
    return false;
  }
}

function get_file_extension($filename){
  $extension = explode(".", basename($filename));
  $extension = end($extension);
  return $extension;
}

function list_files($path, $ext){
  return read_path($path, $ext);
}

function save_file_to_hd($url, $file){
  $data = @file_get_contents($url);
  if (!file_exists($file)){
    $fh = fopen($file, 'w+');
    fwrite($fh, $data);
    fclose($fh);
    return true;
  } else {
    return false;
  }
}

function copy_directory($target, $destination){
  if (is_dir($target) && is_dir($destination)){

    if (!is_writable($destination)){
      $command = 'chmod 0755 -R ' . $destination;
      exec($command);
    }
    $command = 'cp -var ' . $target . ' ' . $destination;
    return exec($command);
  }
  return false;
}

function find_all($file, $in){
  $files = find_file($file, $in);
  $filetypes = find_filetype($file, $in);
  $all_files = array_merge($files, $filetypes);
  return array_unique($all_files);
}

function find_filecontent($file, $in){
  return find($in, "*", "-name", '-exec grep -i -H "'.$file.'" {} \;');
}

function find_filetype($filetype, $in){
  return find($in, "*.$filetype", "-name");
}

function find_file($file, $in){
  return find($in, "$file*.*", "-name");
}

function find($path, $pattern, $options='', $extras=''){
  $command = "find $path $options $pattern $extras";
  exec($command, $output, $return_value);
  return $output;
}

function format_bytes($size) {
  $units = array(' B', ' KB', ' MB', ' GB', ' TB');
  for ($i = 0; $size >= 1024 && $i < 4; $i++) $size /= 1024;
  return round($size, 2).$units[$i];
}

function update_index(){
  $command = "updatedb";
  exec($command, $output, $return_value);
  return $output;
}

function index_file(){

}

function download($file){
  //First, see if the file exists
  if (!is_file($file)) { die("<b>404 File not found!</b>"); }

  /*
  //Gather relevent info about file
  $len = filesize($file);
  $filename = basename($file);
  $file_extension = strtolower(substr(strrchr($filename,"."),1));
  //This will set the Content-Type to the appropriate setting for the file
  switch( $file_extension ) {
   case "pdf": $ctype="application/pdf"; break;
   case "exe": $ctype="application/octet-stream"; break;
   case "zip": $ctype="application/zip"; break;
   case "rar": $ctype="application/rar"; break;
   case "doc": $ctype="application/msword"; break;
   case "xls": $ctype="application/vnd.ms-excel"; break;
   case "ppt": $ctype="application/vnd.ms-powerpoint"; break;
   case "gif": $ctype="image/gif"; break;
   case "png": $ctype="image/png"; break;
   case "jpeg":
   case "jpg": $ctype="image/jpg"; break;
   case "mp3": $ctype="audio/mpeg"; break;
   case "wav": $ctype="audio/x-wav"; break;
   case "mpeg":
   case "mpg":
   case "mpe": $ctype="video/mpeg"; break;
   case "mov": $ctype="video/quicktime"; break;
   case "avi": $ctype="video/x-msvideo"; break;
   //The following are for extensions that shouldn't be downloaded (sensitive stuff, like php files)
   case "php":
   case "htm":
   case "html":
   case "txt": die("<b>Cannot be used for ". $file_extension ." files!</b>"); break;
   default: $ctype="application/force-download";
  }
*/
  $f = fopen($file, "rb");
  $content_len = (int) filesize($file);
  $content_file = fread($f, $content_len);
  fclose($f);
  $output_file = $file;
  @ob_end_clean();
  @ini_set('zlib.output_compression', 'Off');


  @header('Pragma: public');
  @header('Last-Modified: '.gmdate('D, d M Y H:i:s') . ' GMT');
  @header('Cache-Control: no-store, no-cache, must-revalidate'); // HTTP/1.1
  @header('Cache-Control: pre-check=0, post-check=0, max-age=0'); // HTTP/1.1
  @header('Content-Transfer-Encoding: none');
  @header('Content-Type: application/octetstream; name="' . $output_file . '"'); //This should work for IE & Opera
  @header('Content-Type: application/octet-stream; name="' . $output_file . '"'); //This should work for the rest
  @header('Content-Disposition: inline; filename="' . $output_file . '"');
  @header("Content-length: $content_len");
/*
  //Begin writing headers
  @header("Pragma: public");
  @header("Expires: 0");
  @header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
  @header("Cache-Control: public");
  @header("Content-Description: File Transfer");

  //Use the switch-generated Content-Type
  @header("Content-Type: $ctype");
  //Force the download
  $header="Content-Disposition: attachment; filename=".$filename.";";
  @header($header );
  @header("Content-Transfer-Encoding: binary");
  @header("Content-Length: ".$len);
  @readfile($file);*/
  return $content_file;
}

function upload($file, $path, $upload_field)
{
  $upload_path = $path;

  //if (!file_exists($upload_path)) create_dir($upload_path);

  $file = basename($path);
  if (is_upload_handled($upload_field, $file, $upload_path, $msg)) {
     return $msg;
  }
  return $msg;
}

function is_upload_handled($fvar, $filename, $filepath, &$msg=null)
{
  // function to handle uploads of files to the server
  $filename = $_FILES[$fvar]['name'];
  $filesize = $_FILES[$fvar]['size'];
  $tmp_name = $_FILES[$fvar]['tmp_name'];
  $file_error = $_FILES[$fvar]['error'];
  $msg .= '<span class=smallFnt><b>filename</b>: '. (empty($filename) ? 'Unknown' : $filename) .' </span><br/>';
  $msg .= '<span class=smallFnt><b>file size</b>: '.(int)$filesize.' byte(s)</span><br/><br/>';

  //checks for zero filesize
  if (!$filesize) {
    $msg .= 'No file was selected!<br/>';
    return $msg;
  }
  //checks to see if file was supplied
  if ((isset($_FILES[$fvar]) == false) OR ($file_error == UPLOAD_ERR_NO_FILE)) {
    $msg .= '<font color=red size=5>File not supplied !!!!</font>';
    return $msg;
  }
  //checks for the filesize
  if($filename != "" && $filesize == "0") {
    $msg .= 'The file size must be less than 100kb.<br/>';
    return $msg;
  }
  //checks to see if files are not overwritten
  if (file_exists($filepath . $filename)) {
    $msg .= $filename.' already exists.  <br>';
    $msg .= '<font color=red size=5>Please delete the destination file and try again !!!!';
    return $msg;
  }
  /////uploads the file to upload folder
  if (move_uploaded_file($tmp_name, $filepath . $filename)) {
    $msg .=  '<File <b>'.$filename.'</b> was uploaded successfully.<br/>';
    return $msg;
  }
  else {////print error occurred during upload///////////
    $msg .= 'Possible file upload attack: filename '.$_FILES[$fvar]['tmp_name'].$filename.'</span><br/>';
    $_SESSIION['file_debug_info'] = $_FILES;
    return $msg;
  }
}
