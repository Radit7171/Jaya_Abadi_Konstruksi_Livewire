# 15. CONTACT PAGE DOCUMENTATION

## Overview

Contact Page merupakan halaman kontak utama Jaya Abadi Konstruksi yang dirancang untuk memudahkan pelanggan menghubungi perusahaan melalui berbagai channel. Page ini mengikuti arsitektur dan guideline yang telah ditetapkan dalam project.

**URL Route:** `/contact` atau `/hubungi-kami`
**Livewire Component:** `App\Livewire\ContactPage`
**View File:** `resources/views/livewire/contact-page.blade.php`

---

## Page Structure & Sections

Contact page terdiri dari 6 major sections yang disusun secara strategic untuk conversion:

### 1. Breadcrumb Navigation
```
Home > Hubungi Kami
```
- **Purpose:** Memberikan navigasi context kepada user
- **Component:** Semantic `<nav>` dengan ARIA labels
- **Animation:** `data-aos="fade-in"` dengan delay 0ms
- **Styling:** `.contact-breadcrumb` dengan gradient background
- **Details:**
  - Home link menggunakan `wire:navigate` untuk SPA navigation
  - Current page ditampilkan sebagai span (non-clickable)

### 2. Hero Section
- **Badge:** "Hubungi Kami" dengan icon `fa-envelope`
- **Headline:** "Siap Membantu Proyek Anda"
- **Highlight:** "Proyek Anda" dalam gradient
- **Subheading:** Deskripsi singkat tentang siap membantu
- **Quick Contact Info:** 2 items dengan icon
  - Telepon: +62 878 1769 5973 (link `tel:`)
  - Email: lasjayaabadi123@gmail.com (link `mailto:`)
- **CTAs:** Dua button
  - Primary (green): "Chat WhatsApp" → WhatsApp link
  - Secondary (outline): "Lihat Layanan" → `/layanan`
- **Hero Image:** Tim customer service dengan background overlay
- **Decoration:** Gradient circles di background dengan opacity rendah
- **Animations:**
  - Badge: `fade-up` delay 0ms
  - Title: `fade-up` delay 100ms
  - Subtitle: `fade-up` delay 200ms
  - Info items: `fade-up` delay 250ms
  - Actions: `fade-up` delay 300ms
  - Visual: `fade-in-left` delay 200ms

### 3. Contact Info Section
- **Title:** "Hubungi Kami" dengan subtitle
- **4 Info Cards:** Grid layout (4 columns lg, 2 columns md, 1 column mobile)
  1. **Lokasi Kantor** (icon: `fa-map-marker-alt`)
     - Address: Depan SD negeri, Jl. Raya Tapos No.72 1, RT.01/RW.03, Cimpaeun, Kec. Tapos, Kota Depok, Jawa Barat 16459
  
  2. **Telepon** (icon: `fa-phone`)
     - Link: +62 878 1769 5973 (`tel:` link)
  
  3. **Email** (icon: `fa-envelope`)
     - Link: lasjayaabadi123@gmail.com (`mailto:` link)
  
  4. **Jam Operasional** (icon: `fa-clock`)
     - Setiap Hari 08:00 - 17:00 WIB

- **Social Media Card:**
  - Title: "Hubungi Kami Melalui"
  - 4 Social links dengan icon:
    - WhatsApp (highlight green)
    - Instagram (pink)
    - Facebook (blue)
    - LinkedIn (blue)
  - Semua link menggunakan `class="external-link"` dengan `data-link` attribute

- **Features:**
  - Responsive card grid
  - Hover effects dengan shadow elevation
  - Icon styling dengan background color
  - All links are external-link type

- **Animations:** `fade-up` dengan cascade delays (100ms, 200ms, 300ms, 400ms, 500ms)

### 4. Maps Section
- **Layout:** 2 columns (7 col maps, 5 col info) - stacked di mobile

**Maps Column:**
- Embedded Google Maps iframe
- Kompak dan modern design
- Full responsive width

