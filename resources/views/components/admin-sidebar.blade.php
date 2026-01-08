<aside class="admin-sidebar bg-body border-end" id="adminSidebar">

    <!-- Sidebar Header - Logo & Brand -->
    <div class="admin-sidebar-header d-flex align-items-center gap-3 p-3 border-bottom">
        <img src="{{ asset('images/logo-jaya-abadi-konstruksi.png') }}"
             alt="Logo Jaya Abadi Konstruksi"
             width="48"
             height="48"
             class="rounded-circle"
             style="object-fit: cover;">
        <div class="admin-sidebar-brand-text">
            <h3 class="h6 fw-bold mb-0 lh-1">JAK Admin</h3>
            <p class="small text-muted mb-0 lh-1">Dashboard</p>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="admin-sidebar-menu p-3">
        <ul class="list-unstyled m-0">

            <!-- Dashboard Link -->
            <li class="admin-sidebar-item">
                <a href="{{ route('admin.dashboard') }}"
                   wire:navigate
                   class="admin-sidebar-link d-flex align-items-center gap-2 {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <i class="fas fa-chart-line"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <!-- Projects Management Link -->
            <li class="admin-sidebar-item">
                <a href="{{ route('admin.projects') }}"
                   wire:navigate
                   class="admin-sidebar-link d-flex align-items-center gap-2 {{ request()->routeIs('admin.projects') ? 'active' : '' }}">
                    <i class="fas fa-hammer"></i>
                    <span>Kelola Proyek</span>
                </a>
            </li>

        </ul>
    </nav>

    <!-- Sidebar Footer - Theme Toggle, Profile & Logout -->
    <div class="admin-sidebar-footer border-top p-2">

        <!-- Theme Toggle -->
        <div class="admin-sidebar-theme mb-2 pb-2 border-bottom">
            <div class="d-flex align-items-center justify-content-center gap-2 w-100">
                <span class="small text-muted d-md-none" style="font-size: 0.65rem;">Tema</span>
                <x-theme-toggle :showLabel="false" />
            </div>
        </div>

        <!-- User Profile Info -->
        <div class="admin-sidebar-profile mb-2">
            <div class="d-flex align-items-center gap-2">
                <img src="{{ asset('images/logo-jaya-abadi-konstruksi.png') }}"
                     alt="{{ Auth::user()->name }}"
                     class="rounded-circle"
                     width="40"
                     height="40"
                     style="object-fit: cover;">
                <div class="flex-grow-1 min-w-0">
                    <p class="small fw-medium mb-0 text-truncate">{{ Auth::user()->name }}</p>
                    <p class="small text-muted mb-0 text-truncate">{{ Auth::user()->email }}</p>
                </div>
            </div>
        </div>

        <!-- Logout Button -->
        <form method="POST" action="{{ route('logout') }}" class="m-0">
            @csrf
            <button type="submit" class="admin-sidebar-logout btn btn-sm btn-outline-danger w-100 d-flex align-items-center justify-content-center gap-2">
                <i class="fas fa-sign-out-alt"></i>
                <span>Logout</span>
            </button>
        </form>
    </div>

</aside>
