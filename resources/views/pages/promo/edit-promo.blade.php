<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Promo') }}
        </h2>
    </x-slot>

    <form action="{{ route('promo.update', $promo->uuid) }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="container bg-white p-6 rounded">
            <div>
                <x-input-label for="img" :value="__('Upload gambar promo')" class="mb-2" />
                <div class="flex items-center">
                    <x-image-preview id="imgPreview" :image="false"
                        src="{{ asset('storage/promo/' . $promo->img_url) }}" />
                    <x-file-upload-input id="imgInput" type="file" accept=".png,.jpg,.jpeg" name="img" />
                </div>
                <x-input-error :messages="$errors->get('img')" class="mt-2" />
            </div>

            <div class="flex items-center justify-center mt-20 gap-4">
                <a href="{{ route('promo.index') }}">
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
