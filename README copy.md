FRONTEND ARCHITECTURE
PT JAYA ABADI KONSTRUKSI
======================

Dokumen ini menjelaskan arsitektur frontend website
PT Jaya Abadi Konstruksi secara teknis, terstruktur,
dan konsisten untuk kebutuhan:

-   Developer manusia
-   AI assistant / code generator
-   Long-term maintainability
-   Zero technical debt

---

## OVERVIEW

Frontend website PT Jaya Abadi Konstruksi dibangun dengan prinsip:

-   Mobile First
-   Light / Dark Mode (system auto + manual override)
-   Clean, professional, corporate UI
-   Fokus pada company profile industri konstruksi (besi & baja)

Aplikasi menggunakan pendekatan:

-   Server-driven UI
-   SPA-like navigation
-   Tanpa framework frontend berat

Livewire digunakan sebagai penggerak navigasi,
bukan sebagai pengganti frontend framework penuh.

---

## TECH STACK

Backend & Frontend Integration:

-   Laravel 12
-   Livewire v3 (SPA navigation via wire:navigate)

UI & Styling:

-   Bootstrap 5.3+
-   Alpine.js (ringan, declarative)

Asset Management:

-   Vite (build & bundling)

---

## CORE ARCHITECTURE CONCEPT

PRINSIP UTAMA (WAJIB):

-   Blade hanya untuk MARKUP
-   CSS hanya untuk STYLING
-   JavaScript hanya untuk BEHAVIOR

PEMISAHAN TANGGUNG JAWAB ADALAH MUTLAK.

DILARANG KERAS:

-   <style> inline
-   <script> inline
-   Logic UI bercampur di Blade
-   JS behavior ditulis langsung di view

SEMUA ASSET FRONTEND:

-   Dikelola via Vite
-   Terpusat
-   Bisa ditrace & dibuild ulang

---

## FOLDER STRUCTURE

CSS STRUCTURE:

resources/css/

-   app.css (entry point, dipanggil oleh Vite)
-   components/
    -   navbar.css
    -   theme-toggle.css
    -   footer.css

ATURAN CSS:

-   app.css hanya berisi:
    -   import Bootstrap
    -   import component CSS
    -   global styles
    -   layout styles
-   Tidak ada CSS inline di Blade
-   Semua selector component menggunakan prefix yang jelas

---

JAVASCRIPT STRUCTURE:

resources/js/

-   app.js (orchestrator)
-   bootstrap.js (Bootstrap JS global)
-   livewire/
    -   navigation.js (SPA behavior)
-   components/
    -   navbar.js (navbar mobile behavior)
    -   theme.js (Alpine theme store)
    -   footer.js (footer behavior)

ATURAN JS:

-   app.js tidak boleh berisi logic berat
-   Semua fitur dipisah berdasarkan tanggung jawab
-   Tidak ada JS inline di Blade

---

## BLADE LAYOUT RESPONSIBILITY

File utama:
resources/views/layouts/app.blade.php

TUGAS LAYOUT:

-   Struktur HTML utama
-   Include asset via @vite
-   Include Livewire styles & scripts
-   Menyediakan container SPA

CONTOH PENTING:

<body wire:navigate>

LAYOUT TIDAK BOLEH:

-   Mengandung CSS inline
-   Mengandung JS custom
-   Mengandung business logic

---

## SPA NAVIGATION (LIVEWIRE v3)

Navigasi aplikasi menggunakan Livewire SPA Navigation:

-   Semua link menggunakan <a wire:navigate href="">
-   Tidak ada JS manual untuk handling loading
-   Tidak ada event navigate-start / navigate-finish custom

LOADING STATE:

-   Ditangani langsung oleh Livewire
-   Menggunakan wire:loading

KEUNTUNGAN:

-   Aman
-   Tidak ada race condition
-   Predictable behavior
-   Maintainable jangka panjang

---

## JAVASCRIPT BEHAVIOR FLOW

1. THEME SYSTEM (ALPINE STORE)

File:
resources/js/components/theme.js

Fungsi:

-   Mode: light | dark | system
-   Disimpan di localStorage
-   Mode system mengikuti OS
-   Mengatur atribut HTML:

<html data-bs-theme="dark">

---

2. NAVBAR MOBILE BEHAVIOR

File:
resources/js/components/navbar.js

Behavior:

-   Navbar mobile otomatis tertutup setelah SPA navigation
-   Hanya aktif pada viewport < 992px

---

3. SPA NAVIGATION ENHANCEMENT

File:
resources/js/livewire/navigation.js

Behavior:

-   Scroll ke atas setelah navigasi SPA
-   Tidak mengontrol loading
-   Loading tetap ditangani Livewire

---

## DESIGN PRINCIPLES

MOBILE FIRST:

-   Semua layout dimulai dari mobile
-   Desktop hanya enhancement
-   Contoh grid:
    col-12 col-md-6

PROGRESSIVE ENHANCEMENT:

-   Tanpa JavaScript: halaman tetap usable
-   Dengan JavaScript: UX lebih smooth
-   Tidak bergantung penuh pada JS

MAINTAINABILITY FIRST:

-   Struktur mudah dipahami AI & developer
-   Feature-based JavaScript
-   Minim coupling
-   Mudah dikembangkan bertahap

---

## FOOTER ARCHITECTURE (EXTENSION)

Footer diperlakukan sebagai bagian arsitektur,
bukan elemen dekoratif.

PRINSIP FOOTER:

-   Modular
-   Mobile-first
-   Theme-aware
-   Accessible

---

FOOTER COMPONENT STRUCTURE:

resources/views/components/

-   footer.blade.php
-   footer/
    -   brand.blade.php
    -   contact.blade.php
    -   links.blade.php
    -   social.blade.php
    -   copyright.blade.php
    -   theme-toggle.blade.php

---

RESPONSIVE BEHAVIOR FOOTER:

Mobile (< 992px):

-   Single column
-   Links & contact menggunakan accordion
-   Touch target minimum 44px

Desktop (>= 992px):

-   Grid 4 kolom
-   Konten selalu visible
-   Bottom section horizontal

---

FOOTER CSS RULES:

-   Semua selector prefix "footer-"
-   Tidak ada inline style
-   Theme-aware via data-bs-theme

---

FOOTER JS RESPONSIBILITY:

-   Accordion aktif hanya di mobile
-   Auto update tahun copyright
-   Re-init setelah Livewire SPA navigation
-   Tidak memanipulasi DOM global

---

## BEST PRACTICE RULES (WAJIB)

WAJIB:

-   Gunakan <a wire:navigate>
-   Semua CSS lewat app.css
-   Semua JS lewat resources/js
-   Gunakan Blade component

DILARANG:

-   wire:navigate di <button>
-   Inline style
-   Inline script
-   Override Bootstrap secara global

---

## BUILD & DEVELOPMENT

Development:

-   npm run dev

Production:

-   npm run build

Vite:

-   Cache busting otomatis
-   File versioned

---

## FINAL NOTES

Arsitektur ini dirancang agar:

-   Developer baru langsung paham
-   AI tidak salah asumsi struktur
-   Scaling aman tanpa technical debt
-   Cocok untuk perusahaan konstruksi (baja, besi, industrial)
-   Stabil, tegas, dan predictable

---

## LIVEWIRE SPA SETUP & TROUBLESHOOTING GUIDE

### Issue yang Pernah Terjadi & Solusinya

#### 1. MULTIPLE ALPINE INSTANCES ERROR

**Masalah:**

-   Pesan: "Detected multiple instances of Alpine running"
-   Theme store tidak bekerja
-   JavaScript intermittent

**Penyebab:**

-   app.js import Alpine (instance 1)
-   Livewire juga include Alpine (instance 2)
-   Conflict menyebabkan store register ke instance yang salah

**Solusi:**

-   JANGAN import Alpine di app.js
-   Biarkan Livewire menyediakan Alpine via window.Alpine
-   app.js hanya import components yang listen ke alpine:init event

```javascript
// ❌ WRONG
import Alpine from "alpinejs";
window.Alpine = Alpine;

// ✅ CORRECT
// Alpine disediakan oleh Livewire di window.Alpine
// app.js hanya orchestrate components
```

