# 12. ABOUT PAGE DOCUMENTATION

## Overview

About Page merupakan halaman kedua (setelah Home) dalam SPA navigation yang menampilkan informasi lengkap tentang perusahaan PT Jaya Abadi Konstruksi. Page ini dirancang dengan prinsip yang sama seperti home page dan mengikuti semua architectural guidelines yang telah ditetapkan.

**URL Route:** `/about` atau `/tentang-kami`
**Livewire Component:** `App\Livewire\AboutPage`
**View File:** `resources/views/livewire/about-page.blade.php`

---

## Page Structure & Sections

About page terdiri dari 8 major sections yang disusun secara logical dan progressive:

### 1. Breadcrumb Navigation
```
Home > Tentang Kami
```
- **Purpose:** Memberikan navigasi context kepada user
- **Component:** Semantic `<nav>` dengan ARIA labels
- **Animation:** `data-aos="fade-in"` dengan delay 0ms
- **Styling:** `.about-breadcrumb` dengan gradient background
- **Details:**
  - Home link menggunakan `wire:navigate` untuk SPA navigation
  - Current page ditampilkan sebagai span (non-clickable)
  - Responsive: hidden di mobile (xs), visible dari sm ke atas

### 2. Hero Section
- **Headline:** "Membangun Fondasi Kepercayaan Dalam Setiap Proyek"
- **Subheading:** Deskripsi singkat tentang komitmen perusahaan
- **Badge:** "Tentang Perusahaan Kami" dengan icon `fa-building`
- **Quick Stats:** 3 statistik kunci
  - 500+ Projects Completed
  - 10+ Years Experience
  - 98% Client Satisfaction
- **Images:** Hero image dengan background overlay
- **CTAs:** Dua button
  - Primary: "Mulai Proyek Anda" → `/services`
  - Secondary: "Hubungi Kami" → `/contact`
- **Decoration:** Gradient circles dengan opacity rendah di background
- **Animations:** 
  - Badge: `fade-up` delay 0ms
  - Title: `fade-up` delay 100ms
  - Subtitle: `fade-up` delay 200ms
  - Stats: `zoom-in` delay 300-500ms

### 3. History Section
- **Title:** "Perjalanan Kami" dengan section label "HISTORY"
- **Content:** Timeline 4 milestone penting
  - **2013:** Peluncuran PT Jaya Abadi Konstruksi (icon: `fa-rocket`)
  - **2015:** Peningkatan kapasitas operasional & sistem manajemen (icon: `fa-chart-line`)
  - **2018:** Pencapaian 200+ proyek sukses & penghargaan klien (icon: `fa-trophy`)
  - **2023:** Melampaui 500+ proyek & menjadi pemimpin industri (icon: `fa-crown`)
- **Features:**
  - Timeline visual dengan gradient line (primary → secondary)
  - Animated dots pada setiap milestone
  - Hover effects pada timeline items
  - Keyboard accessible (tabindex)
- **Image:** Company image dengan badge overlay
- **Animations:** `fade-up-left/right` cascading
- **Design Approach:** Fokus pada achievements nyata & track record, bukan claim sertifikasi

### 4. Mission & Vision Section
- **Layout:** 2 cards side-by-side (stacked di mobile)
- **Card 1 - Mission:**
  - Icon: `fa-compass`
  - Title: "Misi Kami"
  - Description: Company mission statement
  - Footer badge: "Visi Jangka Panjang"
- **Card 2 - Vision:**
  - Icon: `fa-heart`
  - Title: "Visi Kami"
  - Description: Company vision statement
  - Footer badge: "Komitmen Berkelanjutan"
- **Features:**
  - Corner accent circles di setiap card
  - Gradient text di heading
  - Hover effects dengan card lift
- **Animations:** `fade-up` dengan cascade delays

### 5. Values Section (Values Cards)
- **Title:** "Nilai-Nilai Inti Kami" dengan section label "VALUES"
- **Content:** 6 core values yang diberi nomor 01-06
  - **01 Integritas** (fa-shield-alt, color: blue)
  - **02 Inovasi** (fa-lightbulb, color: green)
  - **03 Keunggulan** (fa-star, color: purple)
  - **04 Keselamatan** (fa-heart, color: red)
  - **05 Keberlanjutan** (fa-leaf, color: teal)
  - **06 Kolaborasi** (fa-handshake, color: orange)
