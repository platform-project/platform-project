mapboxgl.accessToken = 'pk.eyJ1IjoiYmlsZWNrbWUiLCJhIjoiY2xpZnNqaGF0MDNmcjNqcDU2bXBqOWN5MSJ9.92JMqMMFOZjX_otoyX67zA';

navigator.geolocation.getCurrentPosition( successLocation, errorLocation, { enableHighAccuracy: true });

function successLocation(position){
    setUpMap([position.coords.longitude, position.coords.latitude]);
}

function errorLocation(){
    setUpMap([0, 0]);
}

function setUpMap(center){

    // satellite view`
    var map_satellite = new mapboxgl.Map({
        container: 'map_satellite',
        style: 'mapbox://styles/mapbox/satellite-streets-v11',
        zoom: 17,
        center: center
    });

    map_satellite.addControl(new mapboxgl.NavigationControl());

    map_satellite.addControl(new MapboxDirections({
            accessToken: mapboxgl.accessToken
        }), 
        'top-left'
    );

    // streets view
    var map_street = new mapboxgl.Map({
        container: 'map_street',
        style: 'mapbox://styles/mapbox/streets-v11',
        zoom: 17,
        center: center
    });

    map_street.addControl(new mapboxgl.NavigationControl());

    map_street.addControl(new MapboxDirections({
            accessToken: mapboxgl.accessToken
        }), 
        'top-left'
    );

    // night view
    var map_night = new mapboxgl.Map({
        container: 'map_night',
        style: 'mapbox://styles/mapbox/dark-v10',
        zoom: 17,
        center: center
    });

    map_night.addControl(new mapboxgl.NavigationControl());

    map_night.addControl(new MapboxDirections({
            accessToken: mapboxgl.accessToken
        }), 
        'top-left'
    );
}