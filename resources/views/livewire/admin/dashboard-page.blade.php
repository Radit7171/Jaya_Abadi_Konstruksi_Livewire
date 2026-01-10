<div class="admin-dashboard-page">

    <!-- Page Header -->
    <div class="admin-page-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h1 class="admin-page-title">Dashboard</h1>
                    <p class="admin-page-subtitle">Selamat datang kembali, {{ Auth::user()->name }}!</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Dashboard Stats -->
    <div class="admin-dashboard-stats">
        <div class="container-fluid">
            <div class="row g-4">

                <!-- Total Projects Card -->
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="admin-stat-card">
                        <div class="admin-stat-icon bg-primary">
                            <i class="fas fa-hammer"></i>
                        </div>
                        <div class="admin-stat-content">
                            <h3 class="admin-stat-value">{{ $stats['total_projects'] }}</h3>
                            <p class="admin-stat-label">Total Proyek</p>
                        </div>
                    </div>
                </div>

                <!-- Published Projects Card -->
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="admin-stat-card">
                        <div class="admin-stat-icon bg-success">
                            <i class="fas fa-check-circle"></i>
                        </div>
                        <div class="admin-stat-content">
                            <h3 class="admin-stat-value">{{ $stats['published_projects'] }}</h3>
                            <p class="admin-stat-label">Proyek Dipublikasi</p>
                        </div>
                    </div>
                </div>

                <!-- Draft Projects Card -->
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="admin-stat-card">
                        <div class="admin-stat-icon bg-warning">
                            <i class="fas fa-file-alt"></i>
                        </div>
                        <div class="admin-stat-content">
                            <h3 class="admin-stat-value">{{ $stats['draft_projects'] }}</h3>
                            <p class="admin-stat-label">Proyek Draft</p>
                        </div>
                    </div>
                </div>

                <!-- Total Users Card -->
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="admin-stat-card">
                        <div class="admin-stat-icon bg-info">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="admin-stat-content">
                            <h3 class="admin-stat-value">{{ $stats['total_users'] }}</h3>
                            <p class="admin-stat-label">Total Users</p>
                        </div>
                    </div>
                </div>

                <!-- Total Visitors Card -->
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="admin-stat-card">
                        <div class="admin-stat-icon bg-secondary">
                            <i class="fas fa-eye"></i>
                        </div>
                        <div class="admin-stat-content">
                            <h3 class="admin-stat-value">{{ number_format($stats['total_visitors']) }}</h3>
                            <p class="admin-stat-label">Total Kunjungan</p>
                        </div>
                    </div>
                </div>

                <!-- Unique Visitors Card -->
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="admin-stat-card">
                        <div class="admin-stat-icon bg-dark">
                            <i class="fas fa-user-tie"></i>
                        </div>
                        <div class="admin-stat-content">
                            <h3 class="admin-stat-value">{{ number_format($stats['unique_visitors']) }}</h3>
                            <p class="admin-stat-label">Pengunjung Unik</p>
                        </div>
                    </div>
                </div>

                <!-- Today Visitors Card -->
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="admin-stat-card">
                        <div class="admin-stat-icon bg-danger">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <div class="admin-stat-content">
                            <h3 class="admin-stat-value">{{ $stats['today_visitors'] }}</h3>
                            <p class="admin-stat-label">Kunjungan Hari Ini</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="admin-dashboard-actions">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="admin-actions-card">
                        <h2 class="admin-actions-title">Aksi Cepat</h2>
                        <div class="admin-actions-buttons d-flex gap-3 flex-wrap">
                            <a href="{{ route('admin.projects') }}" wire:navigate class="admin-btn admin-btn-primary">
                                <i class="fas fa-hammer me-2"></i>
                                Kelola Proyek
                            </a>
                            <a href="{{ route('home') }}" wire:navigate class="admin-btn admin-btn-outline">
                                <i class="fas fa-arrow-left me-2"></i>
                                Kembali ke Website
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Visitor Charts Section -->
    <div class="admin-charts-section">
        <livewire:admin.visitor-charts />
    </div>

</div>
