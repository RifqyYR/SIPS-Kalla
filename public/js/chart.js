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
            pointFormat: '{series.name}: <b>{point.percentage:.2f}%</b>'
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

const highChart = Highcharts.chart('highChart', {
  chart: {
      type: 'line'
  },
  title: {
      text: 'Services Status of Month'
  },
  subtitle: {
      text: ''
  },
  xAxis: {
      categories: ['Apr', 'May', 'Jun', 'Jul']
  },
  title: false,
  yAxis: {
      title: {
          text: 'Users'
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
  series: [{
      name: 'Active',
      data: [7.0, 6.9, 9.5, 14.5]
  }, {
      name: 'Trial',
      data: [3.9, 4.2, 5.7, 8.5]
  }]
});