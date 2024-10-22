<x-app-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Admin') }}
        </h2>
    </x-slot>

    <form action="{{ route('admin-management.update', $admin->uuid) }}" method="post">
        @csrf
        <div class="container bg-white p-6 rounded">
            <div>
                <x-input-label for="name" :value="__('Nama')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$admin->name"
                    required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="$admin->email"
                    required autofocus autocomplete="email" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="flex items-center justify-center mt-20 gap-4">
                <a href="{{ route('admin-management.index') }}">
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