#### 2. THEME STORE UNDEFINED

**Masalah:**

-   Error: "Cannot read properties of undefined (reading 'current')"
-   Theme switcher tidak bekerja

**Penyebab:**

-   x-data x-init="$store.theme.init()" di HTML tag
-   Trigger terlalu cepat, sebelum store ter-register
-   Race condition dengan Alpine initialization

**Solusi:**

-   Remove x-data dan x-init dari HTML tag
-   Biarkan theme.js handle initialization via alpine:init event
-   Theme store diinit SETELAH Alpine siap

```html
<!-- ❌ WRONG -->
<html x-data x-init="$store.theme.init()">
    <!-- ✅ CORRECT -->
    <html></html>
</html>
```

#### 3. SPA NAVIGATION TIDAK KONSISTEN

**Masalah:**

-   SPA kadang bekerja, kadang full page reload
-   Livewire navigate event kadang tidak fire

**Penyebab:**

-   Alpine.start() dipanggil di waktu yang salah
-   Race condition antara script loading
-   Layout middleware conflict

**Solusi:**

-   Hapus manual Alpine.start() dari app.js
-   Biarkan Livewire handle Alpine initialization
-   Layout hanya berisi @livewireScripts tanpa custom Alpine logic

```javascript
// ❌ WRONG
import Alpine from "alpinejs";
Alpine.start(); // Jangan di app.js!

// ✅ CORRECT
// Layout file handle initialization
// app.js hanya import components
```

---

## HOME PAGE ARCHITECTURE

HOME PAGE adalah landing page utama PT Jaya Abadi Konstruksi
yang menampilkan company profile, services, projects, dan CTA.

SECTIONS:

1. Hero - Judul, badge, stats, CTA buttons
2. Trusted By - Logo klien/partner
3. About - Company overview & features
4. Services - 3 card layanan utama
5. Projects - Portfolio 3 proyek terbaru
6. CTA - Call to action section

FILES STRUCTURE:

resources/views/livewire/

-   home-page.blade.php (Main markup, NO style/script)
-   HomePage.php (Livewire component class)

resources/css/pages/home/

-   home-page.css (ALL styling)

resources/js/pages/home/

-   home-page.js (ALL behavior/animations)

TECHNOLOGY:

-   Blade: Pure HTML markup only
-   CSS: 859 lines, scoped .home-\* prefix
-   JavaScript: Progressive enhancement class

---

## HOME PAGE CSS ARCHITECTURE

SCOPING:

-   Semua selector menggunakan prefix ".home-"
-   Tidak ada global style pollution
-   CSS variables untuk theme consistency

FEATURES:

-   Light/Dark mode support via [data-bs-theme]
-   CSS variables for colors, spacing, shadows
-   Mobile-first responsive design
-   Smooth animations dengan prefers-reduced-motion

SECTIONS STYLING:

.home-hero

-   Gradient background dengan clip-path decoration
-   Image wrapper dengan 3D perspective transform
-   Floating badge dengan overflow: hidden protection

.home-trusted

-   Light background section
-   Flex logo layout dengan hover effects

.home-about

-   Image hover zoom effect
-   Feature items dengan SVG icons

.home-services

-   3-column grid card layout
-   Hover elevation dengan top border accent
-   Service list dengan checkmark bullets

.home-projects

-   Portfolio card dengan image overlay
-   Image scale on hover (1.1x)
-   Eye icon reveal on hover

.home-cta

-   Gradient background section
-   SVG pattern background
-   Responsive button layout

---

## HOME PAGE JAVASCRIPT BEHAVIOR

CLASS: HomePage

FEATURES:

1. INTERSECTION OBSERVER

    - Fade-in animation saat section visible
    - Threshold 0.1, rootMargin untuk early trigger

2. IMAGE LAZY LOADING

    - Progressive enhancement untuk img[loading="lazy"]
    - Loading state CSS class tracking
    - Error handling dengan console warning

3. SMOOTH SCROLL

    - Internal anchor link navigation
    - Smooth scroll behavior

