$(function () {
  var fileURL = false;
  var URL = window.URL || window.webkitURL;

  $('#addFile').click(function(){
    selection(this, 'file');
    console.log('add file button clicked!');
  });

  $('#addDirectory').click(function(){
    selection(this, 'directory');
  });

  $('.actionButton').click(function () {
     show_previewer(true, '');
     console.log('Plus ebook action button clicked');
   });

   $('#gallery').delegate('a.ebook-item', 'click', function () {
     var url = $(this).attr('data-url');
     var title = $(this).attr('title');
     $('iframe.book').attr('src', url);
     console.log('Clicked on ' + title);
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
          $('iframe.book').attr('src', fileURL);
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
          }
          break;
      }
      
    });

  }

  function show_previewer(show, location){
    $.ajax({ 
      url: '/sandbox/system/applications/ebooks/', 
      type: 'GET', 
      data: 'request=gallery&location='+location,
      success: function(data) {
        if (show){
          $("#gallery").html(data);
        } else {
          $("#gallery").html("");
        }
        
      }, 
    });
  }

});