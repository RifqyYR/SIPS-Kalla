@php
    function status($type)
    {
        if ($type == 'NEW') {
            $status = 'Baru';
            $class_status = 'bg-blue-500 rounded-xl px-4 text-white border border-blue-500';
            return [$status, $class_status];
        } else {
            $status = 'Bekas';
            $class_status = 'bg-gray-500 rounded-xl px-4 py-1 text-white border border-gray-500';
            return [$status, $class_status];
        }
    }
@endphp

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Katalog Mobil') }}
        </h2>
    </x-slot>

    <div class="bg-white p-6 rounded flex-row shadow border">
        <div class="flex flex-row justify-between mb-6">
            <h2 class="text-3xl font-bold">{{ $catalog->name }}</h2>
            <div class="mt-2">
                <span class="{{ status($catalog->type)[1] }}">
                    {{ status($catalog->type)[0] }}
                </span>

            </div>
        </div>
        <div class="basis-full md:basis-1/3 flex justify-center items-center mb-4 md:mb-0">
            <img src="{{ asset('storage/catalog_cars/' . $catalog->images[0]->img_url) }}" class="h-full rounded-lg">
        </div>
        <div class="basis-full md:basis-2/3 flex flex-col mt-4">
            <div class="p-4">
                <div class="flex gap-6">
                    <div class="font-bold text-4xl">
                        {{ $catalog->name }}
                    </div>
                    <div class="font-semibold text-2xl mt-2">
                        (Rp. {{ number_format($catalog->price, 0, ',', '.') }})
                    </div>
                </div>
                <hr class="mb-6  border border-gray-100">
                <div class="mt-1 grid">
                    <div class="prose max-w-none text-justify">
                        {!! $catalog->description !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
