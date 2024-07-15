<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Customer') }}
        </h2>
    </x-slot>

    <form action="{{ route('customer.store') }}" method="post">
        @csrf
        <div class="container bg-white p-6 rounded">
            <div class="mt-4">
                <x-input-label for="name" :value="__('Nama')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                    required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    required autofocus autocomplete="email" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="phone_number" :value="__('Nomor Telepon')" />
                <x-text-input id="phone_number" class="block mt-1 w-full" type="text" name="phone_number"
                    :value="old('phone_number')" required autofocus autocomplete="phone_number" />
                <x-input-error :messages="$errors->get('phone_number')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="address" :value="__('Alamat')" />
                <x-text-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')"
                    required autofocus autocomplete="address" />
                <x-input-error :messages="$errors->get('address')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="car_count" :value="__('Masukkan Jumlah Mobil')" />
                <x-text-input id="car_count" class="block mt-1 w-fit" type="number" name="car_count" :value="old('car_count')" required min="1" />
                <x-input-error :messages="$errors->get('car_count')" class="mt-2" />
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