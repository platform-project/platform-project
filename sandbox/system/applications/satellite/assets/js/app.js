$(function(){
    var t = new Date();
    var clip = {
        "default": "./globe/assets/clips/earth.mp4",
        "day": "./globe/assets/clips/earth-only.mp4",
        "night": "./globe/assets/clips/earth-night.mp4",
    }

    h = t.getHours();
    $('#logo').click(function(){
        $('.camera').toggle();
    });

    function isNight(){
      return (h >= 18 || h <= 6) ? true : false;
    }

    if (isNight()){
        $('video').attr('src', clip.night)
    } else {
        $('video').attr('src', clip.day)
    }
    
})