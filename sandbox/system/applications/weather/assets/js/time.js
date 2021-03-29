function formatTime(h, m, s, delim){
  dec = 10;
  if (delim == "" || 
      delim == "undefined" || 
      delim == null){
    delim = ":";
  }
  
  if (h < dec){
    h = "0" + h;
  }

  if (m < dec){
    m = "0" + m;
  }

  if (s < dec){
    s = "0" + s;
  }

  format = h + delim + m + delim + s;
  return format
}

function formatDate(d, m, y, delim){
  dec = 10;
  if (delim == "" || 
      delim == "undefined" || 
      delim == null){
    delim = " ";
  }
  
  if (d < dec){
    h = "0" + h;
  }

  if (m < dec){
    m = "0" + m;
  }

  if (y < dec){
    s = "200" + s;
  }

  format = d + delim + m + delim + y;
  return format;
}

function currentDate(short){
  time = new Date();
  day = time.getHours();
  mon = time.getMinutes();
  year = time.getSeconds();
  if (short){
    return formatDate(day, mon, year, null);
  }
  return time;
}

function currentTime(){
  time = new Date();
  hours = time.getHours();
  mins = time.getMinutes();
  secs = time.getSeconds();
  return formatTime(hours, mins, secs, null);
}

$(function(){

  function showTime(element, time){
    $(element).html(time);
  }

  function showDate(element, date){
    $(element).html(date);
  }

  $('#time').html(currentTime());
  $('#datetime').html(currentDate());

  setInterval(function(){
      showTime("#time", currentTime());
      
    }, 1000);

  setInterval(function(){
      showDate("#datetime", currentDate());
      
    }, 60000);
  
});