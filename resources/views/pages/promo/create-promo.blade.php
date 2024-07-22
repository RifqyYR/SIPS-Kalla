<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Promo') }}
        </h2>
    </x-slot>

    <form action="{{ route('promo.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="container bg-white p-6 rounded">
            <div>
                <x-input-label for="img" :value="__('Upload gambar promo')" class="mb-2" />
                <div class="flex items-center">
                    <div class="shrink-0">
                        <img id="imgPreview" src="#" alt="Selected Image" class="hidden w-28 mr-6" />
                    </div>
                    <label class="block">
                        <span class="sr-only">Pilih gambar promo</span>
                        <input id="imgInput" type="file" accept=".png,.jpg,.jpeg" name="img"
                            class="block w-full text-sm text-slate-500
                    file:mr-4 file:py-2 file:px-4
                    file:rounded-full file:border-0
                    file:text-sm file:font-semibold
                    file:bg-green-50 file:text-green-700
                    hover:file:bg-green-100"
                            required />
                    </label>
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
                    {{ __('Tambah') }}
                </x-primary-button>
            </div>
        </div>
    </form>
</x-app-layout>
