<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Airplane Booking System')</title>
    
    {{-- Load CSS dengan Vite --}}
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">

    {{-- Include the reusable header --}}
    <x-header />

    {{-- Page content --}}
    <div class="container mx-auto my-8 px-4">
        @yield('content')
    </div>

    {{-- Include the reusable footer --}}
    <x-footer />

    {{-- Load JS dengan Vite --}}
    @vite('resources/js/app.js')
</body>
</html>
