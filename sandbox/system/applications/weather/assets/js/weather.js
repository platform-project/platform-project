const getIP = 'http://ip-api.com/json/';
const openWeatherMap = 'http://api.openweathermap.org/data/2.5/weather';

function getWeatherMap()
{
    $.getJSON(getIP).done(function(location) {
        $.getJSON(openWeatherMap, {
            lat: location.lat,
            lon: location.lon,
            units: 'metric',
            APPID: '2d5ce3f932555d6c31965c45aab74911'
        }).done(function(weather) {
            console.log(weather);
            weather_loc_name = weather.name;
            weather_temp_val = Math.round(weather.main.temp);
            weather_temp_text = weather.weather[0].description;
            weather_icon_url = "http://openweathermap.org/img/wn/" + weather.weather[0].icon + "@2x.png";
            console.log('Weather Icon: ' + weather_icon_url);

            $('span.text.weather span.temperature').html(weather_temp_val);
            $('span.text.weather span.description').html(weather_temp_text);
            $('span.text.weather span.location').html(weather_loc_name);
        });
    });
}

getWeatherMap();

setInterval(function() {
    getWeatherMap();
}, 60000);
