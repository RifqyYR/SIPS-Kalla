@php
    function status($service_status)
    {
        if ($service_status == 'WAITING') {
            $status = 'Menunggu';
            $class_status = 'bg-yellow-500 p-2 rounded-lg text-white';
            return [$status, $class_status];
        } elseif ($service_status == 'CONFIRMED') {
            $status = 'Dikonfirmasi';
            $class_status = 'bg-green-500 p-2 rounded-lg text-white';
            return [$status, $class_status];
        } elseif ($service_status == 'CANCELLED') {
            $status = 'Ditolak';
            $class_status = 'bg-red-500 p-2 rounded-lg text-white';
            return [$status, $class_status];
        } else {
            $status = 'Selesai';
            $class_status = 'bg-blue-500 p-2 rounded-lg text-white';
            return [$status, $class_status];
        }
    }
@endphp

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Service') }}
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
    </div>

    <!-- Table -->
    <div class="relative overflow-x-auto shadow sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3">No</th>
                    <th scope="col" class="px-6 py-3">Nama Customer</th>
                    <th scope="col" class="px-6 py-3">Tipe Servis</th>
                    <th scope="col" class="px-6 py-3">Tangal</th>
                    <th scope="col" class="px-6 py-3">Waktu</th>
                    <th scope="col" class="px-6 py-3">Status</th>
                    <th scope="col" class="px-6 py-3">Aksi</th>
                </tr>
            </thead>
            <tbody id="search-results">
                @foreach ($service as $item)
                    <tr class="bg-white border-b hover:bg-gray-50">
                        <td class="w-4 p-4">
                            <div class="flex justify-center">
                                <span>{{ $loop->index + 1 }}</span>
                            </div>
                        </td>
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">{{ $item->client->name }}</td>
                        <td class="px-6 py-4 capitalize">
                            {{ $item->type == 'BOOK' ? 'Servis Reservasi' : 'Servis Kunjungan' }}</td>
                        <td class="px-6 py-4">{{ $item->date }}</td>
                        <td class="px-6 py-4">{{ $item->time }}</td>
                        <td class="px-6 py-4">
                            <span class="{{ status($item->status)[1] }}">
                                {{ status($item->status)[0] }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-nowrap">
                            <a href="{{ route('service.edit', $item->uuid) }}">
                                <x-secondary-button class="font-medium text-blue-600">
                                    Edit
                                </x-secondary-button>
                            </a>
                            <x-danger-button onclick="confirmDelete('{{ $item->uuid }}')">
                                <a href="#" class="font-medium text-white">Hapus</a>
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

        <!-- Pagination -->
        <nav id="pagination-links"
            class="p-2 pb-4 flex items-center flex-column flex-wrap md:flex-row justify-between pt-4"
            aria-label="Table navigation">
            <span class="text-sm font-normal text-gray-500 mb-4 md:mb-0 block w-full md:inline md:w-auto">
                Showing <span
                    class="font-semibold text-gray-900">{{ $service->firstItem() }}-{{ $service->lastItem() }}</span>
                of
                <span class="font-semibold text-gray-900">{{ $service->total() }}</span>
            </span>
            <ul class="inline-flex -space-x-px rtl:space-x-reverse text-sm h-8">
                {{-- Previous Page Link --}}
                @if ($service->onFirstPage())
                    <li>
                        <span
                            class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-l-lg cursor-default">Previous</span>
                    </li>
                @else
                    <li>
                        <a href="{{ $service->previousPageUrl() }}"
                            class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-l-lg hover:bg-gray-100 hover:text-gray-700">Previous</a>
                    </li>
                @endif

                {{-- Pagination Elements --}}
                @foreach ($service->getUrlRange(1, $service->lastPage()) as $page => $url)
                    <li>
                        <a href="{{ $url }}"
                            class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 {{ $page == $service->currentPage() ? 'text-blue-600 bg-blue-50' : '' }}">{{ $page }}</a>
                    </li>
                @endforeach

                {{-- Next Page Link --}}
                @if ($service->hasMorePages())
                    <li>
                        <a href="{{ $service->nextPageUrl() }}"
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
