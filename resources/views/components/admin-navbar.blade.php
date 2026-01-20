<nav class="admin-navbar bg-body" x-data>
    <div class="admin-navbar-container d-flex align-items-center justify-content-between">

        <!-- Left Side - Menu Toggle -->
        <div class="admin-navbar-left d-flex align-items-center gap-3">
            <!-- Mobile Toggle -->
            <button class="admin-navbar-toggle admin-navbar-toggle-mobile d-lg-none" id="sidebarToggleMobile">
                <i class="fas fa-align-left"></i>
            </button>

            <!-- Desktop Toggle (Collapse Sidebar) -->
            <button class="admin-navbar-toggle admin-navbar-toggle-desktop d-none d-lg-inline-flex" id="sidebarToggleDesktop">
                <i class="fas fa-bars" id="sidebarToggleIcon"></i>
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
                        <button type="button"
                                class="dropdown-item text-danger d-flex align-items-center gap-2"
                                x-on:click.prevent="$dispatch('show-logout-confirm')">
                            <i class="fas fa-sign-out-alt"></i>
                            Logout
                        </button>
                    </li>
                </ul>
            </div>

        </div>

    </div>
</nav>
