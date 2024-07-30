<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Suku Cadang') }}
        </h2>
    </x-slot>

    <a href="{{ route('sparepart.index') }}">
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
    
    <div class="bg-white p-6 rounded flex-row shadow border">
        <div class="basis-full md:basis-1/3 flex justify-center items-center mb-4 md:mb-0">
            <img src="{{ asset('storage/sparepart/' . $sparepart->img_url) }}" class="h-44 md:h-52 xl:h-80 object-cover rounded-lg">
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
                <hr class="mb-6 border border-gray-100 xl:mt-4">
                <div class="mt-1 grid">
                    <div class="prose max-w-none text-justify">
                        {!! $sparepart->description !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
