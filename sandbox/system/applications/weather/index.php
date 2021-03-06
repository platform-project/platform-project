<?php
/**
 * Weather
 * Test case: Determine the optimal approach to implement weather
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
<!DOCTYPE html>
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Weather</title>
<link href="./assets/css/coverr.css" rel="stylesheet" type="text/css">

<style>
@font-face {
  font-family: OpenSansSemibold;
  src: url('./assets/fonts/OpenSans/OpenSans-Semibold.ttf');
}

.platform.logo {
  background: transparent url(./assets/images/icons/application-128x128.png) no-repeat;
  width: 128px;
  height: 128px;
  position: fixed;
  bottom: 0px;
  left: 0px;
  opacity: 0.88;
}

* {
  font-family: OpenSansSemibold;
}


body { 
  margin: 0; 
  background: #000;
  font-family: OpenSansSemibold;
  cursor: pointer;
}

video { 
  position: fixed;
  top: 50%;
  left: 50%;
  min-width: 100%;
  min-height: 100%;
  width: auto;
  height: auto;
  z-index: -100;
  -moz-transform: translateX(-50%) translateY(-50%);
  -ms-transform: translateX(-50%) translateY(-50%);
  -webkit-transform: translateX(-50%) translateY(-50%);
  transform: translateX(-50%) translateY(-50%);
  background: url('./assets/images/fullscreen.jpg') no-repeat; 
  background-size: cover;  
  -webkit-transition: 1s opacity; 
  transition: 1s opacity; 
}

div { 
  font-family: Agenda-Light, Agenda Light, Agenda, Arial Narrow, sans-serif;   
  font-weight: 100; 
  background: rgba(0,0,0,0.3); 
  color: white; 
  padding: 2rem; 
  width: 33%; 
  margin: 2rem; 
  float: right; 
  font-size: 1.2rem; 
}

h1 { 
  font-size: 3rem; 
  text-transform: uppercase; 
  margin-top: 0; 
  letter-spacing: .3rem; 
  width: 232px;
  background: rgba(0,0,0,0.25);
  border-radius: 5px;
}

a { 
  display: inline-block; 
  color: #fff; 
  text-decoration: none; 
  background: rgba(0,0,0,0.5); 
  padding: .5rem; 
  -webkit-transition: .6s background; 
  transition: .6s background; 
  font-family: Arial;
}

a:hover { 
  background: rgba(0,0,0,0.9); 
}

.stopfade { opacity: .5; }

#motion {
  border-radius: 5px; 
  display: none;
}

#motion button { 
  display: block;
  width: 80%;
  padding: .4rem;
  border: none; 
  margin: 1rem auto; 
  font-size: 1.3rem;
  background: rgba(255,255,255,0.23);
  color: #fff;
  border-radius: 3px; 
  cursor: pointer;
  -webkit-transition: .3s background;
  transition: .3s background;
}

div#motion:hover { 
  display: block;
}
#motion button:hover { 
  /*background: rgba(0,0,0,0.5);*/
}

 #time {
  font-size: 8rem; 
  text-transform: uppercase; 
  margin-top: 0; 
  letter-spacing: .3rem; 
  width: 600px;
  background: rgba(0,0,0,0.5);
  border-radius: 5px;
  padding: 2px 10px;
}

#datetime {
  background: rgba(0,0,0,0.8);
  border-radius: 5px;
  padding: 5px;
  position: absolute;
  top: 0px;
  float: left;
}

div.controls {
  display: block;
  background: transparent;
  float: left;
  position: absolute;
}

div.controls a.icon.weather {
  width: 100px;
  height: 100px;
  display: block;
  position: absolute;
  top: 0px;
  left: 10px;
  float: left;
  cursor: pointer;
  opacity: 0.5;
  border: 0px;
  border-radius: 32px;
}

div.controls .text.weather { 
  display: inline;
  position: absolute;
  top: 10px;
  left: 132px;
  float: left;
  font-size: 36px;
  line-height: 10px;
  opacity: 0.8;  
  border-radius: 5px;
  padding: 5px 5px 20px 5px;
}

