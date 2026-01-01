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
                'icon' => 'fas fa-home',
            ],
            [
                'route' => '/tentang-kami',
                'label' => 'Tentang Kami',
                'icon' => 'fas fa-building',
            ],
            [
                'route' => '/layanan',
                'label' => 'Layanan',
                'icon' => 'fas fa-wrench',
            ],
            [
                'route' => '/proyek',
                'label' => 'Proyek',
                'icon' => 'fas fa-hammer',
            ],
            [
                'route' => '/kontak',
                'label' => 'Kontak',
                'icon' => 'fas fa-envelope',
            ],
        ]);
    }
}