**Location Info Column:**
- **Header:**
  - Title: "Kunjungi Kami"
  - Subtitle: "Lokasi kantor kami yang strategis dan mudah dijangkau"

- **Main Location Card:**
  - Badge: "Kantor Pusat" dengan background color
  - Location items:
    1. **Alamat** (icon: `fa-map-marker-alt`)
       - Full address dengan detail lengkap
    
    2. **Jam Operasional** (icon: `fa-clock`)
       - Setiap Hari 08:00 - 17:00 WIB

- **Action Buttons:**
  1. **Arah Jalan** (primary)
     - Link: Google Maps search
     - Icon: `fa-directions`
  
  2. **Hubungi** (secondary)
     - Link: WhatsApp
     - Icon: `fab fa-whatsapp`

- **Quick Info List:**
  - ✓ Lokasi strategis
  - ✓ Mudah diakses dari berbagai arah
  - ✓ Parkir luas tersedia gratis

- **Features:**
  - Responsive design
  - Icon styling consistency
  - Multi-line address support
  - External links handling

- **Animations:**
  - Maps wrapper: `fade-up` delay 0ms
  - Header: `fade-up` delay 0ms
  - Location card: `fade-up` delay 100ms
  - Quick info: `fade-up` delay 200ms

### 5. FAQ (Accordion) Section
- **Title:** "FAQ - Jawaban untuk Pertanyaan Anda" dengan section label "PERTANYAAN UMUM"
- **Subtitle:** "Temukan jawaban cepat untuk pertanyaan yang sering diajukan"

**4 FAQ Items:**
1. **Q:** "Berapa lama waktu respon Anda?"
   - **A:** Tim kami berkomitmen merespons setiap inquiry dalam waktu maksimal 24 jam. Untuk pertanyaan mendesak, hubungi kami melalui WhatsApp atau telepon langsung.

2. **Q:** "Apakah konsultasi awal gratis?"
   - **A:** Ya, konsultasi awal dengan tim kami sepenuhnya gratis. Kami akan memahami kebutuhan Anda dan memberikan saran terbaik sesuai dengan budget dan timeline.

3. **Q:** "Di mana lokasi proyek yang bisa kami tangani?"
   - **A:** Kami melayani proyek di seluruh Indonesia. Tim kami memiliki pengalaman menangani proyek di berbagai wilayah dengan infrastruktur yang lengkap.

4. **Q:** "Apakah ada garansi untuk proyek?"
   - **A:** Tentu saja! Semua proyek kami dilengkapi dengan garansi workmanship sesuai dengan terms & conditions yang telah disepakati. Kami juga menyediakan after-sales service.

**Features:**
- Smooth expand/collapse animation
- Icon color change pada toggle (blue → green)
- Icon rotation pada toggle
- Click & keyboard support (Enter/Space)
- Single item open policy (other items auto-close)
- Accessibility: ARIA roles, tabindex, keyboard navigation

**Animation Details:**
- Icon color transition: 0.4s ease
- Icon rotation: 180deg dengan 0.4s ease
- Content expand: max-height + opacity + padding transition
- Duration: 0.5s ease untuk semua property

- **Animations:** `fade-up` dengan cascade delays (100ms, 200ms, 300ms, 400ms)

### 6. CTA Section
- **Title:** "Siap Memulai Proyek Anda?"
- **Subtitle:** "Hubungi kami hari ini dan dapatkan konsultasi gratis dari tim expert kami"
- **CTAs:** Dua button
  - Primary (white): "Chat WhatsApp" dengan icon
  - Secondary (outline white): "Lihat Layanan" → `/layanan`

- **Features:**
  - Gradient background (primary → secondary)
  - SVG pattern overlay dengan opacity rendah
  - Responsive button layout
  - White text untuk contrast

- **Animations:** `fade-up` delay 0ms

---

## FILES STRUCTURE

### View File
```
resources/views/livewire/
└── contact-page.blade.php (Main markup, NO style/script)
```

