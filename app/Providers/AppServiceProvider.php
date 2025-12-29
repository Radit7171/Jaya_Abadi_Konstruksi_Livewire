<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider; // ✅ WAJIB

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        View::share('navItems', [
            [
                'route' => '/',
                'label' => 'Home',
                'icon' => 'bi bi-house-door',
            ],
            [
                'route' => '/tentang-kami',
                'label' => 'Tentang Kami',
                'icon' => 'bi bi-building',
            ],
            [
                'route' => '/layanan',
                'label' => 'Layanan',
                'icon' => 'bi bi-tools',
            ],
            [
                'route' => '/proyek',
                'label' => 'Proyek',
                'icon' => 'bi bi-bricks',
            ],
            [
                'route' => '/kontak',
                'label' => 'Kontak',
                'icon' => 'bi bi-envelope',
            ],
        ]);
    }
}
