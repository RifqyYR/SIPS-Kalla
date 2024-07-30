@php
    function status($type)
    {
        if ($type == 'NEW') {
            $status = 'Baru';
            $class_status = 'bg-blue-500 rounded-xl px-4 text-white border border-blue-500 text-sm xl:text-base';
            return [$status, $class_status];
        } else {
            $status = 'Bekas';
            $class_status = 'bg-gray-500 rounded-xl px-4 py-1 text-white border border-gray-500 text-sm xl:text-base';
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

    <a href="{{ route('catalog.index') }}">
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
        <div class="flex flex-row justify-between mb-6">
            <h2 class="text-xl xl:text-3xl font-bold">{{ $catalog->name }}</h2>
            <div class="mt-2">
                <span class="{{ status($catalog->type)[1] }}">
                    {{ status($catalog->type)[0] }}
                </span>
            </div>
        </div>
        
        <div class="xzoom_part md:flex md:flex-col xl:flex-row justify-center md:gap-6 xl:gap-6">
            <div class="xzoom_container basis-full md:basis-1/3 flex justify-center items-center mb-4 md:mb-0">
                <div class="w-60 md:w-80 xl:w-[40rem] xl:h-full">
                    <img src="{{ asset('storage/catalog_cars/' . $catalog->images[0]->img_url) }}" class="h-56 xl:h-full xl:w-[40rem] rounded-lg xzoom" id="xzoom-default">
                </div>
            </div>
            <div class="flex xl:flex-col justify-center gap-4">
                @foreach ($catalog->images as $item)
                    <div class="w-20 md:w-24 xl:w-[8rem]">
                        <a href="{{ asset('storage/catalog_cars/' . $item->img_url) }}">
                            <img src="{{ asset('storage/catalog_cars/' . $item->img_url) }}" class="h-full rounded-lg xzoom-gallery" 
                                xpreview="{{ asset('storage/catalog_cars/' . $item->img_url) }}">
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="basis-full md:basis-2/3 flex flex-col mt-4">
            <div class="p-4">
                <div class="flex flex-col xl:flex-row xl:gap-6">
                    <div class="font-bold text-2xl md:text-3xl xl:text-4xl">
                        {{ $catalog->name }}
                    </div>
                    <div class="font-semibold text-lg md:text-xl xl:text-2xl mt-2">
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

<script>
    $(document).ready(function() {
        $('.xzoom-gallery').click(function(e) {
            e.preventDefault();
    
            var imageSrc = $(this).attr('src');
            var imageXpreview = $(this).attr('xpreview');

            $('#xzoom-default').attr('src', imageSrc).attr('xoriginal', imageXpreview);

            $('.xzoom, .xzoom-gallery').xzoom('refresh');
        });
    });
</script>

<script>
    $(document).ready(function() {
        $('.xzoom, .xzoom-gallery').xzoom({
            sourceClass: 'xzoom-source',
            loadingClass: 'xzoom-loading',
            lensClass: 'xzoom-lens',
            zoomWidth: 400,
            title: false,
            tint: '#333',
            Xoffset: 15
        });

        $('.xzoom-gallery').click(function(e) {
            e.preventDefault();

            var imageSrc = $(this).attr('src');
            var imageXpreview = $(this).attr('xpreview');

            // Menghapus instance xZoom sebelumnya
            var xzoomInstance = $('#xzoom-default').data('xzoom');
            xzoomInstance.remove();

            // Memperbarui sumber gambar dan menerapkan kembali lebar yang diinginkan
            $('#xzoom-default').attr('src', imageSrc).attr('xoriginal', imageXpreview).on('load', function() {
                $(this).css('width', '50rem');
                $(this).off('load'); // Hapus event handler setelah dijalankan
            });

            console.log("xZoom has been destroyed and image updated with fixed width.");
        });
    });
</script>    
