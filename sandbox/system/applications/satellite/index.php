<!DOCTYPE html>
<html>
<head>
    <title>Satellite</title>
    <link type="text/css" rel="stylesheet" href="./assets/css/hud.css" />
    <link type="text/css" rel="stylesheet" href="./assets/css/app.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">
    <style>
    .sketchfab-embed-wrapper {
        position: absolute;
        top: -60px;
        left: -10px;
        z-index: 0;
    }

    .hud-controls {
        position: absolute;
        bottom: 0vh;
        left: 0;
        z-index: 3;
        display: block;
        width: 100vw;
        height: 40vh;
        scale: 90%;
    }

    #console {
        display: block;
        height: 50px;
        width: 64vw;
        position: relative;
        bottom: 12.5vw;
        border: 0px solid lightblue;
        left: 13vw;
        z-index: 10000;
        color: white;
        font-weight: bold;
    }

    #human {
        z-index: 10000;
        position: absolute;
        bottom: 0vh;
        left: 0vw;
        background: transparent url(assets/images/human.gif) no-repeat;
        width: 512px;
        height: 512px;
        opacity: 0.2;
        scale: 50%;
        cursor: pointer;
        display: none;
    }

    #humanoid {
        z-index: 10001;
        position: absolute;
        bottom: -11vh;
        right: 0vw;
        background: transparent url(assets/images/human.webp) no-repeat;
        width: 540px;
        height: 304px;
        scale: 40%;
        cursor: pointer;
    }

    #hud {
        z-index: 100010;
        position: absolute;
        bottom: 100px;
        left: 20vw;
    }

    #calendar {
        display: block;
        height: 8vw;
        width: 9vw;
        position: absolute;
        bottom: 9vw;
        left: 88vw;
        z-index: 10000;
        color: white;
        font-weight: bold;
        background: #000;
        padding: 10px;
        opacity: 0.6;
        border-radius: 10px;
    }
    </style>
</head>
<body>
<a id="radar" href="javascript:{}">
    <video src="./globe/assets/clips/earth-night.mp4" autoplay loop>
        <source src="./globe/assets/clips/earth-night.mp4" type="video/mp4"/>  		
		Your Browser does not support the video element
    </video>
    <iframe id="globe" src="globe/index.html"></iframe>
    <div class="live"><h3 class="title">LIVE</h3></div>
</a>
<div id="nav">
    <div id="nav-controls">
        <span id="time" class="current time">
            <div class="control time"></div>
        </span>
        <a id="shuttle" href="javascript:{}">
            <div class="control shuttle"></div>
        </a>
        <a id="hst-satellite" href="https://isstracker.pl/en?satId=20580&view=3d" target="_blank">
            <div class="control hst-satellite"></div>
        </a>
        <a id="iss-satellite" href="javascript:{}">
            <div class="control iss-satellite"></div>
        </a>
        <a id="satellite" href="javascript:{}">
            <div class="control satellite"></div>
        </a> 
        <span id="datetime" class="current date">
            <div class="control datetime"></div>
        </span>
    </div>
</div>

