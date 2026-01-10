/**
 * VISITOR CHARTS JAVASCRIPT - MODERN VERSION
 * Location: resources/js/pages/admin/visitor-charts.js
 * Progressive enhancement untuk chart.js initialization
 */

console.log('[VisitorCharts] Script loaded successfully');

class VisitorCharts {
    constructor() {
        console.log('[VisitorCharts] Constructor called - initializing instance');
        this.charts = {};
        this.init();
    }

    /**
     * Initialize charts
     */
    init() {
        try {
            console.log('[VisitorCharts] ========== INIT START ==========');

            this.createLineChart('daily');
            this.createLineChart('weekly');
            this.createLineChart('monthly');
            this.createLineChart('yearly');
            this.createDeviceChart();
            this.createBrowserChart();

            const chartsCreated = Object.keys(this.charts).length;
            console.log(`[VisitorCharts] ✓ INIT COMPLETE - ${chartsCreated}/6 charts created`);
            console.log('[VisitorCharts] ========== INIT END ==========');
        } catch (e) {
            console.error('[VisitorCharts] ✗ CRITICAL ERROR in init():', e);
            console.error('Stack:', e.stack);
        }
    }

    /**
     * Create line chart for visitor trends
     */
    createLineChart(period) {
        console.log('[VisitorCharts] createLineChart() - START for period:', period);
        const canvasId = `visitorCharts${period.charAt(0).toUpperCase() + period.slice(1)}`;
        const canvasElement = document.getElementById(canvasId);

        if (!canvasElement) {
            console.warn('[VisitorCharts] ✗ Canvas element not found:', canvasId);
            return;
        }
        console.log('[VisitorCharts] ✓ Canvas element found:', canvasElement.id);

        // Check if Chart.js is available
        if (typeof Chart === 'undefined') {
            console.warn('[VisitorCharts] ✗ Chart.js not loaded yet, will retry');
            setTimeout(() => this.createLineChart(period), 500);
            return;
        }
        console.log('[VisitorCharts] ✓ Chart.js is available');

        const data = this.getLineChartData(canvasId);
        if (!data) {
            console.warn('[VisitorCharts] ✗ No data available for line chart:', period);
            return;
        }

        try {
            // CRITICAL: Destroy any existing chart on this canvas first
            this.destroyChartByCanvasId(canvasId);
            console.log('[VisitorCharts] ✓ Old chart destroyed (if any)');

            // Get fresh 2D context from canvas
            const ctx = canvasElement.getContext('2d');
            if (!ctx) {
                console.error('[VisitorCharts] ✗ Failed to get 2D context from canvas');
                return;
            }

            this.charts[period] = new Chart(ctx, {
                type: 'line',
                data: data,
                options: this.getLineChartOptions()
            });
            console.log('[VisitorCharts] ✓ Line chart CREATED for period:', period);
        } catch (e) {
            console.error('[VisitorCharts] ✗ Error creating line chart:', e);
        }
    }

    /**
     * Create device distribution doughnut chart
     */
    createDeviceChart() {
        const canvasElement = document.getElementById('visitorChartsDevice');
        if (!canvasElement) {
            console.warn('[VisitorCharts] Canvas element not found: visitorChartsDevice');
            return;
        }

        // Check if Chart.js is available
        if (typeof Chart === 'undefined') {
            console.warn('[VisitorCharts] Chart.js not loaded yet, will retry');
            setTimeout(() => this.createDeviceChart(), 500);
            return;
        }

        const data = this.getDeviceChartData();
        if (!data) {
            console.warn('[VisitorCharts] No data available for device chart');
            return;
        }

        try {
            this.destroyChartByCanvasId('visitorChartsDevice');

            const ctx = canvasElement.getContext('2d');
            if (!ctx) {
                console.error('[VisitorCharts] Failed to get 2D context from canvas');
                return;
            }

            this.charts.device = new Chart(ctx, {
                type: 'doughnut',
                data: data,
                options: this.getDoughnutChartOptions()
            });
            console.debug('[VisitorCharts] Device chart created successfully');
        } catch (e) {
            console.error('[VisitorCharts] Error creating device chart:', e);
        }
    }

