<div class="flex-auto h-52 shadow-lg rounded-lg">
    <div class="flex flex-col p-4 text-center">
        @if (@isset($title))
            <span class="font-semibold text-2xl mb-4">{{ $title }}</span>
        @endif
        @if (@isset($n_count))
            <span class="font-semibold text-8xl">{{ $n_count }}</span>
        @endif
    </div>
</div>