<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Beranda') }}
        </h2>
    </x-slot>

    <div class="flex flex-col gap-2 mb-6">
        <div class="flex flex-col gap-2 md:flex-row">
            <x-card class="w-full md:w-1/3">
                <x-slot name="title">
                    {{ __('Jumlah Customer') }}
                </x-slot>
                <x-slot name="n_count">
                    {{ __('50') }}
                </x-slot>
                <x-slot name="icon">
                    <img src="ic_user.svg" alt="icon customer" width="30">
                </x-slot>
            </x-card>
            <x-card class="w-full md:w-1/3">
                <x-slot name="title">
                    {{ __('Jumlah Suku Cadang') }}
                </x-slot>
                <x-slot name="n_count">
                    {{ __('20') }}
                </x-slot>
                <x-slot name="icon">
                    <img src="ic_spare-part.svg" alt="icon spare-parts" width="30">
                </x-slot>
            </x-card>
            <x-card class="w-full md:w-1/3">
                <x-slot name="title">
                    {{ __('Jumlah Sales') }}
                </x-slot>
                <x-slot name="n_count">
                    {{ __('9') }}
                </x-slot>
                <x-slot name="icon">
                    <img src="ic_sales.svg" alt="icon sales" width="30">
                </x-slot>
            </x-card>
        </div>
        <div class="flex flex-col gap-2 md:flex-row">
            <x-card class="w-full md:w-1/3">
                <x-slot name="title">
                    {{ __('Jumlah PIC') }}
                </x-slot>
                <x-slot name="n_count">
                    {{ __('10') }}
                </x-slot>
                <x-slot name="icon">
                    <img src="ic_pic.svg" alt="icon pic" width="30">
                </x-slot>
            </x-card>
            <x-card class="w-full md:w-1/3">
                <x-slot name="title">
                    {{ __('Jumlah Promo') }}
                </x-slot>
                <x-slot name="n_count">
                    {{ __('20') }}
                </x-slot>
                <x-slot name="icon">
                    <img src="ic_promo.svg" alt="icon promo" width="30">
                </x-slot>
            </x-card>
            <x-card class="w-full md:w-1/3">
                <x-slot name="title">
                    {{ __('Jumlah Admin') }}
                </x-slot>
                <x-slot name="n_count">
                    {{ __('9') }}
                </x-slot>
                <x-slot name="icon">
                    <img src="ic_admin.svg" alt="icon admin" width="30">
                </x-slot>
            </x-card>
        </div>
    </div>

    <div class="flex flex-col text-gray-900">
        <div class="flex flex-col md:flex-row gap-4">
            <div class="flex flex-col md:basis-3/5">
                <div class="font-semibold text-xl mb-2">Grafik Servis Booking dan Kunjungan</div>
                <div id="highChart" class="bg-white py-4"></div>
            </div>
            <div class="flex flex-col md:basis-2/5">
                <div class="font-semibold text-xl mb-2">Grafik Katalog Mobil</div>
                <div id="pieChart" class="bg-white py-4"></div>
            </div>
        </div>
    </div>

    <script>
        const pieChart = Highcharts.chart('pieChart', {
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
    </script>
</x-app-layout>
