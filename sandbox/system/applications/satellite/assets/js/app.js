$(function(){
    var clip = {
        "default": "./globe/assets/clips/earth.mp4",
        "day": "./globe/assets/clips/earth-only.mp4",
        "night": "./globe/assets/clips/earth-night.mp4",
    }

    $('#shuttle').click(function(){
        $('#spaceshuttle').css('display', 'block');
        $('.camera.screen1').css('display', 'none');
        $('.camera.screen2').css('display', 'none');
        $('.camera.iss').css('display', 'none');
    });

    $('#radar').click(function(){
        $('.camera.screen1').toggle();
        $('.camera.screen2').toggle();
        $('.camera.iss').toggle();
    });

    $('#satellite').click(function(){
        $('#spaceshuttle').css('display', 'none');
        $('.camera.screen1').css('display', 'block');
        $('.camera.screen2').css('display', 'none');
        $('.camera.iss').css('display', 'none');
    });

    $('#iss-satellite').click(function(){
        $('#spaceshuttle').css('display', 'none');
        $('.camera.screen1').css('display', 'none');
        $('.camera.screen2').css('display', 'block');
        $('.camera.iss').css('display', 'none');
    });

    letThereBeLight();
    setInterval(function() {
        letThereBeLight();
    }, 60000);

    function isNight(h){
        return (h >= 18 && h <= 5) ? true : false;
    }

    function isDay(h){
        return (h >= 6 && h <= 11) ? true : false;
    }

    function isSunnyDay(h)
    {
        return (h >= 12 && h <= 17) ? true : false;
    }
    
    function letThereBeLight(){
        var t = new Date();
        var h = t.getHours();
        switch(true){
            case isDay(h):
                $('video').attr('src', clip.day)
                console.log('Day time is ' + h)
                break;
            case isNight(h):
                $('video').attr('src', clip.night)
                console.log('Night time is ' + h)
                break;
            case isSunnyDay(h):
                $('video').attr('src', clip.default)
                console.log('Afternoon time is ' + h);
                break;
        }
    }
    
    
})
