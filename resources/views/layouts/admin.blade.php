<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', $title ?? 'Admin Dashboard - Jaya Abadi Konstruksi')</title>
    <meta name="description" content="@yield('description', 'Admin Dashboard Jaya Abadi Konstruksi')">

    <!-- Google Fonts - Modern Typography System -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@400;500;600;700&family=Inter:wght@400;500;600;700&family=Fira+Code:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <!-- Chart.js - Required for Admin Charts -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles

</head>

<body class="bg-body text-body d-flex flex-column min-vh-100 admin-dashboard-page">

    <!-- ✅ LOADING OVERLAY -->
    <div wire:loading.flex wire:target="navigate"
        class="position-fixed top-0 start-0 w-100 h-100 bg-white bg-opacity-75
            align-items-center justify-content-center z-1050">
        <div class="spinner-border text-primary"></div>
    </div>

    <!-- Admin Layout Container -->
    <div class="admin-layout d-flex">

        <!-- Sidebar -->
        @include('components.admin-sidebar')

        <!-- Main Content Area -->
        <div class="admin-main-wrapper flex-fill d-flex flex-column">

            <!-- Navbar -->
            @include('components.admin-navbar')

            <!-- Page Content -->
            <main class="admin-main-content flex-fill">
                {{ $slot }}
            </main>

        </div>

    </div>

    @livewireScripts

    <!-- Global Logout Confirmation Modal -->
    <div x-data="{ show: false }"
         x-on:show-logout-confirm.window="show = true"
         x-show="show"
         class="admin-modal-overlay"
         style="display: none; z-index: 9999;"
         x-transition
         x-cloak>
        <div class="admin-modal admin-modal-sm" @click.away="show = false">
            <div class="admin-modal-body text-center py-5">
                <div class="admin-delete-icon-wrapper mb-4" style="background: rgba(31, 41, 51, 0.1); color: var(--admin-primary);">
                    <i class="fas fa-door-open"></i>
                </div>
                <h3 class="admin-modal-title mb-3">Keluar Sistem?</h3>
                <p class="text-muted mb-4 small">
                    Apakah Anda yakin ingin mengakhiri sesi ini? Anda perlu login kembali untuk mengakses panel admin.
                </p>
                <div class="d-flex justify-content-center gap-2">
                    <form method="POST" action="{{ route('logout') }}" class="m-0">
                        @csrf
                        <button type="submit" class="admin-btn admin-btn-primary px-4">
                            <i class="fas fa-check me-2"></i>Ya, Logout
                        </button>
                    </form>
                    <button type="button" @click="show = false" class="admin-btn admin-btn-outline px-4">
                        Batal
                    </button>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
