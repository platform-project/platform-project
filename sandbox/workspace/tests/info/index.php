<?php
/**
 * Terminal
 * Test case: Determine the optimal approach to implement terminal
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

// initilizing platform for self-contained objects
platform_launch_initialize();

?>
<head>
  <meta charset="UTF-8">
  <title>Platform</title>
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Arizonia' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/screen.css" />
  <link rel="icon" type="image/png" href="favicon.png" />
  <script src="js/modernizr-2.5.3.min.js"></script>
</head>

<style>
@charset "UTF-8";
.octotip {
    position: relative;
    margin: 10px 0;
    padding: 10px 10px 10px 32px;
    color: #25494f;font-size:13px;background:# e5f8fc;
    border: 1px solid# b1ecf8;
    border - radius: 3px;
    box - shadow: inset 0 0 8px rgba(0, 0, 0, 0.08)
}.octotip p {
    margin: 0
}.octotip.tip - flag {
    float: left;
    margin - top: 2px;
    margin - left: -22px;
    color: rgba(37, 73, 79, 0.15)
}.octotip.dismiss {
    position: absolute;
    display: block;
    top: 50 % ;
    right: 5px;
    margin - top: -9px;
    cursor: pointer
}.octotip.dismiss: hover {
    color: #000}.frame .octotip{margin-top:0}.kbd{display:inline-block;padding:3px 5px;color:# 000;
    font - family: Monaco,
    "Liberation Mono",
    Courier,
    monospace;
    font - size: 11px;
    background - color: #e7e7e7;
    background - image: -moz - linear - gradient(#fefefe, #e7e7e7);
    background - image: -webkit - linear - gradient(#fefefe, #e7e7e7);
    background - image: linear - gradient(#fefefe, #e7e7e7);
    background - repeat: repeat - x;
    border: 1px solid# cfcfcf;
    border - radius: 2px
}       .tooltipped {
            position: relative
        }.tooltipped: after,
        .tooltipped: before {
            display: none;
            position: absolute;
            z - index: 1000000;
            pointer - events: none
        }.tooltipped: after {
            content: attr(aria - label); - webkit - font - smoothing: initial;
            font - family: Helvetica,
            arial,
            freesans,
            clean,
            sans - serif;
            font - size: 10px;
            font - weight: normal;
            font - style: normal;
            letter - spacing: normal;
            text - align: center;
            text - decoration: none;
            text - shadow: none;
            text - transform: none;
            line - height: 1.5;
            background: rgba(0, 0, 0, 0.8);
            color: white;
            white - space: pre;
            word - wrap: break -word;
            padding: 5px 8px;
            border - radius: 3px
        }.tooltipped: before {
            width: 0;
            content: '';
            height: 0;
            border: 5px solid transparent;
            z - index: 1000001
        }.tooltipped: hover: before,
        .tooltipped: hover: after,
        .tooltipped: active: before,
        .tooltipped: active: after,
        .tooltipped: focus: before,
        .tooltipped: focus: after {
            display: inline - block;
            text - decoration: none
        }.tooltipped - multiline: hover: after,
        .tooltipped - multiline: active: after,
        .tooltipped - multiline: focus: after {
            display: table - cell
        }.tooltipped - s: after,
        .tooltipped - s: before,
        .tooltipped - se: after,
        .tooltipped - se: before,
        .tooltipped - sw: after,
        .tooltipped - sw: before {
            top: 100 % ;
            right: 50 %
        }.tooltipped - s: before,
        .tooltipped - se: before,
        .tooltipped - sw: before {
            margin - right: -5px;
            top: auto;
            bottom: -5px;
            border - bottom - color: rgba(0, 0, 0, 0.8)
        }.tooltipped - s: after {
            margin - top: 5px
        }.tooltipped - se: after {
            margin - top: 5px;
            right: auto;
            left: 50 % ;
            margin - left: -15px
        }.tooltipped - sw: after {
            margin - top: 5px;
            margin - right: -15px
        }.tooltipped - n: after,
        .tooltipped - n: before,
        .tooltipped - ne: after,
        .tooltipped - ne: before,
        .tooltipped - nw: after,
        .tooltipped - nw: before {
            bottom: 100 % ;
            right: 50 %
        }.tooltipped - n: before,
        .tooltipped - ne: before,
        .tooltipped - nw: before {
            margin - right: -5px;
            top: -5px;
            bottom: auto;
            border - top - color: rgba(0, 0, 0, 0.8)
        }.tooltipped - n: after {
            margin - bottom: 5px
        }.tooltipped - ne: after {
            margin - bottom: 5px;
            left: 50 % ;
            right: auto;
            margin - left: -15px
        }.tooltipped - nw: after {
            margin - bottom: 5px;
            margin - right: -15px
        }.tooltipped - s: after,
        .tooltipped - n: after {
            -webkit - transform: translateX(50 % ); - ms - transform: translateX(50 % );
            transform: translateX(50 % )
        }.tooltipped - w: after,
        .tooltipped - w: before {
            bottom: 50 %
        }.tooltipped - w: after {
            right: 100 % ;
            margin - right: 5px
        }.tooltipped - w: before {
            border - left - color: rgba(0, 0, 0, 0.8);
            left: -5px;
            margin - top: -5px;
            top: 50 %
        }.tooltipped - e: after,
        .tooltipped - e: before {
            bottom: 50 %
        }.tooltipped - e: after {
            left: 100 % ;
            margin - left: 5px
        }.tooltipped - e: before {
            border - right - color: rgba(0, 0, 0, 0.8);
            right: -5px;
            margin - top: -5px;
            top: 50 %
        }.tooltipped - w: after,
        .tooltipped - e: after {
            -webkit - transform: translateY(50 % ); - ms - transform: translateY(50 % );
            transform: translateY(50 % )
        }.tooltipped - multiline: after {
            word - wrap: initial;
            white - space: pre - line;
            word -
            break: break -word;
            max - width: 250px;
            border - collapse: initial;
            width: -moz - max - content;
            width: -webkit - max - content
        }.tooltipped - multiline.tooltipped - s: after,
        .tooltipped - multiline.tooltipped - n: after {
            -webkit - transform: translateX(-50 % )!important; - ms - transform: translateX(-50 % )!important;
            transform: translateX(-50 % )!important;
            right: initial;
            left: 50 %
        }.tooltipped - multiline.tooltipped - w: after,
        .tooltipped - multiline.tooltipped - e: after {
            right: 100 %
        }@
        media screen and(min - width: 0\ 0) {.tooltipped - multiline: after {
                width: 250px
            }
        }.tooltipped - sticky: before,
        .tooltipped - sticky: after {
            display: inline - block
        }.tooltipped - sticky.tooltipped - multiline: after {
            display: table - cell
        }.tooltipped - error: after {
            color: #613a00;background:rgba(245,218,192,0.8)
        }
        .tooltipped-error .tooltipped-s:before,.tooltipped-error .tooltipped-se:before,.tooltipped-error .tooltipped-sw:before
        {
          border-bottom-color:rgba(245,218,192,0.8)
        }.tooltipped-error.tooltipped-n:before,.tooltipped-error.tooltipped-ne:before,.tooltipped-error.tooltipped-nw:before{ 
          order-top-color:rgba(245,218,192,0.8)
        }.tooltipped-error.tooltipped-e:before{
          border-right-color:rgba(245,218,192,0.8)
          }.tooltipped-error.tooltipped-w:before{
          border-left-color:rgba(245,218,192,0.8)
        }.fullscreen-overlay-enabled.dark-theme .tooltipped:after{
          color:black;background:rgba(255,255,255,0.8)
        }
        .fullscreen-overlay-enabled.dark-theme .tooltipped .tooltipped-s:before,.fullscreen-overlay-enabled.dark-theme .tooltipped .tooltipped-se:before,.fullscreen-overlay-enabled.dark-theme .tooltipped .tooltipped-sw:before{border-bottom-color:rgba(255,255,255,0.8)}.fullscreen-overlay-enabled.dark-theme .tooltipped.tooltipped-n:before,.fullscreen-overlay-enabled.dark-theme .tooltipped.tooltipped-ne:before,.fullscreen-overlay-enabled.dark-theme .tooltipped.tooltipped-nw:before{border-top-color:rgba(255,255,255,0.8)}.fullscreen-overlay-enabled.dark-theme .tooltipped.tooltipped-e:before{border-right-color:rgba(255,255,255,0.8)}.fullscreen-overlay-enabled.dark-theme .tooltipped.tooltipped-w:before{border-left-color:rgba(255,255,255,0.8)}

            
</style>

<style>
body {
color: #ddd !important;
background: #eee !important;
border-top: 0px none !important;
}
.quickstart {
background: #00aadd !important;
}
h5.light {
  color: #8497AA;
  font-weight: bold;
}
section.help {
  text-align: center;
}
</style>

<section class="quickstart">
  <div class="grid">
    <div class="unit golden-small center-on-mobiles">
      <h4>How to get started in a <em>nutshell!</em></h4>
    </div>
    <div class="unit golden-large code">
	  <p class="title">Console</p>
	  <div class="shell">
	    <p class="line">
	      <span class="path">~</span>
	      <span class="prompt">$</span>
	      <span class="command">wget http://platform.entilda.com/platform</span>
	    </p>
	    <p class="line">
	      <span class="path">~</span>
	      <span class="prompt">$</span>
	      <span class="command">sudo chmod 0777 ./platform</span>
	    </p>
	    <p class="line">
	      <span class="path">~</span>
	      <span class="prompt">$</span>
	      <span class="command">platform install</span>
	    </p>
	    <p class="line">
	      <span class="output"># =&gt; Now browse to http://platform</span>
	    </p>
	  </div>
	</div>
    <div class="clear"></div>
  </div>
</section>
<section class="help">
  <div class="plugins">
    <h5 class="light">Platform Browser supports the following systems:</h5>
    <div class="plugin-container center">
      <ul class="plugin-logos mb20">
        <li><div class="git"></div></li>
        <li><div class="node"></div></li>
        <li><div class="postgres"></div></li>
        <li><div class="ruby"></div></li>
        <li><div class="scala"></div></li>
        <li><div class="sublime"></div></li>
      </ul>
      <ul class="plugin-logos mb10">
        <li><div class="python"></div></li>
        <li><div class="rubyonrails"></div></li>
        <li><div class="php"></div></li>
        <li><div class="osx"></div></li>
        <li><div class="heroku"></div></li>
        <li><div class="django"></div></li>
      </ul>
    </div>
    <div class="clear"></div>
    <a href="http://git.entilda.com/platform.git" target="_self"><p class="pull-right semi-bold">Check out our Project Homepage</p></a>
  </div>
</section>