$(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var chartDaily = {
        chart: {
            type: 'line',
            renderTo: 'daily'
        },
        title: {
            text: 'Jumlah Kunjungan Harian'
        },
        xAxis: {
            categories: []
        },
        yAxis: {
            title: {
                text: 'Jumlah'
            }
        },
        plotOptions: {
            line: {
                dataLabels: {
                    enabled: true
                },
                enableMouseTracking: false
            }
        },
        series: []
    }

    var charMonthly = {
        chart: {
            type: 'area',
            renderTo: 'monthly'
        },
        title: {
            text: 'JUMLAH KUNJUNGAN PERBULAN'
        },
        xAxis: {
            categories: []
        },
        yAxis: {
            allowDecimals: true,
			min: 0,
			title: {
				text: 'Jumlah'
			}
        },
        tooltip: {
            shared: true,
			valueSuffix: ' '
        },
        plotOptions: {
            area: {
                stacking: 'normal',
                lineColor: '#666666',
                lineWidth: 1,
                marker: {
                    lineWidth: 1,
                    lineColor: '#666666'
                }
            },
            series: {
                dataLabels: {
                    enabled: true
                }
            }					
        },
        responsive: {
            "rules": [
                {
                    "condition": {
                        "maxWidth": "100%"
                    },
                    "chartOptions": {
                        "legend": {
                            "align": "center",
                            "verticalAlign": "bottom",
                            "layout": "horizontal"
                        },
                        "yAxis": {
                            "labels": {
                                "align": "left",
                                "x": 0,
                                "y": -5
                            },
                            "title": {
                                "text": null
                            }
                        },
                        "subtitle": {
                            "text": null
                        },
                        "credits": {
                            "enabled": false
                        }
                    }
                }
            ]
        },        
        series: []
    }

    var chartPerInstansi = {
        chart: {
            type: 'column',
            renderTo: 'bagian-chart'
        },
        title: {
            text: 'JUMLAH KUNJUNGAN PER INSTANSI'
        },
        xAxis: {
            type: 'category'
        },
        yAxis: {
            title: {
                text: 'Jumlah'
            }
    
        },
        legend: {
            enabled: false
        },
        plotOptions: {
            series: {
                borderWidth: 0,
                dataLabels: {
                    enabled: true,
                    format: '{point.y}'
                }
            }
        },
    
        tooltip: {
            headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
            pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y}</b><br/>'
        },
    
        series: [],
        drilldown: {}
    };

    $.ajax({
        type: "POST",
        url: base_url + "/report/daily",
        dataType: "json",
        success: function (response) {
            chartDaily.xAxis.categories = response.categories;
            chartDaily.series = response.series;
            new Highcharts.chart(chartDaily);
        },
        error: function (xhr, status, error) {  
            console.log(error);
        }
    });

    $.ajax({
        type: "POST",
        url: base_url + "/report/monthly",
        dataType: "json",
        success: function (response) {
            charMonthly.xAxis.categories = response.categories;
            charMonthly.series = response.series;
            new Highcharts.chart(charMonthly);
        },
        error: function (xhr, status, error) {  
            console.log(error);
        }
    });

    $.ajax({
        type: "POST",
        url: base_url + "/report/perinstansi",
        data: {
            type: 'column'
        },
        dataType: "json",
        success: function (response) {
            chartPerInstansi.series = response.series;
            chartPerInstansi.drilldown = response.drilldown;
            new Highcharts.chart(chartPerInstansi);
        },
        error: function (xhr, status, error) {  
            console.log(error);
        }
    });
});