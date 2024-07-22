@props(['image'])

@php
    $classes = $image ?? false ? 'hidden w-28 mr-6' : 'mr-6 w-28';
@endphp

<div class="shrink-0">
    <img {{ $attributes->merge(['class' => $classes]) }} />
</div>
