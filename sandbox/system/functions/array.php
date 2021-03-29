<?php
/**
 * This contains all array specific functions
 * @version     $Id: array.php 40 2011-02-09 14:10:00Z biyi $
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

/**
 * An array-merging function to strip one or more arrays down to a single one dimension array
 */
function array_merge_deep($arr) {
    $arr = (array)$arr;
    $argc = func_num_args();
    if ($argc != 1) {
      $argv = func_get_args();
      for ($i = 1; $i < $argc; $i++) $arr = array_merge($arr, (array)$argv[$i]);
    }
    $temparr = array();
    foreach($arr as $key => $value) {
      if (is_array($value)) $temparr = array_merge($temparr, array_merge_deep($value));
      else $temparr = array_merge($temparr, array($key => $value));
    }
    return $temparr;
}

/**
 * An array-map flatten function which can be used to flatten an array
 */
function array_map_flatten($elm) {
  if(is_array($elm)) {
    $elm_values = array_values($elm);
    return $elm_values[0];
  }
  return $elm;
}

function array_to_string($array){
  foreach($array as $key => $item){
    $string .= "'" . $item . "',";
  }
  $string = substr($string, 0, strlen($string) - 1);
  return $string;
}

function array_to_quoted_string($array){
  foreach($array as $key => $item){
    $string .= "'" . $item . "',";
  }
  $string = substr($string, 0, strlen($string) - 1);
  return $string;
}

/**
 * Makes a nice HTML table from a supplied array.
 *
 * @param array   $array Array of data
 * @param int     $number_of_column How many columns you want
 * @param int     $width Width of the table
 * @param string  $style style of the table
 * @param int     $cell_spacing cell spacing
 * @param int     $cell_padding cell padding
 * @param string  $align alignment of the table
 * @param string  $tdstyle TD style
 * @param array   $urls URLs if you want to make your cell data clickable
 * @return string A nicely formatted HTML Table
 */
function array_to_table($array, $number_of_column=3, $width=100, $style=null, $cell_spacing=0 , $cell_padding=0, $align="left", $tdstyle = "",$urls=null)
{
  $data = "<table align='{$align}' width='{$width}%' cellspacing={$cell_spacing} cellpadding={$cell_padding} style='{$style}'>";

  $tdwidth = 100/$number_of_column;
  $actual_row = ceil(count($array)/$number_of_column)*$number_of_column;
  //echo $actual_row;
  for ($i=1; $i<=$actual_row; $i++)
  {
    if ($i%$number_of_column==1){
      $data .= "<tr>";
    }

    //echo count($array);
    $_fix = $number_of_column-count($array);
    if (count($array)<$number_of_column)
    {
      for ($n=0;$n<$_fix;$n++)
      {
        $array[] = "&nbsp;";
      }
    }
    if ($i<=count($array))
    {
      if (empty($urls))
      $data.="<td valign='top' width='{$tdwidth}%' style='{$tdstyle}' >{$array[$i-1]}</td>";
      else
      $data.="<td valign='top' width='{$tdwidth}%' style='{$tdstyle}'><a href=\"{$urls[$i-1]}\">{$array[$i-1]}</a></td>";

    }

    if ($i%$number_of_column==0)
    {
      $data .="</tr>";
    }

  }
  $data .="</table>";
  return $data;
}