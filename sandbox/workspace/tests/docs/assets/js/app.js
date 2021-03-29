$(function(){  
  var map;
  var origin = null;
  var destination = null;
  var waypoints = [];
  var markers = [];
  var directionsDisplay;
  var directionsService = new google.maps.DirectionsService();
  var directionsVisible = false;
  var offline = false;
  
  function initialize() {
    var coords = loadDefault();
    if (navigator.geolocation){
      navigator.geolocation.getCurrentPosition(getPosition, showError);   
    } else {
      console.warn('Geolocation is not supported by this browser.');
      coords = loadDefault();
      offline = true;
    }
    return coords;
  }

  function loadDefault(){
    var coords = [0.00000, 0.00000];
    coords = [-25.91330, 28.1330]; // default 1
    coords = [-25.91290, 28.1385]; // default 2
    setPosition(coords);
    return coords;
  }
    
  function showError(error) {
    switch(error.code) {
      case error.PERMISSION_DENIED:
        console.warn('User denied the request for Geolocation.');
        break;
      case error.POSITION_UNAVAILABLE:
        console.warn('Location information is unavailable.');
        break;
      case error.TIMEOUT:
        console.warn('The request to get user location timed out.');
        break;
      case error.UNKNOWN_ERROR:
        console.warn('An unknown error occured.');
        break;
    }
    return loadDefault();
  }
    
  function getPosition(position) {
    var coords = [position.coords.latitude, position.coords.longitude];
    setPosition(coords)
    return coords;
  }

  function setPosition(coords){
    renderMap(coords);
  }

  function renderMap(coords) {
    
    directionsDisplay = new google.maps.DirectionsRenderer();
    var mapOptions = {
      center: new google.maps.LatLng(coords[0], coords[1]),
      zoom: 18,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);
    directionsDisplay.setMap(map);
    directionsDisplay.setPanel(document.getElementById("directions_panel"));

    google.maps.event.addListener(map, 'click', function(event) {
      if (origin == null) {
        origin = event.latLng;
        addMarker(origin);
      } else if (destination == null) {
        destination = event.latLng;
        addMarker(destination);
      } else { 
        if (waypoints.length < 9) {
          waypoints.push({ location: destination, stopover: true });
          destination = event.latLng;
          addMarker(destination);
        } else {
          console.warn("Maximum number of waypoints reached");
        }
      }
    });
  }
  
  function addMarker(latlng) {
    markers.push(new google.maps.Marker({
      position: latlng, 
      map: map,
      icon: "http://maps.google.com/mapfiles/marker" + String.fromCharCode(markers.length + 65) + ".png"
      })
    );    
  }

  function clearMarkers() {
    for (var i = 0; i < markers.length; i++) {
      markers[i].setMap(null);
    }
  }

  function clearWaypoints() {
    markers = [];
    origin = null;
    destination = null;
    waypoints = [];
    directionsVisible = false;
  }

  function reset() {
    clearMarkers();
    clearWaypoints();
    directionsDisplay.setMap(null);
    directionsDisplay.setPanel(null);
    directionsDisplay = new google.maps.DirectionsRenderer();
    directionsDisplay.setMap(map);
    directionsDisplay.setPanel(document.getElementById("directions_panel"));    
  }

  function setPanel(coords){
    $('span.coords.latitude').html(coords[0]);
    $('span.coords.longitude').html(coords[1]);
    console.log(coords);
    return coords;
  }

  window.setInterval(setPanel(initialize()), 1000);
});