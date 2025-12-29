<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\HomePage;
use App\Livewire\AboutPage;
use App\Livewire\ServicesPage;
use App\Livewire\ProjectsPage;
use App\Livewire\ContactPage;

// Livewire Component Routes - SPA Navigation
Route::get('/', HomePage::class)->name('home');
Route::get('/tentang-kami', AboutPage::class)->name('about');
Route::get('/layanan', ServicesPage::class)->name('services');
Route::get('/proyek', ProjectsPage::class)->name('projects');
Route::get('/kontak', ContactPage::class)->name('contact');

// Optional: API or non-SPA routes
Route::get('/api/status', function() {
    return response()->json(['status' => 'OK']);
});
