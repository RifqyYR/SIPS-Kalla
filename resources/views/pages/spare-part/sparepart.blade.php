<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Sparepart') }}
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
            <a href="{{ route('sparepart.create') }}">
                <x-primary-button>Tambah Item</x-primary-button>
            </a>
        </div>
    </div>


    @if (count($sparepart) !== 0)
        <div class="grid grid-cols-4 justify-between mb-6">
            @foreach ($sparepart as $item)
                <x-card-sparepart>
                    <x-slot name="image">
                        <a href="{{ route('sparepart.detail', $item->uuid) }}">
                            <img src="{{ asset('storage/sparepart/' . $item->img_url) }}" alt="{{ $item->name }}"
                                class="rounded-md max-w-full h-60">
                        </a>
                    </x-slot>
                    <x-slot name="title">
                        <a href="{{ route('sparepart.detail', $item->uuid) }}">
                            {{ $item->name }}
                        </a>
                    </x-slot>
                    <x-slot name="price">Rp. {{ number_format($item->price, 0, ',', '.') }}</x-slot>
                    <x-slot name="icon">
                        <x-dropdown>
                            <x-slot name="trigger">
                                <button class="focus:outline-none transition ease-in-out duration-150">
                                    <svg class="w-4 h-4" id="fi_2311524" enable-background="new 0 0 32 32"
                                        height="512" viewBox="0 0 32 32" width="512"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path id="XMLID_294_"
                                            d="m13 16c0 1.654 1.346 3 3 3s3-1.346 3-3-1.346-3-3-3-3 1.346-3 3z">
                                        </path>
                                        <path id="XMLID_295_"
                                            d="m13 26c0 1.654 1.346 3 3 3s3-1.346 3-3-1.346-3-3-3-3 1.346-3 3z">
                                        </path>
                                        <path id="XMLID_297_"
                                            d="m13 6c0 1.654 1.346 3 3 3s3-1.346 3-3-1.346-3-3-3-3 1.346-3 3z">
                                        </path>
                                    </svg>
                                </button>
                            </x-slot>
                            <x-slot name='content'>
                                <x-dropdown-link href="{{ route('sparepart.edit', $item->uuid) }}">
                                    Edit
                                </x-dropdown-link>
                                <x-dropdown-link onclick="confirmDelete('{{ $item->uuid }}')">
                                    Hapus
                                </x-dropdown-link>
                            </x-slot>
                        </x-dropdown>
                    </x-slot>
                </x-card-sparepart>
            @endforeach
        </div>
        <nav id="pagination-links" class="flex items-center flex-column flex-wrap md:flex-row justify-center pt-4">
            <ul class="inline-flex -space-x-px rtl:space-x-reverse text-sm h-8">
                {{-- Previous Page Link --}}
                @if ($sparepart->onFirstPage())
                    <li>
                        <span
                            class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-l-lg cursor-default">Previous</span>
                    </li>
                @else
                    <li>
                        <a href="{{ $sparepart->previousPageUrl() }}"
                            class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-l-lg hover:bg-gray-100 hover:text-gray-700">Previous</a>
                    </li>
                @endif

                {{-- Pagination Elements --}}
                @foreach ($sparepart->getUrlRange(1, $sparepart->lastPage()) as $page => $url)
                    <li>
                        <a href="{{ $url }}"
                            class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 {{ $page == $sparepart->currentPage() ? 'text-blue-600 bg-blue-50' : '' }}">{{ $page }}</a>
                    </li>
                @endforeach

                {{-- Next Page Link --}}
                @if ($sparepart->hasMorePages())
                    <li>
                        <a href="{{ $sparepart->nextPageUrl() }}"
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
    @else
        <div class="mb-6 text-center text-gray-500">
            <span>Belum ada data</span>
        </div>
    @endif

    <form id="delete-form" action="" method="POST" style="display: none;">
        @csrf
        @method('DELETE')
    </form>
</x-app-layout>
