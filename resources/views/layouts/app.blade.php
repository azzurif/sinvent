<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
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
    <body class="font-sans antialiased">
        <div class="min-h-screen  bg-white dark:bg-primary text-primary dark:text-white">
            <livewire:layout.navigation />

            <!-- Page Content -->
            <main class="pl-4 md:pl-[17rem] pt-20 pr-4 md:pr-6 pb-4 md:pb-6">
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
