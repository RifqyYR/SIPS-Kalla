$(document).ready(function() {
    $.ajax({
        url: '/get-data-pie',
        type: 'GET',
        success: function(data) {
            Highcharts.chart('pieChart', {
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false,
                    type: 'pie',
                },
                title: false,
                tooltip: {
                    formatter: function () {
                        return this.point.name + ' ' + this.y + ': <b>' + this.percentage.toFixed(2) + '%</b>';
                    }
                },
                accessibility: {
                    point: {
                        valueSuffix: '%'
                    }
                },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: false,
                            format: '{point.percentage:.2f} %',
                        },
                        showInLegend: true
                    }
                },
                series: [{
                    name: data.labels,
                    colorByPoint: true,
                    data: data.data
                }]
            });
        }
    });
});

$(document).ready(function() {
    $.ajax({
        url: '/get-data-line',
        type: 'GET',
        success: function(data){
            Highcharts.chart('highChart', {
                chart: {
                    type: 'line'
                },
                title: {
                    text: 'Status Servis per Bulan'
                },
                subtitle: {
                    text: 'Status'
                },
                xAxis: {
                    categories: data.categories
                },
                title: false,
                yAxis: {
                    title: {
                        text: 'Jumlah Data'
                    },
                },
                plotOptions: {
                    line: {
                        dataLabels: {
                            enabled: true
                        },
                        enableMouseTracking: true
                    }
                },
                series: data.series
            });
        }
    })
})