    /**
     * Create browser distribution bar chart
     */
    createBrowserChart() {
        const canvasElement = document.getElementById('visitorChartsBrowser');
        if (!canvasElement) {
            console.warn('[VisitorCharts] Canvas element not found: visitorChartsBrowser');
            return;
        }

        // Check if Chart.js is available
        if (typeof Chart === 'undefined') {
            console.warn('[VisitorCharts] Chart.js not loaded yet, will retry');
            setTimeout(() => this.createBrowserChart(), 500);
            return;
        }

        const data = this.getBrowserChartData();
        if (!data) {
            console.warn('[VisitorCharts] No data available for browser chart');
            return;
        }

        try {
            this.destroyChartByCanvasId('visitorChartsBrowser');

            const ctx = canvasElement.getContext('2d');
            if (!ctx) {
                console.error('[VisitorCharts] Failed to get 2D context from canvas');
                return;
            }

            this.charts.browser = new Chart(ctx, {
                type: 'bar',
                data: data,
                options: this.getBrowserChartOptions()
            });
            console.debug('[VisitorCharts] Browser chart created successfully');
        } catch (e) {
            console.error('[VisitorCharts] Error creating browser chart:', e);
        }
    }

    /**
     * Get line chart data from DOM
     */
    getLineChartData(canvasId) {
        const element = document.getElementById(canvasId);
        if (!element) {
            console.warn('[VisitorCharts] Canvas element not found in DOM:', canvasId);
            return null;
        }

        try {
            const labelsRaw = element.dataset.labels || '[]';
            const dataRaw = element.dataset.data || '[]';

            const labels = JSON.parse(labelsRaw);
            const data = JSON.parse(dataRaw);

            if (!labels.length || !data.length) {
                console.warn('[VisitorCharts] Empty data detected:', { labels, data });
                return null;
            }

            const isDarkMode = document.documentElement.getAttribute('data-bs-theme') === 'dark';
            const lineColor = isDarkMode ? '#60a5fa' : '#0d6efd';
            const pointBorder = isDarkMode ? '#1e293b' : '#fff';

            return {
                labels: labels,
                datasets: [{
                    label: 'Kunjungan',
                    data: data,
                    borderColor: lineColor,
                    backgroundColor: isDarkMode ? 'rgba(96, 165, 250, 0.08)' : 'rgba(13, 110, 253, 0.08)',
                    borderWidth: 2.5,
                    fill: true,
                    tension: 0.4,
                    pointRadius: 3,
                    pointBackgroundColor: lineColor,
                    pointBorderColor: pointBorder,
                    pointBorderWidth: 1.5,
                    pointHoverRadius: 5,
                }]
            };
        } catch (e) {
            console.error('[VisitorCharts] Error parsing line chart data:', e);
            return null;
        }
    }

    /**
     * Get device chart data from DOM
     */
    getDeviceChartData() {
        const element = document.getElementById('visitorChartsDevice');
        if (!element) return null;

        try {
            const labels = JSON.parse(element.dataset.labels || '[]');
            const data = JSON.parse(element.dataset.data || '[]');
            const isDarkMode = document.documentElement.getAttribute('data-bs-theme') === 'dark';
            const borderColor = isDarkMode ? '#334155' : '#fff';

            return {
                labels: labels,
                datasets: [{
                    data: data,
                    backgroundColor: this.generateColors(labels.length),
                    borderColor: borderColor,
                    borderWidth: 1.5,
                }]
            };
        } catch (e) {
            return null;
        }
    }

