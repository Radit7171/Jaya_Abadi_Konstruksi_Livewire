# TYPOGRAPHY SYSTEM - PT JAYA ABADI KONSTRUKSI

Dokumentasi lengkap tentang sistem typografi modern yang digunakan dalam aplikasi.

---

## 🎯 TYPOGRAPHY STACK (Modern & Professional)

Kami menggunakan kombinasi 3 font premium dari Google Fonts untuk menciptakan visual yang modern, professional, dan konsisten.

### Font Families

| Font | Purpose | Usage | Weights |
|------|---------|-------|---------|
| **Sora** | Headings | H1-H6, titles, large text | 400, 500, 600, 700 |
| **Inter** | Body Text | Paragraphs, buttons, general content | 400, 500, 600, 700 |
| **Fira Code** | Monospace | Code blocks, technical content | 400, 500, 700 |

---

## 📦 FONT IMPORT

### Location
📁 `resources/views/layouts/app.blade.php`

### Implementation
```html
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Sora:wght@400;500;600;700&family=Inter:wght@400;500;600;700&family=Fira+Code:wght@400;500;700&display=swap" rel="stylesheet">
```

**Features:**
- ✅ `rel="preconnect"` - Optimize font loading (faster page)
- ✅ `crossorigin` - CORS-safe font loading
- ✅ Variable weights - 400, 500, 600, 700 (efficient)
- ✅ `display=swap` - Text visible immediately (FOUT)

---

## 🎨 FONT APPLICATIONS

### 1. SORA - Headings (Modern, Bold, Geometric)

**Characteristics:**
- Geometric, modern design
- Confident, bold appearance
- Perfect for headlines & CTAs
- Excellent for construction/engineering branding

**Used for:**
- `<h1>` - Page titles, hero sections
- `<h2>` - Section titles
- `<h3>` to `<h6>` - Subheadings
- Button text (large/prominent)
- Card titles

**CSS Rules:**
```css
h1, h2, h3, h4, h5, h6 {
    font-family: 'Sora', -apple-system, BlinkMacSystemFont, sans-serif;
    font-weight: 700;
    letter-spacing: -0.025em;
}

.home-hero-title {
    font-family: 'Sora', -apple-system, BlinkMacSystemFont, sans-serif;
    font-weight: 800;
}

.home-section-title {
    font-family: 'Sora', -apple-system, BlinkMacSystemFont, sans-serif;
    font-weight: 700;
}

.home-cta-title {
    font-family: 'Sora', -apple-system, BlinkMacSystemFont, sans-serif;
    font-weight: 700;
}
```

**Examples:**
```html
<!-- Hero Title -->
<h1 class="home-hero-title">Membangun Masa Depan dengan Inovasi & Keunggulan</h1>

<!-- Section Title -->
<h2 class="home-section-title">Layanan Utama Kami</h2>

<!-- CTA Title -->
<h2 class="home-cta-title">Siap Membangun Proyek Impian Anda?</h2>

<!-- Regular Heading -->
<h3>Tentang Perusahaan</h3>
```

### 2. INTER - Body Text (Clean, Highly Readable)

**Characteristics:**
- Clean, geometric sans-serif
- Excellent readability (body text)
- Neutral, professional appearance
- Works perfect with Sora

**Used for:**
- Body text (`<p>`)
- Descriptive paragraphs
- Navigation text
- Button labels
- Form inputs
- General content

**CSS Rules:**
```css
body {
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
}
```

**Examples:**
```html
<p>Jaya Abadi Konstruksi - Partner terpercaya untuk solusi konstruksi gedung dan infrastruktur industri berstandar internasional.</p>

<a href="/tentang-kami">Tentang Kami</a>

<button>Lihat Portofolio</button>
```

### 3. FIRA CODE - Monospace (Technical Content)

**Characteristics:**
- Professional monospace font
- Perfect for code blocks
- Excellent line height
- Technical, modern feel

