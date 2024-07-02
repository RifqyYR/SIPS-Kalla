<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'HiCRO') }}</title>

    {{-- Favicon --}}
    <link rel="shortcut icon" href="toyota.png" type="image/x-icon">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
</head>

<body class="font-sans antialiased min-h-screen bg-gray-100">
    @include('layouts.sidebar')
    <main class="sm:w-[calc(100%-256px)] sm:ml-64">
        <div class="flex-row items-center pb-8">
            <div class="w-full">
                @include('layouts.navigation')
            </div>
            <div class="w-full p-10">
                {{ $slot }}
            </div>
        </div>
        @include('layouts.footer')
    </main>

    @include('includes.scripts')
</body>
</html>
