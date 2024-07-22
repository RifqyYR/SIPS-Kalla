@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 focus:border-[#01803D] focus:ring-[#01803D] rounded-md shadow-sm']) !!}>
