# AOS (ANIMATE ON SCROLL) INTEGRATION

## OVERVIEW

Aplikasi menggunakan **AOS (Animate On Scroll)** untuk memberikan animasi smooth dan professional pada elemen-elemen halaman saat user scroll.

**DESIGN PRINCIPLES:**

-   Performance optimized (GPU accelerated)
-   Respects `prefers-reduced-motion` accessibility preference
-   Auto-reinitialize after Livewire navigation
-   Modern, professional animations
-   Zero configuration required

**KEUNTUNGAN:**

-   Meningkatkan visual appeal & UX
-   Smooth, engaging interactions
-   Lightweight (~50KB)
-   Mobile-friendly
-   Accessibility-first approach

---

## TECH STACK

**Animation Library:**

-   AOS (Animate On Scroll) - Latest version

**Integration:**

-   Livewire v3 (auto-refresh on SPA navigation)
-   Bootstrap 5.3+ (theme-aware)
-   Alpine.js (optional, no conflicts)

---

## ARCHITECTURE

### AOS MANAGER CLASS

**File:** `resources/js/components/aos.js`

**Tanggung Jawab:**

-   Centralized AOS management
-   Auto-initialization handling
-   Livewire event listener setup
-   Configuration management
-   Accessibility check (prefers-reduced-motion)

**Key Methods:**

```javascript
aosManager.init()           // Initialize AOS
aosManager.reinit()         // Refresh after DOM changes
aosManager.prefersReducedMotion()  // Check accessibility
aosManager.updateConfig()   // Update configuration
```

**Global Access:**

```javascript
window.aosManager           // Accessible from console
```

---

### CUSTOM ANIMATIONS CSS

**File:** `resources/css/components/aos.css`

**Fitur:**

-   Enhanced easing functions (professional cubic-bezier)
-   GPU acceleration optimizations
-   Smooth 60fps animations
-   Theme-aware styling (light/dark mode)
-   Respects `prefers-reduced-motion`

**CSS Variables:**

```css
--aos-easing-ease-in-out-cubic: cubic-bezier(0.645, 0.045, 0.355, 1);
--aos-easing-ease-out-cubic: cubic-bezier(0.215, 0.61, 0.355, 1);
```

---

## FOLDER STRUCTURE

```
resources/
├── js/
│   ├── app.js (AOS initialization)
│   ├── bootstrap.js
│   ├── components/
│   │   ├── aos.js (AOS Manager class)
│   │   ├── theme.js
│   │   └── ...
│   └── pages/
│       └── home/
│           └── home-page.js
├── css/
│   ├── app.css (imports aos.css)
│   └── components/
│       ├── aos.css (custom animations)
│       ├── navbar.css
│       └── ...
└── views/
    └── livewire/
        ├── home-page.blade.php (animations implemented)
        ├── services-page.blade.php
        └── ...
```

---

## ANIMATIONS AVAILABLE

### Standard Animations

| Animation | Effect | Use Case |
|-----------|--------|----------|
| `fade-up` | Fade in + slide up | Default entry, cards |
| `fade-down` | Fade in + slide down | Top sections |
| `fade-in-left` | Slide from right | Left-aligned content |
| `fade-in-right` | Slide from left | Right-aligned content |
| `zoom-in` | Subtle scale-in | Stats, badges |
| `zoom-in-up` | Scale + slide up | Portfolio cards |

### Timing Attributes

```blade
data-aos="fade-up"              <!-- Animation type -->
data-aos-duration="700"         <!-- Duration in ms (600, 700, 800) -->
data-aos-delay="100"            <!-- Delay in ms (0, 100, 200, 300...) -->
data-aos-offset="100"           <!-- Trigger distance from viewport -->
```

---

## IMPLEMENTATION GUIDE

### BASIC USAGE

```blade
<!-- Simple animation -->
<h2 data-aos="fade-up">Heading</h2>

<!-- With timing -->
<div data-aos="zoom-in" 
     data-aos-delay="100" 
     data-aos-duration="700">
    Content
</div>

<!-- Staggered list (sequential entry) -->
<div data-aos="fade-up" data-aos-delay="100">Item 1</div>
<div data-aos="fade-up" data-aos-delay="200">Item 2</div>
<div data-aos="fade-up" data-aos-delay="300">Item 3</div>
```

### RECOMMENDED PATTERNS

#### Pattern 1: Hero Section (Sequential)

