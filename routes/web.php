<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\HomePage;
use App\Livewire\AboutPage;
use App\Livewire\ServicesPage;
use App\Livewire\ProjectsPage;
use App\Livewire\ContactPage;
use App\Livewire\Auth\LoginPage;
use App\Livewire\Admin\AdminDashboard;
use App\Livewire\Admin\AdminProjects;

// Livewire Component Routes - SPA Navigation (Public)
Route::get('/', HomePage::class)->name('home');
Route::get('/tentang-kami', AboutPage::class);
Route::get('/layanan', ServicesPage::class);
Route::get('/proyek', ProjectsPage::class);
Route::get('/kontak', ContactPage::class);

// Authentication Routes
Route::middleware('guest')->group(function () {
    Route::get('/login', LoginPage::class)->name('login');
    Route::post('/login', [LoginPage::class, 'login']);
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [LoginPage::class, 'logout'])->name('logout');
    Route::get('/logout', [LoginPage::class, 'logout'])->name('logout.get'); // Temporary GET route for testing

    // Admin Routes - Protected by auth middleware
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', AdminDashboard::class)->name('dashboard');
        Route::get('/projects', AdminProjects::class)->name('projects');
    });
});

// Optional: API or non-SPA routes
Route::get('/api/status', function() {
    return response()->json(['status' => 'OK']);
});
