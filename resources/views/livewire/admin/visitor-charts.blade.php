{{--
|--------------------------------------------------------------------------
| VISITOR CHARTS COMPONENT
|--------------------------------------------------------------------------
| FINAL RULE (JANGAN DILANGGAR):
| - Blade = MARKUP ONLY
| - TIDAK ADA:
|   - inline style
|   - inline script
|   - JS behavior
|
| - Semua CSS ada di resources/css/pages/admin/visitor-charts.css
| - Semua behavior ada di resources/js/pages/admin/visitor-charts.js
|--------------------------------------------------------------------------
--}}

<div class="visitor-charts-section" wire:key="visitor-charts-{{ $chartPeriod }}">
    <!-- Chart.js CDN -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>

    <div class="container-fluid">
        <!-- Period Selector -->
        <div class="visitor-charts-period-selector">
            <button wire:click="$set('chartPeriod', 'daily')"
                class="btn visitor-charts-period-btn {{ $chartPeriod === 'daily' ? 'btn-primary active' : 'btn-outline-primary' }} btn-sm">
                <i class="fas fa-calendar-day me-2"></i>Harian
            </button>
            <button wire:click="$set('chartPeriod', 'weekly')"
                class="btn visitor-charts-period-btn {{ $chartPeriod === 'weekly' ? 'btn-primary active' : 'btn-outline-primary' }} btn-sm">
                <i class="fas fa-calendar-week me-2"></i>Mingguan
            </button>
            <button wire:click="$set('chartPeriod', 'monthly')"
                class="btn visitor-charts-period-btn {{ $chartPeriod === 'monthly' ? 'btn-primary active' : 'btn-outline-primary' }} btn-sm">
                <i class="fas fa-calendar me-2"></i>Bulanan
            </button>
            <button wire:click="$set('chartPeriod', 'yearly')"
                class="btn visitor-charts-period-btn {{ $chartPeriod === 'yearly' ? 'btn-primary active' : 'btn-outline-primary' }} btn-sm">
                <i class="fas fa-chart-line me-2"></i>Tahunan
            </button>
        </div>

        <!-- Line Chart - Visitor Trends -->
        <div class="row g-4 mb-4">
            <div class="col-12">
                <div class="visitor-charts-card">
                    <h5 class="visitor-charts-card-title">
                        <i class="fas fa-chart-area me-2"></i>Tren Kunjungan - {{ $lineChartData['period'] }}
                    </h5>
                    <div class="visitor-charts-line-container">
                        <canvas id="visitorChartsLine" wire:ignore
                            data-labels="{{ json_encode($lineChartData['labels']) }}"
                            data-data="{{ json_encode($lineChartData['data']) }}">
                        </canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Device & Browser Distribution -->
        <div class="row g-4">
            <!-- Device Distribution Doughnut Chart -->
            <div class="col-12 col-lg-6">
                <div class="visitor-charts-card visitor-charts-card-small">
                    <h5 class="visitor-charts-card-title"><i class="fas fa-mobile-alt me-2"></i>Distribusi Perangkat</h5>
                    <div class="visitor-charts-device-container">
                        <canvas id="visitorChartsDevice" wire:ignore
                            data-labels="{{ json_encode($deviceData['labels']) }}"
                            data-data="{{ json_encode($deviceData['data']) }}">
                        </canvas>
                    </div>
                </div>
            </div>

            <!-- Browser Distribution Bar Chart -->
            <div class="col-12 col-lg-6">
                <div class="visitor-charts-card visitor-charts-card-small">
                    <h5 class="visitor-charts-card-title"><i class="fas fa-globe me-2"></i>Browser Pengunjung</h5>
                    <div class="visitor-charts-browser-container">
                        <canvas id="visitorChartsBrowser" wire:ignore
                            data-labels="{{ json_encode($browserData['labels']) }}"
                            data-data="{{ json_encode($browserData['data']) }}">
                        </canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
