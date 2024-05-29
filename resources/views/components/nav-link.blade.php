@props(['active'])

{{-- @php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-1 pt-1 border-b-2 border-indigo-400 text-sm font-medium leading-5 text-gray-900 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out'
            : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out';
@endphp --}}

@php
$classes = ($active ?? false)
            ? 'flex items-center px-4 p-2 font-bold font-normal text-green-800 rounded-lg bg-gray-100 focus:outline-none transition duration-150 ease-in-out'
            : 'flex items-center px-4 p-2 font-normal text-gray-900 hover:text-green-900 rounded-lg hover:bg-gray-100 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
