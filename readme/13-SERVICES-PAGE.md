# SERVICES PAGE ARCHITECTURE — PT JAYA ABADI KONSTRUKSI

Dokumentasi lengkap arsitektur Services Page dengan penjelasan struktur, styling, dan functionality.

**File Structure:**
- [app/Livewire/ServicesPage.php](../app/Livewire/ServicesPage.php) — Livewire component
- [resources/views/livewire/services-page.blade.php](../resources/views/livewire/services-page.blade.php) — Markup (428 lines)
- [resources/css/pages/services-page.css](../resources/css/pages/services-page.css) — Styling
- [resources/js/pages/services-page.js](../resources/js/pages/services-page.js) — Behavior

---

## 📋 PAGE STRUCTURE & SECTIONS

Services Page terdiri dari **6 major sections** dengan responsive design & AOS animations:

### 1️⃣ BREADCRUMB NAVIGATION
```blade
<nav class="services-breadcrumb">
  <ol class="services-breadcrumb-list">
    <li><a wire:navigate href="/">Home</a></li>
    <li><span class="services-breadcrumb-current">Layanan</span></li>
  </ol>
</nav>
```

**Purpose:** Membantu user navigasi & SEO breadcrumb markup
**Features:**
- Links dengan `wire:navigate` untuk SPA behavior
- Semantic HTML `<nav>` & `<ol>` tags
- AOS fade-in animation
- Dark mode support via CSS variables

---

### 2️⃣ HERO SECTION — Services Overview

Intro section dengan title, subtitle, quick stats, & CTA buttons.

**Structure:**
```blade
<section class="services-hero">
  <!-- HERO TEXT -->
  <div class="col-12 col-lg-6">
    <!-- Badge + Title + Subtitle + Stats + Actions -->
  </div>
  
  <!-- HERO VISUAL -->
  <div class="col-12 col-lg-6">
    <!-- Image dengan background decoration -->
  </div>
</section>
```

**Key Elements:**

| Element | Purpose |
|---------|---------|
| Badge | "Layanan Kami" label dengan icon |
| Title | Main headline "Solusi Konstruksi Terlengkap & Terpercaya" |
| Subtitle | Deskripsi value proposition |
| Quick Stats | 3 statistik penting (500+ projects, 15+ services, 98% satisfaction) |
| CTA Buttons | "Konsultasi Gratis" (primary) & "Lihat Portfolio" (outline) |
| Hero Image | Visual representation dengan background decoration |

**CSS Classes:**
- `.services-hero` — Main container
- `.services-hero-badge` — Label badge
- `.services-hero-title` — Main heading
- `.services-hero-highlight` — Highlight text dalam title
- `.services-hero-quick-stats` — Stats container (3-column grid)
- `.services-hero-actions` — Button container
- `.services-hero-visual` — Image wrapper
- `.services-hero-image-wrapper` — Image dengan background layer

**AOS Animations:**
- Text & badge: `fade-up` dengan progressive delays (0ms → 300ms)
- Image: `fade-in-left` (200ms delay, 800ms duration)

**Responsive Behavior:**
- Desktop: 2-column layout (6 col each)
- Tablet: Stack vertically
- Mobile: Full width, centered

---

### 3️⃣ MAIN SERVICES SECTION — Service Cards Grid

Grid dari 6 service cards dengan icon & feature lists.

**Services Offered:**

| # | Service | Icon | Features |
|----|---------|------|----------|
| 1 | **Konstruksi Gedung** | `fa-building` | Perkantoran, Pabrik, Bertingkat, Desain Modern |
| 2 | **Infrastruktur** | `fa-road` | Jalan, Drainase, Utilitas, Infrastruktur Hijau |
| 3 | **Renovasi & Perawatan** | `fa-hammer` | Renovasi Struktur, Perkuatan, Pemeliharaan |
| 4 | **Quality Assurance** | `fa-check-double` | Inspeksi, Pengujian Material, Audit Keselamatan |
| 5 | **Maintenance & Support** | `fa-tools` | Pemeliharaan Rutin, Perbaikan, Dukungan 24/7 |
| 6 | **Supply & Management** | `fa-box` | Manajemen Material, Logistik, Koordinasi Supplier |

