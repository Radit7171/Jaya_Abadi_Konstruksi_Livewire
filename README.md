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

**Last Updated:** January 4, 2026  
**Version:** 1.8.0 (Contact Page Implementation)  
**Maintainer:** Frontend Team & GitHub Copilot  
**Company:** PT Jaya Abadi Konstruksi

**Latest Changes:**

-   Contact page implementation dengan 6 major sections (breadcrumb, hero dengan quick contact info, contact info cards dengan social media, maps embedding dengan location card, FAQ accordion, CTA)
-   WhatsApp-centric contact strategy dengan multiple touchpoints (hero, info cards, social card, maps buttons, CTA)
-   Contact info cards grid (4 columns desktop, 2 columns tablet, 1 column mobile) dengan lokasi, telepon, email, jam operasional
-   Social media links integration (WhatsApp primary highlight, Instagram, Facebook, LinkedIn)
-   Google Maps embedded iframe dengan responsive container
-   Location info card dengan main office details, operating hours, action buttons (directions, contact via WhatsApp)
-   Quick info checklist (lokasi strategis, mudah diakses, parkir gratis)
-   FAQ accordion component dengan 4 FAQs, smooth expand/collapse animation, single item open policy
-   FAQ functionality dengan JavaScript toggle logic, CSS-based max-height animation, icon color transitions (blue → green), icon rotation 180deg
-   Icon styling per section (blue primary for hero/info, green secondary for FAQ toggle)
-   CSS architecture (1217 lines) dengan scoped `.contact-*` prefix, CSS variables untuk theme-aware colors, dark mode support
-   JavaScript behavior (315 lines) dengan FAQ accordion, smooth scroll, button ripple effects, intersection observer, analytics tracking
-   Responsive button variants (primary gradient, outline, white for dark backgrounds)
-   External links handling via `class="external-link" data-link="[url]"` pattern
-   Breadcrumb navigation untuk SPA context (Home > Hubungi Kami)
-   Hero section dengan badge, headline gradient, quick contact info, dual CTAs (WhatsApp primary, services secondary)
-   CTA section dengan gradient background, decorative SVG pattern, dual buttons (white primary, outline white secondary)
-   Accessibility features (keyboard navigation on FAQ, ARIA labels on breadcrumb, semantic HTML, reduced motion support)
-   AOS animations integration (fade-up, fade-in-left) dengan staggered delays untuk hero, cards, maps, FAQ, CTA
-   Mobile-first responsive design dengan font size reductions, padding adjustments, button stacking
-   Dark mode support dengan automatic CSS variables override
-   Livewire v3 integration dengan livewire:navigated listener untuk behavior re-init
-   Performance optimization dengan CSS-based animations (no JavaScript transitions), efficient event handling
-   Error handling & troubleshooting guide (FAQ toggle issues, maps CSP errors, external link handling)
-   Contact Page documentation (15-CONTACT-PAGE.md) dengan architectural guidelines, CSS architecture, JavaScript behavior, responsive design, accessibility features
-   Complete integration dengan core architecture principles (Blade markup-only, CSS styling-only, JS behavior-only)
-   100% compliance dengan icon system, typography, design optimization, & AOS animation guidelines
-   Production-ready implementation dengan console debugging, memory management, cleanup on SPA navigation

---

**Untuk detail lengkap, silakan baca dokumentasi di folder `readme/`**
