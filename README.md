FRONTEND ARCHITECTURE
PT JAYA ABADI KONSTRUKSI
======================

Dokumen ini menjelaskan arsitektur frontend website
PT Jaya Abadi Konstruksi secara teknis, terstruktur,
dan konsisten untuk kebutuhan:

- Developer manusia
- AI assistant / code generator
- Long-term maintainability
- Zero technical debt


--------------------------------------------------
OVERVIEW
--------------------------------------------------

Frontend website PT Jaya Abadi Konstruksi dibangun dengan prinsip:

- Mobile First
- Light / Dark Mode (system auto + manual override)
- Clean, professional, corporate UI
- Fokus pada company profile industri konstruksi (besi & baja)

Aplikasi menggunakan pendekatan:

- Server-driven UI
- SPA-like navigation
- Tanpa framework frontend berat

Livewire digunakan sebagai penggerak navigasi,
bukan sebagai pengganti frontend framework penuh.


--------------------------------------------------
TECH STACK
--------------------------------------------------

Backend & Frontend Integration:
- Laravel 12
- Livewire v3 (SPA navigation via wire:navigate)

UI & Styling:
- Bootstrap 5.3+
- Alpine.js (ringan, declarative)

Asset Management:
- Vite (build & bundling)


--------------------------------------------------
CORE ARCHITECTURE CONCEPT
--------------------------------------------------

PRINSIP UTAMA (WAJIB):

- Blade hanya untuk MARKUP
- CSS hanya untuk STYLING
- JavaScript hanya untuk BEHAVIOR

PEMISAHAN TANGGUNG JAWAB ADALAH MUTLAK.

DILARANG KERAS:
- <style> inline
- <script> inline
- Logic UI bercampur di Blade
- JS behavior ditulis langsung di view

SEMUA ASSET FRONTEND:
- Dikelola via Vite
- Terpusat
- Bisa ditrace & dibuild ulang


--------------------------------------------------
FOLDER STRUCTURE
--------------------------------------------------

CSS STRUCTURE:

resources/css/
- app.css                     (entry point, dipanggil oleh Vite)
- components/
  - navbar.css
  - theme-toggle.css
  - footer.css

ATURAN CSS:
- app.css hanya berisi:
  - import Bootstrap
  - import component CSS
  - global styles
  - layout styles
- Tidak ada CSS inline di Blade
- Semua selector component menggunakan prefix yang jelas


--------------------------------------------------

JAVASCRIPT STRUCTURE:

resources/js/
- app.js                      (orchestrator)
- bootstrap.js                (Bootstrap JS global)
- livewire/
  - navigation.js             (SPA behavior)
- components/
  - navbar.js                 (navbar mobile behavior)
  - theme.js                  (Alpine theme store)
  - footer.js                 (footer behavior)

ATURAN JS:
- app.js tidak boleh berisi logic berat
- Semua fitur dipisah berdasarkan tanggung jawab
- Tidak ada JS inline di Blade


--------------------------------------------------
BLADE LAYOUT RESPONSIBILITY
--------------------------------------------------

File utama:
resources/views/layouts/app.blade.php

TUGAS LAYOUT:
- Struktur HTML utama
- Include asset via @vite
- Include Livewire styles & scripts
- Menyediakan container SPA

CONTOH PENTING:
<body wire:navigate>

LAYOUT TIDAK BOLEH:
- Mengandung CSS inline
- Mengandung JS custom
- Mengandung business logic


--------------------------------------------------
SPA NAVIGATION (LIVEWIRE v3)
--------------------------------------------------

Navigasi aplikasi menggunakan Livewire SPA Navigation:

- Semua link menggunakan <a wire:navigate href="">
- Tidak ada JS manual untuk handling loading
- Tidak ada event navigate-start / navigate-finish custom

LOADING STATE:
- Ditangani langsung oleh Livewire
- Menggunakan wire:loading

