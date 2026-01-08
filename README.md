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

### 14. [PROJECTS PAGE ARCHITECTURE](readme/14-PROJECTS-PAGE.md)

Penjelasan mendalam tentang:

-   Projects page sections & file structure (Blade, CSS, JS, Database)
-   Page structure & 4 major sections (breadcrumb, hero, projects grid dengan filter & pagination, CTA)
-   Database integration dengan Project Model & Migration (projects table schema)
-   Livewire backend architecture (WithPagination, filterProjects, loadMore methods)
-   Project cards grid dengan dynamic data dari database (title, description, image, category)
-   Filter functionality dengan 4 kategori (Semua, Konstruksi Gedung, Infrastruktur, Renovasi)
-   Pagination system dengan 6 items per page & load more button
-   CSS architecture (650+ lines) dengan project card styling, responsive grid, dark mode support
-   JavaScript functionality (200+ lines) dengan image lazy loading, card interactions, button ripple effects, filter handling
-   Icon system compliance (Font Awesome icons untuk kategori & UI)
-   Typography system compliance (Sora, Inter, Fira Code)
-   Design optimization ("kecil, slim, modern" aesthetic, mobile-first responsive)
-   AOS animations integration untuk hero, cards, CTA sections dengan staggered delays
-   Responsive design untuk mobile, tablet, & desktop views
-   Empty state handling jika tidak ada proyek dalam kategori
-   Livewire integration untuk reactive filtering & pagination tanpa page reload
-   Performance optimization dengan lazy loading & GPU-accelerated transforms
-   Accessibility features (keyboard navigation, reduced motion support, semantic HTML)
-   Future enhancement roadmap (project detail page, advanced filters, search, galleries, testimonials, timeline view)


### 15. [CONTACT PAGE ARCHITECTURE](readme/15-CONTACT-PAGE.md)

Penjelasan mendalam tentang:

-   Contact page sections & file structure (Blade, CSS, JS)
-   Page structure & 6 major sections (breadcrumb, hero, contact info cards, maps & location, FAQ accordion, CTA)
-   WhatsApp-centric contact strategy dengan multiple touchpoints
-   Contact info cards (4 columns layout) dengan lokasi, telepon, email, jam operasional
-   Social media links integration (WhatsApp, Instagram, Facebook, LinkedIn)
-   Google Maps embedded iframe dengan location info card
-   FAQ accordion dengan 4 items, smooth expand/collapse animation, keyboard support
-   CSS architecture (1217 lines) dengan FAQ styling, icon color transitions, responsive grid layouts
-   JavaScript functionality (315 lines) dengan FAQ toggle, smooth scroll, button ripple effects, analytics tracking
-   Icon system compliance (Font Awesome icons untuk sections & UI)
-   Typography system compliance (Sora, Inter, Fira Code)
-   Design optimization ("kecil, slim, modern" aesthetic, mobile-first responsive)
-   AOS animations integration untuk hero, cards, maps, FAQ, CTA sections
-   Responsive design untuk mobile, tablet, & desktop views
-   Dark mode support dengan CSS variables override
-   Accessibility features (keyboard navigation pada FAQ, ARIA labels, semantic HTML, reduced motion support)
-   FAQ accordion features (single item open policy, icon color change blue→green, icon rotation 180deg, smooth max-height animation)
-   External links handling (WhatsApp, phone, email, maps search, services navigation)
-   Button styling consistency (primary gradient, outline, white variants)
-   Performance optimization dengan CSS-based animations & efficient JavaScript
-   Error handling & troubleshooting guide untuk FAQ & maps issues

### 16. [PROJECTS MODAL SYSTEM](readme/16-PROJECTS-MODAL-SYSTEM.md)

Penjelasan lengkap tentang:

-   Sistem modal detail proyek di Projects Page (tanpa reload, SPA, Livewire reactive)
-   Livewire logic: `$showModal`, `$selectedProject`, `openProjectDetail()`, `closeModal()`
-   Blade markup: conditional rendering, 3 section utama (header, body, footer)
-   Modal body: gambar, deskripsi lengkap, kategori, tanggal, status, detail grid, CTA
-   CSS architecture: 300+ lines, fade-in & slide-up animation, glassmorphism overlay, dark mode, responsive (desktop modal, mobile bottom-sheet)
-   Keyboard & accessibility support (Escape, overlay click, semantic HTML, aria-label)
-   SPA integration: wire:navigate, auto close on navigation
-   Zero custom JavaScript, zero dependencies
-   Customization guide: max-width, image size, animation, detail fields
-   Consistency checklist: architecture, design, code quality, integration, performance