**Card Structure:**
```blade
<div class="services-card">
  <!-- Top accent bar -->
  <div class="services-card-top-accent"></div>
  
  <!-- Icon -->
  <div class="services-card-icon-wrapper">
    <i class="fas fa-[icon] services-card-icon"></i>
  </div>
  
  <!-- Title & Description -->
  <h3 class="services-card-title">Service Name</h3>
  <p class="services-card-text">Description...</p>
  
  <!-- Feature List -->
  <ul class="services-card-features">
    <li><span class="services-feature-check">✓</span> Feature 1</li>
    ...
  </ul>
</div>
```

**Card Design:**
- **Top Accent Bar:** Colored bar at top untuk visual hierarchy
- **Icon Wrapper:** Background color dengan Font Awesome icon
- **Title:** Bold, section-compliant typography
- **Text:** Description dengan proper spacing
- **Feature List:** 4-item list dengan checkmark icons

**Grid Layout:**
- Desktop: 3 columns (lg breakpoint)
- Tablet: 2 columns (md breakpoint)
- Mobile: 1 column (12 cols full width)
- Gap: 4 units (1rem)

**AOS Animations:**
- Staggered `fade-up` dengan delays: 100ms, 200ms, 300ms (first 3)
- Second row dengan 100ms, 200ms, 300ms lagi untuk visual rhythm

**CSS Classes:**
- `.services-card` — Card container
- `.services-card-top-accent` — Top colored bar
- `.services-card-icon-wrapper` — Icon background container
- `.services-card-icon` — Font Awesome icon
- `.services-card-title` — Service name heading
- `.services-card-text` — Description paragraph
- `.services-card-features` — Feature list
- `.services-feature-check` — Checkmark span

---

### 4️⃣ WHY CHOOSE US SECTION — Competitive Advantages

Showcase 4 key differentiators dengan icons & descriptions.

**Advantages:**

| Icon | Title | Description |
|------|-------|-------------|
| 🏆 `fa-award` | **Berpengalaman** | 10+ tahun mengerjakan berbagai tipe proyek |
| ⚙️ `fa-cogs` | **Komitmen Kualitas** | Standar tinggi dengan inspeksi & kontrol detail |
| 🛡️ `fa-shield-alt` | **Terpercaya** | Komitmen pada kualitas, keselamatan, kepuasan klien |
| 🎧 `fa-headset` | **Responsif** | Dukungan penuh dari perencanaan hingga penyelesaian |

**Card Structure:**
```blade
<div class="services-why-card">
  <div class="services-why-icon services-why-icon-[1-4]">
    <i class="fas fa-[icon]"></i>
  </div>
  <h3 class="services-why-title">Title</h3>
  <p class="services-why-text">Description</p>
</div>
```

**Grid Layout:**
- Desktop: 4 columns (lg breakpoint)
- Tablet: 2 columns (md breakpoint)
- Mobile: 1 column
- Gap: 4 units (1rem)

**AOS Animations:**
- `zoom-in` dengan progressive delays: 100ms, 150ms, 200ms, 250ms
- Duration: 700ms untuk smooth zoom effect

**CSS Classes:**
- `.services-why` — Section container
- `.services-why-bg-accent` — Background decoration
- `.services-why-card` — Card component
- `.services-why-icon` — Icon wrapper (`.services-why-icon-1` → `.services-why-icon-4` untuk color variations)
- `.services-why-title` — Title heading
- `.services-why-text` — Description text

---

### 5️⃣ PROCESS SECTION — Workflow Methodology

5-step process timeline dengan numbered steps.

**Steps:**

| # | Step | Description |
|---|------|-------------|
| 1 | **Konsultasi & Requirement** | Memahami kebutuhan spesifik klien & parameter teknis |
| 2 | **Desain & Perencanaan** | Membuat desain detail, perhitungan struktur, RKS |
| 3 | **Persiapan & Mobilisasi** | Menyiapkan lokasi, material, equipment, SDM |
| 4 | **Eksekusi & Monitoring** | Melaksanakan pekerjaan dengan QC ketat & monitoring real-time |
| 5 | **Handover & Support** | Serah terima, dokumentasi, training, garansi purna jual |

**Timeline Structure:**
```blade
<ol class="services-process-timeline">
  <li class="services-process-item">
    <div class="services-process-number">1</div>
    <div class="services-process-content">
      <h4 class="services-process-title">Step Title</h4>
      <p class="services-process-desc">Step description...</p>
    </div>
  </li>
  ...
</ol>
```

**Design:**
- Ordered list (`<ol>`) untuk semantic HTML
- Numbered circles (1-5) dengan CSS counters or manual numbers
- Vertical timeline dengan connecting lines
- Progressive staggered animations

