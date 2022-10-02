<!DOCTYPE html>
<html>
<head>
    <title>Satellite</title>
    <link type="text/css" rel="stylesheet" href="./assets/css/app.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">
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
        <a id="shuttle" href="javascript:{}">
            <div class="control shuttle"></div>
        </a>
        <a id="satellite" href="javascript:{}">
            <div class="control satellite"></div>
        </a> &nbsp;
        <a id="iss-satellite" href="javascript:{}">
            <div class="control iss-satellite"></div>
        </a>
        <span id="datetime" class="current date">
            <div class="control datetime"></div>
        </span>
        <span id="time" class="current time">
            <div class="control time"></div>
        </span>
        </div>
    </div>
</div>
<iframe class="camera screen1" width="100%" height="1096" src="https://www.youtube.com/embed/86YLFOog4GM" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
<iframe class="camera screen2" width="100%" height="1096" src="https://www.youtube.com/embed/Y1qQZbTF8iQ" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
<div id="status"></div>
<script type="text/javascript" src="https://code.responsivevoice.org/responsivevoice.js?key=5znGKiaR"></script>
<script type="text/javascript" src="./assets/js/jquery/3.0.0/jquery.min.js"></script>
<script type="text/javascript" src="./assets/js/time.js"></script>
<script type="text/javascript" src="./assets/js/app.js"></script>
</body>
</html>
<!-- Sources: 
ID: 86YLFOog4GM
ID: Y1qQZbTF8iQ
-->
