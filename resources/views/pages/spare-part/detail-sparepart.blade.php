<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Suku Cadang') }}
        </h2>
    </x-slot>

    <div class="bg-white p-6 rounded flex-row shadow border">
        <div class="basis-full md:basis-1/3 flex justify-center items-center mb-4 md:mb-0">
            <img src="{{ asset('storage/sparepart/' . $sparepart->img_url) }}" class="h-80 object-cover rounded-lg">
        </div>
        <div class="basis-full md:basis-2/3 flex flex-col">
            <div class="p-4">
                <div class="font-bold text-4xl mb-4">
                    {{ $sparepart->name }}
                </div>
                <div class="font-semibold text-2xl">
                    Rp. {{ number_format($sparepart->price, 0, ',', '.') }}
                </div>
                <hr class="mb-6  border border-gray-100">
                <div class="mt-1 grid">
                    <div class="prose max-w-none text-justify">
                        {!! $sparepart->description !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
