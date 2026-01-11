<nav class="navbar navbar-expand-lg fixed-top modern-navbar">
    <div class="container navbar-container">
        <!-- Logo & Brand -->
        <a href="/" wire:navigate class="navbar-brand-wrapper d-flex align-items-center text-decoration-none">
            <div class="logo-wrapper">
                <img src="{{ asset('images/logo-jaya-abadi-konstruksi.png') }}"
                     alt="Logo"
                     class="navbar-logo-img">
            </div>
            <div class="brand-text-wrapper ms-2 ms-md-3">
                <span class="brand-name">Jaya Abadi Konstruksi</span>
                <span class="brand-tagline">Solution for Infrastructure</span>
            </div>
        </a>

        <!-- Mobile Toggler -->
        <button class="navbar-toggler-modern collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar" aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="toggler-icon top-bar"></span>
            <span class="toggler-icon middle-bar"></span>
            <span class="toggler-icon bottom-bar"></span>
        </button>

        <!-- Navbar Menu -->
        <div class="collapse navbar-collapse" id="mainNavbar">
            <ul class="navbar-nav ms-auto align-items-lg-center">
                @php
                    $navItems = [
                        ['route' => '/', 'label' => 'Home', 'icon' => 'fas fa-house', 'active' => request()->is('/')],
                        ['route' => '/tentang-kami', 'label' => 'Tentang Kami', 'icon' => 'fas fa-city', 'active' => request()->is('tentang-kami*')],
                        ['route' => '/layanan', 'label' => 'Layanan', 'icon' => 'fas fa-gears', 'active' => request()->is('layanan*')],
                        ['route' => '/proyek', 'label' => 'Proyek', 'icon' => 'fas fa-hammer', 'active' => request()->is('proyek*')],
                        ['route' => '/kontak', 'label' => 'Kontak', 'icon' => 'fas fa-envelope', 'active' => request()->is('kontak*')],
                    ];
                @endphp

                @foreach($navItems as $item)
                    <li class="nav-item">
                        <a class="nav-link-modern {{ $item['active'] ? 'active' : '' }}"
                           href="{{ url($item['route']) }}"
                           wire:navigate>
                            <i class="{{ $item['icon'] }} nav-icon"></i>
                            <span class="nav-label">{{ $item['label'] }}</span>
                        </a>
                    </li>
                @endforeach

                <!-- Theme & Action -->
                <li class="nav-item ms-lg-2 theme-toggle-item">
                    <x-theme-toggle />
                </li>
            </ul>
        </div>
    </div>
</nav>
