<div class="w-fit p-2 shadow rounded-sm border">
    <div class="w-60 h-60 rounded-sm mb-4">
        {{ $image }}
    </div>
    <div class="flex justify-between">
        <div class="flex flex-col">
            <span class="font-semibold text-lg">{{ $title }}</span>
            <span class="font-normal text-md">{{ $price }}</span>
        </div>
        <div class="mt-3">
            {{ $icon }}
        </div>
    </div>
</div>