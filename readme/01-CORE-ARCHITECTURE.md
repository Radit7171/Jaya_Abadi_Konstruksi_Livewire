# CORE ARCHITECTURE

## OVERVIEW

Frontend website Jaya Abadi Konstruksi dibangun dengan prinsip:

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

**Backend & Frontend Integration:**

-   Laravel 12
-   Livewire v3 (SPA navigation via wire:navigate)

**UI & Styling:**

-   Bootstrap 5.3+
-   Alpine.js (ringan, declarative)

**Asset Management:**

-   Vite (build & bundling)

---

## CORE ARCHITECTURE CONCEPT

### PRINSIP UTAMA (WAJIB):

-   Blade hanya untuk MARKUP
-   CSS hanya untuk STYLING
-   JavaScript hanya untuk BEHAVIOR

**PEMISAHAN TANGGUNG JAWAB ADALAH MUTLAK.**

### DILARANG KERAS:

-   `<style>` inline
-   `<script>` inline
-   Logic UI bercampur di Blade
-   JS behavior ditulis langsung di view

**SEMUA ASSET FRONTEND:**

-   Dikelola via Vite
-   Terpusat
-   Bisa ditrace & dibuild ulang

---

## FOLDER STRUCTURE

### CSS STRUCTURE

`resources/css/`

```
app.css (entry point, dipanggil oleh Vite)
components/
  ├── navbar.css
  ├── theme-toggle.css
  └── footer.css
pages/
  └── home/
      └── home-page.css
```

**ATURAN CSS:**

-   `app.css` hanya berisi:
    -   import Bootstrap
    -   import component CSS
    -   global styles
    -   layout styles
-   Tidak ada CSS inline di Blade
-   Semua selector component menggunakan prefix yang jelas

---

### JAVASCRIPT STRUCTURE

`resources/js/`

```
app.js (orchestrator)
bootstrap.js (Bootstrap JS global)
livewire/
  └── navigation.js (SPA behavior)
components/
  ├── navbar.js (navbar mobile behavior)
  ├── theme.js (Alpine theme store)
  └── footer.js (footer behavior)
pages/
  └── home/
      └── home-page.js
```

**ATURAN JS:**

-   `app.js` tidak boleh berisi logic berat
-   Semua fitur dipisah berdasarkan tanggung jawab
-   Tidak ada JS inline di Blade

---

## BLADE LAYOUT RESPONSIBILITY

**File utama:** `resources/views/layouts/app.blade.php`

### TUGAS LAYOUT:

-   Struktur HTML utama
-   Include asset via `@vite`
-   Include Livewire styles & scripts
-   Menyediakan container SPA

**CONTOH PENTING:**

```html
<body wire:navigate>
```

### LAYOUT TIDAK BOLEH:

-   Mengandung CSS inline
-   Mengandung JS custom
-   Mengandung business logic

---

## BEST PRACTICE RULES (WAJIB)

✅ **WAJIB:**

-   Gunakan `<a wire:navigate>`
-   Semua CSS lewat `app.css`
-   Semua JS lewat `resources/js`
-   Gunakan Blade component

❌ **DILARANG:**

-   `wire:navigate` di `<button>`
-   Inline style
-   Inline script
-   Override Bootstrap secara global