**AOS Animations:**
- `fade-up` dengan progressive delays: 100ms, 150ms, 200ms, 250ms, 300ms
- Duration: 700ms

**CSS Classes:**
- `.services-process` — Section container
- `.services-process-timeline` — Ordered list wrapper
- `.services-process-item` — Timeline item
- `.services-process-number` — Numbered circle
- `.services-process-content` — Text content container
- `.services-process-title` — Step title
- `.services-process-desc` — Step description

---

### 6️⃣ CTA SECTION — Call-to-Action

Final conversion section dengan headline, subtitle, & action buttons.

**Structure:**
```blade
<section class="services-cta">
  <div class="services-cta-decoration ..."></div>
  
  <div class="services-cta-content">
    <h2 class="services-cta-title">Siap Mewujudkan Proyek Anda?</h2>
    <p class="services-cta-subtitle">Hubungi kami hari ini...</p>
    <div class="services-cta-actions">
      <a wire:navigate href="/kontak" class="services-btn services-btn-primary-light">
        Hubungi Kami Sekarang
      </a>
      <a wire:navigate href="/" class="services-btn services-btn-outline-light">
        Kembali ke Home
      </a>
    </div>
  </div>
</section>
```

**Design Elements:**
- Background color dengan contrasting theme
- Decorative elements (top & bottom)
- Large heading untuk visual impact
- Supporting subtitle
- 2 CTA buttons (primary & secondary)

**AOS Animations:**
- `zoom-in` (700ms duration) untuk content

**CSS Classes:**
- `.services-cta` — Section container
- `.services-cta-bg-accent` — Background decoration
- `.services-cta-decoration` — Top/bottom decorations
- `.services-cta-content` — Content wrapper
- `.services-cta-title` — Main headline
- `.services-cta-subtitle` — Supporting text
- `.services-cta-actions` — Button container

---

## 🎨 CSS ARCHITECTURE & STYLING

Services Page menggunakan **scoped CSS classes** dengan prefix `services-` untuk semantic organization.

### Color System

**Primary Colors:**
```css
--primary-color: #1F2937;        /* Dark blue-gray */
--primary-light: #374151;        /* Lighter shade */
--primary-lighter: #D1D5DB;      /* Very light gray */

--accent-color: #3B82F6;         /* Bright blue */
--accent-light: #93C5FD;         /* Light blue */

--success-color: #10B981;        /* Green for checkmarks */
--warning-color: #F59E0B;        /* Amber for attention */
--danger-color: #EF4444;         /* Red for errors */
```

**Text Colors:**
```css
--text-primary: #111827;         /* Darkest - main text */
--text-secondary: #6B7280;       /* Gray - secondary text */
--text-light: #F3F4F6;           /* Almost white - light backgrounds */
```

**Dark Mode Overrides:**
```css
@media (prefers-color-scheme: dark) {
  --text-primary: #F3F4F6;
  --text-secondary: #D1D5DB;
  --primary-color: #E5E7EB;
}
```

### Responsive Breakpoints

```css
/* Mobile-first approach */
/* xs (0px) - default */
/* sm (640px) */
/* md (768px) */
/* lg (1024px) */
/* xl (1280px) */
/* 2xl (1536px) */
```

### CSS Variables Usage

Services Page heavily menggunakan CSS variables untuk maintainability:

```css
:root {
  /* Spacing system (8px base unit) */
  --spacing-1: 0.5rem;   /* 8px */
  --spacing-2: 1rem;     /* 16px */
  --spacing-3: 1.5rem;   /* 24px */
  --spacing-4: 2rem;     /* 32px */
  --spacing-5: 3rem;     /* 48px */

  /* Typography */
  --font-sora: 'Sora', sans-serif;
  --font-inter: 'Inter', sans-serif;
  --font-fira: 'Fira Code', monospace;

  /* Shadows */
  --shadow-sm: 0 1px 2px rgba(0, 0, 0, 0.05);
  --shadow-md: 0 4px 6px rgba(0, 0, 0, 0.1);
  --shadow-lg: 0 10px 15px rgba(0, 0, 0, 0.1);

  /* Border radius */
  --radius-sm: 0.375rem;   /* 6px */
  --radius-md: 0.5rem;     /* 8px */
  --radius-lg: 0.75rem;    /* 12px */

  /* Transitions */
  --transition-fast: 150ms ease-in-out;
  --transition-normal: 300ms ease-in-out;
  --transition-slow: 500ms ease-in-out;
}
```

### Key CSS Features

