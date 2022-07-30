(async () => {

    const topology = await fetch(
        'https://code.highcharts.com/mapdata/countries/ng/ng-all.topo.json'
    ).then(response => response.json());

    // Prepare demo data. The data is joined to map using value of 'hc-key'
    // property by default. See API docs for 'joinBy' for more info on linking
    // data and map.
    
    const data = [
        ['ng-ri', 3], ['ng-kt', 0], ['ng-so', 0], ['ng-za', 0],
        ['ng-yo', 0], ['ng-ke', 0], ['ng-ad', 0], ['ng-bo', 0],
        ['ng-ak', 0], ['ng-ab', 0], ['ng-im', 0], ['ng-by', 0],
        ['ng-be', 0], ['ng-cr', 0], ['ng-ta', 0], ['ng-kw', 0],
        ['ng-la', 8],  ['ng-ni', 0],  ['ng-fc', 2],  ['ng-og', 0],
        ['ng-on', 0], ['ng-ek', 0], ['ng-os', 0], ['ng-oy', 2],
        ['ng-an', 0], ['ng-ba', 0], ['ng-go', 0], ['ng-de', 1],
        ['ng-ed', 0], ['ng-en', 0], ['ng-eb', 0], ['ng-kd', 0],
        ['ng-ko', 0], ['ng-pl', 0], ['ng-na', 0], ['ng-ji', 0],
        ['ng-kn', 0]
    ];


    // Create the chart
    Highcharts.mapChart('visitorMap', {
        chart: {
            map: topology
        },

        title: {
            text: ''
        },

        // subtitle: {
        //     text: 'Source map: <a href="http://code.highcharts.com/mapdata/countries/ng/ng-all.topo.json">Nigeria</a>'
        // },

        mapNavigation: {
            enabled: true,
            buttonOptions: {
                verticalAlign: 'bottom'
            }
        },

        colorAxis: {
            min: 0
        },

        series: [{
            data: data,
            name: 'Random data',
            states: {
                hover: {
                    color: '#BADA55'
                }
            },
            dataLabels: {
                enabled: true,
                format: '{point.name}'
            }
        }]
    });

})();