**Used for:**
- `<code>` inline elements
- `<pre>` code blocks
- Terminal/command output
- Technical documentation

**CSS Rules:**
```css
code, pre, .code {
    font-family: 'Fira Code', monospace;
}

code {
    font-weight: 500;
    font-size: 0.875rem;
}

pre {
    font-weight: 400;
    line-height: 1.5;
}
```

**Examples:**
```html
<!-- Inline Code -->
<p>Gunakan <code>wire:navigate</code> untuk SPA navigation</p>

<!-- Code Block -->
<pre><code>php artisan serve --host=0.0.0.0 --port=8000</code></pre>
```

---

## 📏 SIZING & HIERARCHY

### Heading Sizes

| Element | Size | Weight | Letter-spacing |
|---------|------|--------|-----------------|
| **H1** (Hero Title) | 2.75rem | 800 | -0.025em |
| **H2** (Section Title) | 2.25rem | 700 | -0.025em |
| **H3** (Subsection) | 1.875rem | 700 | -0.025em |
| **H4** | 1.5rem | 700 | -0.025em |
| **H5** | 1.25rem | 600 | -0.025em |
| **H6** | 1rem | 600 | 0 |

### Body Text

| Usage | Size | Weight | Line-height |
|-------|------|--------|-------------|
| Body (default) | 1rem | 400 | 1.5 |
| Subtitle | 1.125rem | 400 | 1.6 |
| Small text | 0.875rem | 400 | 1.5 |
| Label | 0.75rem | 600 | 1.4 |

---

## 🎯 FONT WEIGHT USAGE

### Sora (Headings)
- **700** - Standard headings (h2-h6)
- **800** - Hero titles (h1, large impact titles)
- **600** - Subheadings, small titles

### Inter (Body)
- **400** - Body text, paragraphs
- **500** - Medium emphasis, labels
- **600** - Button text, strong emphasis
- **700** - Important body text

### Fira Code (Monospace)
- **400** - Code blocks, content
- **500** - Highlighted code
- **700** - Bold emphasis in code

---

## 🌓 DARK MODE SUPPORT

Fonts automatically work across themes. No additional CSS needed untuk dark mode font changes.

### Dark Mode Example
```css
[data-bs-theme="dark"] {
    /* Fonts remain consistent */
    /* Only colors change via CSS variables */
    --home-text: #f1f5f9;
    --home-text-muted: #cbd5e1;
}
```

---

## 🚀 PERFORMANCE OPTIMIZATION

### Google Fonts Optimization
- ✅ Variable fonts (single file, multiple weights)
- ✅ `display=swap` (shows fallback immediately)
- ✅ `preconnect` (DNS prefetch optimization)
- ✅ Only 3 fonts (minimal requests)
- ✅ Only needed weights (400, 500, 600, 700)

### Loading Speed Impact
- **Fonts loaded:** 3 families
- **Weights loaded:** 4 per family (12 total)
- **Estimated size:** ~50-60KB (gzipped)
- **Loading strategy:** Async (non-blocking)

### Font Stack Fallbacks
```
Sora → -apple-system → BlinkMacSystemFont → sans-serif
Inter → -apple-system → BlinkMacSystemFont → "Segoe UI" → sans-serif
Fira Code → monospace
```

Jika Google Fonts gagal load, system fonts akan digunakan otomatis.

---

## 📝 USAGE RULES

### ✅ WAJIB DILAKUKAN

1. **Gunakan Sora untuk headings SEMUA ukuran**
   ```css
   h1, h2, h3, h4, h5, h6 {
       font-family: 'Sora', ...;
   }
   ```

2. **Gunakan Inter untuk body text**
   ```css
   body {
       font-family: 'Inter', ...;
   }
   ```

3. **Gunakan Fira Code untuk code elements**
   ```css
   code, pre {
       font-family: 'Fira Code', monospace;
   }
   ```

4. **Maintain font weights yang tepat**
   - Headings: 700-800
   - Body: 400
   - Emphasis: 600

