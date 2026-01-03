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

**Last Updated:** January 3, 2026  
**Version:** 1.7.0 (Projects Page Implementation)  
**Maintainer:** Frontend Team & GitHub Copilot  
**Company:** PT Jaya Abadi Konstruksi

**Latest Changes:**

-   Projects page implementation dengan 4 major sections (breadcrumb, hero overview, projects grid dengan filter & pagination, CTA)
-   Database-driven projects dengan Project Model & Migration (projects table dengan fields: title, description, category, image_url, is_published, published_at)
-   Livewire backend dengan WithPagination trait untuk reactive filtering & pagination (6 items per page, load more functionality)
-   Filter buttons untuk 4 kategori (Semua, Konstruksi Gedung, Infrastruktur, Renovasi) dengan wire:click binding
-   Dynamic project cards dengan database integration (@forelse loop, dynamic data binding)
-   Empty state handling jika tidak ada proyek dalam kategori filter
-   Hero section dengan quick stats (500+ Proyek Selesai, 10+ Tahun Pengalaman, 98% Kepuasan Klien)
-   Responsive grid layout (3 columns desktop, 2 columns tablet, 1 column mobile) dengan gap & aspect ratio
-   Project cards dengan image overlay effect (eye icon on hover), category badge, title, description truncation, detail link
-   CSS architecture (650+ lines) dengan scoped `.projects-` prefix, CSS variables untuk theme-aware colors, dark mode support
-   JavaScript behavior (200+ lines) dengan image lazy loading, card interactions, button ripple effects, filter state management, smooth scroll
-   Livewire integration untuk auto re-init behaviors after SPA navigation (livewire:navigated listener)
-   AOS animations (fade-up, fade-in-left, zoom-in) dengan staggered delays untuk hero, cards, CTA
-   Load More button untuk pagination alternative (increments perPage by 6)
-   CTA section dengan gradient background, decorative circles, dual buttons (primary light & outline light)
-   Dark mode support dengan CSS variables override di [data-bs-theme="dark"]
-   Accessibility features (keyboard navigation for filters, reduced motion support, semantic HTML, ARIA labels)
-   Mobile-first responsive design dengan font size reductions, padding adjustments, button stacking
-   Breadcrumb navigation untuk improved UX consistency across all pages
-   Projects Page documentation (14-PROJECTS-PAGE.md) dengan architectural guidelines, backend architecture, database schema, JavaScript behavior
-   Complete integration dengan core architecture principles (Blade markup-only, CSS styling-only, JS behavior-only)
-   100% compliance dengan icon system, typography, design optimization, & AOS animation guidelines
-   Production-ready implementation dengan error handling, performance optimization, progressive enhancement

---

**Untuk detail lengkap, silakan baca dokumentasi di folder `readme/`**
