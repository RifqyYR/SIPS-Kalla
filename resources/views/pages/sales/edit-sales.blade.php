<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Sales') }}
        </h2>
    </x-slot>

    <form action="{{ route('sales.update', $sales->uuid) }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="container bg-white p-6 rounded">
            <div>
                <x-input-label for="name" :value="__('Nama')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$sales->name"
                    required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="description" :value="__('Deskripsi')" />
                <x-text-input id="description" class="block mt-1 w-full" type="text" name="description"
                    :value="$sales->description" required autofocus autocomplete="description" />
                <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="phone_number" :value="__('Nomor Telepon')" />
                <x-text-input id="phone_number" class="block mt-1 w-full" type="text" name="phone_number"
                    :value="$sales->phone_number" required autofocus autocomplete="phone_number" />
                <x-input-error :messages="$errors->get('phone_number')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="img" :value="__('Upload gambar sales')" class="mb-2" />
                <div class="flex items-center">
                    <x-image-preview id="imgPreview" src="{{ asset('storage/sales/' . $sales->img_url) }}" alt="Selected Image" />
                    <x-file-upload-input id="imgInput" type="file" accept=".png,.jpg,.jpeg" name="img" />
                </div>
                <x-input-error :messages="$errors->get('img')" class="mt-2" />
            </div>

            <div class="flex items-center justify-center mt-20 gap-4">
                <a href="{{ route('sales.index') }}">
                    <x-secondary-button>
                        {{ __('Kembali') }}
                    </x-secondary-button>
                </a>
                <x-primary-button>
                    {{ __('Edit') }}
                </x-primary-button>
            </div>
        </div>
    </form>
</x-app-layout>