4. BUTTON EFFECTS

    - Hover translateY transform
    - Click active state
    - Icon translateX animation

5. PROJECT CARDS

    - Click anywhere on card navigate
    - Keyboard accessible (Enter/Space)
    - Modal preview functionality

6. ANALYTICS TRACKING
    - Event tracking untuk CTA clicks
    - Section visibility tracking
    - Project view tracking
    - Integrated dengan Google Analytics (gtag)

LIFECYCLE:

-   Init saat DOMContentLoaded
-   Re-init saat livewire:navigated (SPA)
-   Cleanup dengan destroy() method
-   Performance optimized dengan debounce

BROWSER SUPPORT:

-   Modern browsers (ES6+ syntax)
-   Intersection Observer API
-   CSS transforms & transitions

---

## HOME PAGE RESPONSIVE DESIGN

BREAKPOINTS:

-   Mobile: < 768px
-   Tablet: 768px - 991px
-   Desktop: >= 992px

MOBILE ADJUSTMENTS:

-   Hero section padding reduced
-   Hero title font-size: 2rem (from 2.75rem)
-   Stats flex-wrap: wrap
-   Buttons full-width stack vertically
-   About content padding reset
-   CTA buttons responsive grid

TABLET ADJUSTMENTS:

-   Grid 2 columns untuk services/projects

DESKTOP ENHANCEMENTS:

-   Full featured layout
-   Hero title font-size: 3.25rem
-   Image 3D transforms active
-   Floating badges visible

---

## HOME PAGE COLOR SYSTEM

CSS VARIABLES (Light Mode):

-   --home-primary: #2563eb (Blue)
-   --home-secondary: #10b981 (Green)
-   --home-accent: #f59e0b (Amber)
-   --home-light: #f8fafc
-   --home-dark: #1e293b
-   --home-gray: #64748b
-   --home-text: #1e293b
-   --home-text-muted: #64748b
-   --home-bg: #ffffff
-   --home-card-bg: #ffffff

CSS VARIABLES (Dark Mode):

-   Automatically overridden via [data-bs-theme="dark"]
-   Dark background dengan lighter text
-   Maintained contrast ratio
-   Adjusted shadows untuk visibility

USAGE:

```css
.home-element {
    background: var(--home-card-bg);
    color: var(--home-text);
    box-shadow: var(--home-shadow);
    border-color: var(--home-border);
}
```

---

## HOME PAGE OPTIMIZATION

PERFORMANCE:

-   Image lazy loading (loading="eager" untuk hero)
-   Progressive enhancement (works without JS)
-   Debounced resize handlers
-   Intersection Observer untuk animations

ACCESSIBILITY:

-   Semantic HTML (section, article, h1-h3)
-   Proper heading hierarchy
-   Alt text untuk semua images
-   ARIA labels untuk buttons
-   Keyboard navigation support
-   Color contrast compliance

SEO:

-   Semantic structure
-   Proper heading hierarchy
-   Image alt text
-   Meta viewport responsive
-   Open Graph ready

---

## HOME PAGE KNOWN ISSUES & FIXES

1. HORIZONTAL OVERFLOW (FIXED)
   Masalah: Floating badge position: absolute right: -1rem
   Solusi: overflow-x: hidden di .home-page & html & body
   scrollbar-gutter: stable di html
   Changed badge right: 0rem (dari -1rem)

2. NAVBAR MOBILE MENU TRANSPARENCY (FIXED)
   Masalah: navbar-collapse punya background: inherit
   Mewarisi backdrop-filter blur membuat menu tembus
   Solusi: Ganti dengan background-color: var(--bs-body-bg)
   Solid background color responsive ke theme

#### 4. VITE HMR CORS BLOCKED

**Masalah:**

-   Error: "net::ERR_BLOCKED_BY_CLIENT"
-   CSS dan JS tidak ter-load

**Penyebab:**

-   Browser akses via 0.0.0.0, Vite via localhost
-   Origin mismatch

**Solusi:**

