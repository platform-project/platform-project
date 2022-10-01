<!DOCTYPE html>
<html>
<head>
    <title>Satellite</title>
    <style>
        * {
            padding: 0px;
            margin: 0px;
            overflow: hidden;
        }

        body {
            overflow: hidden;
            background: #000;
        }

        #logo {
            background: #000;
            width: 256px;
            height: 256px;
            border: 10px solid white;
            border-radius: 50%;
            position: absolute;
            z-index: 99;
        }

        #globe {
            width: 100%;
            height: 100%;
            overflow: hidden;
        }

        #nav {
            background: #000;
            width: 100vw;
            height: 8vh;
            position: absolute;
            top: 0;
            z-index: 9;
        }

        #status {
            background: #000;
            width: 100vw;
            height: 8vh;
            position: absolute; 
            bottom: 0;  
            z-index: 9;
        }
    </style>
</head>
<body>
<div id="logo">
    <iframe id="globe" src="globe/index.html"></iframe>
</div>
<div id="nav"></div>
<iframe id="feed" width="100%" height="1096" src="https://www.youtube.com/embed/Y1qQZbTF8iQ" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
<div id="status"></div>
</body>
</html>