    /**
     * Get browser chart data from DOM
     */
    getBrowserChartData() {
        const element = document.getElementById('visitorChartsBrowser');
        if (!element) return null;

        try {
            const labels = JSON.parse(element.dataset.labels || '[]');
            const data = JSON.parse(element.dataset.data || '[]');

            return {
                labels: labels,
                datasets: [{
                    label: 'Kunjungan',
                    data: data,
                    backgroundColor: this.generateColors(labels.length),
                    borderRadius: 4,
                    borderSkipped: false,
                }]
            };
        } catch (e) {
            return null;
        }
    }

    /**
     * Get line chart options with dark mode support
     */
    getLineChartOptions() {
        const isDarkMode = document.documentElement.getAttribute('data-bs-theme') === 'dark';
        const textColor = isDarkMode ? '#cbd5e1' : '#64748b';
        const gridColor = isDarkMode ? 'rgba(255, 255, 255, 0.06)' : 'rgba(0, 0, 0, 0.02)';
        const tooltipBg = isDarkMode ? 'rgba(15, 23, 42, 0.98)' : 'rgba(30, 41, 59, 0.95)';
        const tooltipColor = '#fff';
        const borderColor = isDarkMode ? '#60a5fa' : '#0d6efd';

        return {
            responsive: true,
            maintainAspectRatio: false,
            interaction: {
                mode: 'index',
                intersect: false,
            },
            plugins: {
                legend: {
                    display: false,
                },
                tooltip: {
                    mode: 'index',
                    intersect: false,
                    backgroundColor: tooltipBg,
                    padding: 12,
                    titleFont: { size: 12, weight: '600', family: "'Segoe UI', Tahoma, Geneva, Verdana, sans-serif" },
                    bodyFont: { size: 11, family: "'Segoe UI', Tahoma, Geneva, Verdana, sans-serif" },
                    titleColor: tooltipColor,
                    bodyColor: tooltipColor,
                    borderColor: borderColor,
                    borderWidth: 0,
                    displayColors: true,
                    boxPadding: 6,
                    cornerRadius: 6,
                    caretPadding: 10,
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        color: gridColor,
                        drawBorder: false,
                        drawTicks: false,
                    },
                    ticks: {
                        color: textColor,
                        font: { size: 10, weight: '500' },
                        callback: (value) => {
                            if (value >= 1000) {
                                return (value / 1000).toFixed(1) + 'k';
                            }
                            return value.toLocaleString();
                        },
                        padding: 8,
                    }
                },
                x: {
                    grid: {
                        display: false,
                        drawBorder: false
                    },
                    ticks: {
                        color: textColor,
                        font: { size: 10, weight: '400' },
                        padding: 6,
                    }
                }
            }
        };
    }

    /**
     * Get doughnut chart options with dark mode support
     */
    getDoughnutChartOptions() {
        const isDarkMode = document.documentElement.getAttribute('data-bs-theme') === 'dark';
        const textColor = isDarkMode ? '#cbd5e1' : '#64748b';
        const tooltipBg = isDarkMode ? 'rgba(15, 23, 42, 0.98)' : 'rgba(30, 41, 59, 0.95)';
        const tooltipColor = '#fff';

        return {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'bottom',
                    labels: {
                        usePointStyle: true,
                        padding: 16,
                        font: { size: 11, weight: '500', family: "'Segoe UI', Tahoma, Geneva, Verdana, sans-serif" },
                        color: textColor,
                        pointStyle: 'circle',
                        generateLabels: (chart) => {
                            const data = chart.data;
                            return data.labels.map((label, i) => ({
                                text: label,
                                fillStyle: data.datasets[0].backgroundColor[i],
                                hidden: false,
                                index: i,
                            }));
                        }
                    }
                },
                tooltip: {
                    backgroundColor: tooltipBg,
                    padding: 12,
                    titleFont: { size: 12, weight: '600', family: "'Segoe UI', Tahoma, Geneva, Verdana, sans-serif" },
                    bodyFont: { size: 11, family: "'Segoe UI', Tahoma, Geneva, Verdana, sans-serif" },
                    titleColor: tooltipColor,
                    bodyColor: tooltipColor,
                    borderColor: 'rgba(255,255,255,0.1)',
                    borderWidth: 0,
                    cornerRadius: 6,
                    caretPadding: 10,
                    callbacks: {
                        label: (context) => {
                            const sum = context.dataset.data.reduce((a, b) => a + b, 0);
                            const value = context.parsed;
                            const percentage = ((value / sum) * 100).toFixed(1);
                            return `${context.label}: ${value} (${percentage}%)`;
                        }
                    }
                }
            }
        };
    }

    /**
     * Get bar chart options with dark mode support
     */
    getBrowserChartOptions() {
        const isDarkMode = document.documentElement.getAttribute('data-bs-theme') === 'dark';
        const textColor = isDarkMode ? '#cbd5e1' : '#64748b';
        const gridColor = isDarkMode ? 'rgba(255, 255, 255, 0.06)' : 'rgba(0, 0, 0, 0.02)';
        const tooltipBg = isDarkMode ? 'rgba(15, 23, 42, 0.98)' : 'rgba(30, 41, 59, 0.95)';
        const tooltipColor = '#fff';

        return {
            indexAxis: 'y',
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    backgroundColor: tooltipBg,
                    padding: 12,
                    titleFont: { size: 12, weight: '600', family: "'Segoe UI', Tahoma, Geneva, Verdana, sans-serif" },
                    bodyFont: { size: 11, family: "'Segoe UI', Tahoma, Geneva, Verdana, sans-serif" },
                    titleColor: tooltipColor,
                    bodyColor: tooltipColor,
                    borderColor: 'rgba(255,255,255,0.1)',
                    borderWidth: 0,
                    cornerRadius: 6,
                    caretPadding: 10,
                    callbacks: {
                        label: (context) => context.parsed.x.toLocaleString() + ' pengunjung'
                    }
                }
            },
            scales: {
                x: {
                    beginAtZero: true,
                    grid: {
                        color: gridColor,
                        drawBorder: false,
                        drawTicks: false,
                    },
                    ticks: {
                        color: textColor,
                        font: { size: 10, weight: '500' },
                        callback: (value) => {
                            if (value >= 1000) {
                                return (value / 1000).toFixed(1) + 'k';
                            }
                            return value.toLocaleString();
                        },
                        padding: 8,
                    }
                },
                y: {
                    ticks: {
                        color: textColor,
                        font: { size: 10, weight: '400' },
                        padding: 6,
                    }
                }
            }
        };
    }

    /**
     * Update all charts from current canvas data
     */
    updateAllCharts() {
        const periods = ['daily', 'weekly', 'monthly', 'yearly'];

        periods.forEach(period => {
            const canvasId = `visitorCharts${period.charAt(0).toUpperCase() + period.slice(1)}`;
            const lineData = this.getLineChartData(canvasId);

            if (lineData && this.charts[period]) {
                this.charts[period].data = {
                    labels: lineData.labels,
                    datasets: lineData.datasets
                };
                this.charts[period].options = this.getLineChartOptions();
                this.charts[period].update('none');
            }
        });

        const deviceData = this.getDeviceChartData();
        if (deviceData && this.charts.device) {
            this.charts.device.data = deviceData;
            this.charts.device.options = this.getDoughnutChartOptions();
            this.charts.device.update('none');
        }

        const browserData = this.getBrowserChartData();
        if (browserData && this.charts.browser) {
            this.charts.browser.data = browserData;
            this.charts.browser.options = this.getBrowserChartOptions();
            this.charts.browser.update('none');
        }
    }

    /**
     * Generate pleasant colors for charts
     */
    generateColors(count) {
        const colors = [
            '#0d6efd', // Blue
            '#198754', // Green
            '#ff6b6b', // Red
            '#ffc107', // Yellow
            '#6f42c1', // Purple
            '#20c997', // Teal
            '#fd7e14', // Orange
            '#e83e8c', // Pink
        ];
        return Array(count).fill(0).map((_, i) => colors[i % colors.length]);
    }

    /**
     * Destroy a chart by its canvas ID
     */
    destroyChartByCanvasId(canvasId) {
        try {
            if (window.Chart && Chart.instances) {
                Object.keys(Chart.instances).forEach((key) => {
                    const instance = Chart.instances[key];
                    if (instance && instance.canvas && instance.canvas.id === canvasId) {
                        console.debug(`[VisitorCharts] Destroying existing chart on canvas ${canvasId}`);
                        instance.destroy();
                        delete Chart.instances[key];
                    }
                });
            }

            const chartKeyMap = {
                'visitorChartsDaily': 'daily',
                'visitorChartsWeekly': 'weekly',
                'visitorChartsMonthly': 'monthly',
                'visitorChartsYearly': 'yearly',
                'visitorChartsDevice': 'device',
                'visitorChartsBrowser': 'browser'
            };

            const chartKey = chartKeyMap[canvasId];
            if (chartKey && this.charts[chartKey]) {
                if (typeof this.charts[chartKey].destroy === 'function') {
                    this.charts[chartKey].destroy();
                }
                delete this.charts[chartKey];
            }
        } catch (e) {
            console.warn(`[VisitorCharts] Error destroying chart ${canvasId}:`, e);
        }
    }

    /**
     * Reinitialize charts
     */
    reinit(attempt = 1) {
        console.log(`[VisitorCharts] ========== REINIT START (attempt ${attempt}) ==========`);

        // Destroy existing charts
        Object.keys(this.charts).forEach(key => {
            const chart = this.charts[key];
            if (chart && typeof chart.destroy === 'function') {
                try {
                    chart.destroy();
                    console.log(`[VisitorCharts] ✓ Destroyed local chart: ${key}`);
                } catch (e) {
                    console.error('[VisitorCharts] ✗ Error destroying chart:', e);
                }
            }
        });
        this.charts = {};

        // Destroy all Chart.js instances globally
        if (window.Chart && Chart.instances) {
            try {
                const instanceKeys = Object.keys(Chart.instances);
                instanceKeys.forEach((key) => {
                    const instance = Chart.instances[key];
                    if (instance && typeof instance.destroy === 'function') {
                        instance.destroy();
                    }
                });
            } catch (e) {
                console.warn('[VisitorCharts] ✗ Error cleaning Chart.js instances:', e);
            }
        }

        // Verify canvas elements exist
        const canvasIds = ['visitorChartsDaily', 'visitorChartsWeekly', 'visitorChartsMonthly', 'visitorChartsYearly', 'visitorChartsDevice', 'visitorChartsBrowser'];
        const allExists = canvasIds.every(id => document.getElementById(id));

        if (!allExists) {
            if (attempt <= 5) {
                console.warn(`[VisitorCharts] ⚠ Canvas elements not ready, retrying... (attempt ${attempt}/5)`);
                setTimeout(() => this.reinit(attempt + 1), 200);
            } else {
                console.error('[VisitorCharts] ✗ Failed to find canvas elements after 5 attempts');
            }
            return;
        }

        console.log('[VisitorCharts] ✓ All canvas elements found, calling init()...');
        this.init();
        console.log('[VisitorCharts] ========== REINIT END ==========');
    }

    /**
     * Cleanup
     */
    destroy() {
        Object.values(this.charts).forEach(chart => {
            if (chart && typeof chart.destroy === 'function') {
                chart.destroy();
            }
        });
        this.charts = {};
    }
}