```blade
<section class="hero">
    <!-- Badge -->
    <div data-aos="fade-up" data-aos-delay="0" data-aos-duration="600">
        <span>Badge</span>
    </div>

    <!-- Title -->
    <h1 data-aos="fade-up" data-aos-delay="100" data-aos-duration="700">
        Main Title
    </h1>

    <!-- Subtitle -->
    <p data-aos="fade-up" data-aos-delay="200" data-aos-duration="700">
        Description
    </p>

    <!-- Stats/Numbers (zoom effect) -->
    <div data-aos="zoom-in" data-aos-delay="300" data-aos-duration="600">Stat 1</div>
    <div data-aos="zoom-in" data-aos-delay="400" data-aos-duration="600">Stat 2</div>

    <!-- CTA -->
    <div data-aos="fade-up" data-aos-delay="500" data-aos-duration="700">
        <button>Action</button>
    </div>
</section>
```

#### Pattern 2: Grid Cards (Staggered)

```blade
<div class="row g-4">
    <div class="col-lg-4">
        <div data-aos="fade-up" data-aos-delay="100" data-aos-duration="700">
            Card 1
        </div>
    </div>

    <div class="col-lg-4">
        <div data-aos="fade-up" data-aos-delay="200" data-aos-duration="700">
            Card 2
        </div>
    </div>

    <div class="col-lg-4">
        <div data-aos="fade-up" data-aos-delay="300" data-aos-duration="700">
            Card 3
        </div>
    </div>
</div>
```

#### Pattern 3: Portfolio (Zoom Effect)

```blade
<div class="row g-4">
    <div class="col-lg-4">
        <article data-aos="zoom-in-up" data-aos-delay="100" data-aos-duration="700">
            Project 1
        </article>
    </div>

    <div class="col-lg-4">
        <article data-aos="zoom-in-up" data-aos-delay="200" data-aos-duration="700">
            Project 2
        </article>
    </div>

    <div class="col-lg-4">
        <article data-aos="zoom-in-up" data-aos-delay="300" data-aos-duration="700">
            Project 3
        </article>
    </div>
</div>
```

---

## JAVASCRIPT BEHAVIOR FLOW

### 1. INITIALIZATION

**File:** `resources/js/app.js`

```javascript
// Import AOS Manager
import aosManager from "./components/aos";
window.aosManager = aosManager;

// Initialize after Livewire ready
document.addEventListener('livewire:initialized', () => {
    aosManager.init();
});

// Fallback for non-Livewire pages
document.addEventListener('DOMContentLoaded', () => {
    if (!aosManager.initialized) {
        aosManager.init();
    }
});
```

**Behavior:**

-   AOS Manager di-import di app.js
-   Assigned ke window untuk global access
-   Auto-initialize saat Livewire ready
-   Fallback DOMContentLoaded untuk safety

### 2. LIVEWIRE INTEGRATION

**Automatic:**

-   AOS setup Livewire event listener di `aosManager.init()`
-   Listens to `Livewire.on('navigate')` event
-   Auto-calls `aosManager.reinit()` setelah navigation
-   AOS.refresh() dipanggil untuk elemen baru

**Benefit:**

-   Animasi auto-refresh saat halaman berubah via SPA
-   Tidak perlu manual handling
-   Seamless user experience

### 3. ACCESSIBILITY HANDLING

**Implementation:**

```javascript
if (this.prefersReducedMotion()) {
    // User prefer reduced motion
    // AOS tidak akan initialize
    // Elemen tetap visible tanpa animasi
}
```

**Check:**

-   Detects `prefers-reduced-motion: reduce` setting
-   Disables animations untuk user yang memilih
-   Elemen tetap accessible
-   No performance impact

---

## CONFIGURATION

### Default Config

```javascript
{
    duration: 800,      // Animation duration (ms)
    easing: 'ease-in-out',
    once: false,        // Re-trigger on scroll (good for UX)
    mirror: false,      // No reverse animation
    offset: 100,        // Trigger 100px before visible
    delay: 0,
}
```

### Modify Default

Edit di `resources/js/components/aos.js`:

```javascript
this.config = {
    duration: 800,      // Change default
    offset: 120,        // Change offset
    // ...
};
```

### Per-Element Override

```blade
<div data-aos="fade-up" 
     data-aos-duration="900"   <!-- Override duration -->
     data-aos-delay="150">      <!-- Override delay -->
    Content
</div>
```

---

## PERFORMANCE OPTIMIZATION

### GPU Acceleration

```css
/* From aos.css */
transform: translate3d(0, 0, 0);
backface-visibility: hidden;
perspective: 1000px;
will-change: opacity, transform;
```

**Result:**

-   Smooth 60fps animations
-   Minimal CPU usage
-   Better battery life on mobile

