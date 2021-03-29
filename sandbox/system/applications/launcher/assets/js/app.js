responsiveVoice.speak();
var spacebot = {
    greet: function() {
        this.speak("Hello World");
        console.log("spacebot: greets");
    },
    data: function() {
        var s;
        $.getJSON("assets/speech.json", function(data) {
            s = JSON.parse(data.speech);
            console.log(s);

        });
        return s;
    },
    sleep: function(milliseconds) {
        var currentTime = new Date().getTime();
        while (currentTime + milliseconds >= new Date().getTime()) {}
    },
    ready: function() {
        return $("#spacebot").css("display") == "block";
    },
    speak: function(words) {
        responsiveVoice.speak(words);
        console.log("spacebot: speaks");
    },
    engage: function() {
        var convo = spacebot.data();
        this.speak(convo[0]);
        console.log(convo[0]);
    },
    speech: function() {
        setInterval(function() {
            convo = this.data();
            seed = Math.floor(Math.random() * convo.length);
            console.log(convo[0]);
            this.speak(convo[seed]);
            console.log("spacebot: speaking... " + convo[seed]);
        }, 60000);
    },
    weather: function() {
        var getIP = "http://ip-api.com/json/";
        var openWeatherMap = "http://api.openweathermap.org/data/2.5/weather";
        var report = {
            temperature: 0.0,
            condition: "Waiting for weather report.",
            info: "Good day, the weather looks good today!",
        };

        $.getJSON(getIP).done(function(location) {
            $.getJSON(openWeatherMap, {
                lat: location.lat,
                lon: location.lon,
                units: "metric",
                APPID: "2d5ce3f932555d6c31965c45aab74911"
            }).done(function(weather) {
                console.log(weather);
                report.temperature = weather.main.temp;
                report.condition = weather.weather[0].description;
                report.info = "The weather now is " + temperature + " and current condition is " + description;
            });
        });

        this.speak(report.info);
        console.log('spacebot: weather now');
        return report;
    },
    idle: function() {
        this.speech();
        console.log("spacebot: idle");
    },
    retire: function() {
        this.speak("Goodbye");
        console.log("spacebot: retires");
    }
};

/* particlesJS.load(@dom-id, @path-json, @callback (optional)); */
particlesJS.load("particles-js", "assets/stars.json", function() {
    console.log("callback - particles.js config loaded");
});

$(function() {
    var zoom = 0.0;
    var scale = 0.01;

    /* {[ Atom ]} */
    $(".control.atom").click(function() {
        console.log("atoms: clicked");
    });

    /* {[ Element ]} */
    $(".control.element").click(function() {
        $("#elements").toggle();
        console.log("elements: clicked");
    });

    /* {[ Experiment ]} */
    $(".control.experiment").click(function() {
        console.log("experiment: clicked");
    });

    /* {[ Explorer ]} */
    $(".control.explorer").click(function() {
        $(".galaxy").toggle();
        console.log("explorer: clicked");
    });

    /* {[ Space Bot ]} */
    $(".control.spacebot").click(function() {
        $("#spacebot").toggle();
        if (spacebot.ready()) {
            spacebot.greet();
            spacebot.idle();
        } else {
            spacebot.retire();
        }
    });

    $("#spacebot").click(function() {
        if (spacebot.ready()) {
            spacebot.engage();
        }
        console.log("spacebot: engage");
    });

    $("#spacebot").mouseover(function() {
        if (spacebot.ready()) {
            spacebot.engage();
        }
        console.log("spacebot: mouseover");
    });

    $("#spacebot").mouseout(function() {
        if (spacebot.ready()) {
            spacebot.idle();
        }
        console.log("spacebot: mouseout");
    });

    /* {[ Weather ]} */
    $(".control.weather").click(function() {
        var weather = spacebot.weather();

        setInterval(function() {
            $("span.text.weather span.temperature").html(Math.round(weather.temperature));
            $("span.text.weather span.description").html(weather.condition);
        }, 1000);
        console.log("weather: clicked");
    });

    /* {[ Zoom In ]} */
    $(".control.zoom-in").click(function() {
        zoom = parseFloat($(".galaxy").css("zoom"));
        if (zoom >= 0 || zoom <= 100) {
            zoom += scale;
        }
        console.log("zoom: " + zoom);
        $(".galaxy").css("zoom", zoom);
        $(".galaxy").css("-moz-transform", "scale(" + zoom + ");");
        $(".galaxy").css("-moz-transform-origin", "0 0;");
    });

    /* {[ Zoom Reset ]} */
    $(".control.magnifying-glass").click(function() {
        zoom = 0.0;
        console.log("zoom: " + zoom);
        $(".galaxy").css("zoom", zoom);
        $(".galaxy").css("-moz-transform", "scale(" + zoom + ");");
        $(".galaxy").css("-moz-transform-origin", "0 0;");
    });

    /* {[ Zoom Out ]} */
    $(".control.zoom-out").click(function() {
        zoom = parseFloat($(".galaxy").css("zoom"));
        if (zoom >= 0 || zoom <= 1) {
            zoom -= scale;
        }
        console.log("zoom: " + zoom);
        $(".galaxy").css("zoom", zoom);
        $(".galaxy").css("-moz-transform", "scale(" + zoom + ");");
        $(".galaxy").css("-moz-transform-origin", "0 0;");
    });

    /* {[ Web Orbit ]} */
    $(".control.web").click(function() {
        $("#screen").toggle();
        console.log("web: clicked");
    });
});