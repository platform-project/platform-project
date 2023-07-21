mapboxgl.accessToken = 'pk.eyJ1IjoiYmlsZWNrbWUiLCJhIjoiY2xpZnNqaGF0MDNmcjNqcDU2bXBqOWN5MSJ9.92JMqMMFOZjX_otoyX67zA';

navigator.geolocation.getCurrentPosition( successLocation, errorLocation, { enableHighAccuracy: true });

/* Given a query in the form "lng, lat" or "lat, lng"
* returns the matching geographic coordinate(s)
* as search results in carmen geojson format,
* https://github.com/mapbox/carmen/blob/master/carmen-geojson.md */
const coordinatesGeocoder = function (query) {
    // Match anything which looks like
    // decimal degrees coordinate pair.
    const matches = query.match(
    /^[ ]*(?:Lat: )?(-?\d+\.?\d*)[, ]+(?:Lng: )?(-?\d+\.?\d*)[ ]*$/i
    );
    if (!matches) {
        return null;
    }
     
    function coordinateFeature(lng, lat) {
        return {
            center: [lng, lat],
            geometry: {
                type: 'Point',
                coordinates: [lng, lat]
            },
            place_name: 'Lat: ' + lat + ' Lng: ' + lng,
            place_type: ['coordinate'],
            properties: {},
            type: 'Feature'
        };
    }
     
    const coord1 = Number(matches[1]);
    const coord2 = Number(matches[2]);
    const geocodes = [];
     
    if (coord1 < -90 || coord1 > 90) {
        // must be lng, lat
        geocodes.push(coordinateFeature(coord1, coord2));
    }
     
    if (coord2 < -90 || coord2 > 90) {
        // must be lat, lng
        geocodes.push(coordinateFeature(coord2, coord1));
    }
     
    if (geocodes.length === 0) {
        // else could be either lng, lat or lat, lng
        geocodes.push(coordinateFeature(coord1, coord2));
        geocodes.push(coordinateFeature(coord2, coord1));
    }
     
        return geocodes;
};

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

    map_satellite.addControl(
        new MapboxGeocoder({
                accessToken: mapboxgl.accessToken,
                localGeocoder: coordinatesGeocoder,
                zoom: 17,
                placeholder: '',
                mapboxgl: mapboxgl,
                reverseGeocode: true
            })
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

    map_street.addControl(
        new MapboxGeocoder({
                accessToken: mapboxgl.accessToken,
                localGeocoder: coordinatesGeocoder,
                zoom: 17,
                placeholder: '',
                mapboxgl: mapboxgl,
                reverseGeocode: true
            })
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

    map_night.addControl(
        new MapboxGeocoder({
                accessToken: mapboxgl.accessToken,
                localGeocoder: coordinatesGeocoder,
                zoom: 17,
                placeholder: '',
                mapboxgl: mapboxgl,
                reverseGeocode: true
            })
        );
}