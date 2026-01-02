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

### 11. [AOS (ANIMATE ON SCROLL) INTEGRATION](readme/11-AOS-ANIMATIONS.md)

Penjelasan tentang:

-   AOS library integration & architecture
-   AOSManager class untuk centralized management
-   Custom CSS animations dengan professional easing
-   Livewire v3 auto-integration
-   Available animations & timing configuration
-   Implementation patterns (Hero, Grid, Portfolio)
-   Accessibility support (prefers-reduced-motion)
-   Performance optimization & best practices
-   Debug & troubleshooting guide

### 12. [ABOUT PAGE ARCHITECTURE](readme/12-ABOUT-PAGE.md)

Penjelasan mendalam tentang:

-   About page sections & file structure (Blade, CSS, JS)
-   Page structure & 8 major sections (breadcrumb, hero, history, mission/vision, values, expertise, achievements, CTA)
-   CSS architecture dengan custom properties & dark mode
-   JavaScript functionality (counter animations, timeline interactions, Livewire integration)
-   Icon system compliance (20+ Font Awesome icons)
-   Typography system compliance (Sora, Inter, Fira Code)
-   Design optimization ("kecil, slim, modern" aesthetic)
-   Breadcrumb design decision & UX rationale
-   Responsive design & accessibility features
-   Testing checklist & performance metrics

### 13. [SERVICES PAGE ARCHITECTURE](readme/13-SERVICES-PAGE.md)

Penjelasan mendalam tentang:

-   Services page sections & file structure (Blade, CSS, JS)
-   Page structure & 6 major sections (breadcrumb, hero, main services grid, detailed service info, testimonials, CTA)
-   Services card component design dengan icon & feature lists
-   CSS architecture dengan service card styling & responsive grid layout
-   JavaScript functionality (filter interactions, service expansion, Livewire SPA integration)
-   Icon system compliance (30+ Font Awesome icons untuk layanan)
-   Typography system compliance (Sora, Inter, Fira Code)
-   Design optimization ("kecil, slim, modern" aesthetic)
-   Service categorization & hierarchical information architecture
-   Quick stats display (500+ projects, 15+ service types, 98% client satisfaction)
-   Responsive design untuk mobile, tablet, & desktop views
-   AOS animations integration untuk hero, cards, & CTA sections
-   Performance optimization & accessibility features
-   Testing checklist & implementation best practices

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

**Last Updated:** January 2, 2026  
**Version:** 1.6.0 (Services Page Implementation)  
**Maintainer:** Frontend Team & GitHub Copilot  
**Company:** PT Jaya Abadi Konstruksi

**Latest Changes:**

-   Services page implementation dengan 6 major sections (breadcrumb, hero overview, main services grid, service features, testimonials/highlights, CTA)
-   9 comprehensive service cards (Konstruksi Gedung, Infrastruktur, Renovasi, dll) dengan icon & feature lists
-   Hero section dengan quick stats (500+ projects, 15+ service types, 98% client satisfaction)
-   Responsive grid layout (3 columns desktop, 2 columns tablet, 1 column mobile)
-   Service cards dengan top accent bar & icon backgrounds untuk visual hierarchy
-   Breadcrumb navigation untuk improved UX consistency
-   AOS animations integration (fade-in, fade-up, fade-left effects dengan staggered delays)
-   CTA buttons untuk konsultasi gratis & portfolio viewing
-   Dark mode support dengan CSS variables compatibility
-   About page implementation dengan 8 major sections (breadcrumb, hero, history, mission/vision, values, expertise, achievements, CTA)
-   1226-line CSS dengan CSS variables, dark mode support, responsive design, accessibility features
-   253-line JavaScript dengan counter animations, timeline interactions, Livewire SPA integration
-   Counter animation system dengan Intersection Observer (smooth 2-second animation at 60fps)
-   Timeline visualization dengan gradient line dan animated dots
-   Value cards dengan numbered badges (01-06) dan colored icon backgrounds
-   Complete About Page documentation (12-ABOUT-PAGE.md)
-   Breadcrumb navigation untuk non-home pages UX best practice
-   100% compliance dengan core architecture, icon system, typography, dan design optimization guidelines
-   Services page documentation (13-SERVICES-PAGE.md) dengan architectural guidelines & implementation patterns

---

**Untuk detail lengkap, silakan baca dokumentasi di folder `readme/`**