div.controls .text.weather .description { 
  font-size: 12pt;
  position: absolute;
  top: 40px;
  left: 8px;
  width: 240px;
}

div.controls .text.weather .location { 
  font-size: 12pt;
  position: absolute;
  top: 60px;
  left: 8px;
  width: 240px;
}

.navigation {
  position: relative;
  top: -110px;
}

div.quotes.frame {
  background: rgba(0, 0, 0, 0.5);
  width: 90%;
  padding: 10px;
  border-radius: 5px;
  position: relative;
  top: -80px;
  display: none;
}

@media screen and (max-width: 500px) { 
  div{width:70%;} 
}

@media all and (max-device-width: 800px) {
  body { background: url("./assets/images/fullscreen.jpg") #000 no-repeat center center fixed; background-size: cover; }
  #bgvid, #motion button { display: none; }
  div{width:70%;} 
}

</style>
  <!--<script type="text/javascript" src="assets/js/jquery/3.0.0/jquery.min.js"></script>-->
  <script src="./assets/js/jquery/2.2.2/jquery.min.js"></script>
  <script src='https://code.responsivevoice.org/responsivevoice.js?key=5znGKiaR'></script>
  </head>
  <body>
  <video autoplay="" loop="" poster="./assets/images/fullscreen.jpg" id="bgvid" class="clip" src="./assets/videos/13.motion-bg.mp4">
    <source src="./assets/videos/13.motion-bg-vp9.webm" type="video/webm; codecs=vp9">
    <source src="./assets/videos/13.motion-bg-vp8.webm" type="video/webm">
    <source src="./assets/videos/13.motion-bg.mp4" type="video/mp4">
  </video> 
  <span class="display">
    <div class="controls">
      <span class="text weather"><span class="temperature">6</span> <sup>o</sup>C <span class="description">partly cloudy</span></span>
      <a class="icon weather"><img class="glyph" src="http://openweathermap.org/img/wn/02n@2x.png" /></a>
      <span class="text weather"><span class="location"></span></span>
    </div>
  </span>
  <div id="motion" onclick="">

    <!--<h1 id="title" class="title"></h1>

    <h2 id="subtitle" class="subtitle"></h2>-->

    <p id="time" class="time"></p>

    <p id="datetime" class="datetime"></p>
    
    <p class="navigation menu">      
      <!--<a class="item articles" href="javascript:{}">Articles</a>&nbsp;
      <a class="item news" href="javascript:{}">News</a>&nbsp;-->
      <a class="item quotes" href="javascript:{}">Quotes</a>&nbsp;
      <a class="item weather" href="javascript:{}">Weather</a>
    </p>

    <p>
      <div class="frame quotes">
        <p><em class='quote'></em></p>
        <p><strong> - <span class='author'></span></strong></p>

      <!-- Quotes 
      http://brightdrops.com/inspiring-walt-disney-quotes
      -->
      </div>
    </p>

    <button>Day Motion</button>
  </div>

  <!--<div class="platform logo"></div>-->
  <script>
  responsiveVoice.speak();
  var video = document.getElementById("bgvid"),
  pauseButton = document.querySelector("#motion button");

  function vidFade() {
    video.classList.add("stopfade");
  }

  video.addEventListener('ended', function(){
    // only functional if "loop" is removed 
    video.pause();
    vidFade();
  }, false); 
   
  pauseButton.addEventListener("click", function() {
    video.classList.toggle("stopfade");
    if (video.paused) {
      video.play();
      pauseButton.innerHTML = "Day Motion";
    } else {
      video.pause();
      pauseButton.innerHTML = "Night Still";
    }
  }, false);

  video.addEventListener('touchstart', function(e) {
    e.preventDefault();
    video.play();
  });
  </script>
  <script type="text/javascript" src="./assets/js/fullscreen.js"></script>
  <script type="text/javascript" src="./assets/js/clips.js"></script>
  <script type="text/javascript" src="./assets/js/ga.js"></script>
  <script type="text/javascript" src="./assets/js/time.js"></script>
  <script type="text/javascript" src="./assets/js/quotes.js"></script>
  <script type="text/javascript" src="./assets/js/weather.js"></script>
  </body>
  </html>
