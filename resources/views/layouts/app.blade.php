<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicons, auto switch based on browser theme -->
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon_dark.ico') }}" media="(prefers-color-scheme: dark)" />
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon_light.ico') }}" media="(prefers-color-scheme: light)" />


    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-gray-100 dark:bg-gray-900 flex min-h-screen flex-col">

    @include('layouts.navigation')

    <!-- Page Heading -->
    @isset($header)
        <header class="bg-white dark:bg-gray-800 shadow">
            <div
                class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 text-gray-800 dark:text-gray-100 flex items-center justify-between">
                {{ $header }}
            </div>
        </header>
    @endisset

    <!-- Page Content -->
    <main class="flex-grow flex-col w-full mx-auto text-gray-800 dark:text-gray-100">
        {{ $slot }}
    </main>

    @include('layouts.footer')
</body>

</html>