**Service Cards:**
- Flex container dengan horizontal alignment
- Top accent bar (3-4px height) dengan primary color
- Icon wrapper dengan background gradient
- Feature list dengan custom checkmark styling
- Hover effect: `transform: translateY(-4px)` + shadow increase
- Transition: `--transition-normal`

**Why Choose Cards:**
- Centered layout dengan icon on top
- Colored icons (4 different colors: `services-why-icon-1` → `services-why-icon-4`)
- Responsive grid dengan proper gap spacing
- Zoom hover effect on `.services-why-card:hover`

**Process Timeline:**
- Vertical timeline dengan connected lines (CSS borders or pseudo-elements)
- Numbered circles (40px × 40px) dengan centered numbers
- Content alignment next to circle (flexbox)
- Progressive line drawing effect on animation

**CTA Section:**
- Full-width background dengan primary accent color
- Centered content alignment
- Large typography untuk visibility
- Decorative elements (top/bottom waves or gradients)
- Button spacing & alignment untuk responsive

### CSS Organization

```
services-page.css (organized by section):
├── Root Variables & Resets
├── Section: Breadcrumb
├── Section: Hero
├── Section: Main Services Cards
├── Section: Why Choose Us
├── Section: Process Timeline
├── Section: CTA
├── Button System
├── Responsive Media Queries
└── Dark Mode Support
```

---

## 🎬 JAVASCRIPT FUNCTIONALITY

Services Page menggunakan minimal JavaScript untuk behavior yang tidak bisa dilakukan dengan CSS/Blade.

### Core Features

**1. AOS (Animate On Scroll) Integration**
- Auto-initialized via Livewire v3 Alpine integration
- No manual Alpine.start() needed
- All animations handled via `data-aos` attributes di Blade

**2. Theme System Integration**
- Dark/light mode toggle detection
- CSS variables update on theme change
- Smooth transitions between themes

**3. Navigation Behavior**
- `wire:navigate` buttons untuk SPA behavior
- No page reloads, smooth component transitions
- Active state tracking (handled by Livewire)

**4. Smooth Scroll Behavior**
- Optional smooth scrolling on button clicks
- Handled via CSS `scroll-behavior: smooth`

### JavaScript File Structure

```javascript
// resources/js/pages/services-page.js

// 1. Theme listener (if needed for dynamic updates)
document.addEventListener('theme-changed', (e) => {
  // Handle theme updates
});

// 2. Custom animations (if needed beyond AOS)
const serviceCards = document.querySelectorAll('.services-card');
serviceCards.forEach((card, index) => {
  // Custom behavior if needed
});

// 3. Button click handlers
document.querySelectorAll('[data-action="scroll-to"]').forEach(btn => {
  btn.addEventListener('click', (e) => {
    // Handle smooth scroll
  });
});

// 4. Intersection Observer for lazy loading (if needed)
const observer = new IntersectionObserver((entries) => {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      // Trigger animation or load content
    }
  });
});
```

### Integration Points

**With Livewire:**
- Page component: `ServicesPage.php`
- Layout: `layouts.app` (default app layout)
- Navigation: `WithNavigation` trait untuk navbar integration

**With Alpine.js:**
- Auto-initialized via Livewire
- No manual initialization needed
- Component state managed by Livewire

---

## 🎯 ICON SYSTEM COMPLIANCE

Services Page menggunakan **Font Awesome 6** icons sesuai icon system guidelines.

### Icon Usage

**Service Cards (6 icons):**
```
fa-building         → Konstruksi Gedung
fa-road             → Infrastruktur
fa-hammer           → Renovasi & Perawatan
fa-check-double     → Quality Assurance
fa-tools            → Maintenance & Support
fa-box              → Supply & Management
```

**Why Choose Section (4 icons):**
```
fa-award            → Berpengalaman (Experience)
fa-cogs             → Komitmen Kualitas (Quality Commitment)
fa-shield-alt       → Terpercaya (Trustworthy)
fa-headset          → Responsif (Responsive)
```

**Process Timeline (optional numbered display):**
- Manual numbers (1-5) dalam circles
- Or use Font Awesome: `fa-[number]` jika tersedia

**CTA Section (arrow icon dalam button):**
```svg
<svg>
  <path d="M5 12h14M12 5l7 7-7 7"></path>
</svg>
```

**Best Practices:**
- ✅ Semantic icons yang match service meaning
- ✅ Consistent icon sizing (24px-32px)
- ✅ Proper ARIA labels untuk accessibility
- ✅ Color coordination dengan design system

