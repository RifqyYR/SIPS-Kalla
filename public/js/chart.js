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
                    // pointFormat: '{point.name}: <b>{point.percentage:.2f}%</b>'
                    formatter: function() {
                        return 'Tipe Mobil: <br>' + this.point.name + ': ' + Highcharts.numberFormat(this.percentage, 2) + '%';
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
                            enabled: true,
                            format: '{point.name}:{point.percentage:.2f} %',
                        },
                        showInLegend: true
                    }
                },
                series: [{
                    name: '',
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
