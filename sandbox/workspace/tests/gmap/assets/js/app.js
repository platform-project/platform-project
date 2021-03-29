$(function(){  
  var map;
  var radar;
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
    renderMap(coords);
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
    renderMap(coords);
    return coords;
  }

  function renderMap(coords) {
    
    directionsDisplay = new google.maps.DirectionsRenderer();
    var mapOptions = {
      center: new google.maps.LatLng(coords[0], coords[1]),
      zoom: 18,
      mapTypeId: google.maps.MapTypeId.ROADMAP,
    };

    map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);

    radar = addRadar(map, mapOptions, 50, '#0000FF');

    directionsDisplay.setMap(map);
    directionsDisplay.setPanel(document.getElementById("directions_panel"));
    showCoordinates(radar);

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

    google.maps.event.addListener(map, 'dragend', function(event) { 
      showCoordinates();
      moveRadar(map, radar);
    });

  }

  function addRadar(map, mapOptions, radius, color){

    var centerPoint = {
      strokeColor: color,
      strokeOpacity: 0.5,
      strokeWeight: 2,
      fillColor: color,
      fillOpacity: 0.25,
      map: map,
      center: mapOptions.center,
      radius: radius
    };

    radar = new google.maps.Circle(centerPoint);

    return radar;
  }

  function moveRadar(map, radar){

    var a = radar.radius;
    var p = map.getCenter();
    var g = p.lat();
    var m = p.lng();    
    radar.setCenter(new google.maps.LatLng(g,m));
    //radar.setRadius(a+=10);
    map.panTo(new google.maps.LatLng(g,m));

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

  function showCoordinates(radar){
    center = map.getCenter();
    $('span.coords.latitude').html(center.k.toFixed(5));
    $('span.coords.longitude').html(center.D.toFixed(5));
    latlng = new google.maps.LatLng(center.k, center.D)
  }

  initialize();
});