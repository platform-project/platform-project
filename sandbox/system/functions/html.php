<?php
/**
 * This contains all html specific functions
 * @version     $Id: html.php 40 2011-02-09 14:10:00Z biyi $
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

function html($title='Test Application', $file='index.html'){
  ob_start();
  ?>
<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <title><?php echo $title ?></title>
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Ubuntu:400,500,700,regular,bold&subset=Latin">
    <link rel="stylesheet" type="text/css" href="assets/css/app.css" />
    <?php js_add_jquery(); ?>
  </head>
  <body>
    <h1>Hello World</h1>
    <p>This is a sample test application.</p>
    <p>Edit this content as you wish.</p>
    <p>Enjoy!</p>
    <div id="overlay_canvas">
      <div id="app">
        <span class="logo" style="background: transparent url('<?php echo image_data_uri("assets/images/icons/application-128x128.png", "png"); ?>') no-repeat;"></span><span class="navigator text"><?php echo $title ?></span>
      </div>
    </div>
    <?php js_add('assets/js/app.js'); ?>  
  </body>
</html>

  <?php
  $html = ob_get_clean();
  create_file($file, $html);
}

function html_generate_css($file){
  $css_path = getcwd()."/assets/css/";
  $css_file = $css_path.$file;

  if (!is_dir($css_path)){
    @mkdir($css_path);
  }
  
  if (!file_exists($css_file)){
    touch($css_file);
  }
}

function html_generate_js($file){
  $js_path = getcwd()."/assets/js/";
  $js_file = $css_path.$file;
  
  if (!is_dir($js_path)){
    @mkdir($js_path);
  }
  
  if (!file_exists($js_file)){
    touch($js_file);
  }
}


function html_add_link_css($src, $attributes=''){
  e('<link rel="stylesheet" type="text/stylesheet" href="'.$src.'" '.$attributes." />\n");
}

function html_add_embed_css(){
  e('<style type="text/stylesheet">'."\n");
}

function html_end_embed_css() {
  e("</style>\n");
}

function html_add_js($src=null, $type='text/javascript', $language='javascript'){
  if (!is_null($src)){
    $src_string = ' src="'.$src.'"';
  } else {
    $src_string = $src;
  }
  e('<script language="'.$language.'" type="'.$type.'"'.$src_string.'>');
}

function html_end_js(){
  e('</script>'."\n");
}

/**
 * HTML Select
 */
function html_select($name, $data, $selected_value, $use_codes=false, $attribs=null)
{
  $xhtml = "";

  $str_attribs = !is_null($attribs) ? $attribs : "";
  $xhtml .=  "<select name=\"$name\" $str_attribs >\n";

  if (is_array($data))
  {
    $xhtml .=  "<option value=\"\">-- Please select --</option>\n";
    if ($use_codes)
    {
      foreach($data as $k => $v)
      {
        if (is_array($v))
        {
          foreach($v as $d => $val)
          {
            $sel = ($data == $selected_value) ? ' selected="selected" ' : "";
            $xhtml .=  "<option value=\"$d\" $sel>$val</option>\n";
          }
        }
        else {
          if(strtoupper($k) == strtoupper($selected_value))
          {
            $sel = " selected=\"selected\" ";
          }
          else
          {
            $sel = " ";
          }
          $xhtml .=  "<option value=\"$k\"$sel>$v</option>\n";
        }
      }
    }
    else
    {
      foreach($data as $k => $v)
      {
        if((strtoupper($k) == strtoupper($selected_value)))
        {
          $sel = " selected=\"selected\" ";
        }
        else
        {
          $sel = " ";
        }

        $xhtml .=  "<option value=\"$k\" $sel >$v</option>\n";
      }
    }
  }
  else
  {
    $xhtml .=  "<option value=\"0\"$sel>None</options>\n";
  }
  $xhtml .=  "</select>";

  return $xhtml;
}

function html_pager($table, $start=0, $limit=20){
  $data = db_select($table);
  $records = count($data);
  $data = db_select($table, null, $start, $limit);
  $pages = (int)($records/$limit);
  if ($pages == 0) $pages = 1
  ?>
<p class="myparagraph">Page 1 of <?php echo ($pages) ?>, showing <?php echo $limit ?> records out of <?php echo (int)$records ?> total, starting on record <?php echo (int)($start+1) ?>, ending on 20</p>
<?php
}

