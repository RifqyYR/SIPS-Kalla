<div class="py-4 px-8 shadow rounded-sm border bg-white">
    <div class="flex justify-between mb-2">
        <span class="text-xs xl:text-sm font-semibold">{{ $type }}</span>
        <div>
            {{ $icon }}
        </div>

    </div>
    <div class="rounded-sm">
        <div class="flex justify-center xl:w-full h-44 md:h-24 xl:h-60 my-4">
            {{ $img }}
        </div>
    </div>
    <div class="flex justify-center">
        <div class="flex flex-col w-full">
            <span class="font-semibold xl:text-2xl mb-4 text-center">{{ $name }}</span>
            <div>{{ $detail }}</div>
        </div>
    </div>
</div>