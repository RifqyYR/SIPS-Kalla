<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="flex flex-col text-gray-900 gap-12">
        <div class="flex flex-row w-full gap-20">
            <x-card>
                <x-slot name="title">
                    {{ __('Users') }}
                </x-slot>
                <x-slot name="n_count">
                    {{ __('50') }}
                </x-slot>
            </x-card>
            <x-card>
                <x-slot name="title">
                    {{ __('Suggestions') }}
                </x-slot>
                <x-slot name="n_count">
                    {{ __('50') }}
                </x-slot>
            </x-card>
        </div>
        <div class="flex flex-row w-full gap-16">
            <div id="pieChart1" class="w-full h-72 bg-white p-4 rounded-lg shadow"></div>
            <div id="pieChart2" class="w-full h-72 bg-white p-4 rounded-lg shadow"></div>
            <div id="pieChart3" class="w-full h-72 bg-white p-4 rounded-lg shadow"></div>
        </div>
        <div class="flex justify-center h-96 rounded-lg shadow bg-white">
            <div id="highChart" class="w-full p-4"></div>
        </div>
    </div>

    <script>
        const pieChart1 = Highcharts.chart('pieChart1', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'Booking Services'
            },
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
                        enabled: true,
                        format: '<b>{point.name}</b>: {point.percentage:.2f} %'
                    },
                    showInLegend: true
                }
            },
            series: [{
                name: {!! json_encode($data['labels']) !!},
                colorByPoint: true,
                data: {!! json_encode($data['data']) !!}
            }]
        });

        const pieChart2 = Highcharts.chart('pieChart2', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'Status Services'
            },
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
                        enabled: true,
                        format: '<b>{point.name}</b>: {point.percentage:.2f} %'
                    },
                    showInLegend: true
                }
            },
            series: [{
                name: {!! json_encode($data['labels']) !!},
                colorByPoint: true,
                data: {!! json_encode($data['data']) !!}
            }]
        });

        const pieChart3 = Highcharts.chart('pieChart3', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'Cars Catalogue Type'
            },
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
                        enabled: true,
                        format: '<b>{point.name}</b>: {point.percentage:.2f} %'
                    },
                    showInLegend: true
                }
            },
            series: [{
                name: {!! json_encode($data['labels']) !!},
                colorByPoint: true,
                data: {!! json_encode($data['data']) !!}
            }]
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
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep',
                    'Oct', 'Nov', 'Dec'
                ]
            },
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
                data: [7.0, 6.9, 9.5, 14.5, 18.4, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9,
                    9.6
                ]
            }, {
                name: 'Trial',
                data: [3.9, 4.2, 5.7, 8.5, 11.9, 15.2, 17.0, 16.6, 14.2, 10.3, 6.6, 4.8]
            }]
        });
    </script>
</x-app-layout>
