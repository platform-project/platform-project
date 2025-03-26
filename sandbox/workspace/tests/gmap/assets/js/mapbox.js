mapboxgl.accessToken = 'pk.eyJ1IjoiYmlsZWNrbWUiLCJhIjoiY2x2ZWdoN3A0MDl4MTJscWZ2cnhkcTVrcCJ9.xTSDAZT4nnG4GtkvIcDtGw';

// Automatically prompt user for geolocation on page load
requestUserLocation();

let markers = {}; // Store markers by coordinates

function requestUserLocation() {
    if ("geolocation" in navigator) {
        navigator.geolocation.getCurrentPosition(successLocation, errorLocation, {
            enableHighAccuracy: true
        });
    } else {
        console.log("Geolocation is not supported by your browser.");
    }
}

const coordinatesGeocoder = function (query) {
    const matches = query.match(/^[ ]*(?:Lat: )?(-?\d+\.?\d*)[, ]+(?:Lng: )?(-?\d+\.?\d*)[ ]*$/i);
    if (!matches) {
        return null;
    }
    
    function coordinateFeature(lng, lat) {
        return {
            center: [lng, lat],
            geometry: { type: 'Point', coordinates: [lng, lat] },
            place_name: `Lat: ${lat} Lng: ${lng}`,
            place_type: ['coordinate'],
            properties: {},
            type: 'Feature'
        };
    }
    
    const coord1 = Number(matches[1]);
    const coord2 = Number(matches[2]);
    const geocodes = [];
    
    if (coord1 < -90 || coord1 > 90) {
        geocodes.push(coordinateFeature(coord1, coord2));
    }
    if (coord2 < -90 || coord2 > 90) {
        geocodes.push(coordinateFeature(coord2, coord1));
    }
    if (geocodes.length === 0) {
        geocodes.push(coordinateFeature(coord1, coord2));
        geocodes.push(coordinateFeature(coord2, coord1));
    }
    return geocodes;
};

function successLocation(position) {
    setUpMap([position.coords.longitude, position.coords.latitude]);
}

function errorLocation() {
    setUpMap([28.203828, -25.745353]);
}

function setUpMap(center) {
    const mapStyles = {
        'map_satellite': 'mapbox://styles/mapbox/satellite-streets-v11',
        'map_street': 'mapbox://styles/mapbox/streets-v11',
        'map_night': 'mapbox://styles/mapbox/dark-v10'
    };
    
    let maps = {};
    
    Object.keys(mapStyles).forEach(container => {
        let map = new mapboxgl.Map({
            container: container,
            style: mapStyles[container],
            zoom: 15,
            center: center
        });
        
        maps[container] = map;
        
        map.addControl(new mapboxgl.NavigationControl());
        
        const geocoder = new MapboxGeocoder({
            accessToken: mapboxgl.accessToken,
            localGeocoder: coordinatesGeocoder,
            zoom: 15,
            placeholder: '',
            mapboxgl: mapboxgl,
            reverseGeocode: true
        });
        
        map.addControl(geocoder);
        map.addControl(new MapboxDirections({ accessToken: mapboxgl.accessToken }), 'top-left');
        
        geocoder.on('result', function(e) {
            let coords = e.result.center;
            addMarker(maps, coords);
        });
        
        map.on('contextmenu', function(e) {
            let coords = [e.lngLat.lng, e.lngLat.lat];
            removeMarker(maps, coords);
        });
    });
    
    loadMarkers(maps);
}

function addMarker(maps, coords) {
    let key = coords.join(',');
    
    if (!markers[key]) {
        markers[key] = {};
        
        Object.values(maps).forEach(map => {
            let marker = new mapboxgl.Marker()
                .setLngLat(coords)
                .addTo(map);
            
            markers[key][map.getContainer().id] = marker;
        });
        
        saveToLocalStorage(key);
    }
}

function removeMarker(maps, coords) {
    let key = coords.join(',');
    
    if (markers[key]) {
        Object.values(markers[key]).forEach(marker => marker.remove());
        delete markers[key];
        removeFromLocalStorage(key);
    }
}

function saveToLocalStorage(key) {
    let savedLocations = JSON.parse(localStorage.getItem('savedLocations')) || [];
    if (!savedLocations.includes(key)) {
        savedLocations.push(key);
        localStorage.setItem('savedLocations', JSON.stringify(savedLocations));
    }
}

function removeFromLocalStorage(key) {
    let savedLocations = JSON.parse(localStorage.getItem('savedLocations')) || [];
    localStorage.setItem('savedLocations', JSON.stringify(savedLocations.filter(loc => loc !== key)));
}

function loadMarkers(maps) {
    let savedLocations = JSON.parse(localStorage.getItem('savedLocations')) || [];
    savedLocations.forEach(location => {
        let coords = location.split(',').map(Number);
        addMarker(maps, coords);
    });
}