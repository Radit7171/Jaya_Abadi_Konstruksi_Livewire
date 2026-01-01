# FRONTEND ARCHITECTURE - PT JAYA ABADI KONSTRUKSI

Dokumentasi lengkap arsitektur frontend website PT Jaya Abadi Konstruksi.

Dokumen ini menjelaskan struktur teknis, terstruktur, dan konsisten untuk:

-   Developer manusia
-   AI assistant / code generator
-   Long-term maintainability
-   Zero technical debt

---

## 📚 DAFTAR DOKUMENTASI

Dokumentasi telah dipecah menjadi beberapa bagian untuk kemudahan membaca:

### 1. [CORE ARCHITECTURE](readme/01-CORE-ARCHITECTURE.md)

Penjelasan fundamental tentang:

-   Overview & tech stack
-   Prinsip arsitektur (Blade markup, CSS styling, JS behavior)
-   Folder structure (CSS & JavaScript)
-   Layout responsibility
-   Best practices rules

### 2. [SPA NAVIGATION & JAVASCRIPT BEHAVIOR](readme/02-SPA-NAVIGATION.md)

Penjelasan tentang:

-   Livewire SPA navigation
-   JavaScript behavior flow (theme, navbar, navigation)
-   Design principles
-   Build & development commands

### 3. [FOOTER ARCHITECTURE](readme/03-FOOTER-ARCHITECTURE.md)

Penjelasan tentang:

-   Footer component structure
-   Responsive behavior
-   CSS rules
-   JavaScript responsibility

### 4. [HOME PAGE ARCHITECTURE](readme/04-HOME-PAGE.md)

Penjelasan mendalam tentang:

-   Home page sections & files structure
-   CSS architecture & scoping
-   JavaScript behavior & features
-   Responsive design & color system
-   Performance & accessibility
-   Known issues & fixes

### 5. [TROUBLESHOOTING & ISSUES](readme/05-TROUBLESHOOTING.md)

Panduan troubleshooting untuk:

-   Multiple Alpine instances error
-   Theme store undefined
-   SPA navigation issues
-   Vite HMR CORS blocking
-   Middleware conflicts
-   CSS transitions & theme switching
-   Development checklist & common gotchas

### 6. [GLOBAL SCROLLBAR SYSTEM](readme/06-SCROLLBAR-SYSTEM.md)

Penjelasan tentang:

-   Custom scrollbar CSS implementation
-   Theme system integration
-   Architecture compliance
-   Maintainability rules

### 7. [ICON SYSTEM](readme/07-ICON-SYSTEM.md)

Penjelasan tentang:

-   Font Awesome 6 integration
-   Icon naming conventions
-   Available icons & usage
-   Customization & theming
-   Best practices

### 8. [EXTERNAL LINKS & NAVIGATION](readme/08-EXTERNAL-LINKS-GUIDE.md)

Penjelasan tentang:

-   External links (email, phone, WhatsApp)
-   Social media links
-   Security best practices (`rel="noopener noreferrer"`)
-   Link format & validation
-   Common mistakes & fixes

### 9. [TYPOGRAPHY SYSTEM](readme/09-TYPOGRAPHY-SYSTEM.md)

Penjelasan tentang:

-   Font families (Sora, Inter, Fira Code)
-   Modern typography stack
-   Font applications & usage
-   Performance optimization
-   Dark mode support

### 10. [DESIGN OPTIMIZATION](readme/10-DESIGN-OPTIMIZATION.md)

Dokumentasi tentang:

-   Optimasi UI/UX untuk "kecil, slim, modern"
-   Spacing & padding optimization
-   Typography refinement
-   Navbar compact design
-   Font consistency verification
-   Maintenance checklist

---

## 🚀 QUICK START

**Development:**

```bash
npm run dev        # Terminal 1
php artisan serve --host=0.0.0.0 --port=8000  # Terminal 2

# Access via http://localhost:8000
```

**Production:**

```bash
npm run build
```

---

## ⚡ KEY PRINCIPLES

✅ **WAJIB:**

-   Blade hanya untuk MARKUP
-   CSS hanya untuk STYLING
-   JavaScript hanya untuk BEHAVIOR
-   Gunakan `<a wire:navigate>`
-   Semua asset lewat Vite

❌ **DILARANG:**

-   Inline `<style>` atau `<script>`
-   Logic di Blade template
-   Multiple Alpine instances
-   Manual Alpine.start()

---

## 📝 METADATA

**Last Updated:** January 1, 2026  
**Version:** 1.3.0 (Design Optimization - Kecil, Slim, Modern)  
**Maintainer:** Frontend Team & GitHub Copilot  
**Company:** PT Jaya Abadi Konstruksi

**Latest Changes:**

-   Design optimization untuk filosofi "kecil, slim, modern"
-   Section padding & spacing reduction (-30%)
-   Typography refinement (heading font size optimization)
-   Navbar compact design (8 improvements)
-   Button padding optimization
-   Font consistency verification (Sora, Inter, Fira Code)

---

**Untuk detail lengkap, silakan baca dokumentasi di folder `readme/`**
