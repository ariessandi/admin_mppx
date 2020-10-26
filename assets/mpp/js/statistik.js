$(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var chartDaily = {
        chart: {
            type: 'area',
            renderTo: 'daily'
        },
        title: {
            text: null
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

    var chartWeekly = {
        chart: {
            type: 'column',
            renderTo: 'mingguan',
        },
        title: {
            text: null
        },
        xAxis: {
            categories: [
                'Jan',
                'Feb',
                'Mar',
                'Apr',
                'May',
                'Jun',
                'Jul',
                'Aug',
                'Sep',
                'Oct',
                'Nov',
                'Dec'
            ],
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Jumlah'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y}</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            series: {
                borderWidth: 0,
                dataLabels: {
                    enabled: true,
                    format: '{point.y}',
                    style: {
                        fontSize: '9px'
                    }								
                }
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
            text: null
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

    var chartYearly = {
        chart: {
            type: 'areaspline',
            renderTo: 'yearly'
        },
        title: {
            text: null
        },
        xAxis: {
            categories: [],
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

    var chartPerCounter = {
        chart: {
            type: 'column',
            renderTo: 'loket-chart'
        },
        title: {
            text: ''
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
    }

    var chartPerCounterStatus = {
        chart: {
            type: 'column',
            renderTo: 'counterstatus-chart',
        },
        title: {
            text: null
        },
        xAxis: {
            categories: [],
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Jumlah'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y}</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: []
    }

    var chartPerInstansi = {
        chart: {
            type: 'pie',
            renderTo: 'byinstansi-chart'
        },
        title: {
            text: null
        },
    
        plotOptions: {
            series: {
                dataLabels: {
                    enabled: true,
                    format: '{point.name}: {point.y:.1f}%'
                }
            }
        },
    
        tooltip: {
            headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
            pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
        },
    
        series: [],
        drilldown: {}
    }

    var chartPerService = {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie',
            renderTo: 'bylayanan-chart'
        },
        title: {
            text: null
        },
        tooltip: {
            pointFormat: 'Jumlah Kunjungan: <b>{point.y}</b><br>Persentase : <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                }
            }
        },
        series: []
    }

    var chartIkmPerinstansi = {
        chart: {
            type: 'column',
            renderTo: 'ikmperinstansi-chart',
        },
        title: {
            text: null
        },
        xAxis: {
            categories: [],
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Jumlah'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y}</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: []
    }

    var chartIkmPerinstansiQuestion = {
        chart: {
            type: 'column',
            renderTo: 'ikmperinstansiquestion-chart',
        },
        title: {
            text: null
        },
        xAxis: {
            categories: [],
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Jumlah'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y}</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: []
    }

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
        url: base_url + "/report/weekly",
        dataType: "json",
        success: function (response) {
            chartWeekly.series = response;
            new Highcharts.chart(chartWeekly);
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
        url: base_url + "/report/yearly",
        dataType: "json",
        success: function (response) {
            chartYearly.xAxis.categories = response.categories;
            chartYearly.series = response.series;
            new Highcharts.chart(chartYearly);
        },
        error: function (xhr, status, error) {  
            console.log(error);
        }
    });

    $.ajax({
        type: "POST",
        url: base_url + "/report/count-data",
        dataType: "json",
        success: function (response) {
            if (Object.keys(response).length > 0) {
                $('#queueTodayOnline').text(response.queueTodayOnline);
                $('#queueTodaySudahDilayani').text(response.queueTodaySudahDilayani);
                $('#queueTodayBelumDipanggil').text(response.queueTodayBelumDipanggil);
                $("#countAntrian").text(response.queueToday);
            }
        },
        error: function (xhr, status, error) {  
            console.log(error);
        }
    });

    $.ajax({
        type: "POST",
        url: base_url + "/report/perloket",
        dataType: "json",
        success: function (response) {
            chartPerCounter.series = response.series;
            chartPerCounter.drilldown = response.drilldown;
            new Highcharts.chart(chartPerCounter);
        },
        error: function (xhr, status, error) {  
            console.log(error);
        }
    });

    $.ajax({
        type: "POST",
        url: base_url + "/report/perinstansi-counterstatus",
        dataType: "json",
        success: function (response) {
            chartPerCounterStatus.xAxis.categories = response.categories;
            chartPerCounterStatus.series = response.series;
            new Highcharts.chart(chartPerCounterStatus);
        },
        error: function (xhr, status, error) {  
            console.log(error);
        }
    });

    $.ajax({
        type: "POST",
        url: base_url + "/report/perinstansi",
        data: { type: 'pie' },
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
    
    $.ajax({
        type: "POST",
        url: base_url + "/report/perservice",
        dataType: "json",
        success: function (response) {
            chartPerService.series = response.series;
            new Highcharts.chart(chartPerService);
        },
        error: function (xhr, status, error) {  
            console.log(error);
        }
    });

    $.ajax({
        type: "POST",
        url: base_url + "/report/ikm-perinstansi",
        dataType: "json",
        success: function (response) {
            chartIkmPerinstansi.xAxis.categories = response.categories;
            chartIkmPerinstansi.series = response.series;
            new Highcharts.chart(chartIkmPerinstansi);
        },
        error: function (xhr, status, error) {  
            console.log(error);
        }
    });

    $.ajax({
        type: "POST",
        url: base_url + "/report/ikm-perinstansi-question",
        dataType: "json",
        success: function (response) {
            chartIkmPerinstansiQuestion.xAxis.categories = response.categories;
            chartIkmPerinstansiQuestion.series = response.series;
            new Highcharts.chart(chartIkmPerinstansiQuestion);
        },
        error: function (xhr, status, error) {  
            console.log(error);
        }
    });

    $('#loket-daterange').daterangepicker('apply.daterangepicker', function (ev, picker) {  
        let start = formatDate(ev._d),
            end = formatDate(picker._d);

        $.ajax({
            type: "POST",
            url: base_url + "/report/perloket",
            data: {
                date_start: start,
                date_end: end
            },
            dataType: 'json',
            success: function (response) {                
                chartPerCounter.series = response.series;
                chartPerCounter.drilldown = response.drilldown;
                new Highcharts.chart(chartPerCounter);
            },
            error: function (xhr, status, error) {  
                console.log(error);
            }
        });
    });

    $('#counterstatus-daterange').daterangepicker('apply.daterangepicker', function (ev, picker) {  
        let start = formatDate(ev._d);
            end = formatDate(picker._d);

        $.ajax({
            type: "POST",
            url: base_url + "/report/perinstansi-counterstatus",
            data: {
                date_start: start,
                date_end: end
            },
            dataType: 'json',
            success: function (response) {            
                chartPerCounterStatus.xAxis.categories = response.categories;
                chartPerCounterStatus.series = response.series;
                new Highcharts.chart(chartPerCounterStatus);
            },
            error: function (xhr, status, error) {  
                console.log(error);
            }
        });
    });

    $('#byinstansi-daterange').daterangepicker('apply.daterangepicker', function (ev, picker) {  
        let start = formatDate(ev._d);
            end = formatDate(picker._d);

        $.ajax({
            type: "POST",
            url: base_url + "/report/perinstansi",
            data: {
                date_start: start,
                date_end: end,
                type: 'pie'
            },
            dataType: 'json',
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

    $('#bylayanan-daterange').daterangepicker('apply.daterangepicker', function (ev, picker) {  
        let start = formatDate(ev._d);
            end = formatDate(picker._d);

        $.ajax({
            type: "POST",
            url: base_url + "/report/perservice",
            data: {
                date_start: start,
                date_end: end,
            },
            dataType: 'json',
            success: function (response) {            
                chartPerService.series = response.series;
                new Highcharts.chart(chartPerService);
            },
            error: function (xhr, status, error) {  
                console.log(error);
            }
        });
    });

    $('#ikmperinstansi-daterange').daterangepicker('apply.daterangepicker', function (ev, picker) {  
        let start = formatDate(ev._d);
            end = formatDate(picker._d);

        $.ajax({
            type: "POST",
            url: base_url + "/report/ikm-perinstansi",
            data: {
                date_start: start,
                date_end: end
            },
            dataType: 'json',
            success: function (response) {            
                chartIkmPerinstansi.xAxis.categories = response.categories;
                chartIkmPerinstansi.series = response.series;
                new Highcharts.chart(chartIkmPerinstansi);
            },
            error: function (xhr, status, error) {  
                console.log(error);
            }
        });
    });

    $('#ikmperinstansiquestion-daterange').daterangepicker('apply.daterangepicker', function (ev, picker) {  
        let start = formatDate(ev._d);
            end = formatDate(picker._d);

        $.ajax({
            type: "POST",
            url: base_url + "/report/ikm-perinstansi-question",
            data: {
                date_start: start,
                date_end: end,
                question: $('#question').val(),
            },
            dataType: 'json',
            success: function (response) {            
                chartIkmPerinstansiQuestion.xAxis.categories = response.categories;
                chartIkmPerinstansiQuestion.series = response.series;
                new Highcharts.chart(chartIkmPerinstansiQuestion);
            },
            error: function (xhr, status, error) {  
                console.log(error);
            }
        });
    });

    $('#question').on('change', function () {  
        let data = {            
            date_start: formatDate($('#ikmperinstansiquestion-daterange').data('daterangepicker').startDate),
            date_end: formatDate($('#ikmperinstansiquestion-daterange').data('daterangepicker').endDate),
            question: $('#question').val(),
        }

        $.ajax({
            type: "POST",
            url: base_url + "/report/ikm-perinstansi-question",
            data: data,
            dataType: 'json',
            success: function (response) {            
                chartIkmPerinstansiQuestion.xAxis.categories = response.categories;
                chartIkmPerinstansiQuestion.series = response.series;
                new Highcharts.chart(chartIkmPerinstansiQuestion);
            },
            error: function (xhr, status, error) {  
                console.log(error);
            }
        });
    });
});

function formatDate(date) {
    var d = new Date(date),
        month = '' + (d.getMonth() + 1),
        day = '' + d.getDate(),
        year = d.getFullYear();

    if (month.length < 2) 
        month = '0' + month;
    if (day.length < 2) 
        day = '0' + day;

    return [year, month, day].join('-');
}