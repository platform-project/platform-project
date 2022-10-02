$(function(){
    var clip = {
        "default": "./globe/assets/clips/earth.mp4",
        "day": "./globe/assets/clips/earth-only.mp4",
        "night": "./globe/assets/clips/earth-night.mp4",
    }

    $('#radar').click(function(){
        $('.camera').toggle();
    });

    $('#satellite').click(function(){
        $('.camera.screen1').css('display', 'block');
        $('.camera.screen2').css('display', 'none');
    });

    $('#iss-satellite').click(function(){
        $('.camera.screen1').css('display', 'none');
        $('.camera.screen2').css('display', 'block');
    });

    letThereBeLight();
    setInterval(function() {
        letThereBeLight();
    }, 60000);

    function isNight(h){
        return (h >= 18 || h <= 5) ? true : false;
    }

    function isDay(h){
        return (h >= 6 || h <= 11) ? true : false;
    }

    function isSunnyDay(h)
    {
        return (h >= 12 || h <= 17) ? true : false;
    }
    
    function letThereBeLight(){
        var t = new Date();
        var h = t.getHours();
        switch(true){
            case isDay(h):
                $('video').attr('src', clip.day)
                break;
            case isNight(h):
                $('video').attr('src', clip.night)
                break;
            case isSunnyDay(h):
                $('video').attr('src', clip.default)
                break;
        }
    }
    
    
})