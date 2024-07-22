<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Sales') }}
        </h2>
    </x-slot>

    <div class="container bg-white p-6 rounded flex flex-col md:flex-row">
        <div
            class="basis-full md:basis-1/3 flex justify-center items-center mb-4 md:mb-0">
            <img src="{{ asset('storage/sales/' . $sales->img_url) }}" class="h-80 object-cover rounded-lg">
        </div>
        <div class="basis-full md:basis-2/3 px-4 flex flex-col">
            <div>
                <div class="font-semibold text-xl">
                    {{ $sales->name }}
                </div>
                <div class="text-lg font-medium mt-1">
                    {{ $sales->phone_number }}
                </div>
                <div class="text-justify mt-1">
                    {{ $sales->description }}
                </div>
            </div>
            <hr class="border-1 border-black my-4">
            <div>
                Leads points: <span class="font-semibold">{{ $sales->leads }}</span>
            </div>
        </div>
    </div>
</x-app-layout>
