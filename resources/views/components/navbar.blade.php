<nav class="navbar navbar-expand-lg border-bottom sticky-top bg-body">
    <div class="container px-3 px-md-4">
        <!-- Logo dengan Teks -->
        <div class="d-flex align-items-center">
            <!-- Logo/Icon Perusahaan (ganti dengan logo asli) -->
            <div class="logo-placeholder me-3">
                <img src="{{ asset('images/logo-jaya-abadi-konstruksi.png') }}"
                     alt="Logo Jaya Abadi Konstruksi"
                     width="50"
                     height="50"
                     class="rounded-circle object-fit-cover">
                <!-- Jika tidak ada logo, gunakan icon placeholder -->
                <!-- <i class="bi bi-building fs-3"></i> -->
            </div>

            <!-- Teks Perusahaan -->
            <div class="company-text">
                <h1 class="h5 fw-bold mb-0 lh-1 text-body-emphasis">Jaya Abadi Konstruksi</h1>
                <p class="small text-body-secondary mb-0 lh-1">spesialis konstruksi</p>
            </div>
        </div>

        <!-- Mobile Toggle -->
        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#mainNavbar"
            aria-controls="mainNavbar"
            aria-expanded="false"
            aria-label="Toggle navigation"
        >
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Menu Items -->
        <div class="collapse navbar-collapse" id="mainNavbar">
            <ul class="navbar-nav ms-auto mb-lg-0 align-items-lg-center gap-2">
                <!-- Navigation Items -->
                @php
                    $navItems = [
                        [
                            'route' => '/',
                            'label' => 'Home',
                            'icon' => 'bi bi-house-door',
                            'active' => request()->is('/')
                        ],
                        [
                            'route' => '/tentang-kami',
                            'label' => 'Tentang Kami',
                            'icon' => 'bi bi-building',
                            'active' => request()->is('tentang-kami*')
                        ],
                        [
                            'route' => '/layanan',
                            'label' => 'Layanan',
                            'icon' => 'bi bi-tools',
                            'active' => request()->is('layanan*')
                        ],
                        [
                            'route' => '/proyek',
                            'label' => 'Proyek',
                            'icon' => 'bi bi-bricks',
                            'active' => request()->is('proyek*')
                        ],
                        [
                            'route' => '/kontak',
                            'label' => 'Kontak',
                            'icon' => 'bi bi-envelope',
                            'active' => request()->is('kontak*')
                        ],
                    ];
                @endphp

                @foreach($navItems as $item)
                    <li class="nav-item">
                        <a
                            class="nav-link {{ $item['active'] ? 'active' : '' }}"
                            href="{{ url($item['route']) }}"
                            wire:navigate
                            wire:loading.class="text-muted"
                            wire:loading.attr="disabled"
                        >
                            <i class="{{ $item['icon'] }}"></i>
                            <span>{{ $item['label'] }}</span>
                            <span wire:loading wire:target="navigate" class="ms-2">
                                <span class="spinner-border spinner-border-sm" role="status"></span>
                            </span>
                        </a>
                    </li>
                @endforeach

                <!-- Theme Toggle -->
                <li class="nav-item ms-lg-3">
                    <x-theme-toggle />
                </li>
            </ul>
        </div>
    </div>
</nav>
