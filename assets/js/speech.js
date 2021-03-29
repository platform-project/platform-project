$(function(){
    responsiveVoice.speak();
    $('#photo.photo.icon').click(function(){
        responsiveVoice.speak('View your photo gallery!');
    });

    $('#player.player.icon').click(function(){
        responsiveVoice.speak('Watch videos and play music!');
    });

    $('#game.game.icon').click(function(){
        responsiveVoice.speak('Play games!');
    });

    $('#weather.weather.icon').click(function(){
        responsiveVoice.speak('Find out about the weather now!');
    });

    $('#info.info.icon').click(function(){
        responsiveVoice.speak('Find out more information about this Platform instance!');
    });

    $('#info.info.wrapper #location').click(function(){
        responsiveVoice.speak('Find out your location!');
    });

    $('#info.info.wrapper #help').click(function(){
        responsiveVoice.speak('See Documentation!');
    });
});