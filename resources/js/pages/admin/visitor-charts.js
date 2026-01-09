/**
 * VISITOR CHARTS JAVASCRIPT
 * Location: resources/js/pages/admin/visitor-charts.js
 * Progressive enhancement untuk chart.js initialization
 */

class VisitorCharts {
    constructor() {
        this.charts = {};
        this.init();
    }

    /**
     * Initialize charts
     */
    init() {
        this.createLineChart();
        this.createDeviceChart();
        this.createBrowserChart();
        this.setupEventListeners();
    }

    /**
     * Create line chart for visitor trends
     */
    createLineChart() {
        const ctx = document.getElementById('visitorChartsLine');
        if (!ctx) return;

        const data = this.getLineChartData();
        if (!data) return;

        this.charts.line = new Chart(ctx, {
            type: 'line',
            data: data,
            options: this.getLineChartOptions()
        });
    }

    /**
     * Create device distribution doughnut chart
     */
    createDeviceChart() {
        const ctx = document.getElementById('visitorChartsDevice');
        if (!ctx) return;

        const data = this.getDeviceChartData();
        if (!data) return;

        this.charts.device = new Chart(ctx, {
            type: 'doughnut',
            data: data,
            options: this.getDoughnutChartOptions()
        });
    }

    /**
     * Create browser distribution bar chart
     */
    createBrowserChart() {
        const ctx = document.getElementById('visitorChartsBrowser');
        if (!ctx) return;

        const data = this.getBrowserChartData();
        if (!data) return;

        this.charts.browser = new Chart(ctx, {
            type: 'bar',
            data: data,
            options: this.getBrowserChartOptions()
        });
    }

    /**
     * Setup event listeners for period selector and Livewire updates
     */
    setupEventListeners() {
        // Listen for custom chart update event
        document.addEventListener('visitor-charts:update', (e) => {
            if (this.charts.line) {
                this.updateLineChart(e.detail.data);
            }
        });
    }

    /**
     * Get line chart data from DOM
     */
    getLineChartData() {
        const element = document.getElementById('visitorChartsLine');
        if (!element) {
            return null;
        }

        try {
            const labels = JSON.parse(element.dataset.labels || '[]');
            const data = JSON.parse(element.dataset.data || '[]');
            const isDarkMode = document.documentElement.getAttribute('data-bs-theme') === 'dark';
            const lineColor = isDarkMode ? '#60a5fa' : '#0d6efd';
            const pointBorder = isDarkMode ? '#1e293b' : '#fff';

            return {
                labels: labels,
                datasets: [{
                    label: 'Kunjungan',
                    data: data,
                    borderColor: lineColor,
                    backgroundColor: isDarkMode ? 'rgba(96, 165, 250, 0.1)' : 'rgba(13, 110, 253, 0.1)',
                    borderWidth: 3,
                    fill: true,
                    tension: 0.4,
                    pointRadius: 5,
                    pointBackgroundColor: lineColor,
                    pointBorderColor: pointBorder,
                    pointBorderWidth: 2,
                    pointHoverRadius: 7,
                }]
            };
        } catch (e) {
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
                    borderWidth: 2,
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
                    label: 'Jumlah Kunjungan',
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
        const textColor = isDarkMode ? '#e0e0e0' : '#333';
        const gridColor = isDarkMode ? 'rgba(255, 255, 255, 0.1)' : 'rgba(0, 0, 0, 0.05)';
        const tooltipBg = isDarkMode ? 'rgba(30, 41, 59, 0.95)' : 'rgba(0, 0, 0, 0.8)';
        const tooltipColor = isDarkMode ? '#e0e0e0' : '#fff';
        const borderColor = isDarkMode ? '#60a5fa' : '#0d6efd';

        return {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: true,
                    labels: {
                        usePointStyle: true,
                        padding: 20,
                        font: { size: 12, weight: 'bold' },
                        color: textColor
                    }
                },
                tooltip: {
                    mode: 'index',
                    intersect: false,
                    backgroundColor: tooltipBg,
                    padding: 12,
                    titleFont: { size: 13, weight: 'bold' },
                    bodyFont: { size: 12 },
                    titleColor: tooltipColor,
                    bodyColor: tooltipColor,
                    borderColor: borderColor,
                    borderWidth: 1,
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        color: gridColor,
                    },
                    ticks: {
                        color: textColor,
                        callback: (value) => value.toLocaleString()
                    }
                },
                x: {
                    grid: {
                        display: false
                    },
                    ticks: {
                        color: textColor
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
        const textColor = isDarkMode ? '#e0e0e0' : '#333';
        const tooltipBg = isDarkMode ? 'rgba(30, 41, 59, 0.95)' : 'rgba(0, 0, 0, 0.8)';
        const tooltipColor = isDarkMode ? '#e0e0e0' : '#fff';

        return {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'bottom',
                    labels: {
                        usePointStyle: true,
                        padding: 15,
                        font: { size: 12 },
                        color: textColor
                    }
                },
                tooltip: {
                    backgroundColor: tooltipBg,
                    padding: 12,
                    titleColor: tooltipColor,
                    bodyColor: tooltipColor,
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
        const textColor = isDarkMode ? '#e0e0e0' : '#333';
        const gridColor = isDarkMode ? 'rgba(255, 255, 255, 0.1)' : 'rgba(0, 0, 0, 0.05)';
        const tooltipBg = isDarkMode ? 'rgba(30, 41, 59, 0.95)' : 'rgba(0, 0, 0, 0.8)';
        const tooltipColor = isDarkMode ? '#e0e0e0' : '#fff';

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
                    titleColor: tooltipColor,
                    bodyColor: tooltipColor,
                    callbacks: {
                        label: (context) => context.parsed.x.toLocaleString() + ' kunjungan'
                    }
                }
            },
            scales: {
                x: {
                    beginAtZero: true,
                    grid: {
                        color: gridColor,
                    },
                    ticks: {
                        color: textColor,
                        callback: (value) => value.toLocaleString()
                    }
                },
                y: {
                    ticks: {
                        color: textColor
                    }
                }
            }
        };
    }