### Component Class
```
app/Livewire/
└── ContactPage.php (Livewire component class)
```

### CSS Files
```
resources/css/
└── pages/
    └── contact-page.css (ALL styling, 1217 lines)
```

### JavaScript Files
```
resources/js/
└── pages/
    └── contact-page.js (ALL behavior/animations, 315 lines)
```

### Import Integration
```
resources/css/app.css
└── @import './pages/contact-page.css';

resources/js/app.js
└── import './pages/contact-page';
```

---

## TECHNOLOGY STACK

- **Blade:** Pure HTML markup only (no inline styles/scripts)
- **CSS:** 1217 lines, scoped `.contact-*` prefix
- **JavaScript:** Progressive enhancement class-based approach
- **Google Maps:** Embedded iframe for location visualization
- **External Links:** Handled via `external-link` class with `data-link` attribute

---

## CONTACT PAGE CSS ARCHITECTURE

### SCOPING:

- Semua selector menggunakan prefix `.contact-`
- Tidak ada global style pollution
- CSS variables untuk theme consistency
- Dark mode support via `[data-bs-theme="dark"]`

### CSS VARIABLES:

```css
--contact-primary: #2563eb (Blue)
--contact-primary-dark: #1d4ed8
--contact-primary-light: #eff6ff
--contact-secondary: #10b981 (Green)
--contact-accent: #f59e0b (Amber)
--contact-light: #f8fafc
--contact-dark: #1e293b
--contact-gray: #64748b
--contact-border: #e2e8f0
--contact-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1)
--contact-shadow-lg: 0 20px 40px -15px rgba(0, 0, 0, 0.15)
--contact-radius: 12px
--contact-radius-lg: 16px
--contact-transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1)
```

### BUTTON STYLES:

**`.contact-btn`** Base button component
- Primary `.contact-btn-primary` (gradient blue-green)
- Outline `.contact-btn-outline` (transparent with border)
- White `.contact-btn-white` (white background for dark sections)
- Outline White `.contact-btn-outline-white`

**Features:**
- Flex layout untuk icon + text
- Hover elevation effect (`translateY(-3px)`)
- Shine animation dengan `::before` pseudo-element
- 2px border untuk outline variants
- Proper z-index untuk ripple effects

### BREADCRUMB:

- Gradient background
- Flex layout dengan gap
- Link colors dengan hover underline

### HERO SECTION:

- Gradient decoration circles di background
- Image wrapper dengan aspect-ratio
- Badge styling dengan icon
- Gradient text untuk highlight
- Responsive 2-column layout (stacked mobile)

### INFO CARDS:

- Grid layout: 4 columns (lg), 2 columns (md), 1 column (mobile)
- Hover effects dengan border color & shadow change
- Icon styling dengan circular background
- Responsive typography

### MAPS SECTION:

- 2-column layout (7-5 split) - stacked mobile
- Iframe styling dengan rounded corners
- Location card dengan badge
- Button group styling
- Quick info list dengan checkmarks

### FAQ ACCORDION:

- Scoped styling untuk question & answer elements
- **Question:**
  - Flex layout dengan icon, text, cursor pointer
  - Hover background color change
  - User-select: none untuk better UX

- **Icon:**
  - Circular background (36x36px)
  - Color change on toggle: blue → green (secondary)
  - Smooth rotation (180deg) on toggle
  - Transition: 0.4s ease

- **Answer:**
  - Max-height: 0 to 1000px animation
  - Opacity: 0 to 1 animation
  - Padding: 0 to 1.5rem animation
  - Border-top untuk visual separator
  - Word-wrap & overflow-wrap untuk long text

- **Responsive:**
  - Max-width: 800px container di center
  - Gap: 1.5rem between items
  - Mobile-friendly padding

### CTA SECTION:

- Gradient background (primary → secondary)
- SVG pattern background dengan opacity
- Centered text layout
- White text styling
- Responsive button layout

---

