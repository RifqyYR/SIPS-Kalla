<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Customer') }}
        </h2>
    </x-slot>

    <form action="{{ route('customer.update', $client->uuid) }}" method="post">
        @csrf
        <div class="container bg-white p-6 rounded">
            <div class="mt-4">
                <x-input-label for="name" :value="__('Nama')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$client->name"
                    required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="$client->email"
                    required autofocus autocomplete="email" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="phone_number" :value="__('Nomor Telepon')" />
                <x-text-input id="phone_number" class="block mt-1 w-full" type="text" name="phone_number"
                    :value="$client->phone_number" required autofocus autocomplete="phone_number" />
                <x-input-error :messages="$errors->get('phone_number')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="address" :value="__('Alamat')" />
                <x-text-input id="address" class="block mt-1 w-full" type="text" name="address" :value="$client->address"
                    required autofocus autocomplete="address" />
                <x-input-error :messages="$errors->get('address')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="change_password" :value="__('Ganti Password?')" />
                <div class="flex items-center space-x-3">
                    <label>
                        <input type="radio" name="change_password" value="yes" class="mr-2">
                        {{ __('Yes') }}
                    </label>
                    <label>
                        <input type="radio" name="change_password" value="no" class="mr-2" checked>
                        {{ __('No') }}
                    </label>
                </div>
            </div>

            <div id="password_fields" class="hidden">
                <div class="mt-4">
                    <x-input-label for="new_password" :value="__('Masukkan Password Baru')" />
                    <x-text-input id="new_password" class="block mt-1 w-full" type="password" name="new_password" autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('new_password')" class="mt-2" />
                </div>
                <div class="mt-4">
                    <x-input-label for="new_password_confirmation" :value="__('Konfirmasi Password Baru')" />
                    <x-text-input id="new_password_confirmation" class="block mt-1 w-full" type="password" name="new_password_confirmation" autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('new_password_confirmation')" class="mt-2" />
                </div>
            </div>

            <div class="flex items-center justify-center mt-20 gap-4">
                <a href="{{ route('customer.index') }}">
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

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const changePasswordYes = document.querySelector('input[name="change_password"][value="yes"]');
        const passwordFields = document.getElementById('password_fields');
    
        changePasswordYes.addEventListener('change', function () {
            passwordFields.classList.toggle('hidden', !this.checked);
        });
    
        document.querySelector('input[name="change_password"][value="no"]').addEventListener('change', function () {
            passwordFields.classList.add('hidden');
        });
    });
</script>