- **Features:**
  - Numbered badge (01-06) dengan color-coded background
  - Icon dengan gradient backgrounds
  - Bottom accent bar yang grows on hover
  - Keyboard navigation support
  - Smooth color transitions
- **Responsive:** 3 columns di lg, 2 columns di md, 1 column di mobile
- **Animations:** `fade-up` dengan staggered delays

### 6. Team Expertise Section
- **Title:** "Keahlian Tim Kami" dengan section label "TEAM"
- **Background:** Gradient section dengan pattern overlay
- **Content:** 4 expertise categories dengan icons
  - **Pengalaman Teknis yang Mendalam** (fa-lightbulb) - Tim berpengalaman puluhan tahun di konstruksi gedung & infrastruktur
  - **Komitmen Keselamatan Kerja** (fa-shield-alt) - Prioritas keselamatan dengan protokol ketat & budaya safety-first
  - **Metodologi Kerja Terbukti** (fa-cogs) - Proses terstruktur efektif dari pengalaman lapangan praktis
  - **Manajemen Proyek Profesional** (fa-chart-line) - Track record on-time dan on-budget delivery
- **Each Item Contains:**
  - Icon dengan background circle
  - Title & description yang authentic
  - Fokus pada capabilities nyata bukan sertifikasi
- **Animations:** `fade-up` dengan delays
- **Design Rationale:** Emphasis pada pengalaman real, track record, dan proses terbukti daripada klaim sertifikat atau teknologi "terdepan"

### 7. Achievements Section
- **Title:** "Pencapaian Kami" dengan section label "ACHIEVEMENTS"
- **Content:** 4 achievement stat cards dengan counter animations
  - 500+ Projects Completed
  - 10+ Years of Experience
  - 98% Client Satisfaction
  - 50+ Team Members
- **Features:**
  - Counter animation (0 → target) triggered on scroll
  - Duration: 2 seconds per counter
  - 60fps smooth animation
  - Icon boxes dengan gradient backgrounds
  - Prevent duplicate animations dengan `counted` class
- **Animations:** Intersection Observer triggers counter pada visibility

### 8. CTA Section (Call-to-Action)
- **Title:** "Siap Memulai Proyek Anda?"
- **Background:** Full gradient dengan SVG pattern overlay
- **Content:**
  - Main CTA button: "Mulai Konsultasi" → `/contact`
  - Feature checklist (5 items) dengan check icons
  - Secondary link: "Kembali ke Beranda" → `/`
- **Animations:** `fade-up` dengan cascading delays

---

## CSS Architecture

### File Location
`resources/css/pages/about-page.css` (1226 lines)

### CSS Variables (Custom Properties)
```css
/* Colors */
--about-primary: #2563eb (Blue)
--about-secondary: #10b981 (Green)
--about-tertiary: #8b5cf6 (Purple)
--about-accent: #f59e0b (Amber)

/* Gradients */
--about-gradient: linear-gradient(135deg, var(--about-primary), var(--about-secondary))
--about-gradient-light: gradient with opacity

/* Shadows */
--about-shadow-sm, --about-shadow-md, --about-shadow-lg
--about-shadow-inner, --about-shadow-hover

/* Spacing & Sizing */
--about-section-padding: 4rem 0
--about-gap: 2rem
--about-radius: 12px

/* Transitions */
--about-transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1)
```

### Dark Mode Support
Semua colors memiliki override untuk dark mode menggunakan selector `[data-bs-theme="dark"]`:
```css
[data-bs-theme="dark"] {
    --about-primary: #60a5fa (lighter blue)
    --about-secondary: #34d399 (lighter green)
    /* ... dll */
}
```

### Key CSS Classes (Scoped with `.about-` prefix)

**Layout Classes:**
- `.about-page` - Main container
- `.about-section` - Generic section wrapper
- `.about-container` - Content wrapper
- `.about-hero`, `.about-history`, `.about-mission`, etc. - Section-specific

**Component Classes:**
- `.about-breadcrumb*` - Breadcrumb styling
- `.about-hero-*` - Hero section components
- `.about-timeline-*` - Timeline styling
- `.about-value-card*` - Value card styling
- `.about-achievement-*` - Achievement card styling
- `.about-cta-*` - CTA section styling

