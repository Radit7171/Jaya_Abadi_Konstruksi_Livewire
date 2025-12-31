# HOME PAGE ARCHITECTURE

HOME PAGE adalah landing page utama PT Jaya Abadi Konstruksi
yang menampilkan company profile, services, projects, dan CTA.

## SECTIONS:

1. Hero - Judul, badge, stats, CTA buttons
2. Trusted By - Logo klien/partner
3. About - Company overview & features
4. Services - 3 card layanan utama
5. Projects - Portfolio 3 proyek terbaru
6. CTA - Call to action section

---

## FILES STRUCTURE

`resources/views/livewire/`

-   `home-page.blade.php` (Main markup, NO style/script)
-   `HomePage.php` (Livewire component class)

`resources/css/pages/home/`

-   `home-page.css` (ALL styling)

`resources/js/pages/home/`

-   `home-page.js` (ALL behavior/animations)

---

## TECHNOLOGY:

-   Blade: Pure HTML markup only
-   CSS: 859 lines, scoped `.home-*` prefix
-   JavaScript: Progressive enhancement class

---

## HOME PAGE CSS ARCHITECTURE

### SCOPING:

-   Semua selector menggunakan prefix `.home-`
-   Tidak ada global style pollution
-   CSS variables untuk theme consistency

### FEATURES:

-   Light/Dark mode support via `[data-bs-theme]`
-   CSS variables for colors, spacing, shadows
-   Mobile-first responsive design
-   Smooth animations dengan `prefers-reduced-motion`

### SECTIONS STYLING:

**`.home-hero`**

-   Gradient background dengan clip-path decoration
-   Image wrapper dengan 3D perspective transform
-   Floating badge dengan overflow: hidden protection

**`.home-trusted`**

-   Light background section
-   Flex logo layout dengan hover effects

**`.home-about`**

-   Image hover zoom effect
-   Feature items dengan SVG icons

**`.home-services`**

-   3-column grid card layout
-   Hover elevation dengan top border accent
-   Service list dengan checkmark bullets

**`.home-projects`**

-   Portfolio card dengan image overlay
-   Image scale on hover (1.1x)
-   Eye icon reveal on hover

**`.home-cta`**

-   Gradient background section
-   SVG pattern background
-   Responsive button layout

---

## HOME PAGE JAVASCRIPT BEHAVIOR

### CLASS: HomePage

**FEATURES:**

1. **INTERSECTION OBSERVER**
    - Fade-in animation saat section visible
    - Threshold 0.1, rootMargin untuk early trigger

2. **IMAGE LAZY LOADING**
    - Progressive enhancement untuk `img[loading="lazy"]`
    - Loading state CSS class tracking
    - Error handling dengan console warning

3. **SMOOTH SCROLL**
    - Internal anchor link navigation
    - Smooth scroll behavior

4. **BUTTON EFFECTS**
    - Hover translateY transform
    - Click active state
    - Icon translateX animation

5. **PROJECT CARDS**
    - Click anywhere on card navigate
    - Keyboard accessible (Enter/Space)
    - Modal preview functionality

6. **ANALYTICS TRACKING**
    - Event tracking untuk CTA clicks
    - Section visibility tracking
    - Project view tracking
    - Integrated dengan Google Analytics (gtag)

### LIFECYCLE:

-   Init saat DOMContentLoaded
-   Re-init saat `livewire:navigated` (SPA)
-   Cleanup dengan `destroy()` method
-   Performance optimized dengan debounce

### BROWSER SUPPORT:

-   Modern browsers (ES6+ syntax)
-   Intersection Observer API
-   CSS transforms & transitions

---

## HOME PAGE RESPONSIVE DESIGN

### BREAKPOINTS:

-   Mobile: < 768px
-   Tablet: 768px - 991px
-   Desktop: >= 992px

### MOBILE ADJUSTMENTS:

-   Hero section padding reduced
-   Hero title font-size: 2rem (from 2.75rem)
-   Stats flex-wrap: wrap
-   Buttons full-width stack vertically
-   About content padding reset
-   CTA buttons responsive grid

### TABLET ADJUSTMENTS:

-   Grid 2 columns untuk services/projects

### DESKTOP ENHANCEMENTS:

-   Full featured layout
-   Hero title font-size: 3.25rem
-   Image 3D transforms active
-   Floating badges visible

---

## HOME PAGE COLOR SYSTEM

### CSS VARIABLES (Light Mode):

-   `--home-primary`: #2563eb (Blue)
-   `--home-secondary`: #10b981 (Green)
-   `--home-accent`: #f59e0b (Amber)
-   `--home-light`: #f8fafc
-   `--home-dark`: #1e293b
-   `--home-gray`: #64748b
-   `--home-text`: #1e293b
-   `--home-text-muted`: #64748b
-   `--home-bg`: #ffffff
-   `--home-card-bg`: #ffffff

### CSS VARIABLES (Dark Mode):

-   Automatically overridden via `[data-bs-theme="dark"]`
-   Dark background dengan lighter text
-   Maintained contrast ratio
-   Adjusted shadows untuk visibility

### USAGE:

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

### PERFORMANCE:

-   Image lazy loading (`loading="eager"` untuk hero)
-   Progressive enhancement (works without JS)
-   Debounced resize handlers
-   Intersection Observer untuk animations

### ACCESSIBILITY:

-   Semantic HTML (section, article, h1-h3)
-   Proper heading hierarchy
-   Alt text untuk semua images
-   ARIA labels untuk buttons
-   Keyboard navigation support
-   Color contrast compliance

### SEO:

-   Semantic structure
-   Proper heading hierarchy
-   Image alt text
-   Meta viewport responsive
-   Open Graph ready

---

## HOME PAGE KNOWN ISSUES & FIXES

### 1. HORIZONTAL OVERFLOW (FIXED)

**Masalah:** Floating badge `position: absolute right: -1rem`

**Solusi:** 
- `overflow-x: hidden` di `.home-page` & `html` & `body`
- `scrollbar-gutter: stable` di `html`
- Changed badge `right: 0rem` (dari `-1rem`)

### 2. NAVBAR MOBILE MENU TRANSPARENCY (FIXED)

**Masalah:** navbar-collapse punya `background: inherit`
Mewarisi `backdrop-filter blur` membuat menu tembus

**Solusi:** Ganti dengan `background-color: var(--bs-body-bg)`
Solid background color responsive ke theme
