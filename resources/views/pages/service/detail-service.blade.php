<?php
    function status($service_status)
    {
        if ($service_status == 'WAITING') {
            $status = 'Menunggu';
            $class_status = 'bg-yellow-500 p-1 px-2 text-sm rounded-xl  text-white w-fit';
            return [$status, $class_status];
        } elseif ($service_status == 'CONFIRMED') {
            $status = 'Dikonfirmasi';
            $class_status = 'bg-green-500 p-1 px-2 text-sm rounded-xl  text-white w-fit';
            return [$status, $class_status];
        } elseif ($service_status == 'CANCELLED') {
            $status = 'Ditolak';
            $class_status = 'bg-red-500 p-1 px-2 text-sm rounded-xl  text-white w-fit';
            return [$status, $class_status];
        } else {
            $status = 'Selesai';
            $class_status = 'bg-blue-500 p-1 px-2 text-sm rounded-xl  text-white w-fit';
            return [$status, $class_status];
        }
    }

function formatIndonesianDate($date) {
    $months = [
        'January' => 'Januari',
        'February' => 'Februari',
        'March' => 'Maret',
        'April' => 'April',
        'May' => 'Mei',
        'June' => 'Juni',
        'July' => 'Juli',
        'August' => 'Agustus',
        'September' => 'September',
        'October' => 'Oktober',
        'November' => 'November',
        'December' => 'Desember'
    ];

    $formattedDate = date('d F Y', strtotime($date));
    $month = date('F', strtotime($date));

    return str_replace($month, $months[$month], $formattedDate);
}
?>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Service') }}
        </h2>
    </x-slot>

    <a href="{{ route('service.index') }}">
        <div class="mb-4 flex gap-1 hover:bg-white hover:text-gray-500 shadow w-fit p-1 rounded-full">
            <svg class="ml-1" width="24" height="24" version="1.1" id="fi_329350" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                <path style="fill:#E8E8E8;" d="M256,0C114.608,0,0,114.608,0,256c0,141.376,114.608,256,256,256s256-114.624,256-256
                    C512,114.608,397.392,0,256,0z"></path>
                <g style="opacity:0.2;">
                    <polygon points="313.344,432.064 149.984,272 313.344,111.936 362.144,161.904 249.792,272 362.144,382.096"></polygon>
                </g>
                <polygon style="fill:#FFFFFF;" points="297.344,416.064 133.984,256 297.344,95.936 346.144,145.904 233.792,256 346.144,366.096"></polygon>
            </svg>
            <span class="text-gray-400 mr-2">Kembali</span>
        </div>
    </a>
    
    <div class="pb-6">
        <h1 class="font-semibold text-xl text-gray-900 pb-4">Data Customer</h1>
        <div class="w-full bg-white rounded-lg shadow">
            <div class="flex flex-col md:flex-row justify-between p-8 gap-1 md:gap-10">
                <div class="flex flex-col flex-1">
                    <span class="font-semibold pb-1">Nama</span>
                    <span class="pb-2">{{ $service->client->name }}</span>
                    <span class="font-semibold pb-1">Email</span>
                    <span class="pb-2">{{ $service->client->email }}</span>
                    <span class="font-semibold pb-1">Nomor Telepon</span>
                    <span>{{ $service->client->phone_number }}</span>
                </div>
                <div class="md:flex-none md:bg-gray-200 md:w-1 md:rounded-lg"></div>
                <div class="flex flex-col flex-1">
                    <span class="font-semibold pb-1">Tipe Mobil</span>
                    <span class="pb-2">{{ $service->clientCar->car_type }}</span>
                    <span class="font-semibold pb-1">Plat Kendaraan</span>
                    <span>{{ $service->clientCar->plate_number }}</span>
                </div>
            </div>
        </div>
    </div>

    <div class="pb-6">
        <h1 class="font-semibold text-xl text-gray-900 pb-4">Data Service</h1>
        <div class="w-full bg-white rounded-lg shadow">
            <div class="flex flex-col md:flex-row justify-between p-8 gap-1 md:gap-10">
                <div class="flex flex-col flex-1">
                    <span class="font-semibold pb-1">Tanggal</span>
                    <span class="pb-2">{{ formatIndonesianDate($service->date) }}</span>
                    <span class="font-semibold pb-1">Waktu</span>
                    <span class="pb-2">{{ $service->time }}</span>
                    <span class="font-semibold pb-1">Tipe Servis</span>
                    <span class="pb-2">{{ $service->type == 'BOOK' ? 'Servis Reservasi' : 'Servis Kunjungan' }}</span>
                    <span class="font-semibold pb-1">Jarak Tempuh</span>
                    <span>{{ $service->vehicle_km }} (Km)</span>
                </div>
                <div class="md:flex-none md:bg-gray-200 md:w-1 md:rounded-lg"></div>
                <div class="flex flex-col flex-1">
                    <span class="font-semibold pb-1">Informasi Tambahan</span>
                    <span class="pb-2">{{ $service->additional_info == null ? '-' : $service->additional_info }}</span>
                    <span class="font-semibold pb-1">Tipe Servis</span>
                    <span class="pb-2">{{ $service->service_type }}</span>
                    <span class="font-semibold pb-1">Status</span>
                    <span class="{{ status($service->status)[1] }}">
                        {{ status($service->status)[0] }}
                    </span>
                </div>
            </div>
        </div>
    </div>

    @if ($service->type === 'VISIT')
        <div class="pb-6">
            <h1 class="font-semibold text-xl text-gray-900 pb-4">Lokasi</h1>
        </div>
        <div class="w-full bg-white rounded-lg shadow">
            <div id="map" style="height: 25rem"></div>
        </div>
        
        <x-maps lat="{{ $service->lat }}" long="{{ $service->long }}" />
    @endif

</x-app-layout>
