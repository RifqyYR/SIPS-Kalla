<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Suku Cadang') }}
        </h2>
    </x-slot>

    <div class="bg-white p-6 rounded flex-row shadow border">
        <div class="basis-full md:basis-1/3 flex justify-center items-center mb-4 md:mb-0">
            <img src="{{ asset('storage/sparepart/' . $sparepart->img_url) }}" class="h-44 md:h-52 lg:h-80 xl:h-96 object-cover rounded-lg">
        </div>
        <div class="basis-full md:basis-2/3 flex flex-col">
            <div class="p-4">
                <div class="flex flex-col lg:flex-row xl:flex-row lg:gap-6 xl:gap-6">
                    <div class="font-bold text-2xl lg:text-3xl xl:text-4xl">
                        {{ $sparepart->name }}
                    </div>
                    <div class="font-semibold text-lg lg:text-xl xl:text-2xl mt-2">
                        (Rp. {{ number_format($sparepart->price, 0, ',', '.') }})
                    </div>
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
