<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Tipe Mobil') }}
        </h2>
    </x-slot>

    <form action="{{ route('car.store', $uuid) }}" method="post">
        @csrf
        <div class="container bg-white p-6 rounded">
            <div class="mt-4">
                <x-input-label for="car_count_create" :value="__('Masukkan Jumlah Mobil')" />
                <x-text-input id="car_count_create" class="block mt-1 w-fit" type="number" name="car_count_create" :value="old('car_count_create')" required min="1" />
                <x-input-error :messages="$errors->get('car_count_create')" class="mt-2" />
            </div>

            <div id="car_fields_container">
                <!-- Placeholder for car fields -->
            </div>

            <div class="flex items-center justify-center mt-20 gap-4">
                <a href="{{ route('customer.index') }}">
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