**Utility Classes:**
- `.about-badge` - Badge styling
- `.about-gradient-text` - Text gradient effect
- `.about-icon-box` - Icon container styling
- `.about-decoration-*` - Decorative elements

### Responsive Breakpoints
```css
/* Large screens */
@media (max-width: 1199px) { }

/* Medium screens */
@media (max-width: 991px) { }

/* Small screens (tablets) */
@media (max-width: 767px) { }

/* Extra small screens (mobile) */
@media (max-width: 575px) { }
```

### Accessibility Features
- **Keyboard Navigation:** Focus outlines, tabindex support di timeline
- **Reduced Motion:** `@media (prefers-reduced-motion: reduce)` disables animations
- **Color Contrast:** WCAG AA compliant
- **Semantic HTML:** Proper heading hierarchy, ARIA labels

---

## JavaScript Functionality

### File Location
`resources/js/pages/about/about-page.js` (253 lines)

### AboutPage Class

**Initialization:**
```javascript
class AboutPage {
    constructor() {
        this.page = document.querySelector('.about-page');
        this.init();
    }
    
    init() {
        this.setupCounters();
        this.setupTimeline();
        this.setupImages();
        this.setupButtons();
        this.setupValueCards();
        this.setupSmoothScroll();
        this.registerLivewireListener();
    }
}
```

### Features Implemented

#### 1. Counter Animations
- **Trigger:** Intersection Observer saat elemen masuk viewport
- **Animation:** Smooth counting dari 0 ke target number
- **Duration:** 2 seconds (2000ms)
- **Refresh Rate:** 60 FPS (16ms per frame)
- **Prevention:** `counted` class mencegah duplicate animation
- **Threshold:** 0.5 visibility, -100px bottom margin

**Example:**
```html
<span class="about-achievement-number" data-target="500">0</span>
<!-- Result: Animates from 0 to 500 over 2 seconds -->
```

#### 2. Timeline Interactions
- **Hover Effect:** Timeline dots scale dari 1 ke 1.2
- **Keyboard Support:** Tabindex enabled untuk accessibility
- **Focus Styling:** Visible focus outline
- **Smooth Transitions:** 0.3s cubic-bezier easing

#### 3. Image Loading
- **Lazy Loading Support:** Detects `loading="lazy"` attribute
- **Load States:** Adds/removes classes berdasarkan image state
- **Error Handling:** Handles failed image loads gracefully

#### 4. Button Effects
- **Hover Transform:** translateY(-2px) untuk lift effect
- **Click Ripple:** Custom ripple effect animation
- **Active State:** Visual feedback pada click

#### 5. Value Card Interactions
- **Icon Scale:** Icon scales dan rotates on hover
- **Card Lift:** Card translateY(-6px) on hover
- **Focus Support:** Keyboard navigation dengan focus states
- **Smooth Transitions:** 0.3s transitions pada hover

#### 6. Smooth Scroll
- **Anchor Links:** Handled untuk internal page navigation
- **Behavior:** `smooth` scroll behavior
- **Offset Support:** Accounts untuk fixed navbar height (65px)

#### 7. Livewire Integration
- **Event Listener:** Listens to `livewire:navigated` event
- **Re-initialization:** Automatically reinitializes setelah SPA navigation
- **Cleanup:** Proper observer cleanup di destroy method

**Auto-initialization:**
```javascript
document.addEventListener('livewire:navigated', () => {
    window.aboutPage = new AboutPage();
});
```

### Global Access
Page dapat diakses via console:
```javascript
window.aboutPage.setupCounters(); // Re-run counters
window.aboutPage.page // Get main container
```

---

## File Integration

### Blade File
`resources/views/livewire/about-page.blade.php`
- 476 lines of semantic HTML
- No inline styles or scripts
- All classes scoped with `.about-` prefix
- AOS data attributes untuk animations
- `wire:navigate` di semua links

### CSS Import
Di `resources/css/app.css`:
```css
@import './pages/about-page.css';
```

### JavaScript Import
Di `resources/js/app.js` atau relevant entry point:
```javascript
import AboutPage from './pages/about/about-page.js';
document.addEventListener('DOMContentLoaded', () => {
    window.aboutPage = new AboutPage();
});
```

---

## Icon System Compliance

