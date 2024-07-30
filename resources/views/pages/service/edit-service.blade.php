<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Service') }}
        </h2>
    </x-slot>

    <form action="{{ route('service.update', $service->uuid) }}" method="post">
        @csrf
        <div class="container bg-white p-6 rounded">
            <div class="mt-4 flex flex-col md:flex-row justify-between gap-4 md:gap-10">
                <div class="flex-1">
                    <x-input-label for="date" :value="__('Tanggal')" />
                    <x-text-input id="date" class="block mt-1 w-full" type="date" name="date" :value="$service->date"
                        required autofocus autocomplete="date" />
                    <x-input-error :messages="$errors->get('date')" class="mt-2" />
                </div>
    
                <div class="flex-1">
                    <x-input-label for="time" :value="__('Waktu')" />
                    <x-text-input id="time" class="block mt-1 w-full" type="time" name="time" :value="$service->time"
                        required autofocus autocomplete="time" />
                    <x-input-error :messages="$errors->get('time')" class="mt-2" />
                </div>
            </div>

            <div class="mt-4">
                <x-input-label for="service_type" :value="__('Tipe Service')" />
                <x-text-input id="service_type" class="block mt-1 w-full" type="text" name="service_type"
                    :value="$service->service_type" required autofocus autocomplete="service_type" />
                <x-input-error :messages="$errors->get('service_type')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="vehicle_km" :value="__('Jarak Tempuh Kendaraan (Km)')" />
                <x-text-input id="vehicle_km" class="block mt-1 w-full" type="text" name="vehicle_km" :value="$service->vehicle_km"
                    required autofocus autocomplete="vehicle_km" />
                <x-input-error :messages="$errors->get('vehicle_km')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="status" :value="__('Status')" />
                <select id="status" name="status"
                    class="mt-1 bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#01803D] focus:border-[#01803D] block w-full p-2.5">
                    <option value="{{ \App\Models\Service::STATUS_WAITING }}" {{ $service->status == \App\Models\Service::STATUS_WAITING ? 'selected' : '' }}>Menunggu</option>
                    <option value="{{ \App\Models\Service::STATUS_CONFIRMED }}" {{ $service->status == \App\Models\Service::STATUS_CONFIRMED ? 'selected' : '' }}>Dikonfirmasi</option>
                    <option value="{{ \App\Models\Service::STATUS_CANCELLED }}" {{ $service->status == \App\Models\Service::STATUS_CANCELLED ? 'selected' : '' }}>Batal</option>
                    <option value="{{ \App\Models\Service::STATUS_DONE }}" {{ $service->status == \App\Models\Service::STATUS_DONE ? 'selected' : '' }}>Selesai</option>
                </select>
                <x-input-error :messages="$errors->get('status')" class="mt-2" />
            </div>

            <div class="flex items-center justify-center mt-10 md:mt-12 xl:mt-20 gap-4">
                <a href="{{ route('service.index') }}">
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