---

## 📝 TYPOGRAPHY SYSTEM COMPLIANCE

Services Page mengikuti typography guidelines dari `09-TYPOGRAPHY-SYSTEM.md`.

### Font Stack

```css
/* Headings */
h1, h2, h3 {
  font-family: 'Sora', sans-serif;
  font-weight: 700;
  letter-spacing: -0.02em;
}

/* Body text */
p, span {
  font-family: 'Inter', sans-serif;
  font-weight: 400;
  line-height: 1.6;
}

/* Code/Monospace */
code, pre {
  font-family: 'Fira Code', monospace;
  font-weight: 400;
}
```

### Heading Hierarchy

| Element | Font-size | Font-weight | Line-height | Usage |
|---------|-----------|-------------|------------|-------|
| `h1` (Hero title) | 48px / 3rem | 700 | 1.2 | Main page headline |
| `h2` (Section title) | 36px / 2.25rem | 700 | 1.3 | Section headers |
| `h3` (Card title) | 24px / 1.5rem | 700 | 1.4 | Card & subsection titles |
| `h4` (Process step) | 20px / 1.25rem | 600 | 1.4 | Timeline step titles |

### Body Text Sizing

| Type | Font-size | Font-weight | Line-height |
|------|-----------|-------------|------------|
| Large body | 18px / 1.125rem | 400 | 1.6 |
| Regular body | 16px / 1rem | 400 | 1.6 |
| Small body | 14px / 0.875rem | 400 | 1.5 |

### Typography Features

- **Letter-spacing:** -0.02em untuk headings (modern, tight look)
- **Line-height:** 1.6 untuk body (readable, comfortable)
- **Font-weight:** 700 headings, 600 subheadings, 400 body
- **Dark mode:** Color inversion via `prefers-color-scheme`

---

## 🎨 DESIGN OPTIMIZATION — "Kecil, Slim, Modern"

Services Page menerapkan design optimization principles dari `10-DESIGN-OPTIMIZATION.md`.

### Spacing Optimization

**Consistent spacing units (8px base):**
- Gap between elements: 1-4 rem (8-32px)
- Card padding: 1.5-2rem (24-32px)
- Section padding: 3-5rem (48-80px vertical)
- Container max-width: 1140px

**Visual Examples:**
```css
/* Card spacing */
.services-card {
  padding: 1.5rem;          /* 24px */
  gap: 1rem;                /* 16px between elements */
  border-radius: 0.75rem;   /* 12px */
}

/* Section spacing */
.services-main {
  padding: 4rem 1rem;       /* Top/bottom: 64px, Sides: 16px */
}
```

### Typography Refinement

- **Small, clean fonts:** Sora (headings), Inter (body)
- **Reduced font sizes:** Minimal hierarchy jumps
- **Tight line-height:** Modern, condensed look
- **Letter-spacing adjustments:** Negative for headings, normal for body

### Navbar Compact Design

- Reduced padding (12-16px)
- Smaller font sizes (14-16px)
- Minimal whitespace
- SVG icons (Font Awesome) untuk clean appearance

### Font Consistency Verification

✅ **Sora:** All headings (h1-h4)  
✅ **Inter:** All body text, labels, descriptions  
✅ **Fira Code:** Code blocks (if any)  
✅ **Fallbacks:** sans-serif for Sora/Inter, monospace for Fira Code  

### Color & Contrast

- Text contrast ratio ≥ 4.5:1 untuk WCAG AA compliance
- Dark mode support dengan color-scheme property
- Primary accent color untuk call-to-action
- Secondary colors untuk feature differentiation

### Layout Compactness

- Remove unnecessary margins/padding
- Minimize whitespace in card layouts
- Use flexbox gaps instead of margin hacks
- Responsive breakpoints untuk stack on mobile

---

## 🎬 AOS ANIMATIONS INTEGRATION

Services Page extensively menggunakan AOS (Animate On Scroll) untuk smooth, engaging animations.

### Animation Strategy

**Fade & Directional Animations:**
```html
<!-- Fade in (neutral) -->
<div data-aos="fade-in" data-aos-duration="500"></div>

<!-- Fade up (from bottom) -->
<div data-aos="fade-up" data-aos-duration="700"></div>

<!-- Fade in from left (parallax effect) -->
<div data-aos="fade-in-left" data-aos-duration="800"></div>

<!-- Zoom in (scale up) -->
<div data-aos="zoom-in" data-aos-duration="700"></div>
```

