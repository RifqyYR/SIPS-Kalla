<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Katalog Mobil') }}
        </h2>
    </x-slot>

    <!-- Button -->
    <div class="flex justify-between pb-4">
        <div class="pb-4">
            <label for="table-search" class="sr-only justify-end">Search</label>
            <div class="relative mt-1">
                <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                    </svg>
                </div>
                <input type="text" id="table-search" class="block pt-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500" placeholder="Cari item">
            </div>
        </div>
        <div class="pb-4">
            <a href="#">
                <x-primary-button>Tambah Item</x-primary-button>
            </a>
        </div>
    </div>
    
    <div class="grid grid-cols-3 mb-6 gap-12">
        @foreach ($catalog as $item)
            <x-card-catalog>
                <x-slot name="type">{{ $item->type }}</x-slot>
                <x-slot name="img">{{ $item->img }}</x-slot>
            </x-card-catalog>
        @endforeach

        <form id="delete-form" action="" method="POST" style="display: none;">
            @csrf
            @method('DELETE')
        </form>
        
    </div>

    <nav id="pagination-links"
        class="flex items-center flex-column flex-wrap md:flex-row justify-center pt-4">
        <ul class="inline-flex -space-x-px rtl:space-x-reverse text-sm h-8">
            {{-- Previous Page Link --}}
            @if ($catalog->onFirstPage())
                <li>
                    <span
                        class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-l-lg cursor-default">Previous</span>
                </li>
            @else
                <li>
                    <a href="{{ $catalog->previousPageUrl() }}"
                        class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-l-lg hover:bg-gray-100 hover:text-gray-700">Previous</a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($catalog->getUrlRange(1, $catalog->lastPage()) as $page => $url)
                <li>
                    <a href="{{ $url }}"
                        class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 {{ $page == $catalog->currentPage() ? 'text-blue-600 bg-blue-50' : '' }}">{{ $page }}</a>
                </li>
            @endforeach

            {{-- Next Page Link --}}
            @if ($catalog->hasMorePages())
                <li>
                    <a href="{{ $catalog->nextPageUrl() }}"
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

</x-app-layout>
