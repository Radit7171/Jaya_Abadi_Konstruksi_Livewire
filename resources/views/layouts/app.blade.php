<!DOCTYPE html>
<html lang="id" x-data x-init="$store.theme.init()">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Jaya Abadi Konstruksi')</title>
    <meta name="description" content="@yield('description', 'Spesialis konstruksi besi dan baja profesional')">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles

</head>

<body class="bg-body text-body d-flex flex-column min-vh-100" wire:navigate>

    <!-- ✅ LOADING OVERLAY -->
    <div wire:loading.flex wire:target="navigate"
        class="position-fixed top-0 start-0 w-100 h-100 bg-white bg-opacity-75
            align-items-center justify-content-center z-1050">
        <div class="spinner-border text-primary"></div>
    </div>

    <!-- Header -->
    <header>
        @include('components.navbar')
    </header>

    <!-- Main Content -->
    <main class="flex-fill page-transition">
        {{ $slot }}
    </main>

    <!-- Footer -->
    @include('components.footer')

    @livewireScripts

</body>

</html>
