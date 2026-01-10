<?php

namespace App\Services;

use App\Models\Visitor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Jenssegers\Agent\Agent;

class VisitorTrackingService
{
    /**
     * Track a visitor (IP-based - 1 IP = 1 record dalam 24 jam)
     * Setiap IP hanya dicatat sekali dalam 24 jam, tidak peduli halaman mana
     * Tidak akan update atau insert ulang selama 24 jam belum lewat
     */
    public static function track(Request $request): ?Visitor
    {
        $ipAddress = self::getClientIp($request);
        $pageUrl = $request->url();

        // Cek apakah IP ini sudah visit dalam 24 jam terakhir
        $recentVisit = Visitor::where('ip_address', $ipAddress)
            ->where('created_at', '>=', now()->subHours(24))
            ->first();

        // Jika sudah ada visit dalam 24 jam, skip (jangan insert atau update)
        if ($recentVisit) {
            return null; // Don't create duplicate
        }

        // Jika belum ada visit dalam 24 jam, create record visitor baru
        $agent = new Agent();
        $agent->setUserAgent($request->userAgent());

        $data = [
            'ip_address' => $ipAddress,
            'user_agent' => $request->userAgent(),
            'page_url' => $pageUrl,
            'referrer' => $request->server('HTTP_REFERER'),
            'device_type' => self::getDeviceType($agent),
            'browser' => $agent->browser(),
            'os' => $agent->platform(),
            'user_id' => Auth::id(),
        ];

        // Try to get geolocation (optional - requires geoip2/geoip2 package)
        if (function_exists('geoip')) {
            try {
                /** @phpstan-ignore-next-line */
                /** @noinspection PhpUndefinedFunctionInspection */
                $geoip = call_user_func('geoip')->getLocation($data['ip_address']);
                if ($geoip) {
                    $data['country'] = $geoip->country;
                    $data['city'] = $geoip->city;
                }
            } catch (\Exception $e) {
                // Geolocation failed, skip
            }
        }

        return Visitor::create($data);
    }

    /**
     * Get client IP address
     */
    public static function getClientIp(Request $request): string
    {
        if (!empty($request->server('HTTP_CLIENT_IP'))) {
            return $request->server('HTTP_CLIENT_IP');
        } elseif (!empty($request->server('HTTP_X_FORWARDED_FOR'))) {
            return $request->server('HTTP_X_FORWARDED_FOR');
        } else {
            return $request->ip();
        }
    }

    /**
     * Get device type from user agent
     */
    public static function getDeviceType(Agent $agent): string
    {
        if ($agent->isPhone()) {
            return 'mobile';
        } elseif ($agent->isTablet()) {
            return 'tablet';
        } else {
            return 'desktop';
        }
    }

    /**
     * Check if IP is from same visitor (session based)
     */
    public static function isSameVisitor(Request $request, string $ipAddress): bool
    {
        return self::getClientIp($request) === $ipAddress;
    }

    /**
     * Get visitor summary
     */
    public static function getSummary(): array
    {
        return Visitor::getStats();
    }
}