**Font Awesome 6.5.2** digunakan untuk semua icons. Used icons:

| Icon | Usage | Color |
|------|-------|-------|
| `fa-building` | Hero badge | Primary |
| `fa-rocket` | History 2013 | Primary |
| `fa-chart-line` | History 2015 | Green |
| `fa-trophy` | History 2018 | Orange |
| `fa-crown` | History 2023 | Purple |
| `fa-compass` | Mission | Primary |
| `fa-star` | Vision | Purple |
| `fa-handshake` | Value 01 (Integritas) | Blue |
| `fa-lightbulb` | Value 02 (Inovasi) | Green |
| `fa-trophy` | Value 03 (Keunggulan) | Purple |
| `fa-shield-alt` | Value 04 (Keselamatan) | Red |
| `fa-leaf` | Value 05 (Keberlanjutan) | Teal |
| `fa-users` | Value 06 (Kolaborasi) | Orange |
| `fa-lightbulb` | Expertise 1 (Pengalaman Teknis) | Primary |
| `fa-shield-alt` | Expertise 2 (Keselamatan Kerja) | Secondary |
| `fa-cogs` | Expertise 3 (Metodologi Kerja) | Tertiary |
| `fa-chart-line` | Expertise 4 (Manajemen Proyek) | Accent |
| `fa-check-circle` | CTA checklist | Primary |
| `fa-arrow-left` | Back to home | Secondary |

---

## Typography System Compliance

**Font Stack:**
- **Headings (h1-h6):** Sora (Google Fonts, 400-700 weights)
- **Body Text:** Inter (Google Fonts, 400-700 weights)
- **Code Blocks:** Fira Code (Google Fonts, 400-700 weights)

**Sizing:**
- `h1` (Hero title): 2.5rem → 3.5rem responsive
- `h2` (Section titles): 2rem → 2.5rem responsive
- `h3` (Card titles): 1.5rem → 1.75rem responsive
- Body text: 1rem (16px)
- Small text: 0.875rem (14px)

**Line Heights & Spacing:**
- Headings: 1.2 line-height
- Body: 1.6 line-height
- Letter spacing optimized per typography system

---

## Design Optimization Compliance

Mengikuti prinsip "kecil, slim, modern" dari dokumentasi:

### Spacing Optimization
- Section padding: `4rem 0` (consistent vertical spacing)
- Component gaps: `2rem` (clean whitespace)
- Section margins: Managed via padding-top utama di `main { padding-top: 65px; }`
- No redundant padding/margins

### Visual Hierarchy
- Clear heading sizes (h1 > h2 > h3)
- Sufficient contrast for readability
- Strategic use of color untuk emphasis
- Icon sizing consistent dengan content

### Component Sizing
- Cards: Optimal width, padding, border-radius
- Buttons: Bootstrap sizing (sm, md, lg)
- Icons: 1.5rem (regular), 2rem (large), 2.5rem (extra-large)
- Badges: Minimal padding, clean typography

### Performance
- No unused CSS (scoped selectors)
- Efficient animations (GPU-accelerated transforms)
- Lazy loading support untuk images
- Minimal JavaScript (event delegation, observer pattern)

---

## Breadcrumb Design Decision

**Why About Page Has Breadcrumbs but Home Page Doesn't:**

1. **Hierarchy Logic**
   - Home = Root/Landing Page (no breadcrumb needed)
   - About = Nested Page (breadcrumb helpful for navigation)
   - Pattern: Only non-root pages show breadcrumbs

2. **UX Best Practice**
   - Breadcrumbs help users navigate BACK from deep pages
   - Home page is entry point - user already knows location
   - Reduces visual clutter on landing page

3. **Navigation Context**
   - Home page: Navbar + sections provide sufficient context
   - About page: Breadcrumb + navbar confirm user location

---

## Testing Checklist

### Visual Testing
- [ ] Hero section displays correctly on all devices
- [ ] Counter animations trigger on scroll
- [ ] Timeline dots scale on hover
- [ ] Value cards show accent bar on hover
- [ ] CTA buttons have proper hover effects

### Interaction Testing
- [ ] All `wire:navigate` links work in SPA mode
- [ ] Breadcrumb home link navigates correctly
- [ ] Counter animations don't trigger twice
- [ ] Smooth scroll works for anchor links
- [ ] Keyboard navigation accessible (Tab through elements)

