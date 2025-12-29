# Frontend Architecture – Jaya Abadi Konstruksi

## Overview
Frontend website **PT Jaya Abadi Konstruksi** dibangun dengan pendekatan:

- Mobile First
- Light / Dark Mode (system auto + manual override)
- Clean, professional, corporate UI
- Optimized untuk company profile konstruksi (besi & baja)

Aplikasi menggunakan server-driven UI dengan SPA-like navigation
tanpa framework frontend berat.

---

## Tech Stack

- Laravel 12
- Livewire v3 (SPA navigation via wire:navigate)
- Bootstrap 5.3+
- Alpine.js (lightweight UI interaction)
- Vite (asset bundler)

---

## Core Architecture Concept

PRINSIP UTAMA:
Blade hanya untuk markup  
CSS hanya untuk styling  
JavaScript hanya untuk behavior  

Tidak ada:
- <style> inline
- <script> inline
- Logic UI bercampur di Blade

Semua asset frontend dikelola via Vite.

---

## Folder Structure

### CSS Structure

resources/css/
├─ app.css                 # Entry point CSS (dipanggil oleh Vite)
├─ components/
│  ├─ navbar.css
│  └─ theme-toggle.css

Penjelasan:
- app.css hanya berisi:
  - import Bootstrap
  - import component CSS
  - global styles
  - layout styles untuk layouts/app.blade.php
- Tidak ada CSS inline di Blade

---

### JavaScript Structure

resources/js/
├─ app.js                  # Entry point JS
├─ bootstrap.js            # Bootstrap JS global
├─ livewire/
│  └─ navigation.js        # SPA behavior (scroll, hooks)
├─ components/
│  ├─ navbar.js            # Navbar mobile behavior
│  └─ theme.js             # Alpine theme store

Penjelasan:
- app.js = orchestrator
- Tidak ada logic berat di entry file
- Semua fitur dipisah berdasarkan tanggung jawab

---

## Blade Layout Responsibility

File:
resources/views/layouts/app.blade.php

TUGAS LAYOUT:
- HTML structure
- Include assets via @vite
- Include Livewire styles & scripts
- Markup SPA container

TIDAK BOLEH:
- Inline CSS
- Inline JS
- Business logic

Contoh penting:
<body wire:navigate>

---

## SPA Navigation (Livewire v3)

Aplikasi menggunakan Livewire SPA Navigation:

- wire:navigate di tag <a>
- Tidak menggunakan JS manual untuk loading
- Mengandalkan API resmi Livewire

Loading state:
<div wire:loading.flex wire:target="navigate">

Keuntungan:
- Aman
- Tidak race condition
- Tidak perlu event JS navigate-start / navigate-finish

---

## JavaScript Behavior Flow

### 1. Theme System (Alpine Store)

File:
resources/js/components/theme.js

Fungsi:
- Theme: light | dark | system
- Disimpan di localStorage
- Auto mengikuti OS jika mode system
- Mengatur atribut HTML:

<html data-bs-theme="dark">

---

### 2. Navbar Mobile Behavior

File:
resources/js/components/navbar.js

Behavior:
- Saat SPA navigation selesai:
  - Navbar mobile otomatis ditutup
- Hanya aktif di viewport < 992px

---

### 3. SPA Navigation Enhancement

File:
resources/js/livewire/navigation.js

Behavior:
- Scroll ke atas setelah navigasi SPA
- Tidak mengontrol loading
- Loading ditangani langsung oleh Livewire

---

## Design Principles

### Mobile First
- Semua layout dimulai dari mobile
- Desktop hanya enhancement
- Bootstrap grid contoh:

<div class="col-12 col-md-6">

---

### Progressive Enhancement
- Tanpa JS: halaman tetap bisa diakses
- Dengan JS: UX lebih smooth
- Tidak bergantung penuh pada JavaScript

---

### Maintainability First
- Mudah dipahami AI & developer
- Struktur konsisten
- Feature-based JavaScript
- Minim coupling

---

## Best Practice Rules (WAJIB)

WAJIB:
- Gunakan <a wire:navigate href="">
- Semua CSS lewat app.css
- Semua JS lewat resources/js

DILARANG:
- wire:navigate di <button>
- <style> di Blade
- <script> custom di Blade

---

## Build & Development

Development:
npm run dev

Production:
npm run build

---

## Future Improvements (Optional)

- Page transition animation sync JS + CSS
- Lazy-load JS untuk halaman tertentu
- Extract CSS ke layouts / utilities
- Replace Bootstrap Icons dengan SVG sprite

---

## Final Notes

Arsitektur ini dirancang supaya:
- AI lain langsung paham struktur & alur kerja
- Developer baru onboarding cepat
- Scaling aman tanpa technical debt
- Livewire SPA tetap stabil & predictable