5. **Keep letter-spacing konsisten di headings**
   - Headings: `-0.025em` (tight spacing)
   - Body: normal

### ❌ DILARANG

1. ❌ Tidak boleh gunakan system fonts untuk headings (selalu Sora)
2. ❌ Tidak boleh mix fonts di heading (selalu Sora)
3. ❌ Tidak boleh gunakan Sora untuk body text
4. ❌ Tidak boleh hardcode font-family di inline style
5. ❌ Tidak boleh gunakan font weights yang tidak diimport (hanya 400, 500, 600, 700)

---

## 🔧 IMPLEMENTATION GUIDE

### Adding Sora Font to Custom Component

```css
/* New component */
.my-component-title {
    font-family: 'Sora', -apple-system, BlinkMacSystemFont, sans-serif;
    font-weight: 700;
    letter-spacing: -0.025em;
}
```

### Adding Inter Font to Custom Component

```css
/* Already in body, inherits automatically */
.my-component-text {
    /* Inherits Inter from body */
}

/* Or explicit if needed */
.my-component-text {
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
}
```

### Adding Code Font to Custom Component

```css
.terminal-output {
    font-family: 'Fira Code', monospace;
    font-size: 0.875rem;
    line-height: 1.5;
}
```

---

## 📊 FONT COMPARISON

### Why Sora + Inter + Fira Code?

| Aspect | Sora | Inter | Fira Code |
|--------|------|-------|-----------|
| **Purpose** | Headings | Body | Code |
| **Style** | Geometric | Clean | Monospace |
| **Weight** | Bold, confident | Neutral | Technical |
| **Readability** | Large text ✅ | Body text ✅ | Code ✅ |
| **Modern** | ✅ Very | ✅ Very | ✅ Yes |
| **Professional** | ✅ Yes | ✅ Yes | ✅ Yes |
| **Pairing** | Perfect with Inter | Perfect with Sora | Complements both |

---

## 🎬 ANIMATION & TRANSITIONS

Fonts menggunakan smooth transitions saat theme switching:

```css
h1, h2, h3, h4, h5, h6 {
    transition: color 0.3s ease;
}

body {
    transition: color 0.3s ease, background-color 0.3s ease;
}
```

---

## 📱 RESPONSIVE ADJUSTMENTS

Font sizes scale di breakpoints:

```css
/* Mobile: sizes lebih kecil */
@media (max-width: 768px) {
    h1 { font-size: 2rem; }
    h2 { font-size: 1.75rem; }
    h3 { font-size: 1.5rem; }
}

/* Desktop: sizes lebih besar */
@media (min-width: 1024px) {
    h1 { font-size: 2.75rem; }
    h2 { font-size: 2.25rem; }
    h3 { font-size: 1.875rem; }
}
```

---

## 📝 METADATA

**Last Updated:** January 2026
**Version:** 1.0 (Modern Typography System)
**Fonts Used:** Sora, Inter, Fira Code
**Source:** Google Fonts (https://fonts.google.com)
**Status:** Active & Optimized

**Font Characteristics:**
- ✅ Modern & Professional
- ✅ Excellent Readability
- ✅ Perfect Pairing
- ✅ Variable Weights
- ✅ Dark Mode Compatible
- ✅ Performance Optimized

---

## 🔗 RELATED DOCUMENTATION

- [Core Architecture](01-CORE-ARCHITECTURE.md)
- [Icon System](07-ICON-SYSTEM.md)
- [External Links](08-EXTERNAL-LINKS-GUIDE.md)

---

## 📚 Resources

- **Sora Font:** https://fonts.google.com/specimen/Sora
- **Inter Font:** https://fonts.google.com/specimen/Inter
- **Fira Code Font:** https://fonts.google.com/specimen/Fira+Code
- **Google Fonts Guide:** https://fonts.google.com

---

**Typography is the foundation of great design. Well-chosen fonts make your website professional, modern, and delightful to read.** 🎨
