<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Promo') }}
        </h2>
    </x-slot>

    <!-- Button -->
    <div class="flex justify-end pb-4">
        <div class="pb-4">
            <a href="{{ route('promo.create') }}">
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
                        IMAGE
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody id="search-results">
                @foreach ($promos as $item)
                    <tr class="bg-white border-b hover:bg-gray-50">
                        <td class="w-4 p-4 text-center">
                            <span>{{ $loop->index + 1 }}</span>
                        </td>
                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            <img src="{{ asset('storage/promo/' . $item->img_url) }}" alt="" class="w-28">
                        </td>
                        <td class="px-6 py-4">
                            <a href="{{ route('promo.edit', $item->uuid) }}">
                                <x-secondary-button class="mb-1 font-medium text-blue-600 sm:font-medium sm:text-blue-600 sm:mr-1">
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
                    class="font-semibold text-gray-900">{{ $promos->firstItem() }}-{{ $promos->lastItem() }}</span> of
                <span class="font-semibold text-gray-900">{{ $promos->total() }}</span>
            </span>
            <ul class="inline-flex -space-x-px rtl:space-x-reverse text-sm h-8">
                {{-- Previous Page Link --}}
                @if ($promos->onFirstPage())
                    <li>
                        <span
                            class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-l-lg cursor-default">Previous</span>
                    </li>
                @else
                    <li>
                        <a href="{{ $promos->previousPageUrl() }}"
                            class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-l-lg hover:bg-gray-100 hover:text-gray-700">Previous</a>
                    </li>
                @endif

                {{-- Pagination Elements --}}
                @foreach ($promos->getUrlRange(1, $promos->lastPage()) as $page => $url)
                    <li>
                        <a href="{{ $url }}"
                            class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 {{ $page == $promos->currentPage() ? 'text-blue-600 bg-blue-50' : '' }}">{{ $page }}</a>
                    </li>
                @endforeach

                {{-- Next Page Link --}}
                @if ($promos->hasMorePages())
                    <li>
                        <a href="{{ $promos->nextPageUrl() }}"
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