```javascript
// vite.config.js
server: {
    host: '0.0.0.0',
    port: 5173,
    hmr: {
        host: 'localhost',
        port: 5173,
    },
}

// SELALU akses via http://localhost:8000
// Jangan via http://0.0.0.0:8000 atau IP address
```

#### 5. MIDDLEWARE CONFLICT

**Masalah:**

-   Middleware redirect guest atau CSRF validation error

**Penyebab:**

-   Overly restrictive middleware di bootstrap/app.php

**Solusi:**

```php
// bootstrap/app.php
->withMiddleware(function (Middleware $middleware): void {
    $middleware->use([
        \Illuminate\Http\Middleware\HandleCors::class,
    ]);
    // Jangan tambah middleware kompleks
    // Livewire handle sendiri
})
```

#### 6. CSS TRANSITIONS CONFLICT DENGAN THEME SWITCHING

**Masalah:**

-   Visual glitches saat switch theme (light/dark)
-   Warna berflash atau tidak smooth
-   Transition pada background-color bertabrakan dengan theme change

**Penyebab:**

-   CSS transitions mencoba animate perubahan warna
-   Theme switch terjadi instant via JS
-   Race condition antara CSS animation dan JS execution
-   Background-color transition pada navbar mengganggu

**Solusi:**

1. **JavaScript Theme Store** (resources/js/components/theme.js)
    - Tambah class `theme-transition-disabled` saat theme change
    - Disable SEMUA transition untuk saat itu
    - Re-enable dengan requestAnimationFrame untuk smooth execution

```javascript
apply() {
    const html = document.documentElement;

    // Disable transitions temporarily
    html.classList.add('theme-transition-disabled');

    // Apply theme...
    html.setAttribute("data-bs-theme", this.current);

    // Re-enable transitions after paint
    requestAnimationFrame(() => {
        requestAnimationFrame(() => {
            html.classList.remove('theme-transition-disabled');
        });
    });
}
```

2. **Global CSS** (resources/css/app.css)
    - Ketika class `theme-transition-disabled` aktif, matikan semua transition

```css
html.theme-transition-disabled,
html.theme-transition-disabled * {
    transition: none !important;
    animation: none !important;
}
```

3. **Navbar CSS** (resources/css/components/navbar.css)
    - Remove `background-color` dari transition
    - Hanya transition `box-shadow` dan `border-color`
    - Background theme change instant, tanpa flicker

```css
.navbar {
    transition: box-shadow 0.3s ease, border-color 0.3s ease;
    /* JANGAN transition background-color */
}
```

4. **Theme Toggle CSS** (resources/css/components/theme-toggle.css)
    - Tambah `background-color` ke transition untuk pseudo-element
    - Ini untuk handle primary color change yang smooth

```css
.theme-capsule::before {
    transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1), background-color
            0.3s cubic-bezier(0.4, 0, 0.2, 1);
}
```

**Hasil:**

-   ✅ Theme switch tanpa glitch visual
-   ✅ Transition on hover tetap smooth
-   ✅ Tidak ada flashing atau color pop
-   ✅ Konsisten di light & dark mode

### Development Checklist

Sebelum commit perubahan frontend, pastikan:

-   [ ] Tidak ada "multiple Alpine instances" di console
-   [ ] SPA navigation berfungsi (URL change, no reload)
-   [ ] Theme switcher bekerja (light/dark)
-   [ ] Tidak ada race condition di Livewire navigasi
-   [ ] Vite HMR bekerja (file save instant reload)
-   [ ] Console log bersih (no errors/warnings)

### Testing Commands

```bash
# Clear cache
php artisan cache:clear
php artisan view:clear
php artisan config:clear

# Start development
npm run dev        # Terminal 1
php artisan serve --host=0.0.0.0 --port=8000  # Terminal 2

# Access via
# http://localhost:8000
```

### Common Gotchas

1. **Jangan akses via 0.0.0.0:8000 atau IP**

    - Browser tidak bisa akses 0.0.0.0
    - Vite HMR akan blocked
    - Gunakan localhost:8000

2. **Jangan import Alpine di app.js**

    - Livewire sudah provide window.Alpine
    - Dual instance akan menyebabkan masalah
    - Percayakan ke Livewire

