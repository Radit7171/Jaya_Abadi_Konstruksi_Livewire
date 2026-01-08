<aside class="admin-sidebar bg-body border-end">

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

</aside>
