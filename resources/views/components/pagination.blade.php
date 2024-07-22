<ul class="inline-flex -space-x-px rtl:space-x-reverse text-sm h-8">
    {{-- Previous Page Link --}}
    @if ($paginator->onFirstPage())
        <li>
            <span
                class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-l-lg cursor-default">Previous</span>
        </li>
    @else
        <li>
            <a href="{{ $paginator->previousPageUrl() }}"
                class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-l-lg hover:bg-gray-100 hover:text-gray-700">Previous</a>
        </li>
    @endif

    {{-- Pagination Elements --}}
    @foreach ($paginator->getUrlRange(1, $paginator->lastPage()) as $page => $url)
        <li>
            <a href="{{ $url }}"
                class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 {{ $page == $paginator->currentPage() ? 'text-blue-600 bg-blue-50' : '' }}">{{ $page }}</a>
        </li>
    @endforeach

    {{-- Next Page Link --}}
    @if ($paginator->hasMorePages())
        <li>
            <a href="{{ $paginator->nextPageUrl() }}"
                class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-r-lg hover:bg-gray-100 hover:text-gray-700">Next</a>
        </li>
    @else
        <li>
            <span
                class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-r-lg cursor-default">Next</span>
        </li>
    @endif
</ul>