3. **Jangan gunakan x-data x-init di HTML root**

    - Trigger sebelum stores ter-register
    - Akan cause undefined store errors
    - Gunakan alpine:init event listener

4. **Jangan manual Alpine.start() atau Alpine.reinit()**
    - Livewire handle otomatis
    - Bisa cause race condition
    - Biarkan framework yang manage lifecycle

---

## GLOBAL SCROLLBAR SYSTEM

Sebagai bagian dari peningkatan kualitas UI global,
aplikasi ini menggunakan **custom scrollbar CSS**
untuk menggantikan scrollbar default browser.

Scrollbar diperlakukan sebagai **global UI concern**,
bukan sebagai komponen terpisah.

TUJUAN:

-   Memberikan tampilan yang lebih profesional & corporate
-   Konsisten dengan identitas industri (konstruksi, baja)
-   Mendukung Light / Dark Mode
-   Tidak mengganggu SPA navigation & theme switching
-   Tetap aman dan maintainable jangka panjang

---

## DESIGN PRINCIPLES (SCROLLBAR)

Scrollbar dirancang dengan prinsip:

-   Clean & minimal
-   Tidak mencolok
-   Tidak menggunakan animasi berlebihan
-   Tidak mengganggu konten utama
-   Konsisten di seluruh halaman aplikasi

Warna dan ukuran scrollbar mengikuti **CSS Variables**
dan otomatis menyesuaikan dengan theme aktif.

---

## IMPLEMENTATION DETAILS

IMPLEMENTASI:

-   CSS only (tanpa JavaScript)
-   Didefinisikan di: resources/css/app.css
-   Menggunakan CSS Variables
-   Theme-aware via atribut:

<html data-bs-theme="light|dark">

BROWSER SUPPORT:

-   Chrome / Edge / Safari (WebKit scrollbar)
-   Firefox (scrollbar-color)
-   Browser yang tidak mendukung akan fallback ke default scrollbar
    tanpa menyebabkan error atau layout issue.

---

## ARCHITECTURE COMPLIANCE

Custom scrollbar ini **WAJIB mematuhi arsitektur frontend**:

✔ CSS hanya untuk styling  
✔ Tidak ada inline style  
✔ Tidak ada JavaScript behavior  
✔ Tidak override Bootstrap component  
✔ Tidak terikat ke Blade atau Livewire lifecycle

Scrollbar TIDAK:

-   Menggunakan JavaScript
-   Menggunakan event listener
-   Mengikat ke SPA navigation
-   Mengganggu theme switching logic

---

## THEME SYSTEM INTEGRATION

Scrollbar terintegrasi penuh dengan sistem tema:

-   Light Mode:

    -   Track terang
    -   Thumb netral abu-abu
    -   Hover lebih gelap untuk affordance visual

-   Dark Mode:
    -   Track gelap
    -   Thumb kontras sedang
    -   Hover lebih terang untuk visibility

Theme switching:

-   Tidak menggunakan transition
-   Aman terhadap class `theme-transition-disabled`
-   Tidak menyebabkan flicker atau visual glitch

---

## MAINTAINABILITY NOTES

ATURAN:

-   Custom scrollbar hanya boleh didefinisikan di app.css
-   Perubahan warna / ukuran dilakukan via CSS Variables
-   Tidak diperbolehkan override scrollbar di level component
-   Tidak diperbolehkan custom scrollbar per halaman

Pendekatan ini memastikan:

-   Konsistensi UI global
-   Mudah dipahami oleh developer & AI
-   Aman untuk scaling jangka panjang
-   Zero technical debt

---

Last Updated : December 2024
Version : 1.2.0 (CSS Transitions & Theme Switching Optimization)
Maintainer : Frontend Team & GitHub Copilot
Company : PT Jaya Abadi Konstruksi

Fixed Issues:

-   Multiple Alpine instances race condition
-   Theme store initialization timing
-   SPA navigation consistency
-   Vite HMR CORS blocking
-   Middleware conflicts
-   CSS transitions conflict dengan theme switching
-   Visual glitches saat switch light/dark mode
