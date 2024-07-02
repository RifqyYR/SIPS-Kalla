<div class="flex-1 bg-white min-h-24 shadow-lg rounded-lg flex items-center justify-between px-6 md:min-h-28">
    <div class="flex flex-col">
        @if (@isset($title))
            <span class="font-semibold text-md mb-1">{{ $title }}</span>
        @endif
        @if (@isset($n_count))
            <span class="font-semibold text-2xl">{{ $n_count }}</span>
        @endif
    </div>
    <div class="flex-shrink-0">
        {{ $icon }}
    </div>
</div>