/**
 * Initialize on DOMContentLoaded
 */
console.log('[VisitorCharts] Checking document readyState:', document.readyState);

if (document.readyState === 'loading') {
    console.log('[VisitorCharts] Document still loading, waiting for DOMContentLoaded');
    document.addEventListener('DOMContentLoaded', () => {
        console.log('[VisitorCharts] DOMContentLoaded fired, creating instance');
        window.visitorCharts = new VisitorCharts();
    });
} else {
    console.log('[VisitorCharts] Document already loaded, creating instance immediately');
    window.visitorCharts = new VisitorCharts();
}

/**
 * Listen for Livewire updates - handles period changes
 */
document.addEventListener('livewire:updated', () => {
    console.debug('[VisitorCharts] livewire:updated event fired');

    if (window.visitorCharts) {
        Object.keys(window.visitorCharts.charts).forEach(key => {
            const chart = window.visitorCharts.charts[key];
            if (chart && typeof chart.destroy === 'function') {
                try {
                    chart.destroy();
                } catch (e) {
                    console.error('[VisitorCharts] Error destroying chart:', e);
                }
            }
        });
        window.visitorCharts.charts = {};
    }

    setupCanvasObservers();

    setTimeout(() => {
        if (!window.visitorCharts) {
            window.visitorCharts = new VisitorCharts();
            return;
        }

        let attempts = 0;
        const checkAndReinit = () => {
            attempts++;
            const canvasIds = ['visitorChartsDaily', 'visitorChartsWeekly', 'visitorChartsMonthly', 'visitorChartsYearly'];
            const allHaveData = canvasIds.every(id => {
                const el = document.getElementById(id);
                return el && el.dataset.labels && el.dataset.data;
            });

            if (allHaveData) {
                try {
                    const el = document.getElementById('visitorChartsDaily');
                    const labels = JSON.parse(el.dataset.labels);
                    const data = JSON.parse(el.dataset.data);

                    if (labels.length > 0 && data.length > 0) {
                        window.visitorCharts.reinit();
                        return;
                    }
                } catch (e) {
                    console.warn('[VisitorCharts] Canvas data not yet valid:', e.message);
                }
            }

            if (attempts < 20) {
                setTimeout(checkAndReinit, 100);
            } else {
                console.error('[VisitorCharts] Failed to initialize charts after 20 attempts');
            }
        };

        checkAndReinit();
    }, 50);
});

