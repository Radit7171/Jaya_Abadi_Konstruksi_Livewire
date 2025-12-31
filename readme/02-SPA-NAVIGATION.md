# SPA NAVIGATION & JAVASCRIPT BEHAVIOR

## SPA NAVIGATION (LIVEWIRE v3)

Navigasi aplikasi menggunakan Livewire SPA Navigation:

-   Semua link menggunakan `<a wire:navigate href="">`
-   Tidak ada JS manual untuk handling loading
-   Tidak ada event navigate-start / navigate-finish custom

### LOADING STATE:

-   Ditangani langsung oleh Livewire
-   Menggunakan `wire:loading`

### KEUNTUNGAN:

-   Aman
-   Tidak ada race condition
-   Predictable behavior
-   Maintainable jangka panjang

---

## JAVASCRIPT BEHAVIOR FLOW

### 1. THEME SYSTEM (ALPINE STORE)

**File:** `resources/js/components/theme.js`

**Fungsi:**

-   Mode: light | dark | system
-   Disimpan di localStorage
-   Mode system mengikuti OS
-   Mengatur atribut HTML:

```html
<html data-bs-theme="dark">
```

---

### 2. NAVBAR MOBILE BEHAVIOR

**File:** `resources/js/components/navbar.js`

**Behavior:**

-   Navbar mobile otomatis tertutup setelah SPA navigation
-   Hanya aktif pada viewport < 992px

---

### 3. SPA NAVIGATION ENHANCEMENT

**File:** `resources/js/livewire/navigation.js`

**Behavior:**

-   Scroll ke atas setelah navigasi SPA
-   Tidak mengontrol loading
-   Loading tetap ditangani Livewire

---

## DESIGN PRINCIPLES

### MOBILE FIRST:

-   Semua layout dimulai dari mobile
-   Desktop hanya enhancement
-   Contoh grid: `col-12 col-md-6`

### PROGRESSIVE ENHANCEMENT:

-   Tanpa JavaScript: halaman tetap usable
-   Dengan JavaScript: UX lebih smooth
-   Tidak bergantung penuh pada JS

### MAINTAINABILITY FIRST:

-   Struktur mudah dipahami AI & developer
-   Feature-based JavaScript
-   Minim coupling
-   Mudah dikembangkan bertahap

---

## BUILD & DEVELOPMENT

**Development:**

```bash
npm run dev
```

**Production:**

```bash
npm run build
```

**Vite:**

-   Cache busting otomatis
-   File versioned
