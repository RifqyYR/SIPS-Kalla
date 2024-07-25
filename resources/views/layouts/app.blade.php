<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'HiCRO') }}</title>

    {{-- Favicon --}}
    <link rel="shortcut icon" href="{{ url('toyota.png') }}" type="image/x-icon">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    {{-- SweetAlert --}}
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.11.1/dist/sweetalert2.min.css" rel="stylesheet">

    {{-- XZOOM --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/xzoom/1.0.15/xzoom.min.css" integrity="sha512-Y58ai8uVim58rsa9pEXJK/fyyFHkbZp6yluEAxAC0iTKyuhAkvUQlkXRRCEyZdLDTnc3cSVF9f/EhB+fThhTNQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- lEAFLETJS --}}
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
     integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
     crossorigin=""/>


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
