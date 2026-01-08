<nav class="admin-navbar bg-body border-bottom">
    <div class="admin-navbar-container d-flex align-items-center justify-content-between">

        <!-- Left Side - Menu Toggle -->
        <div class="admin-navbar-left d-flex align-items-center gap-3">
            <button class="admin-navbar-toggle btn btn-sm btn-light" id="sidebarToggle">
                <i class="fas fa-bars"></i>
            </button>
        </div>

        <!-- Right Side - User Menu (Profile only on mobile, hide theme) -->
        <div class="admin-navbar-right d-flex align-items-center gap-3">

            <!-- Theme Toggle (Hidden on mobile) -->
            <div class="admin-navbar-theme d-none d-lg-flex">
                <x-theme-toggle :showLabel="false" />
            </div>

            <!-- User Profile Dropdown -->
            <div class="dropdown">
                <button class="admin-navbar-user btn btn-sm btn-light dropdown-toggle d-flex align-items-center gap-2"
                        type="button"
                        data-bs-toggle="dropdown"
                        aria-expanded="false">
                    <img src="{{ asset('images/logo-jaya-abadi-konstruksi.png') }}"
                         alt="{{ Auth::user()->name }}"
                         class="rounded-circle"
                         width="32"
                         height="32"
                         style="object-fit: cover;">
                    <span class="d-none d-md-inline">{{ Auth::user()->name }}</span>
                </button>

                <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                        <span class="dropdown-item-text text-muted small">
                            {{ Auth::user()->email }}
                        </span>
                    </li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}" class="m-0">
                            @csrf
                            <button type="submit" class="dropdown-item text-danger">
                                <i class="fas fa-sign-out-alt me-2"></i>
                                Logout
                            </button>
                        </form>
                    </li>
                </ul>
            </div>

        </div>

    </div>
</nav>
