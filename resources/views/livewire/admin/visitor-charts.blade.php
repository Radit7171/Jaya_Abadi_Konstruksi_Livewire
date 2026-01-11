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

<div class="visitor-charts-section" id="visitor-charts-container">

    <div class="container-fluid">
        <!-- Header Section -->
        <div class="visitor-charts-header-section">
            <div class="visitor-charts-header-content">
                <div class="visitor-charts-header-left">
                    <h2 class="visitor-charts-main-title">
                        <i class="fas fa-chart-line"></i>
                        Analitik Kunjungan
                    </h2>
                    <p class="visitor-charts-subtitle">Pantau tren kunjungan website Anda secara real-time</p>
                </div>
            </div>
        </div>

        <!-- 4 Line Charts Grid -->
        <div class="visitor-charts-cards-grid">
            <!-- Daily Chart -->
            <div class="visitor-charts-card-wrapper">
                <div class="visitor-charts-card visitor-charts-card-primary">
                    <div class="visitor-charts-card-header">
                        <div class="visitor-charts-card-icon">
                            <i class="fas fa-sun"></i>
                        </div>
                        <div class="visitor-charts-card-title-group">
                            <h5 class="visitor-charts-card-title">Harian</h5>
                            <p class="visitor-charts-card-subtitle">30 hari terakhir</p>
                        </div>
                    </div>
                    <div class="visitor-charts-line-container">
                        <canvas id="visitorChartsDaily"
                            data-labels='@json($dailyData['labels'])'
                            data-data='@json($dailyData['data'])'
                            wire:key="daily-chart">
                        </canvas>
                    </div>
                </div>
            </div>

            <!-- Weekly Chart -->
            <div class="visitor-charts-card-wrapper">
                <div class="visitor-charts-card visitor-charts-card-info">
                    <div class="visitor-charts-card-header">
                        <div class="visitor-charts-card-icon">
                            <i class="fas fa-calendar-week"></i>
                        </div>
                        <div class="visitor-charts-card-title-group">
                            <h5 class="visitor-charts-card-title">Mingguan</h5>
                            <p class="visitor-charts-card-subtitle">12 minggu terakhir</p>
                        </div>
                    </div>
                    <div class="visitor-charts-line-container">
                        <canvas id="visitorChartsWeekly"
                            data-labels='@json($weeklyData['labels'])'
                            data-data='@json($weeklyData['data'])'
                            wire:key="weekly-chart">
                        </canvas>
                    </div>
                </div>
            </div>

            <!-- Monthly Chart -->
            <div class="visitor-charts-card-wrapper">
                <div class="visitor-charts-card visitor-charts-card-success">
                    <div class="visitor-charts-card-header">
                        <div class="visitor-charts-card-icon">
                            <i class="fas fa-calendar"></i>
                        </div>
                        <div class="visitor-charts-card-title-group">
                            <h5 class="visitor-charts-card-title">Bulanan</h5>
                            <p class="visitor-charts-card-subtitle">12 bulan terakhir</p>
                        </div>
                    </div>
                    <div class="visitor-charts-line-container">
                        <canvas id="visitorChartsMonthly"
                            data-labels='@json($monthlyData['labels'])'
                            data-data='@json($monthlyData['data'])'
                            wire:key="monthly-chart">
                        </canvas>
                    </div>
                </div>
            </div>

            <!-- Yearly Chart -->
            <div class="visitor-charts-card-wrapper">
                <div class="visitor-charts-card visitor-charts-card-warning">
                    <div class="visitor-charts-card-header">
                        <div class="visitor-charts-card-icon">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <div class="visitor-charts-card-title-group">
                            <h5 class="visitor-charts-card-title">Tahunan</h5>
                            <p class="visitor-charts-card-subtitle">5 tahun terakhir</p>
                        </div>
                    </div>
                    <div class="visitor-charts-line-container">
                        <canvas id="visitorChartsYearly"
                            data-labels='@json($yearlyData['labels'])'
                            data-data='@json($yearlyData['data'])'
                            wire:key="yearly-chart">
                        </canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Device & Browser Distribution -->
        <div class="visitor-charts-cards-grid visitor-charts-distribution-grid">
            <!-- Device Distribution Doughnut Chart -->
            <div class="visitor-charts-card-wrapper">
                <div class="visitor-charts-card visitor-charts-card-secondary">
                    <div class="visitor-charts-card-header">
                        <div class="visitor-charts-card-icon">
                            <i class="fas fa-mobile-alt"></i>
                        </div>
                        <div class="visitor-charts-card-title-group">
                            <h5 class="visitor-charts-card-title">Distribusi Perangkat</h5>
                            <p class="visitor-charts-card-subtitle">Device pengunjung</p>
                        </div>
                    </div>
                    <div class="visitor-charts-device-container">
                        <canvas id="visitorChartsDevice"
                            data-labels='@json($deviceData['labels'])'
                            data-data='@json($deviceData['data'])'
                            wire:key="device-chart">
                        </canvas>
                    </div>
                </div>
            </div>

            <!-- Browser Distribution Bar Chart -->
            <div class="visitor-charts-card-wrapper">
                <div class="visitor-charts-card visitor-charts-card-secondary">
                    <div class="visitor-charts-card-header">
                        <div class="visitor-charts-card-icon">
                            <i class="fas fa-globe"></i>
                        </div>
                        <div class="visitor-charts-card-title-group">
                            <h5 class="visitor-charts-card-title">Browser Pengunjung</h5>
                            <p class="visitor-charts-card-subtitle">Browser statistik</p>
                        </div>
                    </div>
                    <div class="visitor-charts-browser-container">
                        <canvas id="visitorChartsBrowser"
                            data-labels='@json($browserData['labels'])'
                            data-data='@json($browserData['data'])'
                            wire:key="browser-chart">
                        </canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