KEUNTUNGAN:
- Aman
- Tidak ada race condition
- Predictable behavior
- Maintainable jangka panjang


--------------------------------------------------
JAVASCRIPT BEHAVIOR FLOW
--------------------------------------------------

1. THEME SYSTEM (ALPINE STORE)

File:
resources/js/components/theme.js

Fungsi:
- Mode: light | dark | system
- Disimpan di localStorage
- Mode system mengikuti OS
- Mengatur atribut HTML:

<html data-bs-theme="dark">


--------------------------------------------------

2. NAVBAR MOBILE BEHAVIOR

File:
resources/js/components/navbar.js

Behavior:
- Navbar mobile otomatis tertutup setelah SPA navigation
- Hanya aktif pada viewport < 992px


--------------------------------------------------

3. SPA NAVIGATION ENHANCEMENT

File:
resources/js/livewire/navigation.js

Behavior:
- Scroll ke atas setelah navigasi SPA
- Tidak mengontrol loading
- Loading tetap ditangani Livewire


--------------------------------------------------
DESIGN PRINCIPLES
--------------------------------------------------

MOBILE FIRST:
- Semua layout dimulai dari mobile
- Desktop hanya enhancement
- Contoh grid:
  col-12 col-md-6

PROGRESSIVE ENHANCEMENT:
- Tanpa JavaScript: halaman tetap usable
- Dengan JavaScript: UX lebih smooth
- Tidak bergantung penuh pada JS

MAINTAINABILITY FIRST:
- Struktur mudah dipahami AI & developer
- Feature-based JavaScript
- Minim coupling
- Mudah dikembangkan bertahap


--------------------------------------------------
FOOTER ARCHITECTURE (EXTENSION)
--------------------------------------------------

Footer diperlakukan sebagai bagian arsitektur,
bukan elemen dekoratif.

PRINSIP FOOTER:
- Modular
- Mobile-first
- Theme-aware
- Accessible

--------------------------------------------------

FOOTER COMPONENT STRUCTURE:

resources/views/components/
- footer.blade.php
- footer/
  - brand.blade.php
  - contact.blade.php
  - links.blade.php
  - social.blade.php
  - copyright.blade.php
  - theme-toggle.blade.php


--------------------------------------------------

RESPONSIVE BEHAVIOR FOOTER:

Mobile (< 992px):
- Single column
- Links & contact menggunakan accordion
- Touch target minimum 44px

Desktop (>= 992px):
- Grid 4 kolom
- Konten selalu visible
- Bottom section horizontal


--------------------------------------------------

FOOTER CSS RULES:
- Semua selector prefix "footer-"
- Tidak ada inline style
- Theme-aware via data-bs-theme


--------------------------------------------------

FOOTER JS RESPONSIBILITY:
- Accordion aktif hanya di mobile
- Auto update tahun copyright
- Re-init setelah Livewire SPA navigation
- Tidak memanipulasi DOM global


--------------------------------------------------
BEST PRACTICE RULES (WAJIB)
--------------------------------------------------

WAJIB:
- Gunakan <a wire:navigate>
- Semua CSS lewat app.css
- Semua JS lewat resources/js
- Gunakan Blade component

DILARANG:
- wire:navigate di <button>
- Inline style
- Inline script
- Override Bootstrap secara global


--------------------------------------------------
BUILD & DEVELOPMENT
--------------------------------------------------

Development:
- npm run dev

Production:
- npm run build

Vite:
- Cache busting otomatis
- File versioned


--------------------------------------------------
FINAL NOTES
--------------------------------------------------

Arsitektur ini dirancang agar:

- Developer baru langsung paham
- AI tidak salah asumsi struktur
- Scaling aman tanpa technical debt
- Cocok untuk perusahaan konstruksi (baja, besi, industrial)
- Stabil, tegas, dan predictable

--------------------------------------------------

Last Updated : February 2024
Version      : 1.0.0
Maintainer   : Frontend Team
Company      : PT Jaya Abadi Konstruksi
