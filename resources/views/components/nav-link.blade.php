@props(['active'])

@php
$classes = ($active ?? false)
            ? 'flex items-center px-4 p-2 font-bold font-normal text-white rounded-lg bg-[#3B7A57] focus:outline-none transition duration-150 ease-in-out'
            : 'flex items-center px-4 p-2 font-normal text-white hover:text-white rounded-lg hover:bg-[#3B7A57] focus:outline-none focus:text-white focus:border-white transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
