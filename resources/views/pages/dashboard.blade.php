<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Beranda') }}
        </h2>
    </x-slot>

    <div class="grid grid-row gap-2 mb-6">
        <div class="grid grid-cols-2 xl:grid-cols-3 gap-2">
            <x-card class="w-full md:w-1/3">
                <x-slot name="title">
                    {{ __('Jumlah Customer') }}
                </x-slot>
                <x-slot name="n_count">
                    {{ __($customer) }}
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
                    {{ __($sparepart) }}
                </x-slot>
                <x-slot name="icon">
                    <img src="ic_spare-part.svg" alt="icon spare-parts" width="30">
                </x-slot>
            </x-card>
            <x-card class="w-full md:w-1/3">
                <x-slot name="title">
                    {{ __('Jumlah Leads Sales') }}
                </x-slot>
                <x-slot name="n_count">
                    {{ __($leads) }}
                </x-slot>
                <x-slot name="icon">
                    <img src="ic_sales.svg" alt="icon sales" width="30">
                </x-slot>
            </x-card>
            <x-card class="w-full md:w-1/3">
                <x-slot name="title">
                    {{ __('Jumlah PIC') }}
                </x-slot>
                <x-slot name="n_count">
                    {{ __($pic) }}
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
                    {{ __($promo) }}
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
                    {{ __($admin) }}
                </x-slot>
                <x-slot name="icon">
                    <img src="ic_admin.svg" alt="icon admin" width="30">
                </x-slot>
            </x-card>
        </div>
    </div>

    <div class="flex flex-col text-gray-900">
        <div class="flex flex-col md:grid md:grid-rows-1 md:flex-row lg:grid-cols-2 gap-4">
            <div class="flex flex-col md:basis-3/5">
                <div class="font-semibold text-xl mb-2">Grafik Servis Booking dan Kunjungan</div>
                <div id="highChart" class="bg-white py-4 rounded-lg shadow-lg"></div>
            </div>
            <div class="flex flex-col">
                <div class="font-semibold text-xl mb-2">Grafik Katalog Mobil</div>
                <div id="pieChart" class="bg-white py-4 rounded-lg shadow-lg"></div>
            </div>
        </div>
    </div>
</x-app-layout>
