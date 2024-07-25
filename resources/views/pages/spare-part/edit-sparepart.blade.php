<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Suku Cadang') }}
        </h2>
    </x-slot>

    <form action="{{ route('sparepart.update', $sparepart->uuid) }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="container bg-white p-6 rounded">
            <div>
                <x-input-label for="name" :value="__('Nama Suku Cadang')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$sparepart->name"
                    required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="price" :value="__('Harga Suku Cadang')" />
                <input id="price"
                    class="block mt-1 w-full border-gray-300 focus:border-[#01803D] focus:ring-[#01803D] rounded-md shadow-sm"
                    type="text" onkeyup="formatRupiah(this, 'Rp. ')" autocomplete="off"
                    value="{{ $sparepart->price }}" onload="formatRupiah(this, 'Rp. ')">
                <input id="price_numeric" type="hidden" name="price" value="{{ $sparepart->price }}" required
                    autofocus>
                <x-input-error :messages="$errors->get('price')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="img" :value="__('Upload Gambar Suku Cadang')" class="mb-2" />
                <div class="flex items-center">
                    <x-image-preview id="imgPreview" src="{{ asset('storage/sparepart/' . $sparepart->img_url) }}"
                        alt="Selected Image" />
                    <x-file-upload-input id="imgInput" type="file" accept=".png,.jpg,.jpeg" name="img" />
                </div>
                <x-input-error :messages="$errors->get('img')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="description" :value="__('Deskripsi')" />
                <textarea id="description" name="description" class="block mt-1 w-full" placeholder="Masukkan deskripsi suku cadang">{{ $sparepart->description }}</textarea>
                <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div>

            <div class="flex items-center justify-center mt-20 gap-4">
                <a href="{{ route('sparepart.index') }}">
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