function html_paginator($table, $start=0, $limit=20){
  $data = db_select($table);
  $records = count($data);
  $pages = (int)($records/$limit);
  $total_pages = $records;
  $adjacents = 3;
  //$limit = 2;                 //how many items to show per page
  $page = $_GET['page'];
  if($page)
    $start = ($page - 1) * $limit + 1;      //first item to display on this page
  else
    $start = 0;

  if ($page == 0) $page = 1;          //if no page var is given, default to 1.
  $prev = $page - 1;              //previous page is page - 1
  $next = $page + 1;              //next page is page + 1
  $lastpage = ceil($total_pages/$limit);    //lastpage is = total pages / items per page, rounded up.
  $lpm1 = $lastpage - 1;            //last page minus 1

  $pagination = "";

  $targetpage = "submit.php?action=view";

  if($lastpage > 1)
  {
    $pagination .= "<div class=\"pagination\">";
    //previous button
    if ($page > 1)
      $pagination.= "<a href=\"$targetpage&page=$prev\">« Previous</a>";
    else
      $pagination.= "<span class=\"disabled\">« Previous</span>";

    //pages
    if ($lastpage < 7 + ($adjacents * 2)) //not enough pages to bother breaking it up
    {
      for ($counter = 1; $counter <= $lastpage; $counter++)
      {
        if ($counter == $page)
          $pagination.= "<span class=\"current\">$counter</span>";
        else
          $pagination.= "<a href=\"$targetpage&page=$counter\">$counter</a>";
      }
    }
    elseif($lastpage > 5 + ($adjacents * 2))  //enough pages to hide some
    {
      //close to beginning; only hide later pages
      if($page < 1 + ($adjacents * 2))
      {
        for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
        {
          if ($counter == $page)
            $pagination.= "<span class=\"current\">$counter</span>";
          else
            $pagination.= "<a href=\"$targetpage&page=$counter\">$counter</a>";
        }
        $pagination.= "...";
        $pagination.= "<a href=\"$targetpage&page=$lpm1\">$lpm1</a>";
        $pagination.= "<a href=\"$targetpage&page=$lastpage\">$lastpage</a>";
      }
      //in middle; hide some front and some back
      elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
      {
        $pagination.= "<a href=\"$targetpage&page=1\">1</a>";
        $pagination.= "<a href=\"$targetpage&page=2\">2</a>";
        $pagination.= "...";
        for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
        {
          if ($counter == $page)
            $pagination.= "<span class=\"current\">$counter</span>";
          else
            $pagination.= "<a href=\"$targetpage&page=$counter\">$counter</a>";
        }
        $pagination.= "...";
        $pagination.= "<a href=\"$targetpage&page=$lpm1\">$lpm1</a>";
        $pagination.= "<a href=\"$targetpage&page=$lastpage\">$lastpage</a>";
      }
      //close to end; only hide early pages
      else
      {
        $pagination.= "<a href=\"$targetpage&page=1\">1</a>";
        $pagination.= "<a href=\"$targetpage&page=2\">2</a>";
        $pagination.= "...";
        for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
        {
          if ($counter == $page)
            $pagination.= "<span class=\"current\">$counter</span>";
          else
            $pagination.= "<a href=\"$targetpage&page=$counter\">$counter</a>";
        }
      }
    }

    //next button
    if ($page < $counter - 1)
      $pagination.= "<a href=\"$targetpage&page=$next\">Next »</a>";
    else
      $pagination.= "<span class=\"disabled\">Next »</span>";
    $pagination.= "</div><br />\n";
  }
?>

<div id="paging"><?php  echo $pagination; ?></div>
<?php
}

function html_create_pagination($total, $callback, $numberperpage, $currentpage)
{
  $start=1;
  $end = 9;
  echo '<ul class="pagination">';

  $pages = ceil($total/$numberperpage);

  if($currentpage>5 && $pages>9)
  {
    $start=$currentpage-4;
    $end = $currentpage+4;
  }
  if($end>$pages) $end = $pages;
  if($start>1) {
    echo "<li><a href='{$callback}1' style='cursor:pointer' >&nbsp;&lt;&lt;&nbsp;</a></li>\n";
    //echo "<li>... ...</li>";
  }
  if ($currentpage>1)
  {
    $prev_page = $currentpage-1;
    echo "<li><a href='{$callback}{$prev_page}' style='cursor:pointer' >&nbsp;&lt;&nbsp;</a></li>\n";
  }
  for($i=$start;$i<=$end;$i++)
  {
    $ii = number_to_bunicode($i);
    if($i==$currentpage)
    echo "<li><a href='{$callback}{$i}' class='active' style='cursor:pointer' >{$ii}</a></li>\n";
    else
    echo "<li><a href='{$callback}{$i}' style='cursor:pointer' >{$ii}</a></li>\n";
  }


  if ($currentpage<=($pages-1))
  {
    $nextPage = $currentpage+1;
    echo "<li><a href='{$callback}{$nextPage}' style='cursor:pointer' >&nbsp;&gt;&nbsp;</a></li>\n";
  }
  //if($pages>$end) echo "<li>... ...</li>";
  echo "<li><a href='{$callback}{$pages}' style='cursor:pointer' >&nbsp;&gt;&gt;&nbsp;</a></li>\n";
  echo '</ul>';
}

function html_create_ajax_pagination($total, $callback, $numberperpage, $currentpage)
{
  echo '<ul class="pagination">';

  if ($currentpage>1)
  {
    $prev_page = $currentpage-1;
    echo "<li><a href='#' style='cursor:pointer' onclick='{$callback}({$prev_page});'>Prev</a></li>\n";
  }
  $pages = ceil($total/$numberperpage);


  for($i=1;$i<=$pages;$i++)
  {
    if($i==$currentpage)
    echo "<li><a href='#' class='active' style='cursor:pointer' onclick='{$callback}($i);'>{$i}</a></li>\n";
    else
    echo "<li><a href='#' style='cursor:pointer' onclick='{$callback}($i);'>{$i}</a></li>\n";
  }

  //echo $total;
  if ($currentpage<=($pages))
  {
    $nextPage = $currentpage+1;
    echo "<li><a href='#' style='cursor:pointer' onclick='{$callback}({$nextPage});'>Next</a></li>\n";
  }
  echo '</ul>';
}