<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah PIC') }}
        </h2>
    </x-slot>

    <form action="{{ route('pic.store') }}" method="post">
        @csrf
        <div class="container bg-white p-6 rounded">
            <div>
                <x-input-label for="name" :value="__('Nama')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                    required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="phone_number" :value="__('Nomor Telepon')" />
                <x-text-input id="phone_number" class="block mt-1 w-full" type="text" name="phone_number"
                    :value="old('phone_number')" required autofocus autocomplete="phone_number" />
                <x-input-error :messages="$errors->get('phone_number')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="sector" :value="__('Bidang')" />
                <select id="sector" name="sector"
                    class="mt-1 bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#01803D] focus:border-[#01803D] block w-full p-2.5">
                    <option value="{{ \App\Models\PersonInCharge::SECTOR_BOOK_SERVICE }}" selected>Servis Reservasi</option>
                    <option value="{{ \App\Models\PersonInCharge::SECTOR_VISIT_SERVICE }}">Servis Kunjungan</option>
                    <option value="{{ \App\Models\PersonInCharge::SECTOR_PICK_UP }}">Antar Jemput</option>
                    <option value="{{ \App\Models\PersonInCharge::SECTOR_FOOD_ORDER }}">Pesan Makanan</option>
                    <option value="{{ \App\Models\PersonInCharge::SECTOR_FREE_FOOD }}">Minuman Gratis</option>
                    <option value="{{ \App\Models\PersonInCharge::SECTOR_ICE_CREAM }}">Es Krim Gratis</option>
                    <option value="{{ \App\Models\PersonInCharge::SECTOR_USED_CAR }}">Mobil Bekas</option>
                </select>
            </div>

            <div class="flex items-center justify-center mt-20 gap-4">
                <a href="{{ route('pic.index') }}">
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
