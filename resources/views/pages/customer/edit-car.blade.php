<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Jenis Mobil') }}
        </h2>
    </x-slot>

    <form action="{{ route('car.update', $car->uuid) }}" method="post">
        @csrf
        <div class="container bg-white p-6 rounded">
            <div class="mt-4">
                <x-input-label for="car_type" :value="__('Tipe Mobil')" />
                <x-text-input id="car_type" class="block mt-1 w-full" type="text" name="car_type" :value="$car->car_type"
                    required autofocus autocomplete="car_type" />
                <x-input-error :messages="$errors->get('car_type')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="plate_number" :value="__('Plat Kendaraan')" />
                <x-text-input id="plate_number" class="block mt-1 w-full" type="text" name="plate_number" :value="$car->plate_number"
                    required autofocus autocomplete="plate_number" />
                <x-input-error :messages="$errors->get('plate_number')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="last_service_date" :value="__('Jadwal Service Terakhir')" />
                <x-text-input id="last_service_date" class="block mt-1 w-fit" type="date" name="last_service_date"
                    :value="$car->last_service_date" required autofocus autocomplete="last_service_date" />
                <x-input-error :messages="$errors->get('last_service_date')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="last_service_km" :value="__('Jarak Tempuh (Km)')" />
                <x-text-input id="last_service_km" class="block mt-1 w-full" type="text" name="last_service_km" :value="$car->last_service_km"
                    required autofocus autocomplete="last_service_km" />
                <x-input-error :messages="$errors->get('last_service_km')" class="mt-2" />
            </div>

            <div class="flex items-center justify-center mt-20 gap-4">
                <a href="{{ url()->previous() }}">
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
