<?php

namespace App\Http\Middleware;

use App\Services\VisitorTrackingService;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TrackVisitor
{
    /**
     * Routes yang TIDAK akan di-track
     */
    protected $exceptRoutes = [
        'admin/*',           // Jangan track admin dashboard
        'api/*',             // Jangan track API routes
        '/up',               // Health check
        '*.css',             // Don't track static files
        '*.js',
        '*.png',
        '*.jpg',
        '*.jpeg',
        '*.gif',
        '*.svg',
        '*.webp',
        '*.ico',
        '*.woff*',
        '*.ttf',
    ];

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Jangan track jika path cocok dengan except routes
        if (!$this->shouldTrack($request)) {
            return $next($request);
        }

        // Track visitor hanya untuk public pages
        VisitorTrackingService::track($request);

        return $next($request);
    }

    /**
     * Check apakah request harus di-track
     */
    protected function shouldTrack(Request $request): bool
    {
        $path = $request->path();

        // Don't track AJAX requests
        if ($request->ajax()) {
            return false;
        }

        // Don't track static files
        if ($this->isStaticFile($path)) {
            return false;
        }

        // Don't track excluded routes
        foreach ($this->exceptRoutes as $exceptRoute) {
            if ($this->matches($path, $exceptRoute)) {
                return false;
            }
        }

        return true;
    }

    /**
     * Check apakah path adalah static file
     */
    protected function isStaticFile(string $path): bool
    {
        $extensions = ['css', 'js', 'png', 'jpg', 'jpeg', 'gif', 'svg', 'webp', 'ico', 'woff', 'woff2', 'ttf', 'eot', 'map'];

        foreach ($extensions as $ext) {
            if (str_ends_with($path, '.' . $ext)) {
                return true;
            }
        }

        return false;
    }

    /**
     * Check apakah path matches pattern
     */
    protected function matches(string $path, string $pattern): bool
    {
        // Remove leading slash dari pattern
        $pattern = ltrim($pattern, '/');

        // Handle wildcard patterns
        if (str_contains($pattern, '*')) {
            $pattern = str_replace('*', '.*', preg_quote($pattern, '#'));
            return preg_match('#^' . $pattern . '$#', $path) === 1;
        }

        return $path === $pattern;
    }
}
