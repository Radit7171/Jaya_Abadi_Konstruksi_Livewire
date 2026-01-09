<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Visitor;
use Carbon\Carbon;

class VisitorCharts extends Component
{
    public $chartPeriod = 'daily'; // daily, weekly, monthly, yearly

    /**
     * Get daily visitor data (last 30 days)
     */
    public function getDailyData(): array
    {
        $data = [];
        $labels = [];

        for ($i = 29; $i >= 0; $i--) {
            $date = now()->subDays($i)->startOfDay();
            $count = Visitor::whereDate('created_at', $date)->count();

            $labels[] = $date->format('d M');
            $data[] = $count;
        }

        return [
            'labels' => $labels,
            'data' => $data,
            'period' => '30 Hari Terakhir'
        ];
    }

    /**
     * Get weekly visitor data (last 12 weeks)
     */
    public function getWeeklyData(): array
    {
        $data = [];
        $labels = [];

        for ($i = 11; $i >= 0; $i--) {
            $startDate = now()->subWeeks($i)->startOfWeek();
            $endDate = $startDate->copy()->endOfWeek();
            $count = Visitor::whereBetween('created_at', [$startDate, $endDate])->count();

            $labels[] = 'W' . $startDate->format('W');
            $data[] = $count;
        }

        return [
            'labels' => $labels,
            'data' => $data,
            'period' => '12 Minggu Terakhir'
        ];
    }

    /**
     * Get monthly visitor data (last 12 months)
     */
    public function getMonthlyData(): array
    {
        $data = [];
        $labels = [];

        for ($i = 11; $i >= 0; $i--) {
            $date = now()->subMonths($i);
            $count = Visitor::whereYear('created_at', $date->year)
                ->whereMonth('created_at', $date->month)
                ->count();

            $labels[] = $date->format('M Y');
            $data[] = $count;
        }

        return [
            'labels' => $labels,
            'data' => $data,
            'period' => '12 Bulan Terakhir'
        ];
    }

    /**
     * Get yearly visitor data (last 5 years)
     */
    public function getYearlyData(): array
    {
        $data = [];
        $labels = [];

        for ($i = 4; $i >= 0; $i--) {
            $year = now()->subYears($i)->year;
            $count = Visitor::whereYear('created_at', $year)->count();

            $labels[] = (string)$year;
            $data[] = $count;
        }

        return [
            'labels' => $labels,
            'data' => $data,
            'period' => '5 Tahun Terakhir'
        ];
    }

    /**
     * Get device distribution data
     */
    public function getDeviceData(): array
    {
        $devices = Visitor::selectRaw('device_type, COUNT(*) as count')
            ->whereNotNull('device_type')
            ->groupBy('device_type')
            ->get();

        return [
            'labels' => $devices->pluck('device_type')->map(fn($d) => ucfirst($d))->toArray(),
            'data' => $devices->pluck('count')->toArray(),
        ];
    }

    /**
     * Get browser distribution data
     */
    public function getBrowserData(): array
    {
        $browsers = Visitor::selectRaw('browser, COUNT(*) as count')
            ->whereNotNull('browser')
            ->groupBy('browser')
            ->orderByRaw('count DESC')
            ->limit(8)
            ->get();

        return [
            'labels' => $browsers->pluck('browser')->toArray(),
            'data' => $browsers->pluck('count')->toArray(),
        ];
    }

    /**
     * Get data based on selected period
     */
    public function getSelectedData(): array
    {
        return match($this->chartPeriod) {
            'daily' => $this->getDailyData(),
            'weekly' => $this->getWeeklyData(),
            'monthly' => $this->getMonthlyData(),
            'yearly' => $this->getYearlyData(),
            default => $this->getDailyData(),
        };
    }

    public function render()
    {
        return view('livewire.admin.visitor-charts', [
            'lineChartData' => $this->getSelectedData(),
            'deviceData' => $this->getDeviceData(),
            'browserData' => $this->getBrowserData(),
        ]);
    }
}
