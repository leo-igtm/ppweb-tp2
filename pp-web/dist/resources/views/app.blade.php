<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title inertia>{{ config('app.name', 'Arkham') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link rel="icon" href="/icon/inmobiliaria.png" type="image/png">
        <link rel="apple-touch-icon" href="/icon/inmobiliaria.png">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.jsx'])
        @inertiaHead
        @routes
    </head>
    <body class="min-h-screen bg-transparent text-slate-100">
        @inertia
    </body>
</html>
