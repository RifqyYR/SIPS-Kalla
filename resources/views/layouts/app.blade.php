<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased flex w-screen h-screen">
        <div class="flex-col">
            @include('layouts.sidebar')
        </div>
        <div class="flex flex-col flex-grow">
            @include('layouts.navigation')
            <div class="flex flex-col">
                <!-- Page Content -->
                <main class="flex flex-grow flex-col p-4 py-8">
                    {{ $slot }}
            </div>
        </div>
        {{-- <div class="min-h-screen bg-gray-100 flex flex-row">
            @include('layouts.navigation')

            <div class="flex flex-col">

                <!-- Page Heading -->
                @if (isset($header))
                    <header class="bg-white shadow">
                        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                            {{ $header }}
                        </div>
                    </header>
                @endif
    
                <!-- Page Content -->
                <main>
                    {{ $slot }}
            </div>

            </main>
        </div> --}}
    </body>
</html>