## CONTACT PAGE JAVASCRIPT BEHAVIOR

### CLASS: ContactPage

**INSTANTIATION:**

```javascript
// Initial load
document.addEventListener('DOMContentLoaded', () => {
    if (document.querySelector('.contact-page')) {
        contactPageInstance = new ContactPage();
    }
});

// Re-init on Livewire SPA navigation
document.addEventListener('livewire:navigated', () => {
    if (contactPageInstance) contactPageInstance.destroy();
    if (document.querySelector('.contact-page')) {
        contactPageInstance = new ContactPage();
    }
});
```

### FEATURES:

#### 1. FAQ Accordion Toggle
**Method:** `setupFAQAccordion()`

- Query select semua `.contact-faq-item` elements
- Attach click handler ke `.contact-faq-question`
- Toggle `.active` class pada item
- Keyboard support (Enter/Space keys)
- Accessibility:
  - `role="button"` pada question
  - `tabindex="0"` untuk keyboard focus
  - ARIA labels untuk screen readers

**Behavior:**
- Click untuk toggle item open/close
- Hanya 1 item bisa open (close others otomatis)
- Icon berubah color & rotate saat toggle
- Smooth max-height + opacity animation
- CSS handle semua visual changes

**CSS Integration:**
- `.contact-faq-item.active` selector untuk styling
- Icon color change (blue → green)
- Answer max-height expansion

#### 2. Smooth Scroll untuk Anchor Links
**Method:** `setupSmoothScroll()`

- Detect semua `a[href^="#"]` anchor links
- Prevent default jump navigation
- Use `window.scrollTo()` dengan `behavior: 'smooth'`
- Apply active state class untuk 300ms

#### 3. Button Ripple Effects
**Method:** `setupButtonEffects()`

- Query select `.contact-btn` dan `.contact-maps-btn`
- Listen untuk `mousedown` event
- Create ripple element dynamically
- Position ripple dari mouse coordinate
- Animate ripple dengan scale & opacity
- Clean up ripple setelah animation selesai

**Ripple Keyframe:**
```css
@keyframes contact-ripple-animation {
    to {
        transform: scale(4);
        opacity: 0;
    }
}
```

#### 4. Intersection Observer untuk Animations
**Method:** `setupIntersectionObserver()`

- Monitor elements dengan `[data-aos]` attribute
- Re-trigger AOS animations on visible
- Create separate observer instances per element
- Clean up observers on destroy

#### 5. Analytics Tracking
**Method:** `setupAnalytics()`

- Track button clicks (Primary & Secondary)
- Track external link clicks
- Send GA events untuk conversions
- Format event names: `contact_button_[action]`

#### 6. Cleanup & Memory Management
**Method:** `destroy()`

- Remove semua event listeners
- Disconnect observers
- Clear stored references
- Prevent memory leaks on SPA navigation

---

## EXTERNAL LINKS HANDLING

Semua external links di contact page menggunakan pattern:

```html
<a href="javascript:void(0)" class="external-link" data-link="[actual-url]">
```

**Links di page:**

1. **WhatsApp:**
   - URL: `https://wa.me/6287817695973`
   - Multiple locations: Hero, Info cards, Social, Maps, CTA

2. **Phone:**
   - URL: `tel:+6287817695973`
   - Locations: Hero, Info cards

3. **Email:**
   - URL: `mailto:lasjayaabadi123@gmail.com`
   - Locations: Hero, Info cards

4. **Google Maps:**
   - URL: `https://www.google.com/maps/search/Jaya+Abadi+Konstruksi`
   - Location: Maps section "Arah Jalan" button

5. **Services Page:**
   - URL: `/layanan` (wire:navigate for SPA)
   - Locations: Hero, CTA section

---

## RESPONSIVE DESIGN

### Breakpoints Diikuti:

- **Mobile (xs):** 0px - 575px
- **Tablet (md):** 768px - 991px
- **Desktop (lg):** 992px+

### Layout Adaptations:

