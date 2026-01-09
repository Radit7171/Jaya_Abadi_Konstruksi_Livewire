<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Visitor extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'ip_address',
        'user_agent',
        'page_url',
        'referrer',
        'country',
        'city',
        'device_type',
        'browser',
        'os',
        'user_id',
    ];

    /**
     * Get the user that owns the visitor record.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Scope: Get visitors from today
     */
    public function scopeToday($query)
    {
        return $query->whereDate('created_at', today());
    }

    /**
     * Scope: Get visitors from this week
     */
    public function scopeThisWeek($query)
    {
        return $query->whereBetween('created_at', [
            now()->startOfWeek(),
            now()->endOfWeek(),
        ]);
    }

    /**
     * Scope: Get visitors from this month
     */
    public function scopeThisMonth($query)
    {
        return $query->whereMonth('created_at', now()->month)
                    ->whereYear('created_at', now()->year);
    }

    /**
     * Scope: Get unique visitors (by IP)
     */
    public function scopeUnique($query)
    {
        return $query->distinct('ip_address');
    }

    /**
     * Scope: Get visitors by device type
     */
    public function scopeByDevice($query, string $device)
    {
        return $query->where('device_type', $device);
    }

    /**
     * Scope: Get visitors by page URL
     */
    public function scopeByPage($query, string $page)
    {
        return $query->where('page_url', 'like', "%{$page}%");
    }

    /**
     * Get total unique visitors
     */
    public static function totalUniqueVisitors(): int
    {
        return self::distinct('ip_address')->count('ip_address');
    }

    /**
     * Get total unique visitors today
     */
    public static function totalUniqueVisitorsToday(): int
    {
        return self::today()->distinct('ip_address')->count('ip_address');
    }

    /**
     * Get most visited pages
     */
    public static function mostVisitedPages(int $limit = 10): array
    {
        return self::selectRaw('page_url, COUNT(*) as visits')
            ->groupBy('page_url')
            ->orderByDesc('visits')
            ->limit($limit)
            ->get()
            ->toArray();
    }

    /**
     * Get visitor stats
     */
    public static function getStats(): array
    {
        return [
            'total_visits' => self::count(),
            'total_unique' => self::totalUniqueVisitors(),
            'today_visits' => self::today()->count(),
            'today_unique' => self::totalUniqueVisitorsToday(),
            'this_week_visits' => self::thisWeek()->count(),
            'this_month_visits' => self::thisMonth()->count(),
            'most_visited_pages' => self::mostVisitedPages(5),
            'device_breakdown' => self::selectRaw('device_type, COUNT(*) as count')
                ->groupBy('device_type')
                ->pluck('count', 'device_type')
                ->toArray(),
        ];
    }
}
