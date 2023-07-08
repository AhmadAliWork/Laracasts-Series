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
    <body class="font-sans antialiased text-white">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900 ">
            @include('layouts.navigation')
            <!-- Page Content -->
            <main class="py-8">
                {{ $slot }}
            </main>

            <footer class="border-t border-gray-800">
                <div class="container mx-auto px-4 py-6">
                    Powered By <a href="" class="underline hover:text-gray-500"> IGBT API</a>
                </div>

            </footer>
        </div>
    </body>
</html>