/**
 * Watch for canvas data attribute changes
 */
const canvasObserver = new MutationObserver((mutations) => {
    mutations.forEach((mutation) => {
        if (mutation.type === 'attributes' &&
            (mutation.attributeName === 'data-labels' || mutation.attributeName === 'data-data')) {
            console.debug(`[VisitorCharts] Canvas ${mutation.target.id} data attribute changed`);
            if (window.visitorCharts) {
                window.visitorCharts.reinit();
            }
        }
    });
});

/**
 * Helper function to setup canvas observers
 */
function setupCanvasObservers() {
    const canvasIds = ['visitorChartsDaily', 'visitorChartsWeekly', 'visitorChartsMonthly', 'visitorChartsYearly', 'visitorChartsDevice', 'visitorChartsBrowser'];
    canvasIds.forEach(id => {
        const canvas = document.getElementById(id);
        if (canvas) {
            canvasObserver.observe(canvas, { attributes: true, attributeFilter: ['data-labels', 'data-data'] });
        }
    });
}

if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', setupCanvasObservers);
} else {
    setupCanvasObservers();
}

/**
 * Watch for theme toggle changes
 */
const themeObserver = new MutationObserver(() => {
    if (window.visitorCharts) {
        window.visitorCharts.reinit();
    }
});

if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', () => {
        themeObserver.observe(document.documentElement, {
            attributes: true,
            attributeFilter: ['data-bs-theme']
        });
    });
} else {
    themeObserver.observe(document.documentElement, {
        attributes: true,
        attributeFilter: ['data-bs-theme']
    });
}

/**
 * Reinitialize after Livewire navigation
 */
document.addEventListener('livewire:navigated', () => {
    setupCanvasObservers();
    setTimeout(() => {
        if (window.visitorCharts) {
            window.visitorCharts.reinit();
        } else {
            window.visitorCharts = new VisitorCharts();
        }
    }, 100);
});