### Staggered Animation Timing

**Hero Section:**
```
Badge:        fade-up    delay=0ms    duration=600ms
Title:        fade-up    delay=100ms  duration=700ms
Subtitle:     fade-up    delay=200ms  duration=700ms
Stats:        fade-up    delay=250ms  duration=700ms
Buttons:      fade-up    delay=300ms  duration=700ms
Image:        fade-in-left delay=200ms duration=800ms
```

**Service Cards:**
```
Cards 1-3:    fade-up    delay=100/200/300ms  duration=700ms
Cards 4-6:    fade-up    delay=100/200/300ms  duration=700ms (staggered again)
```

**Why Choose Cards:**
```
Cards 1-4:    zoom-in    delay=100/150/200/250ms  duration=700ms
```

**Process Timeline:**
```
Steps 1-5:    fade-up    delay=100/150/200/250/300ms  duration=700ms
```

**CTA Section:**
```
Content:      zoom-in    delay=0ms    duration=700ms
```

### AOS Configuration

```javascript
// Livewire v3 auto-initializes AOS
// No manual configuration needed if using default settings

// Or custom AOS init (if needed):
AOS.init({
  duration: 700,           // Default animation duration
  easing: 'ease-in-out',   // Easing function
  delay: 0,                // Default delay (overridden per element)
  offset: 120,             // Trigger point (120px from bottom)
  once: false,             // Animate every time element appears
});
```

### Accessibility Support

```css
/* Respect user's reduced motion preference */
@media (prefers-reduced-motion: reduce) {
  [data-aos] {
    animation-duration: 1ms !important;
    animation-delay: 0ms !important;
  }
}
```

---

## 📊 RESPONSIVE DESIGN & BREAKPOINTS

Services Page fully responsive dengan mobile-first approach.

### Breakpoint Strategy

| Breakpoint | Width | Classes | Usage |
|-----------|-------|---------|-------|
| **xs** | 0px - 639px | `col-12` | Mobile phones (default) |
| **sm** | 640px - 767px | `col-sm-*` | Large phones |
| **md** | 768px - 1023px | `col-md-6` | Tablets (2 columns) |
| **lg** | 1024px - 1279px | `col-lg-4` | Desktop (3 columns) |
| **xl** | 1280px+ | (default flex) | Wide desktop |

### Responsive Layout Examples

**Hero Section:**
```
Mobile:   col-12 (full width, stacked)
Tablet:   col-12 col-lg-6 (2 columns at lg)
Desktop:  col-12 col-lg-6 (2 columns side by side)
```

**Service Cards Grid:**
```
Mobile:   col-12 (1 column, full width)
Tablet:   col-md-6 (2 columns)
Desktop:  col-lg-4 (3 columns)
Gap:      g-4 (1rem = 16px)
```

**Why Choose Cards:**
```
Mobile:   col-12 (1 column)
Tablet:   col-md-6 (2 columns)
Desktop:  col-lg-3 (4 columns)
```

### Mobile-First CSS

```css
/* Mobile (default) */
.services-card {
  width: 100%;
  font-size: 16px;
  padding: 1rem;
}

/* Tablet and up */
@media (min-width: 768px) {
  .services-card {
    padding: 1.5rem;
  }
}

/* Desktop and up */
@media (min-width: 1024px) {
  .services-card {
    padding: 2rem;
  }
}
```

### Touch-Friendly Design

- Minimum touch target: 44×44px untuk buttons & links
- Adequate spacing antara interactive elements
- Hover states untuk desktop, tap states untuk mobile
- `touch-action: manipulation` untuk better performance

---

## ⚡ PERFORMANCE OPTIMIZATION

Services Page optimized untuk fast loading & smooth interactions.

### Image Optimization

```blade
<img src="/images/home/hero-project.jpg"
     alt="Descriptive text"
     class="services-hero-image"
     loading="eager">  <!-- Change to "lazy" jika di bawah fold -->
```

**Best Practices:**
- ✅ Descriptive alt text untuk SEO & accessibility
- ✅ `loading="lazy"` untuk above-fold images → above-fold
- ✅ WebP format dengan JPEG fallback (if using picture element)
- ✅ Responsive srcset untuk different screen sizes
- ✅ Image compression via build process

### CSS Performance

**Scoped CSS Classes:**
- Semua classes diprefix dengan `services-` untuk CSS scoping
- Compiled to single `services-page.css` file
- No global CSS pollution
- Efficient cascade & specificity

