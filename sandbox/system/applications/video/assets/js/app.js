$(function () {
  var is_fullscreen = true;
  var fileURL = false;
  var URL = window.URL || window.webkitURL;
    
   $('#gallery').resizable().draggable();
   $('#gallery div.clip').resizable().draggable();

    $('#gallery div.gallery-body').delegate('a.clip-item', 'click', function () {
		  console.log('Movie clip clicked');
      src = $(this).attr('data-url');
      track = $(this).attr('title');
      image = $(this).find('img').attr('src');
      console.log(image);
      message = '<div style="text-align: center"><br />' + '<img src="' + image + '" style="width: 160px; height: 90px;" />' + '<br />' + track + '</div>';
      show_ticker(message);
		  console.log(src);
      show_clip(src);
      
      $('#ytplayer').hide();
   });	

    $('#playURL').click(function(){
      // Get the YouTube URL from the input field
      var videoUrl = $('#url').val();

      // Check if videoUrl is empty or undefined
      if (!videoUrl) {
          videoUrl = "https://youtube.com/watch?v=xWtziJdp9Vg"; // Default URL
      }

      // Extract the video ID using a regular expression
      var videoId = videoUrl.split('v=')[1];
      if (videoId) {
          var ampersandPosition = videoId.indexOf('&');
          if(ampersandPosition !== -1) {
              videoId = videoId.substring(0, ampersandPosition);
          }
      }

      // Create the iframe embed URL
      var embedUrl = "https://www.youtube.com/embed/" + videoId;

      // Create the iframe embed URL
      var embedUrl = "https://www.youtube.com/embed/" + videoId;
      $('#ytplayer').attr('src', embedUrl);
      $('#ytplayer').show();
      $('#domain').hide();
      $('#splash').hide();
      $('#video').hide();
  });

  $('#addURL').click(function(){
    $('#domain').toggle();
    $('#video').hide();
    $('#splash').hide();
  });

  $('#addFile').click(function(){
    selection(this, 'file');
  });

  $('#addDirectory').click(function(){
    selection(this, 'directory');
  });

  function selection(element, action){
    
    $(element).change(function() {
      if (!URL){
        console.warn('Your browser is not supported!');
        return false;
      } else {
        fileURL = URL.createObjectURL(this.files[0]);
      } 

      switch (action){
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

  // toggle playlist
  $('#controls .playlist').click(function () {
		 console.log('Playlist clicked');
     if ($('#gallery').css('display') == 'none'){
       playlist(true, '');
     } else {
       playlist(false, '');
     }
      show_ticker("Please wait a few seconds for video clips to load!");
      $('#domain').hide();
      $('#gallery').toggle();
      $('video').show();
      $('.splash').hide();
      $('#ytplayer').hide();
     
   });

   // toggle settings
   $('#controls .settings').click(function () {
     console.log('Settings Toggle clicked');
     show_controls();
   });
    
    // toggle player
   $('#controls .player').click(function () {
		 console.log('Player Toggle clicked');
     $('#domain').hide();
     $('#gallery').show();
     $('video').toggle();
     $('.splash').toggle();
     $('#ytplayer').hide();
   });

   // toggle viewer
   $('#controls .viewer').click(function(){
    console.log('Viewer Toggle clicked');
    $('#domain').toggle();
    $('#gallery').hide();
    $('video').hide();
    $('.splash').hide();
    $('#ytplayer').show();
  });
    
   // toggle screen
   $('#controls .screen').click(function () {
		 console.log("Screen Toggle clicked")
     fullscreen();
   });

  function show_ticker(message) {
    message = '<span style="color: white; font-size: 12px;">'+ message + '</span>';
    $('#ticker').jGrowl(message,
      {
        header: '<span style="color: white; font-size: 17px;"><strong>Loading...</strong></span>',
        lifetime: 2500,
        sticky: false
      }
    );
  } 

  function show_controls() {
    if ($('video').attr('controls') == ''){
      $('video').attr('controls', 'controls')
    } else {
      $('video').attr('controls', '')
    }
  }

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
		
	function fullscreen() {
		if (is_fullscreen){
			is_fullscreen = false;
			set_screen('video', 800, 400);
			adjust_screen('video', is_fullscreen);
	  } else {
			is_fullscreen = true;
			set_screen('video', window.innerWidth, window.innerHeight - 48);
			adjust_screen('video', is_fullscreen);
	  }	
	}
 
  function adjust_screen(element, is_fullscreen) {
    if (is_fullscreen) {
      $(element).css('position', 'relative');
      $(element).css('top', '0px');
      $(element).css('border', '0px');
    } else {
      $(element).css('position', 'absolute');
      $(element).css('top', '0px');
      $(element).css('border', '1px solid #444');
    }
  }
    
  function set_screen(element, w, h) {
    $(element).css('width', w);
    $(element).css('height', h);
  }

  function show_clip(src) {
    markup = '<video controls name="media"><source src="' + src + '" type="video/webm"></video>';
    $('#player').html(markup);
  }

}); 