### 17. [AUTH LOGIN SYSTEM](readme/17-AUTH-LOGIN-SYSTEM.md)

Penjelasan lengkap tentang:

-   Authentication system dengan email & password login
-   Livewire LoginPage component dengan validation & session management
-   Separate auth layout (layouts/auth.blade.php) - NOT shared dengan app.blade.php
-   Login form dengan email, password, remember me (24 jam), password toggle eye icon
-   Session configuration: 1440 minutes (24 hours) remember-me functionality
-   User seeder: Raditiya Bagas Santoso / raditjal717@gmail.com / Radit717!2025
-   CSS architecture: 637 lines, `.auth-*` scoping, mobile-first, light/dark mode, slim modern design
-   JavaScript behavior: 203 lines, password toggle, form validation, accessibility, blur/unfocus, Livewire SPA integration
-   Security features: password hashing, CSRF protection, session regeneration, timing attack prevention
-   Responsive design: mobile (< 576px), tablet (576px - 991px), desktop (> 991px)
-   Dark mode support dengan CSS variables automatic override
-   Routes configuration: GET /login, POST /login, POST /logout dengan guest/auth middleware
-   Database: users table dengan remember_token, sessions table untuk session storage
-   ✅ **ENHANCED UX (Jan 8, 2026):**
    -   Error messages moved from below input to inline with label (cleaner layout)
    -   Auto blur/unfocus inputs when clicking outside form (standard form behavior)
    -   Visual feedback: label color changes to primary when input focused (clear active state)
    -   Password wrapper properly integrated in blade (not lost on Livewire re-render)
    -   All interactions tested & working smoothly on mobile, tablet, desktop views
    -   Status: STABLE & PRODUCTION READY (v1.1.0)

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

**Last Updated:** January 7, 2026  
**Version:** 2.1.0 (Enhanced Auth UX - Jan 8, 2026)  
**Maintainer:** Frontend Team & GitHub Copilot  
**Company:** PT Jaya Abadi Konstruksi

**Latest Changes (Jan 7, 2026 - Bugfix Checkpoint):**

-   ✅ **FIXED:** Input fields now fully clickable with normal left-click (CSS pointer-events + JS enhancement)
-   ✅ **FIXED:** Error messages now display in real-time as user types (wire:model.live.debounce.100ms + validation methods)
-   ✅ **FIXED:** Validation feedback instant and accurate (updatedEmail() & updatedPassword() methods)
-   ✅ **TESTED:** All form interactions working on mobile, tablet, and desktop views
-   ✅ **TESTED:** Error messages appear correctly with proper styling and positioning
-   ✅ **TESTED:** Login flow complete: input validation → error display → successful authentication
-   Auth login system implementation dengan Livewire LoginPage component
-   Email & password authentication dengan validation & error handling
-   Remember me functionality (24 hours session lifetime)
-   User seeder dengan test credentials: Raditiya Bagas Santoso / raditjal717@gmail.com / Radit717!2025
-   Separate auth layout (layouts/auth.blade.php) - NOT shared dengan main app.blade.php
-   Login form dengan email input, password input + toggle eye icon, remember me checkbox
-   Form styling: 552 lines CSS, mobile-first, slim modern design, light/dark mode support
-   JavaScript behavior: 279 lines, password toggle, form validation, accessibility features
-   CSS scoping dengan `.auth-*` prefix, zero global style pollution
-   Responsive design: mobile (< 576px), tablet (576px - 991px), desktop (> 991px)
-   Password toggle eye icon dengan Font Awesome 6 integration
-   Error messages inline dengan label untuk save space (semantic HTML structure)
-   Session configuration: 1440 minutes (24 hours) remember-me & session lifetime
-   Routes setup: GET /login (guest), POST /login (guest), POST /logout (auth)
-   Security features: bcrypt password hashing, CSRF protection, session regeneration, token management
-   Livewire integration: wire:model, wire:submit, wire:navigate, livewire:navigated listener
-   Bootstrap CSS integration untuk form styling & responsive utility classes
-   Font Awesome 6 icons untuk password toggle (fa-eye, fa-eye-slash)
-   ARIA labels & keyboard navigation untuk accessibility support
-   Theme toggle integration dengan light/dark mode (data-bs-theme attribute)
-   Loading state handling dengan wire:loading spinner animation
-   Semantic HTML markup tanpa inline styles atau scripts
-   Auth documentation (17-AUTH-LOGIN-SYSTEM.md) dengan complete architecture guide
-   ✅ BUGFIX CHECKPOINT - Input clickability fixed, error messages displaying, all interactions working

---

**Untuk detail lengkap, silakan baca dokumentasi di folder `readme/`**
