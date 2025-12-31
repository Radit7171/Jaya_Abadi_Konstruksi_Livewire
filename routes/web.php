<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\HomePage;
use App\Livewire\AboutPage;
use App\Livewire\ServicesPage;
use App\Livewire\ProjectsPage;
use App\Livewire\ContactPage;

// Livewire Component Routes - SPA Navigation
Route::get('/', HomePage::class);
Route::get('/tentang-kami', AboutPage::class);
Route::get('/layanan', ServicesPage::class);
Route::get('/proyek', ProjectsPage::class);
Route::get('/kontak', ContactPage::class);

// Optional: API or non-SPA routes
Route::get('/api/status', function() {
    return response()->json(['status' => 'OK']);
});
