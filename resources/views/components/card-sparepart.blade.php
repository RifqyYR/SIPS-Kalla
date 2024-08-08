<div class="w-fit p-2 px-4 shadow rounded-sm border bg-white mb-4">
    <div class="w-60 h-60 md:h-fit rounded-sm mb-4">
        {{ $image }}
    </div>
    <div class="flex justify-between">
        <div class="flex flex-col w-48">
            <span class="font-semibold text-lg truncate">{{ $title }}</span>
            <span class="font-normal text-md">{{ $price }}</span>
        </div>
        <div class="mt-3">
            {{ $icon }}
        </div>
    </div>
</div>