<div class="hud-controls">
    <div id="human"></div>

    <div id="hud">
        <!--<div class="bkg">
            <div id="circleTransform1" class="bkgCircleTransform">
                <div class="bkgCircle depth1"></div>
                <div class="bkgCircle depth3"></div>
                <div class="bkgCircle depth1"></div>
            </div>
            <div id="circleTransform2" class="bkgCircleTransform">
                <div class="bkgCircle depth2"></div>
                <div class="bkgCircle depth1"></div>
                <div class="bkgCircle depth2"></div>
            </div>
            <div id="circleTransform3" class="bkgCircleTransform">
                <div class="bkgCircle depth3"></div>
                <div class="bkgCircle depth3"></div>
            </div>
        </div>-->
        <div class="container">
            <div id="HUDElt1" class="containerHUD">
                <div id="hudBarGraph" class="hudEltParent">
                    <div class="outlineCorner top left"></div>
                    <div class="outlineCorner top right"></div>
                    <div class="outlineCorner bottom right"></div>
                    <div class="outlineCorner bottom left"></div>
                    <div id="containerGraphBars" class="containerHUDContent">
                        <div class="graphBar"></div>
                        <div class="graphDivider"></div>
                        <div class="graphBar"></div>
                        <div class="graphDivider"></div>
                        <div class="graphBar"></div>
                        <div class="graphDivider"></div>
                        <div class="graphBar"></div>
                        <div class="graphDivider"></div>
                        <div class="graphBar"></div>
                        <div class="graphDivider"></div>
                        <div class="graphBar"></div>
                        <div class="graphDivider"></div>
                        <div class="graphBar"></div>
                        <div class="graphDivider"></div>
                        <div class="graphBar"></div>
                    </div>
                </div>		
            </div>
            <div id="HUDElt2" class="containerHUD">
                <div id="hudCircles" class="hudEltParent">
                    <div class="outlineCorner top left"></div>
                    <div class="outlineCorner top right"></div>
                    <div class="outlineCorner bottom right"></div>
                    <div class="outlineCorner bottom left"></div>
                    <div class="containerHUDContent">
                        <div class="hudCircle">
                            <div class="hudCircleDetail"></div>
                        </div>
                        <div class="hudCircle">
                        </div>
                        <div class="hudCircle r90 back">
                            <div id="sphereStrokeLL" class="sphereStroke LL">
                                <div class="side L"><div class="strokeElt"></div></div>
                            </div>
                            <div id="sphereStrokeL" class="sphereStroke L">
                                <div class="side L"><div class="strokeElt"></div></div>
                            </div>
                            <div id="sphereStrokeR" class="sphereStroke R">
                                <div class="side L"><div class="strokeElt"></div></div>
                            </div>
                            <div id="sphereStrokeRR" class="sphereStroke RR">
                                <div class="side L"><div class="strokeElt"></div></div>
                            </div>
                        </div>
                        <div class="hudCircle">
                            <div id="sphereStrokeLL" class="sphereStroke back LL">
                                <div class="side L"><div class="strokeElt"></div></div>
                            </div>
                            <div id="sphereStrokeL" class="sphereStroke back L">
                                <div class="side L"><div class="strokeElt"></div></div>
                            </div>
                            <div id="sphereStrokeR" class="sphereStroke back R">
                                <div class="side L"><div class="strokeElt"></div></div>
                            </div>
                            <div id="sphereStrokeRR" class="sphereStroke back RR">
                                <div class="side L"><div class="strokeElt"></div></div>
                            </div>
                            <div id="sphereScanner1L" class="sphereStroke back transform">
                                <div id="sphereStrokeScannerL" class="sphereStroke scanner">
                                    <div class="side L"><div class="strokeElt"></div></div>
                                </div>
                            </div>
                            <div id="sphereScanner2L" class="sphereStroke back transform">
                                <div id="sphereStrokeScannerL" class="sphereStroke scanner">
                                    <div class="side L"><div class="strokeElt"></div></div>
                                </div>
                            </div>
                            <div id="sphereScanner3L" class="sphereStroke back transform">
                                <div id="sphereStrokeScannerL" class="sphereStroke scanner">
                                    <div class="side L"><div class="strokeElt"></div></div>
                                </div>
                            </div>
                            <div id="sphereScanner4L" class="sphereStroke back transform">
                                <div id="sphereStrokeScannerL" class="sphereStroke scanner">
                                    <div class="side L"><div class="strokeElt"></div></div>
                                </div>
                            </div>
                            
                            <div class="hudCircle center solid"></div>
                            <div class="hudCircle center"></div>
                            <div class="hudCircle center shine"></div>
                            
                            <div id="sphereStrokeLL" class="sphereStroke front LL">
                                <div class="side R"><div class="strokeElt"></div></div>
                            </div>
                            <div id="sphereStrokeL" class="sphereStroke front L">
                                <div class="side R"><div class="strokeElt"></div></div>
                            </div>
                            <div id="sphereStrokeR" class="sphereStroke front R">
                                <div class="side R"><div class="strokeElt"></div></div>
                            </div>
                            <div id="sphereStrokeRR" class="sphereStroke front RR">
                                <div class="side R"><div class="strokeElt"></div></div>
                            </div>
                            <div id="sphereScanner1R" class="sphereStroke front transform">
                                <div id="sphereStrokeScannerR" class="sphereStroke scanner">
                                    <div class="side R"><div class="strokeElt"></div></div>
                                </div>
                            </div>
                            <div id="sphereScanner2R" class="sphereStroke front transform">
                                <div id="sphereStrokeScannerR" class="sphereStroke scanner">
                                    <div class="side R"><div class="strokeElt"></div></div>
                                </div>
                            </div>
                            <div id="sphereScanner3R" class="sphereStroke front transform">
                                <div id="sphereStrokeScannerR" class="sphereStroke scanner">
                                    <div class="side R"><div class="strokeElt"></div></div>
                                </div>
                            </div>
                            <div id="sphereScanner4R" class="sphereStroke front transform">
                                <div id="sphereStrokeScannerR" class="sphereStroke scanner">
                                    <div class="side R"><div class="strokeElt"></div></div>
                                </div>
                            </div>
                        </div>
                        <div class="hudCircle r90 front">
                            <div id="sphereStrokeLL" class="sphereStroke LL">
                                <div class="side R"><div class="strokeElt"></div></div>
                            </div>
                            <div id="sphereStrokeL" class="sphereStroke L">
                                <div class="side R"><div class="strokeElt"></div></div>
                            </div>
                            <div id="sphereStrokeR" class="sphereStroke R">
                                <div class="side R"><div class="strokeElt"></div></div>
                            </div>
                            <div id="sphereStrokeRR" class="sphereStroke RR">
                                <div class="side R"><div class="strokeElt"></div></div>
                            </div>
                        </div>
                        <div class="hudCircle">
                            <div class="hudCircleDash"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="HUDElt3" class="containerHUD">
                <div id="hudRadar" class="hudEltParent">
                    <div class="outlineCorner top left"></div>
                    <div class="outlineCorner top right"></div>
                    <div class="outlineCorner bottom right"></div>
                    <div class="outlineCorner bottom left"></div>
                    <div class="containerHUDContent">
                        <div id="hudRadarMask">
                            <div id="hudRadarBase"></div>
                            <div id="hudRadarField"></div>
                            <div id="hudRadarGradient"></div>
                            <div id="radarRing1" class="hudRadarRing"></div>
                            <div id="radarRing2" class="hudRadarRing"></div>
                            <div id="radarRing3" class="hudRadarRing"></div>
                            <div id="radarBlip1" class="hudRadarBlip"></div>
                            <div id="radarBlip2" class="hudRadarBlip"></div>
                            <div id="radarBlip3" class="hudRadarBlip"></div>
                            <div id="hudRadarLine"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="HUDElt4" class="containerHUD">
                <div id="hudTerminal" class="hudEltParent">
                    <div class="outlineCorner top left"></div>
                    <div class="outlineCorner top right"></div>
                    <div class="outlineCorner bottom right"></div>
                    <div class="outlineCorner bottom left"></div>
                    <div class="containerHUDContent">
                        <div id="hudTerminalBkg">
                            <div id="hudTerminalCarat"></div>
                            <div id="hudTerminalText">
                                <span class="txtTerminal syntax reserved"></span><span class="txtTerminal declaration"></span><span class="txtTerminal operator"></span><span class="txtTerminal invocation"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>   
    </div>

    <pre id="calendar"></pre>
