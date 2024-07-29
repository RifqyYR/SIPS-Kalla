@php
    function status($type)
    {
        if ($type == 'NEW') {
            $status = 'Baru';
            $class_status = 'bg-blue-500 rounded-xl px-4 text-white border border-blue-500 text-sm lg:text-base';
            return [$status, $class_status];
        } else {
            $status = 'Bekas';
            $class_status = 'bg-gray-500 rounded-xl px-4 py-1 text-white border border-gray-500 text-sm lg:text-base';
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
            <h2 class="text-xl xl:text-3xl font-bold">{{ $catalog->name }}</h2>
            <div class="mt-2">
                <span class="{{ status($catalog->type)[1] }}">
                    {{ status($catalog->type)[0] }}
                </span>

            </div>
        </div>
        
        <div class="xzoom_part lg:flex xl:flex justify-center xl:gap-6">
            <div class="xzoom_container basis-full md:basis-1/3 flex justify-center items-center mb-4 md:mb-0">
                <div class="w-56 md:w-80 xl:w-[35rem]">
                    <img src="{{ asset('storage/catalog_cars/' . $catalog->images[0]->img_url) }}" class="h-full xl:w-[35rem] rounded-lg xzoom" id="xzoom-default">

                </div>
            </div>
            <div class="flex lg:flex-col xl:flex-col justify-center gap-4">
                @foreach ($catalog->images as $item)
                    <div class="w-20 md:w-24 lg:w-[8rem]">
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
