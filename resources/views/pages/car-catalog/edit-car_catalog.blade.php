<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Katalog Mobil') }}
        </h2>
    </x-slot>

    <form action="{{ route('catalog.update', $catalog->uuid) }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="container bg-white p-6 rounded">
            <div>
                <x-input-label for="name" :value="__('Tipe Mobil')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$catalog->name"
                    required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="price" :value="__('Harga Mobil')"/>
                <input id="price" class="block mt-1 w-full border-gray-300 focus:border-[#01803D] focus:ring-[#01803D] rounded-md shadow-sm" type="text" 
                    onkeyup="formatRupiah(this, 'Rp. ')" autocomplete="off" value="{{ $catalog->price }}" onload="formatRupiah(this, 'Rp. ')">
                <input id="price_numeric" type="hidden" name="price" value="{{ $catalog->price }}" required autofocus>
                <x-input-error :messages="$errors->get('price')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="type" :value="__('Jenis Mobil')" />
                <select id="type" name="type"
                    class="mt-1 bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#01803D] focus:border-[#01803D] block w-full p-2.5">
                    <option value="{{ \App\Models\CatalogCars::TYPE_NEW }}" {{ $catalog->type == \App\Models\CatalogCars::TYPE_NEW ? 'selected' : '' }}>Baru</option>
                    <option value="{{ \App\Models\CatalogCars::TYPE_USED }}" {{ $catalog->type == \App\Models\CatalogCars::TYPE_USED ? 'selected' : '' }}>Bekas</option>
                </select>
                <x-input-error :messages="$errors->get('type')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="img" :value="__('Upload Gambar Mobil')" class="mb-2" />
                <div class="flex items-center">
                    <x-file-upload-input-multiple type="file" accept=".png,.jpg,.jpeg" name="img[]" />
                    <x-image-preview id="imgPreview" src="{{ asset('storage/catalog_cars/' . $catalog->img_url) }}" />
                </div>
                <x-input-error :messages="$errors->get('img')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="description" :value="__('Deskripsi')" />
                <textarea id="description" name="description" class="block mt-1 w-full" placeholder="Masukkan deskripsi katalog mobil">{{ $catalog->description }}</textarea>
                <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div>

            <div class="flex items-center justify-center mt-20 gap-4">
                <a href="{{ route('catalog.index') }}">
                    <x-secondary-button>
                        {{ __('Kembali') }}
                    </x-secondary-button>
                </a>
                <x-primary-button>
                    {{ __('Simpan') }}
                </x-primary-button>
            </div>
        </div>
    </form>
</x-app-layout>
