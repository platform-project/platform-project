Highcharts.chart('container', {

  chart: {
    type: 'bubble',
    plotBorderWidth: 1,
    zoomType: 'xy'
  },

  title: {
    text: 'The Planets in Our Solar System in Order of Size'
  },

  xAxis: {
    visible: false
  },

  yAxis: {
    title: {
      text: null
    },
    visible: false
  },
  legend: {
    enabled: false
  },
  tooltip: {
    useHTML: true,
    headerFormat: null,
    pointFormat: '<b>{point.planet}</b><br/> - Radius: <b>{point.z}km</b> <br/> - Volume: <b>{point.volume}km<sup>2</sup></b>',
  },
  plotOptions:{
  bubble: {backgroundColor:'black'}
  },
  series: [{
    data: [{
      x: 1,
      y: 1,
      z: 69911,
      planet: "Jupiter",
      volume: 1431280,
      color: 'transparent',
      marker: {
        fillColor: {
          radialGradient: {
            cx: 0.4,
            cy: 0.3,
            r: 0.7
          },
          stops: [
            [0, 'rgba(255,255,255,0.5)'],
            [1, Highcharts.Color("#6d4c41").setOpacity(0.5).get('rgba')]
          ]
        }
      }
    }, {
      x: 2,
      y: 1,
      z: 58232,
      planet: "Saturn",
      volume: 827130,
      color: 'transparent',
      marker: {
        fillColor: {
          radialGradient: {
            cx: 0.4,
            cy: 0.3,
            r: 0.7
          },
          stops: [
            [0, 'rgba(255,255,255,0.5)'],
            [1, Highcharts.Color("#E6BE8A").setOpacity(0.5).get('rgba')]
          ]
        }
      }
    }, {
      x: 3,
      y: 1,
      z: 24362,
      planet: "Uranus",
      volume: 68340,
      color: 'transparent',
      marker: {
        fillColor: {
          radialGradient: {
            cx: 0.4,
            cy: 0.3,
            r: 0.7
          },
          stops: [
            [0, 'rgba(255,255,255,0.5)'],
            [1, Highcharts.Color("#ADD8E6").setOpacity(0.5).get('rgba')]
          ]
        }
      }
    }, {
      x: 4,
      y: 1,
      z: 24622,
      planet: "Neptune",
      volume: 62540,
      color: 'transparent',
      marker: {
        fillColor: {
          radialGradient: {
            cx: 0.4,
            cy: 0.3,
            r: 0.7
          },
          stops: [
            [0, 'rgba(255,255,255,0.5)'],
            [1, Highcharts.Color("#C1ECFA").setOpacity(0.5).get('rgba')]
          ]
        }
      }
    }, {
      x: 5,
      y: 1,
      z: 6371,
      planet: "Earth",
      volume: 1083.21,
      color: 'transparent',
      marker: {
        fillColor: {
          radialGradient: {
            cx: 0.4,
            cy: 0.3,
            r: 0.7
          },
          stops: [
            [0, 'rgba(255,255,255,0.5)'],
            [1, Highcharts.Color("#00b0ff").setOpacity(0.5).get('rgba')]
          ]
        }
      }
    }, {
      x: 6,
      y: 1,
      z: 6052,
      planet: "Venus",
      volume: 928.43,
      color: 'transparent',
      marker: {
        fillColor: {
          radialGradient: {
            cx: 0.4,
            cy: 0.3,
            r: 0.7
          },
          stops: [
            [0, 'rgba(255,255,255,0.5)'],
            [1, Highcharts.Color("#ffd600").setOpacity(0.5).get('rgba')]
          ]
        }
      }
    }, {
      x: 7,
      y: 1,
      z: 3390,
      planet: "Mars",
      volume: 163.18,
      color: 'transparent',
      marker: {
        fillColor: {
          radialGradient: {
            cx: 0.4,
            cy: 0.3,
            r: 0.7
          },
          stops: [
            [0, 'rgba(255,255,255,0.5)'],
            [1, Highcharts.Color("#ff5252").setOpacity(0.5).get('rgba')]
          ]
        }
      }
    }, {
      x: 8,
      y: 1,
      z: 2440,
      planet: "Mercury",
      volume: 60.83,
      color: 'transparent',
      marker: {
        fillColor: {
          radialGradient: {
            cx: 0.4,
            cy: 0.3,
            r: 0.7
          },
          stops: [
            [0, 'rgba(255,255,255,0.5)'],
            [1, Highcharts.Color("#bdbdbd").setOpacity(0.5).get('rgba')]
          ]
        }
      }
    }, ],

  }]

});