**Hero Section:**
- Desktop: 2 columns (text left, image right)
- Mobile: 1 column (stacked)

**Info Cards:**
- Desktop: 4 columns
- Tablet: 2 columns
- Mobile: 1 column

**Maps Section:**
- Desktop: 7-5 columns split
- Mobile: Single column stacked

**FAQ:**
- Desktop: Max-width 800px centered
- Mobile: Full width with padding

---

## ACCESSIBILITY FEATURES

1. **Semantic HTML:**
   - `<nav>` for breadcrumb
   - `<section>` for major sections
   - `<button>` or link semantics

2. **ARIA Labels:**
   - `aria-label` on breadcrumb nav
   - `role="button"` on FAQ questions
   - Proper heading hierarchy (h1, h2, h3)

3. **Keyboard Navigation:**
   - FAQ accordion: Tab, Enter, Space
   - All links accessible via Tab
   - Focus visible styling

4. **Color Contrast:**
   - WCAG AA compliant text colors
   - Icons dengan sufficient contrast

5. **Reduced Motion:**
   - Animations respect `prefers-reduced-motion`
   - Via CSS media query

---

## DARK MODE SUPPORT

CSS variables automatically adjust di dark mode:

```css
[data-bs-theme="dark"] .contact-page {
    --contact-bg: #0f172a;
    --contact-card-bg: #1e293b;
    --contact-text: #f1f5f9;
    --contact-border: #334155;
    /* ... more dark mode variables */
}
```

---

## COMMON PATTERNS & CONVENTIONS

### Icon Usage:

- Font Awesome v6 icons
- Consistent sizing (0.9rem, 1rem, 1.2rem)
- Color-coded by section (blue primary, green secondary)

### Animation Delays:

- AOS delays: 0ms, 100ms, 200ms, 300ms, 400ms, 500ms
- Increment 100ms per element untuk cascade effect
- Duration: 600-700ms untuk fade/zoom

### Border & Shadow:

- Border: 1px solid dengan `--contact-border` color
- Shadow: Use variables `--contact-shadow` atau `--contact-shadow-lg`
- Rounded corners: `--contact-radius` (12px) atau `--contact-radius-lg` (16px)

### Spacing:

- Gap/margin: 1rem, 1.5rem, 2rem, 3rem
- Padding internal: 1.5rem standard
- Container max-width: 800px untuk FAQ, full untuk sections

---

## TROUBLESHOOTING

### FAQ Tidak Bisa Dibuka:

1. **Check Console:**
   - Search untuk `[ContactPage]` logs
   - Verify FAQ items ditemukan (should say "4")
   - Verify click event logged saat diklik

2. **CSS Check:**
   - Inspect element `.contact-faq-item.active` harus ada
   - Check computed styles: `max-height` should change
   - Verify transition property exists

3. **JavaScript Check:**
   - ContactPage class instantiated
   - `setupFAQAccordion()` called
   - Event listeners attached

### Maps Tidak Tampil:

- Check network tab untuk Google Maps embed request
- Verify iframe src URL valid
- Check CSP headers allow Google Maps domain

### External Links Tidak Bekerja:

- Verify `external-link` component JS loaded
- Check console untuk errors
- Verify `data-link` attribute correct

### Dark Mode Issues:

- Check `[data-bs-theme]` attribute on html element
- Verify dark mode CSS variables set properly
- Check for inline styles override

---

## FILE SIZES

- **contact-page.css:** 1217 lines (~38KB)
- **contact-page.js:** 315 lines (~10KB)
- **contact-page.blade.php:** 412 lines (~18KB)
- **Total:** 1944 lines (~66KB before minification)

---

## VERSION HISTORY

### v1.0 (Initial Release)
- Complete contact page dengan 6 sections
- FAQ accordion dengan smooth animations
- Maps embedding dengan info card
- WhatsApp-centric contact strategy
- Full accessibility support
- Dark mode support
- Mobile-responsive design
- External links integration