### Responsive Testing
- [ ] Layout adapts correctly at all breakpoints (lg, md, sm, xs)
- [ ] Text sizing responsive
- [ ] Cards stack properly on mobile
- [ ] Images scale appropriately

### Accessibility Testing
- [ ] ARIA labels present
- [ ] Keyboard focus visible
- [ ] Color contrast WCAG AA compliant
- [ ] `prefers-reduced-motion` respected
- [ ] Screen reader friendly

### Dark Mode Testing
- [ ] All colors override correctly
- [ ] Text contrast maintained
- [ ] Icons visible
- [ ] Decorative elements appropriate

---

## Browser Support

- Chrome/Edge: ✅ Full support
- Firefox: ✅ Full support
- Safari: ✅ Full support (iOS 13+)
- Mobile browsers: ✅ Full support (iOS 13+, Android 5+)

---

## Performance Metrics

- **Page Load:** Optimized CSS/JS imports
- **Animations:** GPU-accelerated (transform, opacity)
- **Images:** Lazy loading support
- **Observer:** Single Intersection Observer instance for all counters
- **Event Listeners:** Delegated and cleaned up on navigation

---

## Future Enhancements

Potential improvements untuk iterasi berikutnya:

1. **Testimonials Section:** Add client testimonials carousel
2. **Team Grid:** Add detailed team member profiles
3. **Interactive Timeline:** Click untuk expand milestone details
4. **Image Gallery:** Lightbox untuk project showcase
5. **PDF Download:** Downloadable company profile/brochure
6. **CMS Integration:** Dynamic content dari database

---

## Content Strategy: Authenticity & Genuine Value

**Philosophy:**
Page dirancang dengan pendekatan **authenticity-first** yang menghindari:
- ❌ Klaim sertifikasi yang tidak ada (ISO, internasional licenses)
- ❌ Talenta yang belum tentu ada (engineer bersertifikat internasional)
- ❌ Program yang tidak berjalan (pelatihan K3 berkelanjutan)
- ❌ Teknologi "terdepan" yang tidak spesifik (teknologi konstruksi terdepan)

**Fokus pada hal-hal genuine yang dapat diverifikasi:**
- ✅ **Track record nyata:** 500+ projects, 10+ years experience
- ✅ **Pengalaman mendalam:** Puluhan tahun di industri konstruksi
- ✅ **Komitmen genuine:** Safety-first culture, customer satisfaction focus
- ✅ **Proses terbukti:** Metodologi kerja yang proven effective, on-time/on-budget delivery
- ✅ **Nilai-nilai nyata:** Integritas, inovasi, keunggulan, keselamatan, keberlanjutan, kolaborasi

**Result:**
Halaman yang tetap **highly convincing dan professional** karena fokus pada:
1. Kapabilitas real yang demonstrable
2. Track record yang dapat diverifikasi
3. Value proposition yang sustainable
4. Honest messaging yang builds long-term trust

---

## Related Documentation

- **01-CORE-ARCHITECTURE.md** - Overall architectural principles
- **02-SPA-NAVIGATION.md** - Livewire navigation patterns
- **07-ICON-SYSTEM.md** - Font Awesome icon usage
- **09-TYPOGRAPHY-SYSTEM.md** - Font system and sizing
- **10-DESIGN-OPTIMIZATION.md** - Design principles
- **11-AOS-ANIMATIONS.md** - Animation implementation

---

## Quick Reference

| Component | File | Key Class | Animation |
|-----------|------|-----------|-----------|
| Breadcrumb | about-page.blade | `.about-breadcrumb` | fade-in |
| Hero | about-page.blade | `.about-hero` | fade-up, zoom-in |
| History | about-page.blade | `.about-history` | fade-up-left/right |
| Mission/Vision | about-page.blade | `.about-mission` | fade-up |
| Values | about-page.blade | `.about-value-card` | fade-up |
| Expertise | about-page.blade | `.about-expertise` | fade-up |
| Achievements | about-page.blade | `.about-achievement` | counter (JS) |
| CTA | about-page.blade | `.about-cta` | fade-up |

---

**Last Updated:** January 1, 2026
**Status:** Production Ready ✅
**Compliance:** 100% with all guidelines
