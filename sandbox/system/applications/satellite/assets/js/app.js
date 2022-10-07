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
        $('.camera.iss.monitor1').css('display', 'none');
        $('.camera.iss.monitor2').css('display', 'none');
    });

    $('#radar').click(function(){
        $('.camera.screen1').toggle();
        $('.camera.screen2').toggle();
        $('.camera.iss.monitor1').toggle();
        $('.camera.iss.monitor2').toggle();
    });

    $('#human').click(function(){
        $('#human').css('display', 'none');
    });

    $('#hud-humanoid').click(function(){
        $('#human').toggle();
    });

    $('#hud-ui').click(function(){
        $('.hud-controls').toggle();
    })

    $('#satellite').click(function(){
        $('#spaceshuttle').css('display', 'none');
        $('.camera.screen1').css('display', 'block');
        $('.camera.screen2').css('display', 'none');
        $('.camera.iss.monitor1').css('display', 'none');
        $('.camera.iss.monitor2').css('display', 'none');
    });

    $('#iss-satellite').click(function(){
        $('#spaceshuttle').css('display', 'none');
        $('.camera.screen1').css('display', 'none');
        $('.camera.screen2').css('display', 'block');
        $('.camera.iss.monitor1').css('display', 'none');
        $('.camera.iss.monitor2').css('display', 'none');
    });

    $('#hud-monitor1').click(function(){
        $('#spaceshuttle').css('display', 'none');
        $('.camera.screen1').css('display', 'none');
        $('.camera.screen2').css('display', 'none');
        $('.camera.iss.monitor1').css('display', 'block');
        $('.camera.iss.monitor2').css('display', 'none');
    });

    $('#hud-monitor2').click(function(){
        $('#spaceshuttle').css('display', 'none');
        $('.camera.screen1').css('display', 'none');
        $('.camera.screen2').css('display', 'none');
        $('.camera.iss.monitor1').css('display', 'none');
        $('.camera.iss.monitor2').css('display', 'block');
    });

    letThereBeLight();
    setInterval(function() {
        letThereBeLight();
    }, 60000);

    //getSatelliteData('a3e376-2c3159', '25544');
    setInterval(function() {
        getSatelliteData('a3e376-2c3159', '25544');
    }, 86400000);

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
    
    function getSatelliteData(key, code)
    {
        key = 'a3e376-2c3159';
        url = 'https://aviation-edge.com/v2/public/satelliteDetails?key='+key+'&code='+code;

        $.get(url, { key: key, code: code}).done(function(data) {
            if (data[0]){
                $('#altitude').html((data[0].result.geography.alt).toFixed(2));
                $('#latitude').html((data[0].result.geography.lat).toFixed(2));
                $('#longitude').html((data[0].result.geography.lon).toFixed(2));
            }
        }).fail(function() {
            console.error( "Failed to access satellite feed." );
        }).always(function() {
            console.log( "Request completed." );
        });
    }
    
})
