<?php

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
            {{ __('Detail Customer') }}
        </h2>
    </x-slot>

    <a href="{{ route('customer.index') }}">
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
        <h1 class="font-semibold text-xl text-gray-900 pb-4">Profil Customer</h1>
        <div class="w-full bg-white rounded-lg shadow">
            <div class="flex flex-col xl:flex-row justify-between p-8 gap-4 xl:gap-10">
                <div class="flex flex-col flex-1">
                    <span class="font-semibold pb-1">Nama</span>
                    <span class="pb-6">{{ $clients->name }}</span>
                    <span class="font-semibold pb-1">Email</span>
                    <span>{{ $clients->email }}</span>
                </div>
                <div class="md:flex-none md:bg-gray-200 md:w-1 md:rounded-lg"></div>
                <div class="flex flex-col flex-1">
                    <span class="font-semibold pb-1">Nomor Telepon</span>
                    <span class="pb-6">{{ $clients->phone_number }}</span>
                    <span class="font-semibold pb-1">Alamat</span>
                    <span>{{ $clients->address }}</span>
                </div>
            </div>
        </div>
    </div>

    <div class="flex justify-between">
        <h1 class="font-semibold text-xl text-gray-900 pb-4">Kendaraan Customer</h1>
        <div>
            <a href="{{ route('car.create', $clients->uuid) }}">
                <x-primary-button>Tambah Item</x-primary-button>
            </a>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            @foreach ($clients->cars as $item)
            <div class="w-full bg-white rounded-lg shadow h-fit">
                <div class="flex flex-row justify-between md:justify-normal lg:justify-between px-4 md:px-0 lg:px-4 py-2 md:h-80 lg:h-fit">
                    <div class="flex flex-col lg:flex-row px-4 gap-4">
                        <svg class="w-32 flex-none self-center" id="fi_15555331" enable-background="new 0 0 53 53" viewBox="0 0 53 53" xmlns="http://www.w3.org/2000/svg"><g><g><path d="m43.6167946 30.7974052c0 2.0919952-1.651001 3.7890015-3.6889954 3.7890015-2.0370178 0-3.6880188-1.6970062-3.6880188-3.7890015 0-2.0930023 1.651001-3.7890015 3.6880188-3.7890015 2.0379944.0000001 3.6889954 1.6959992 3.6889954 3.7890015z"></path></g><g><path d="m50.3211098 26.044796c-.1400146-.1300049-.3000488-.3200073-.3200073-.3999634-.0500488-.3200073-.0800171-1.460022-.0100098-1.7800293.0100098-.0100098.0100098-.0200195.0199585-.0299683.1900024-.2800293.4900513-.8099976.3000488-1.2400513-.1000366-.2299805-.3099976-.3799438-.5800171-.4099731-.1400146-.0200195-.4799805-.0499878-.9199829-.0800171-1.1000366-.0899658-3.1500244-.25-3.75-.4299927l-.8699951-.2600098c-.2200317-.0799561-5.2600098-1.8999634-7.8699951-2.3800049-2.4100342-.4400024-7.3900127-.9899902-10.7300396-.2799683-2.9799805.6400146-5.0800171 1.7799683-6.6199951 2.6099854l-.3999634.2200317c-.5800171.3099976-.9400024.539978-1.2000122.7099609-.4400024.2700195-.5499878.3500366-1.1000366.4299927-.1599731.0200195-.539978.0400391-1.0700073.0800171-2.8299561.1799927-9.4299927.5999756-12.0099487 2.6500244-.1800537.1099854-.6400146.4499512-.8800049 1.2600098-.1300049.4299927-.1799927.9199829-.1400146 1.4699707l-.0700073.0900269c-.0700073.0899658-.0999756.1900024-.0999756.2999878.039978 4.0299683.6499634 4.1900024.9299927 4.2699585.5.1300049 2.1300046.1700439 2.7699583.1800537-.3499756-.6700439-.5499878-1.4300537-.5499878-2.2400513 0-2.6499634 2.1099854-4.8099976 4.7000127-4.8099976 2.5999756 0 4.710022 2.1600342 4.710022 4.8099976 0 .8099976-.2000122 1.5700073-.5500488 2.2400513h21.7700176c-.3499756-.6600342-.539978-1.4200439-.539978-2.2300415 0-2.6400146 2.0999756-4.789978 4.6900024-4.789978 2.5799561 0 4.6900024 2.1499634 4.6900024 4.789978 0 .4100342-.0499878.7999878-.1500244 1.1799927h.0100098l4.2700195-.6599731s.0700073 0 .1799927-.0100098c.9400024-.0999756 1.9599609-.710022 2-2.0999756.0100098-.210022.0199585-.3900146.0299683-.5500488l.0100098-.25c.059997-1.0099487.0900263-1.5599975-.6499639-2.3599853zm-46.8536971 2.0997925-.2109985-.4119873-.5759888.5960083c-.0570068-.6329956.0009766-1.111023.1069946-1.4689942.1069946.0889893.3280029.2349854.5689697.1640015.1439819-.0430298.5540161-.2310181.9780271-.4330444.7420044-.3540039 1.6029663-.7819824 2.3439941-.427002-.7609862 1.3560181-1.7839965 2.4290161-3.2109982 1.9810181zm36.6021102-4.9771118c-.3140259.4450073-.8259888.7090454-1.3699951.7090454l-7.8500347.3299561-.1489868.0050049-11.9160156.5010376c-.0819702.0039673-.117981-.1030273-.0509644-.1500244 3.2259521-2.2990112 5.6849976-3.1240234 7.2199707-3.4069824 1.1130371-.2040405 2.3099976-.309021 3.5549927-.309021.757019 0 1.4980469.0289917 2.1950073.0750122.0490112.0029907.0950317.007019.1430054.0120239 1.9899883.1369629 3.5980206.407959 4.1589947.5099487.9750366.1780396 2.7210083.7900391 3.9769897 1.3930054.0820313.0400391.1110229.1100464.1210327.1470337.0089721.0379638.0169677.1119994-.0339966.1839599zm9.3276367 2.586914c-.1499634.0800171-.3200073.0800171-.4899902.0800171-.4899902 0-.9799805 0-1.4599609-.1099854-.4700317-.1100464-.9300537-.3400269-1.2400513-.7200317-.0999756-.1199951-.1900024-.2700195-.1599731-.4299927.0200195-.1300049.1099854-.2299805.2000122-.3099976.25-.2000122.5599976-.2999878.8699951-.3300171.3200073-.0299683.6300049 0 .9500122.0200195.1799927.0200195.3800049.039978.539978.1300049.1799927.1099854.3099976.2799683.4699707.4199829.0700073.0599976.1500244.1099854.2400513.1400146.039978.0100098.0899658.0100098.1300049.0100098l.0499878 1.0199585c-.0300294.0300294-.0599977.0599977-.1000367.0800172z"></path></g><g><path d="m13.5601864 30.7818108c0 2.1009979-1.6589966 3.8040009-3.70401 3.8040009-2.0459905 0-3.70398-1.7030029-3.70398-3.8040009s1.6579895-3.8049927 3.70398-3.8049927c2.0450134 0 3.70401 1.7039947 3.70401 3.8049927z"></path></g></g></svg>
                        <div class="flex-none bg-gray-800 w-56 md:w-[10.6rem] lg:w-[14.6rem] xl:w-[0.1rem] rounded-lg h-[0.1rem] xl:h-24 self-center"></div>
                        <div class="flex-grow self-center">
                            <div class="flex flex-col ml-2 mb-4">
                                <span class="font-semibold text-lg">{{ $item->car_type }}</span>
                                <span class="text-sm">Plat kendaraan: {{ $item->plate_number }}</span>
                                <span class="text-sm">Tanggal service terakhir: {{ $item->last_service_date != null ? formatIndonesianDate($item->last_service_date) : "Tanggal servis terakhir belum diisi" }}</span>
                                <span class="text-sm">Jarak tempuh: {{ number_format($item->last_service_km, 0, '.', '.') }} Km</span>
                            </div>
                        </div>

                    </div>
                    <div class="flex-none py-2">
                        <x-dropdown>
                            <x-slot name="trigger">
                                <button class="focus:outline-none transition ease-in-out duration-150">
                                    <svg class="w-4 h-4" id="fi_2311524" enable-background="new 0 0 32 32" height="512" viewBox="0 0 32 32" width="512" xmlns="http://www.w3.org/2000/svg"><path id="XMLID_294_" d="m13 16c0 1.654 1.346 3 3 3s3-1.346 3-3-1.346-3-3-3-3 1.346-3 3z"></path><path id="XMLID_295_" d="m13 26c0 1.654 1.346 3 3 3s3-1.346 3-3-1.346-3-3-3-3 1.346-3 3z"></path><path id="XMLID_297_" d="m13 6c0 1.654 1.346 3 3 3s3-1.346 3-3-1.346-3-3-3-3 1.346-3 3z"></path></svg>
                                </button>
                            </x-slot>
                            <x-slot name='content'>
                                <x-dropdown-link href="{{ route('car.edit', $item->uuid) }}">
                                    Edit
                                </x-dropdown-link>
                                <x-dropdown-link onclick="confirmDelete('{{ $item->uuid }}')">
                                    Hapus
                                </x-dropdown-link>
                            </x-slot>
                        </x-dropdown>
                    </div>
                </div>
            </div>
            @endforeach
    </div>

    <form id="delete-form" action="" method="POST" style="display: none;">
        @csrf
        @method('DELETE')
    </form>


</x-app-layout>