### Intersection Observer

-   AOS uses modern Intersection Observer API
-   Efficient scroll detection
-   No excessive event firing

### Build Optimization

-   AOS CSS included in main app.css
-   Single HTTP request
-   Cache-busted by Vite

---

## BEST PRACTICES

✅ **WAJIB:**

-   Gunakan `data-aos` attribute
-   Jangan mix dengan inline styles
-   Gunakan konsisten duration values (600, 700, 800)
-   Test pada mobile device
-   Respect accessibility preferences

❌ **DILARANG:**

-   `<style>` inline dengan animasi
-   Terlalu banyak animasi bersamaan
-   Random duration values
-   Animasi pada element hidden
-   Override AOS CSS globally

---

## IMPLEMENTATION STATUS

### ✅ COMPLETED

-   AOS package installed
-   AOSManager class created
-   Custom CSS configured
-   App.js initialized
-   Home page fully animated (25+ elements)
-   Livewire integration done
-   Accessibility support added
-   Build tested (no errors)

### 📌 READY FOR

-   Adding AOS to other pages
-   Fine-tuning animation timing
-   Testing on multiple devices

---

## USAGE EXAMPLES

### Home Page Sections

**File:** `resources/views/livewire/home-page.blade.php`

**Sections Animated:**

1. **Hero Section** - Badge, title, subtitle, stats, CTA
2. **Trusted By** - Sequential client logos
3. **About Section** - Image + content staggered
4. **Services Cards** - 3-column grid animated
5. **Projects Portfolio** - Zoom effect with stagger
6. **CTA Section** - Dramatic entrance

**Pattern:** Sequential delays (0, 100, 200, 300...)

### Adding to New Pages

1. Copy pattern dari home-page
2. Adjust delays sesuai kebutuhan
3. Test animations
4. Verify pada mobile

---

## DEBUG & TESTING

### Browser Console

```javascript
// Check if AOS loaded
console.log('AOS:', typeof window.aosManager !== 'undefined');

// View configuration
console.log(window.aosManager.config);

// Manual refresh
window.aosManager.reinit();

// Check reduced motion
console.log(window.aosManager.prefersReducedMotion());
```

### Visual Testing

```bash
# Start dev server
npm run dev

# Open http://localhost:5173
# Scroll and verify animations smooth
# Test mobile viewport
# Check Livewire navigation
```

### Performance Check

-   Open DevTools → Performance tab
-   Record scroll animation
-   Check FPS (should be 60fps)
-   Monitor CPU/GPU usage

---

## RULES & PRINCIPLES

### SEPARATION OF CONCERNS

-   **Blade:** Markup hanya + data-aos attributes
-   **CSS:** Styling + animation definitions
-   **JS:** Behavior management + initialization

### NO INLINE STYLES

```blade
<!-- ✅ BENAR -->
<div data-aos="fade-up" class="my-component">Content</div>

<!-- ❌ SALAH -->
<div data-aos="fade-up" style="animation: ...">Content</div>
```

### CONSISTENT NAMING

-   Semua animasi via `data-aos` attribute
-   Animation types dari AOS library
-   No custom animation names di Blade

---

## TROUBLESHOOTING

### Animations not showing?

1. Check `data-aos` attribute spelled correctly
2. Verify Livewire initialized
3. Check browser console for errors
4. Clear browser cache
5. Test in different browser

### Animations flickering?

1. Check `transition-property` not overridden
2. Verify `will-change` properly set
3. Check CSS specificity conflicts
4. Test with `prefers-reduced-motion: no-preference`

### Animation too slow/fast?

1. Adjust `data-aos-duration`
2. Check CSS `transition-duration`
3. Test network speed impact
4. Verify on actual device

---

## FILE STRUCTURE SUMMARY

```
resources/
├── js/
│   ├── app.js                  (AOS init)
│   └── components/
│       └── aos.js              (AOSManager class)
├── css/
│   ├── app.css                 (imports aos.css)
│   └── components/
│       └── aos.css             (animations CSS)
└── views/
    └── livewire/
        └── home-page.blade.php (animations example)
```

---

## NEXT STEPS

1. **Test Animations** - Run `npm run dev` and scroll
2. **Add to Pages** - Follow patterns from home-page
3. **Fine-tune Timing** - Adjust delays if needed
4. **Test Accessibility** - Verify reduced motion support
5. **Monitor Performance** - Check DevTools metrics

---

**Architecture**: ✅ Complete
**Implementation**: ✅ Functional
**Performance**: ✅ Optimized
**Accessibility**: ✅ Supported
**Documentation**: ✅ Included
