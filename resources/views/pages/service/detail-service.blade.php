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

    <div class="pb-6">
        <h1 class="font-semibold text-xl text-gray-900 pb-4">Data Customer</h1>
        <div class="w-full bg-white rounded-lg shadow">
            <div class="flex justify-between p-8 gap-10">
                <div class="flex flex-col flex-1">
                    <span class="font-semibold pb-1">Nama</span>
                    <span class="pb-2">{{ $service->client->name }}</span>
                    <span class="font-semibold pb-1">Email</span>
                    <span class="pb-2">{{ $service->client->email }}</span>
                    <span class="font-semibold pb-1">Nomor Telepon</span>
                    <span>{{ $service->client->phone_number }}</span>
                </div>
                <div class="flex-none bg-gray-200 w-1 rounded-lg"></div>
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
            <div class="flex justify-between p-8 gap-10">
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
                <div class="flex-none bg-gray-200 w-1 rounded-lg"></div>
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