**CSS-in-JS Avoidance:**
- ❌ Tidak ada inline `<style>` tags
- ❌ Tidak ada `style={}` attributes di HTML
- ✅ All styling di dedicated CSS file

### JavaScript Minification

- Livewire components compiled & minified
- Alpine.js auto-loaded dari CDN or bundled
- No verbose logging in production
- Event delegation untuk minimal listener count

### Asset Loading

```blade
<!-- Vite handles bundling -->
@vite(['resources/css/pages/services-page.css', 'resources/js/pages/services-page.js'])
```

### Lazy Loading Strategy

- Service cards: Can use `loading="lazy"` untuk images
- AOS animations: Trigger when element enters viewport
- Livewire: SPA navigation preloads next component

---

## ♿ ACCESSIBILITY FEATURES

Services Page fully accessible untuk semua users.

### Semantic HTML

```blade
<!-- Breadcrumb -->
<nav aria-label="Navigasi breadcrumb">
  <ol class="breadcrumb-list">
    <li>...</li>
  </ol>
</nav>

<!-- Service Cards -->
<section class="services-main" aria-labelledby="services-title">
  <h2 id="services-title">Layanan Utama</h2>
  ...
</section>

<!-- Process Timeline -->
<ol class="services-process-timeline">
  <li>...</li>
</ol>
```

### ARIA Labels & Descriptions

```blade
<!-- CTA Button -->
<a aria-label="Hubungi kami untuk konsultasi gratis"
   wire:navigate href="/kontak">
  Konsultasi Gratis
</a>

<!-- Icon with context -->
<span aria-label="4 layanan unggulan">
  <i class="fas fa-check"></i>
</span>
```

### Color Contrast

- Text: ≥4.5:1 ratio untuk normal text (WCAG AA)
- Large text: ≥3:1 ratio untuk 18px+ (WCAG AA)
- Interactive elements: Sufficient contrast untuk visibility

### Keyboard Navigation

- ✅ All links & buttons focusable dengan tab
- ✅ Visible focus indicator (outline or background)
- ✅ Logical tab order (top to bottom, left to right)
- ✅ No keyboard traps

### Screen Reader Support

- ✅ Descriptive link text ("Hubungi Kami" bukan "Klik Di Sini")
- ✅ Form labels associated dengan inputs
- ✅ Images dengan descriptive alt text
- ✅ Structural markup (headings, lists, nav)

### Motion & Animation

```css
/* Respect user preferences */
@media (prefers-reduced-motion: reduce) {
  [data-aos],
  .services-card,
  [class*="transition"] {
    animation: none !important;
    transition: none !important;
  }
}
```

---

## ✅ TESTING CHECKLIST

Sebelum deploy ke production, verify semua items berikut:

### Functional Testing

- [ ] Breadcrumb navigation links work (wire:navigate)
- [ ] CTA buttons navigate ke halaman correct
- [ ] All external links open di tab baru (`target="_blank"`)
- [ ] Service cards responsive di mobile/tablet/desktop
- [ ] Animations play smoothly tanpa lag
- [ ] Dark/light mode toggle works correctly

### Visual Testing

- [ ] Layout matches design mockup
- [ ] Colors correct di light & dark mode
- [ ] Typography consistent (Sora, Inter, sizes)
- [ ] Spacing aligned dengan 8px grid
- [ ] Icons load correctly (Font Awesome)
- [ ] No layout shift during AOS animations

### Performance Testing

- [ ] Page load time < 3 seconds
- [ ] Lighthouse score ≥ 90 (Performance)
- [ ] No CLS (Cumulative Layout Shift) issues
- [ ] Images optimized (< 100KB per image)
- [ ] No unused CSS/JS in build

### Accessibility Testing

- [ ] WAVE or Axe audit passes
- [ ] Keyboard navigation works (Tab through all elements)
- [ ] Screen reader friendly (use NVDA or JAWS)
- [ ] Color contrast ≥4.5:1 for all text
- [ ] No flashing animations (> 3 flashes per second)
- [ ] Focus indicators visible & clear

### Browser Testing

- [ ] Chrome/Chromium (latest)
- [ ] Firefox (latest)
- [ ] Safari (latest)
- [ ] Edge (latest)
- [ ] Mobile Safari (iOS)
- [ ] Chrome Mobile (Android)

### Responsive Testing

- [ ] iPhone SE (375px)
- [ ] iPhone 12 (390px)
- [ ] iPad (768px)
- [ ] iPad Pro (1024px)
- [ ] Desktop 1920px
- [ ] Desktop 2560px (ultra-wide)

