<div class="visitor-stats-section">
    <div class="container-fluid">
        <h2 class="h4 fw-bold mb-4">📊 Statistik Pengunjung Detail</h2>

        {{-- Stats Cards --}}
        <div class="row g-3 mb-4">
            {{-- Total Visits Card --}}
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="stats-card bg-light rounded p-3 border">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <p class="text-muted small mb-1">Total Kunjungan</p>
                            <h3 class="h4 fw-bold mb-0">{{ number_format($stats['total_visits']) }}</h3>
                        </div>
                        <div class="stats-icon">👁️</div>
                    </div>
                </div>
            </div>

            {{-- Unique Visitors Card --}}
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="stats-card bg-light rounded p-3 border">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <p class="text-muted small mb-1">Pengunjung Unik</p>
                            <h3 class="h4 fw-bold mb-0">{{ number_format($stats['total_unique']) }}</h3>
                        </div>
                        <div class="stats-icon">👥</div>
                    </div>
                </div>
            </div>

            {{-- Today Visits Card --}}
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="stats-card bg-light rounded p-3 border">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <p class="text-muted small mb-1">Kunjungan Hari Ini</p>
                            <h3 class="h4 fw-bold mb-0">{{ number_format($stats['today_visits']) }}</h3>
                        </div>
                        <div class="stats-icon">📅</div>
                    </div>
                </div>
            </div>

            {{-- Today Unique Card --}}
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="stats-card bg-light rounded p-3 border">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <p class="text-muted small mb-1">Unik Hari Ini</p>
                            <h3 class="h4 fw-bold mb-0">{{ number_format($stats['today_unique']) }}</h3>
                        </div>
                        <div class="stats-icon">🎯</div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Weekly & Monthly Stats --}}
        <div class="row g-3 mb-4">
            <div class="col-12 col-lg-6">
                <div class="stats-card bg-light rounded p-3 border">
                    <p class="text-muted small mb-1">Kunjungan Minggu Ini</p>
                    <h3 class="h4 fw-bold">{{ number_format($stats['this_week_visits']) }}</h3>
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <div class="stats-card bg-light rounded p-3 border">
                    <p class="text-muted small mb-1">Kunjungan Bulan Ini</p>
                    <h3 class="h4 fw-bold">{{ number_format($stats['this_month_visits']) }}</h3>
                </div>
            </div>
        </div>

        {{-- Device Breakdown --}}
        <div class="row g-3 mb-4">
            <div class="col-12 col-lg-6">
                <div class="stats-card bg-light rounded p-3 border">
                    <h5 class="fw-bold mb-3">📱 Tipe Perangkat</h5>
                    <div class="device-breakdown">
                        @forelse($stats['device_breakdown'] as $device => $count)
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="text-capitalize">{{ $device ?? 'Unknown' }}</span>
                                <div class="d-flex align-items-center gap-2">
                                    <span class="badge bg-primary">{{ $count }}</span>
                                    <span class="text-muted small">({{ round(($count / $stats['total_visits']) * 100, 1) }}%)</span>
                                </div>
                            </div>
                        @empty
                            <p class="text-muted small">Belum ada data</p>
                        @endforelse
                    </div>
                </div>
            </div>

            {{-- Most Visited Pages --}}
            <div class="col-12 col-lg-6">
                <div class="stats-card bg-light rounded p-3 border">
                    <h5 class="fw-bold mb-3">🔗 Halaman Paling Banyak Dikunjungi</h5>
                    <div class="most-visited">
                        @forelse($stats['most_visited_pages'] as $page)
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="text-truncate" title="{{ $page['page_url'] ?? 'Unknown' }}">
                                    {{ str_replace(url('/'), '', $page['page_url'] ?? '/') ?: '/' }}
                                </span>
                                <span class="badge bg-success">{{ $page['visits'] ?? 0 }}</span>
                            </div>
                        @empty
                            <p class="text-muted small">Belum ada data</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>

        {{-- Data Table --}}
        <div class="stats-card bg-light rounded p-3 border">
            <h5 class="fw-bold mb-3">📋 Daftar Pengunjung Terbaru</h5>
            <div class="table-responsive">
                <table class="table table-sm table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>IP Address</th>
                            <th>Halaman</th>
                            <th>Device</th>
                            <th>Browser</th>
                            <th>Waktu</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse(\App\Models\Visitor::latest()->limit(10)->get() as $visitor)
                            <tr>
                                <td><code class="small">{{ $visitor->ip_address }}</code></td>
                                <td><small>{{ str_replace(url('/'), '', $visitor->page_url) ?: '/' }}</small></td>
                                <td>
                                    <span class="badge bg-info text-dark">
                                        {{ ucfirst($visitor->device_type) }}
                                    </span>
                                </td>
                                <td><small>{{ $visitor->browser ?: 'Unknown' }}</small></td>
                                <td><small class="text-muted">{{ $visitor->created_at->diffForHumans() }}</small></td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted">Belum ada data pengunjung</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