    /**
     * Update line chart with new data
     */
    updateLineChart(data) {
        if (!this.charts.line) return;

        this.charts.line.data.labels = data.labels;
        this.charts.line.data.datasets[0].data = data.data;
        this.charts.line.update();
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
     * Reinitialize charts (for Livewire navigation and period changes)
     */
    reinit() {
        // Destroy existing charts properly
        Object.keys(this.charts).forEach(key => {
            const chart = this.charts[key];
            if (chart && typeof chart.destroy === 'function') {
                try {
                    chart.destroy();
                } catch (e) {
                    console.error('Error destroying chart:', e);
                }
            }
        });
        this.charts = {};

        // Verify canvas elements exist before reinitializing
        const lineCtx = document.getElementById('visitorChartsLine');
        const deviceCtx = document.getElementById('visitorChartsDevice');
        const browserCtx = document.getElementById('visitorChartsBrowser');

        if (!lineCtx || !deviceCtx || !browserCtx) {
            // Canvas elements not ready yet, try again
            return;
        }

        // Wait a bit and then initialize
        setTimeout(() => {
            this.init();
        }, 10);
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
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', () => {
        window.visitorCharts = new VisitorCharts();
    });
} else {
    window.visitorCharts = new VisitorCharts();
}

/**
 * Listen for Livewire updates
 * Simplified approach: reinit on any Livewire update
 */
document.addEventListener('livewire:updated', () => {
    // Wait for DOM to be fully updated by Livewire
    setTimeout(() => {
        if (window.visitorCharts) {
            window.visitorCharts.reinit();
        }
    }, 100);
});

/**
 * Also listen to mutation of wire:key change (period change)
 */
const chartsContainer = document.querySelector('[wire\\:key*="visitor-charts"]');
if (chartsContainer) {
    const keyObserver = new MutationObserver((mutations) => {
        mutations.forEach((mutation) => {
            if (mutation.type === 'attributes' && mutation.attributeName === 'wire:key') {
                setTimeout(() => {
                    if (window.visitorCharts) {
                        window.visitorCharts.reinit();
                    }
                }, 50);
            }
        });
    });

    document.addEventListener('DOMContentLoaded', () => {
        keyObserver.observe(chartsContainer, {
            attributes: true,
            attributeFilter: ['wire:key']
        });
    });

    if (document.readyState !== 'loading') {
        keyObserver.observe(chartsContainer, {
            attributes: true,
            attributeFilter: ['wire:key']
        });
    }
}

/**
 * Listen for theme toggle changes (watch for data-bs-theme attribute changes)
 */
const observer = new MutationObserver(() => {
    if (window.visitorCharts) {
        window.visitorCharts.reinit();
    }
});

document.addEventListener('DOMContentLoaded', () => {
    observer.observe(document.documentElement, {
        attributes: true,
        attributeFilter: ['data-bs-theme']
    });
});

// Also observe if document is already loaded
if (document.readyState !== 'loading') {
    observer.observe(document.documentElement, {
        attributes: true,
        attributeFilter: ['data-bs-theme']
    });
}

/**
 * Reinitialize after Livewire navigation (SPA)
 */
document.addEventListener('livewire:navigated', () => {
    setTimeout(() => {
        if (window.visitorCharts) {
            window.visitorCharts.reinit();
        } else {
            window.visitorCharts = new VisitorCharts();
        }
    }, 100);
});