</div>

<iframe class="camera screen1" width="100%" height="1096" src="https://www.youtube.com/embed/86YLFOog4GM" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
<iframe class="camera screen2" width="100%" height="1096" src="https://www.youtube.com/embed/Y1qQZbTF8iQ" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
<iframe class="camera iss" width="100%" height="1096" src="https://ustream.tv/embed/17074538" scrolling="no" allowfullscreen webkitallowfullscreen frameborder="0" style="border: 0 none transparent;"></iframe>
<div class="sketchfab-embed-wrapper" id="spaceshuttle" style="display: none"> <iframe title="Space Shuttle with boosters" frameborder="0" allowfullscreen mozallowfullscreen="true" webkitallowfullscreen="true" allow="autoplay; fullscreen; xr-spatial-tracking" xr-spatial-tracking execution-while-out-of-viewport execution-while-not-rendered web-share width="1920" height="1080" src="https://sketchfab.com/models/28c98646369f48ee84bc20c267bc685f/embed?ui_infos=0&ui_theme=dark"> </iframe> </div>
<div id="status">
    <iframe id="sphere" src="sphere/index.html" width="256" height="256"></iframe>
    <div id="console"></div>
    <a id="humanoid" href="javascript:{}"></a>
</div>
<script type="text/javascript" src="https://code.responsivevoice.org/responsivevoice.js?key=5znGKiaR"></script>
<script type="text/javascript" src="./assets/js/jquery/3.0.0/jquery.min.js"></script>
<script type="text/javascript" src="./assets/js/calendar.js"></script>
<script type="text/javascript" src="./assets/js/speech.js"></script>
<script type="text/javascript" src="./assets/js/time.js"></script>
<script type="text/javascript" src="./assets/js/hud.js"></script>
<script type="text/javascript" src="./assets/js/app.js"></script>
</body>
</html>
<!-- Sources: 
ID: 86YLFOog4GM
ID: Y1qQZbTF8iQ
-->
