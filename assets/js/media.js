$(function () {
   var is_fullscreen = true;
   var fileURL = false;
   var URL = window.URL || window.webkitURL;

  $('#media .controls .play').show();
  $('#media .controls .pause').hide();

  $('#media .music.icon').click(function(){
    show_media();
  });

  $('#media .controls .play').click(function(){
    console.log('play');
    $('#media .controls .play').hide();
    $('#media .controls .pause').show();
    pause_play();
  });

  $('#media .controls .pause').click(function(){
    console.log('pause');
    $('#media .controls .play').show();
    $('#media .controls .pause').hide();
    pause_play();
  });

  $('#media .controls .stop').click(function(){
    console.log('stop');
    $('#media .controls .play').hide();
    $('#media .controls .pause').show();
    stop_play();
  });


  $('#media .controls .eject').click(function(){
    console.log('eject');
    $('#addTrack').click();
  });

  $('#media .controls .scrolling').click(function(){
    console.log('scrolling ticker');
    artwork = '';
    artist = "Artist";
    track = "The track title";

    show_ticker(artwork, artist, track);
  });

  $('#addTrack').click(function(){
    selection(this, 'music');
  });

 /* $('#addFile').click(function(){
    selection(this, 'file');
  });

  $('#addDirectory').click(function(){
    selection(this, 'directory');
  });*/

  function show_media(){
    $('#media .music.wrapper').animate({
        width: [ "toggle", "linear" ],
        opacity: "toggle"
      }, "fast", "linear", function() {
        console.log("Animation complete.");
    });
  }

  function show_ticker(artwork, artist, track) {
    $('#ticker').toggle();
    $('#ticker .album.artwork').html(artwork);
    $('#ticker .album.artist').html(artist);
    $('#ticker .album.track').html(track);
  }

  function pause_play() {
    if ($('audio')[0].paused == false){
      $('audio')[0].pause();
    } else {
      $('audio')[0].play();
    }
  }

  function stop_play() {
    $('audio')[0].pause();
    $("audio").prop("currentTime", 0);
  }

  function selection(element, action){

    $(element).change(function() {
      if (!URL){
        console.warn('Your browser is not supported!');
        return false;
      } else {
        fileURL = URL.createObjectURL(this.files[0]);
      }

      switch (action){
        case 'music':
          $('audio').attr('src', fileURL);
          break;

        case 'file':
          $('video').attr('src', fileURL);
          break;

        case 'directory':
          if (typeof(localStorage) == 'undefined'){
            console.warn('Your browser is not supported!');
            return false;
          } else {
            store =  window.localStorage;
            location  = '' ;
            var collection = this.files; // FileList
            for (var i = 0, f; f = collection[i]; ++i){
              console.log(collection[i].webkitRelativePath);
            }

            //localStorage['gallery'] = fileURL.webkitRelativePath;
          }
          break;
      }

    });

  }

  /*

  // toggle playlist
  $('#controls .playlist').click(function () {
		 console.log('Playlist clicked');
     if ($('#gallery').css('display') == 'none'){
       playlist(true, '');
     } else {
       playlist(false, '');
     }

     $('#gallery').toggle();

   });

   // toggle settings
   $('#controls .settings').click(function () {
     console.log('Settings Toggle clicked');
     show_controls();
   });

    // toggle player
   $('#controls .player').click(function () {
		 console.log('Player Toggle clicked');
     $('video').toggle();
     //$('.splash').toggle();
   });

   // toggle screen
   $('#controls .screen').click(function () {
		 console.log("Screen Toggle clicked")
     fullscreen();
   });

  function playlist(show, location){
    $.ajax({
      url: '/sandbox/system/applications/video/',
      type: 'GET',
      data: 'request=gallery&location'+location,
      success: function(data) {
        if (show){
          $("#gallery .gallery-body").html(data);
        } else {
          $("#gallery .gallery-body").html("");
        }

      },
    });
  }
	*/



});