### Cross-Browser Feature Support

- [ ] Flexbox layout working
- [ ] CSS Grid layout working
- [ ] CSS custom properties (variables) supported
- [ ] SVG icons rendering correctly
- [ ] Font loading (Sora, Inter, Fira Code)
- [ ] Smooth scroll behavior

### Livewire & SPA Testing

- [ ] wire:navigate buttons load component
- [ ] No page reload on navigation
- [ ] Component state preserved
- [ ] Navbar stays consistent
- [ ] Scroll position correct on navigation
- [ ] Navigation history works (back button)

### Content Testing

- [ ] All text properly localized (Indonesian)
- [ ] No typos atau grammatical errors
- [ ] Numbers & statistics accurate
- [ ] Links pointing ke correct pages
- [ ] Email/phone links formatted correctly
- [ ] Images have proper alt text

---

## 🐛 COMMON ISSUES & FIXES

### Issue: AOS animations not triggering

**Cause:** Livewire component not properly initialized  
**Fix:** Ensure `WithNavigation` trait included in ServicesPage component
```php
use WithNavigation;
```

### Issue: Dark mode colors incorrect

**Cause:** CSS variables not overridden in media query  
**Fix:** Add dark mode overrides di services-page.css
```css
@media (prefers-color-scheme: dark) {
  :root {
    --text-primary: #F3F4F6;
    --bg-primary: #111827;
  }
}
```

### Issue: Service cards overlapping on mobile

**Cause:** Incorrect grid layout classnames  
**Fix:** Verify Bootstrap column classes:
```blade
<div class="col-12 col-md-6 col-lg-4">
```

### Issue: Buttons not navigating with wire:navigate

**Cause:** Missing `wire:navigate` attribute  
**Fix:** Add to all internal navigation links
```blade
<a wire:navigate href="/kontak">Link</a>
```

### Issue: Icons not displaying

**Cause:** Font Awesome CDN not loaded or incorrect icon name  
**Fix:** Verify Font Awesome v6 loaded di layout, use correct icon name
```blade
<i class="fas fa-building"></i>  <!-- Correct -->
```

### Issue: Responsive layout breaks

**Cause:** Extra CSS overriding responsive classes  
**Fix:** Check for hardcoded widths or fixed dimensions conflicting dengan flex/grid

### Issue: Animations laggy on mobile

**Cause:** Too many simultaneous animations or heavy JS  
**Fix:** 
- Reduce AOS duration/delay on mobile
- Use `will-change` CSS property sparingly
- Lazy load images

---

## 📚 RELATED DOCUMENTATION

- [01-CORE-ARCHITECTURE.md](01-CORE-ARCHITECTURE.md) — Fundamental principles
- [02-SPA-NAVIGATION.md](02-SPA-NAVIGATION.md) — Livewire & navigation
- [07-ICON-SYSTEM.md](07-ICON-SYSTEM.md) — Font Awesome icons
- [09-TYPOGRAPHY-SYSTEM.md](09-TYPOGRAPHY-SYSTEM.md) — Typography stack
- [10-DESIGN-OPTIMIZATION.md](10-DESIGN-OPTIMIZATION.md) — Design patterns
- [11-AOS-ANIMATIONS.md](11-AOS-ANIMATIONS.md) — Animation framework
- [12-ABOUT-PAGE.md](12-ABOUT-PAGE.md) — Similar page architecture

---

## 📝 METADATA

**Page Component:** `app/Livewire/ServicesPage.php`  
**View Template:** `resources/views/livewire/services-page.blade.php` (428 lines)  
**Stylesheet:** `resources/css/pages/services-page.css`  
**JavaScript:** `resources/js/pages/services-page.js`  
**Total Sections:** 6 major sections + breadcrumb  
**Service Cards:** 6 comprehensive services  
**Features:** 30+ Font Awesome icons, AOS animations, responsive grid, dark mode support  
**Last Updated:** January 2, 2026  
**Maintainer:** Frontend Team & GitHub Copilot

---

**INGAT:**
- ✅ Blade = MARKUP ONLY
- ✅ CSS = STYLING ONLY
- ✅ JS = BEHAVIOR ONLY
- ✅ Semua class di-scope dengan `services-` prefix
- ✅ Gunakan `wire:navigate` untuk SPA navigation
- ✅ Ikuti typography & design optimization guidelines
- ✅ Test di multiple devices & browsers sebelum merge
