@php
    function convertSector(string $sector) {
        if ($sector == \App\Models\PersonInCharge::SECTOR_BOOK_SERVICE) return 'Servis Reservasi';
        elseif ($sector == \App\Models\PersonInCharge::SECTOR_VISIT_SERVICE) return 'Servis Kunjungan';
        elseif ($sector == \App\Models\PersonInCharge::SECTOR_PICK_UP) return 'Antar Jemput';
        elseif ($sector == \App\Models\PersonInCharge::SECTOR_FOOD_ORDER) return 'Pesan Makanan';
        elseif ($sector == \App\Models\PersonInCharge::SECTOR_FREE_FOOD) return 'Makanan Gratis';
        elseif ($sector == \App\Models\PersonInCharge::SECTOR_ICE_CREAM) return 'Es Krim Gratis';
        elseif ($sector == \App\Models\PersonInCharge::SECTOR_USED_CAR) return 'Mobil Bekas';
        else return 'Tidak Terdaftar';
    }
@endphp
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Person In Charge') }}
        </h2>
    </x-slot>

    <!-- Button -->
    <div class="flex justify-between pb-4">
        <div class="pb-4">
            <label for="table-search" class="sr-only justify-end">Search</label>
            <div class="relative mt-1">
                <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                </div>
                <input type="text" id="table-search"
                    class="block pt-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Cari item">
            </div>
        </div>
        <div class="pb-4">
            <a href="{{ route('pic.create') }}">
                <x-primary-button>Tambah Item</x-primary-button>
            </a>
        </div>
    </div>

    <!-- Table -->
    <div class="relative overflow-x-auto shadow sm:rounded-lg p-4 bg-white">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 rounded-lg">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-center">
                        NO
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nomor Telepon
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Bagian
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Aksi
                    </th>
                </tr>
            </thead>
            <tbody id="search-results">
                @foreach ($pics as $item)
                    <tr class="bg-white border-b hover:bg-gray-50">
                        <td class="w-4 p-4 text-center">
                            <span>{{ $loop->index + 1 }}</span>
                        </td>
                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{ $item->name }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $item->phone_number }}
                        </td>
                        <td class="px-6 py-4">
                            {{ convertSector($item->sector) }}
                        </td>
                        <td class="px-6 py-4">
                            <a href="{{ route('pic.edit', $item->uuid) }}">
                                <x-secondary-button
                                    class="mb-1 font-medium text-blue-600 sm:font-medium sm:text-blue-600 sm:mr-1">
                                    Edit
                                </x-secondary-button>
                            </a>
                            <x-danger-button onclick="confirmDelete('{{ $item->uuid }}')">
                                <a href="#" class="font-medium text-white">Delete</a>
                            </x-danger-button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <form id="delete-form" action="" method="POST" style="display: none;">
            @csrf
            @method('DELETE')
        </form>
        <nav id="pagination-links"
            class="p-2 pb-4 flex items-center flex-column flex-wrap md:flex-row justify-between pt-4"
            aria-label="Table navigation">
            <span class="text-sm font-normal text-gray-500 mb-4 md:mb-0 block w-full md:inline md:w-auto">
                Showing <span
                    class="font-semibold text-gray-900">{{ $pics->firstItem() }}-{{ $pics->lastItem() }}</span> of
                <span class="font-semibold text-gray-900">{{ $pics->total() }}</span>
            </span>
            <ul class="inline-flex -space-x-px rtl:space-x-reverse text-sm h-8">
                {{-- Previous Page Link --}}
                @if ($pics->onFirstPage())
                    <li>
                        <span
                            class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-l-lg cursor-default">Previous</span>
                    </li>
                @else
                    <li>
                        <a href="{{ $pics->previousPageUrl() }}"
                            class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-l-lg hover:bg-gray-100 hover:text-gray-700">Previous</a>
                    </li>
                @endif

                {{-- Pagination Elements --}}
                @foreach ($pics->getUrlRange(1, $pics->lastPage()) as $page => $url)
                    <li>
                        <a href="{{ $url }}"
                            class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 {{ $page == $pics->currentPage() ? 'text-blue-600 bg-blue-50' : '' }}">{{ $page }}</a>
                    </li>
                @endforeach

                {{-- Next Page Link --}}
                @if ($pics->hasMorePages())
                    <li>
                        <a href="{{ $pics->nextPageUrl() }}"
                            class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-r-lg hover:bg-gray-100 hover:text-gray-700">Next</a>
                    </li>
                @else
                    <li>
                        <span
                            class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-r-lg cursor-default">Next</span>
                    </li>
                @endif
            </ul>
        </nav>
    </div>

</x-app-layout>
