# PROJECTS PAGE ARCHITECTURE — PT JAYA ABADI KONSTRUKSI

Dokumentasi lengkap arsitektur Projects Page dengan penjelasan struktur, database, styling, dan functionality.

**File Structure:**
- [app/Livewire/ProjectsPage.php](../app/Livewire/ProjectsPage.php) — Livewire component dengan database query & pagination
- [app/Models/Project.php](../app/Models/Project.php) — Project Model untuk database
- [database/migrations/2026_01_03_000003_create_projects_table.php](../database/migrations/2026_01_03_000003_create_projects_table.php) — Database schema
- [resources/views/livewire/projects-page.blade.php](../resources/views/livewire/projects-page.blade.php) — Markup (353 lines)
- [resources/css/pages/projects-page.css](../resources/css/pages/projects-page.css) — Styling (650+ lines)
- [resources/js/pages/projects/projects-page.js](../resources/js/pages/projects/projects-page.js) — Behavior (200+ lines)

---

## 📋 PAGE STRUCTURE & SECTIONS

Projects Page terdiri dari **4 major sections** dengan responsive design, database integration, dan pagination:

### 1️⃣ BREADCRUMB NAVIGATION
```blade
<nav class="projects-breadcrumb">
  <ol class="projects-breadcrumb-list">
    <li><a wire:navigate href="/">Home</a></li>
    <li><span class="projects-breadcrumb-current">Proyek</span></li>
  </ol>
</nav>
```

**Purpose:** Memberikan navigasi context kepada user & SEO breadcrumb markup

**Features:**
- Links dengan `wire:navigate` untuk SPA behavior
- Semantic HTML `<nav>` & `<ol>` tags
- AOS fade-in animation dengan delay 0ms
- Dark mode support via CSS variables
- Gradient background dengan border
- Responsive text size

---

### 2️⃣ HERO SECTION — Projects Overview

Intro section dengan title, subtitle, quick stats, & CTA buttons.

**Structure:**
```blade
<section class="projects-hero">
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

| Element | Purpose | Content |
|---------|---------|---------|
| Badge | Label dengan icon | "Portofolio Kami" dengan `fa-hammer` icon |
| Title | Main headline | "Proyek-Proyek Berkualitas Tinggi" |
| Subtitle | Deskripsi value proposition | Penjelasan tentang koleksi proyek |
| Quick Stats | 3 statistik kunci | 500+ Proyek Selesai, 10+ Tahun Pengalaman, 98% Kepuasan Klien |
| CTA Buttons | Primary & outline | "Konsultasi Gratis" → `/kontak`, "Lihat Layanan" → `/layanan` |
| Hero Image | Visual representation | Background decoration dengan aspect ratio |

**CSS Classes:**
- `.projects-hero` — Main container dengan padding & overflow hidden
- `.projects-hero-badge` — Badge styling dengan gradient background
- `.projects-hero-title` — Main heading (2.25rem font size)
- `.projects-hero-highlight` — Gradient text effect pada highlight words
- `.projects-hero-quick-stats` — Stats container (flex layout, gap 1.5rem)
- `.projects-quick-stat` — Individual stat (flex column)
- `.projects-hero-actions` — Button container (flex with gap)
- `.projects-hero-visual` — Image wrapper untuk desktop layout
- `.projects-hero-image-wrapper` — Image container dengan aspect ratio 1:1

**Decorative Elements:**
- Top circle: 400x400px, positioned top-right, primary color (opacity 0.1)
- Bottom circle: 300x300px, positioned bottom-left, secondary color (opacity 0.1)

**AOS Animations:**
- Badge: `fade-up` delay 0ms, duration 600ms
- Title: `fade-up` delay 100ms, duration 700ms
- Subtitle: `fade-up` delay 200ms, duration 700ms
- Stats: `fade-up` delay 250ms, duration 700ms
- Actions: `fade-up` delay 300ms, duration 700ms
- Image: `fade-in-left` delay 200ms, duration 800ms

**Responsive Behavior:**
- Desktop (≥992px): 2-column layout (6 col each), full featured
- Tablet (768px-991px): Stack vertically, adjusted font sizes
- Mobile (<768px): Full width, reduced padding & spacing

---

### 3️⃣ PROJECTS GRID SECTION — Main Portfolio

Grid dari project cards dengan filter & pagination.

**Structure:**

#### Section Header
```blade
<div class="projects-section-header">
  <h2 class="projects-section-title">Portofolio Proyek Terbaru</h2>
  <p class="projects-section-subtitle">Koleksi lengkap proyek-proyek terbaik kami...</p>
</div>
```

**Styling:**
- Title: `font-size: 2rem`, Sora font, weight 700
- Subtitle: `color: var(--projects-text-muted)`, max-width 600px
- Centered alignment dengan margin-bottom 2.5rem

#### Filter Bar

**Buttons:**
| Button | Filter Value | Purpose |
|--------|--------------|---------|
| Semua | `all` | Tampilkan semua proyek |
| Konstruksi Gedung | `konstruksi-gedung` | Filter by kategori |
| Infrastruktur | `infrastruktur` | Filter by kategori |
| Renovasi | `renovasi` | Filter by kategori |

**Functionality:**
- `wire:click="filterProjects('category')"` untuk update filter
- Active state: `projects-filter-btn-active` (primary background)
- Hover effect: border color change + gradient background
- Responsive: flex wrap di mobile

**Styling:**
- Padding: 0.625rem 1.25rem (slim design)
- Border radius: 6px
- Transitions untuk hover effects
- Font size: 0.875rem

#### Project Cards Grid

**Grid Layout:**
- Desktop: 3 columns (`col-lg-4`)
- Tablet: 2 columns (`col-md-6`)
- Mobile: 1 column (`col-12`)
- Gap: 1rem (4 units)

**Card Structure:**

```blade
<article class="projects-card">
  <div class="projects-card-image-wrapper">
    <img src="{{ $project->image_url }}" />
    <div class="projects-card-overlay">
      <i class="fas fa-eye"></i>
    </div>
  </div>
  <div class="projects-card-content">
    <span class="projects-card-category">{{ $project->getCategoryLabel() }}</span>
    <h3 class="projects-card-title">{{ $project->title }}</h3>
    <p class="projects-card-description">{{ $project->getShortDescription() }}</p>
    <a href="#" class="projects-card-link">Lihat Detail →</a>
  </div>
</article>
```

**Card Features:**

| Element | Details |
|---------|---------|
| Image | Aspect ratio 4:3, lazy loading, scale on hover (1.05x) |
| Overlay | Blue background (rgba), eye icon, fade in on hover |
| Category Badge | Inline block, gradient background, primary color text |
| Title | Sora font, 1.125rem, weight 600, line-height 1.4 |
| Description | 0.875rem, muted text, max 150 chars (truncated) |
| Link | Primary color, flex layout dengan arrow icon, gap animation on hover |

**Card Styling:**
- Background: `var(--projects-card-bg)` (responsive to theme)
- Border: 1px solid `var(--projects-border)`
- Border radius: 12px
- Box shadow: `var(--projects-shadow-sm)` (default)
- Hover state: border color primary, shadow lg, translateY(-4px)
- Smooth transition: 0.3s cubic-bezier

**AOS Animations:**
- Cards: `fade-up` dengan staggered delays
  - Card 1-3: delay 100ms, 200ms, 300ms
  - Card 4-6: delay 100ms, 200ms, 300ms (loop)
- Duration: 700ms untuk semua

**Dynamic Data Binding:**
```blade
@forelse($projects as $index => $project)
  <!-- Dynamic data dari database -->
  <span class="projects-card-category">{{ $project->getCategoryLabel() }}</span>
  <h3 class="projects-card-title">{{ $project->title }}</h3>
  <p class="projects-card-description">{{ $project->getShortDescription() }}</p>
  <img src="{{ $project->image_url ?? '/images/home/hero-project.jpg' }}" />
@empty
  <!-- Empty state jika tidak ada data -->
  <div class="projects-empty-state">
    <i class="fas fa-inbox"></i>
    <h3>Tidak ada proyek</h3>
    <p>Belum ada proyek dalam kategori ini. Silakan pilih kategori lain.</p>
  </div>
@endforelse
```

#### Pagination Links

**Functionality:**
- `{{ $projects->links() }}` untuk render Livewire pagination component
- Fixed 6 items per page (ITEMS_PER_PAGE constant)
- Performance-optimized: consistent DOM size regardless of total pages
- Automatic page handling via Livewire

**Styling:**
- Pagination wrapper: `projects-pagination`
- Link classes: auto-applied by Livewire with responsive adjustments
- Active state: `.active span` dengan primary color background
- Disabled state: `.disabled span` dengan reduced opacity
- Mobile-optimized: tighter spacing, smaller font on small screens

**Why Pagination Links (not Load More)?**
- ✅ Consistent memory usage (doesn't accumulate DOM)
- ✅ Better performance on slow connections
- ✅ User controls exact page (not "infinite scroll")
- ✅ Accessible page indicators
- ✅ Traditional UX pattern users expect

---

### 4️⃣ CTA SECTION — Call to Action

Final conversion section dengan headline, subtitle, & action buttons.

**Structure:**
```blade
<section class="projects-cta">
  <div class="projects-cta-content">
    <h2 class="projects-cta-title">Siap Mewujudkan Proyek Impian Anda?</h2>
    <p class="projects-cta-subtitle">Hubungi tim profesional kami untuk konsultasi dan solusi konstruksi yang tepat</p>
    
    <div class="projects-cta-actions">
      <a wire:navigate href="/kontak" class="projects-btn projects-btn-primary-light">
        Hubungi Kami Sekarang →
      </a>
      <a wire:navigate href="/" class="projects-btn projects-btn-outline-light">
        Kembali ke Home
      </a>
    </div>
  </div>
</section>
```

**Design Elements:**
- Background: Gradient primary → secondary (135deg)
- Text color: White
- Decorative circles (top-right & bottom-left)
- Centered content dengan max-width 600px
- Padding: 4rem 0

**Buttons:**
- Primary Light: White background, primary text color
- Outline Light: Transparent, white border & text
- Hover effects dengan shadow & background change

---

## 🎨 CSS ARCHITECTURE & STYLING

Projects Page menggunakan **scoped CSS classes** dengan prefix `projects-` untuk semantic organization dan zero global pollution.

### Color System

**Primary Colors - Light Mode:**
```css
--projects-primary: #2563eb (Blue)
--projects-secondary: #10b981 (Green)
--projects-accent: #f59e0b (Amber)
```

**Dark Mode - Automatically overridden:**
```css
--projects-primary: #60a5fa (Lighter Blue)
--projects-secondary: #34d399 (Lighter Green)
--projects-accent: #fbbf24 (Lighter Amber)
```

**Text & Backgrounds:**
```css
Light Mode:
--projects-text: #1e293b
--projects-text-muted: #64748b
--projects-bg: #ffffff
--projects-card-bg: #ffffff

Dark Mode:
--projects-text: #f1f5f9
--projects-text-muted: #cbd5e1
--projects-bg: #0f172a
--projects-card-bg: #1e293b
```

**Gradients & Shadows:**
```css
--projects-gradient-primary: linear-gradient(135deg, var(--projects-primary), var(--projects-secondary))
--projects-gradient-light: linear-gradient(135deg, rgba(37, 99, 235, 0.1), rgba(16, 185, 129, 0.1))

--projects-shadow-sm: 0 1px 2px rgba(0, 0, 0, 0.05)
--projects-shadow-md: 0 4px 6px rgba(0, 0, 0, 0.1)
--projects-shadow-lg: 0 10px 15px rgba(0, 0, 0, 0.1)
```

### Key CSS Classes (Scoped with `.projects-` prefix)

**Layout Classes:**
- `.projects-page` - Main container
- `.projects-hero`, `.projects-grid-section`, `.projects-cta` - Section wrappers
- `.projects-container` - Content wrapper

**Hero Section:**
- `.projects-hero-badge` - Badge styling
- `.projects-hero-title` - Main heading
- `.projects-hero-highlight` - Gradient text
- `.projects-hero-quick-stats` - Stats grid
- `.projects-hero-image-wrapper` - Image container

**Filter & Cards:**
- `.projects-filter-bar` - Filter container
- `.projects-filter-btn` - Filter button
- `.projects-filter-btn-active` - Active filter state
- `.projects-card` - Card component
- `.projects-card-image-wrapper` - Image wrapper
- `.projects-card-overlay` - Hover overlay
- `.projects-card-content` - Text content
- `.projects-card-category` - Category badge
- `.projects-card-title` - Card title
- `.projects-card-description` - Card description
- `.projects-card-link` - Detail link

**Pagination:**
- `.projects-pagination` - Pagination wrapper container
- `.projects-pagination ul` - Links list
- `.projects-pagination a` - Pagination link
- `.projects-pagination span` - Pagination text (prev/next labels)
- `.projects-pagination .active span` - Current page indicator
- `.projects-pagination .disabled span` - Disabled state

**CTA Section:**
- `.projects-cta` - CTA container
- `.projects-cta-title` - CTA title
- `.projects-cta-subtitle` - CTA subtitle
- `.projects-cta-actions` - Button container

**Button Variants:**
- `.projects-btn` - Base button
- `.projects-btn-primary` - Primary button (solid background)
- `.projects-btn-outline` - Outline button (transparent)
- `.projects-btn-primary-light` - Light variant for dark sections
- `.projects-btn-outline-light` - Light outline variant

### Responsive Breakpoints

```css
/* Large screens (≥992px) */
@media (max-width: 1199px) { }

/* Medium screens (≥768px) */
@media (max-width: 991px) {
  Font size reductions
  Adjusted spacing
}

/* Small screens (≥575px) */
@media (max-width: 767px) {
  Mobile-first adjustments
  Full-width buttons
  Reduced padding
  Adjusted grid columns
}
```

### Design Philosophy Applied

✅ **Slim, Compact Design:**
- Section padding: 3.5rem 0 (compact)
- Component padding: 1.75rem (slim)
- Button padding: 0.75rem 1.5rem (minimal)
- Typography: Lean & modern

✅ **Mobile-First:**
- Start with mobile layout
- Enhance untuk tablet
- Full features untuk desktop

✅ **Dark Mode Support:**
- All colors via CSS variables
- Automatic override di `[data-bs-theme="dark"]`
- Proper contrast maintained

✅ **Accessibility:**
- Semantic HTML
- Color contrast compliance
- Focus states untuk keyboard
- Reduced motion support

✅ **Performance:**
- No inline styles
- Optimized selectors
- Efficient transitions
- GPU-accelerated transforms

---

## ⚙️ LIVEWIRE BACKEND ARCHITECTURE

Projects Page menggunakan Livewire v3 untuk reactive database integration & pagination.

### ProjectsPage Component

**File:** `app/Livewire/ProjectsPage.php`

**Traits:**
```php
use WithNavigation;        // Navigation menu management
use WithPagination;        // Livewire pagination support
```

**Properties:**
```php
public string $selectedFilter = 'all';    // Current filter category
```

**Constants:**
```php
private const ITEMS_PER_PAGE = 6;         // Fixed items per page
```

**Methods:**

#### `getProjects()`
- Query database dengan filter
- Returns paginated collection
- Filters by category (if not 'all')
- Orders by created_at descending
- Pagination: 6 items per page (via constant)

```php
public function getProjects()
{
    $query = Project::query()->where('is_published', true);
    
    if ($this->selectedFilter !== 'all') {
        $query->where('category', $this->selectedFilter);
    }
    
    return $query->orderBy('created_at', 'desc')
                 ->paginate(self::ITEMS_PER_PAGE);
}
```

#### `filterProjects(string $category)`
- Update `$selectedFilter` property
- Reset pagination ke page 1
- Livewire auto-re-render view dengan data baru

```php
public function filterProjects(string $category): void
{
    $this->selectedFilter = $category;
    $this->resetPage();
}
```

#### Page Management
- Pagination otomatis via Livewire `WithPagination` trait
- Fixed 6 items per page via `ITEMS_PER_PAGE` constant
- `resetPage()` dalam `filterProjects()` untuk reset ke page 1 saat filter berubah
- Livewire auto-handle page routing & caching

#### `render()`
- Pass `projects` data ke Blade view
- Returns view dengan data dari `getProjects()`

```php
public function render()
{
    return view('livewire.projects-page', [
        'projects' => $this->getProjects(),
    ]);
}
```

**Blade Integration:**

```blade
<!-- Filter buttons dengan wire:click -->
<button wire:click="filterProjects('kategori')">Filter</button>

<!-- Dynamic projects loop -->
@forelse($projects as $project)
  <!-- Display project -->
@empty
  <!-- Empty state -->
@endforelse

<!-- Load more button -->
{{ $projects->links() }}
```

---

## 📦 DATABASE ARCHITECTURE

### Project Model

**File:** `app/Models/Project.php`

**Database Fields:**
```php
$fillable = [
    'title',           // Project name
    'description',     // Full description
    'category',        // konstruksi-gedung, infrastruktur, renovasi
    'image_url',       // Path to project image
    'image_alt',       // Alt text untuk image
    'is_published',    // Boolean untuk draft/publish
    'published_at',    // DateTime untuk publikasi
];
```

**Casts:**
```php
$casts = [
    'is_published' => 'boolean',
    'published_at' => 'datetime',
    'created_at' => 'datetime',
    'updated_at' => 'datetime',
];
```

**Helper Methods:**

#### `getCategoryLabel(): string`
- Returns display name untuk category
- konstruksi-gedung → "Konstruksi Gedung"
- infrastruktur → "Infrastruktur"
- renovasi → "Renovasi"

#### `getShortDescription(): string`
- Return description max 150 chars
- Truncate dengan "..." jika lebih panjang
- Digunakan di card untuk preview

**Query Scopes:**

#### `scopePublished($query)`
- Filter hanya published projects
- `Project::published()->get()`

#### `scopeByCategory($query, string $category)`
- Filter by category
- Jika 'all', return semua
- `Project::byCategory('infrastruktur')->get()`

### Database Migration

**File:** `database/migrations/2026_01_03_000003_create_projects_table.php`

**Schema:**
```php
Schema::create('projects', function (Blueprint $table) {
    $table->id();
    
    $table->string('title');
    $table->text('description');
    $table->string('category');
    
    $table->string('image_url')->nullable();
    $table->string('image_alt')->nullable();
    
    $table->boolean('is_published')->default(true);
    $table->dateTime('published_at')->nullable();
    
    $table->timestamps();  // created_at, updated_at
    
    // Indexes untuk query performance
    $table->index('category');
    $table->index('is_published');
    $table->index('created_at');
});
```

**Indexes:**
- `category` - untuk filter by category
- `is_published` - untuk filter published only
- `created_at` - untuk order by latest

---

## 🎯 JAVASCRIPT BEHAVIOR

Projects Page menggunakan progressive enhancement dengan class-based architecture.

**File:** `resources/js/pages/projects/projects-page.js`

### ProjectsPage Class

**Constructor:**
- Query `.projects-page` element
- Return early jika tidak found
- Call `this.init()`

**Init Method:**
- Setup images
- Setup cards
- Setup buttons
- Setup filters
- Setup smooth scroll
- Register Livewire listener

#### `setupImages()`
- Lazy load image tracking
- Add `projects-image-loaded` class saat image load
- Add `projects-image-error` class jika gagal
- Console warning untuk failed images
- Handle pre-cached images

#### `setupCards()`
- Click card → navigate ke detail link
- Keyboard support: Enter/Space
- Overlay fade effect on hover
- Link click prevention (avoid double navigation)
- `aria-label` support untuk accessibility

#### `setupButtons()`
- Ripple effect pada click
- Hover state management
- Auto-remove ripple setelah 600ms
- Material design inspired

#### `setupFilters()`
- Toggle active state on filter button click
- Update visual feedback
- Keyboard support (Enter/Space)
- Integrate dengan Livewire wire:click

#### `setupSmoothScroll()`
- Anchor link support (#)
- Smooth scroll animation
- Navbar offset (65px untuk fixed navbar)
- Requestanimationframe untuk performance

#### `registerLivewireListener()`
- Listen to `livewire:navigated` event
- Re-init behaviors setelah SPA navigation
- RequestAnimationFrame untuk timing
- Update `.projects-page` reference

**Lifecycle:**

```javascript
1. DOMContentLoaded → new ProjectsPage()
2. livewire:initialized → new ProjectsPage()
3. livewire:navigated → re-init behaviors
4. All event listeners updated automatically
```

**Best Practices:**
- ✅ Progressive enhancement
- ✅ Keyboard accessibility
- ✅ Error handling
- ✅ Performance optimized
- ✅ No global state
- ✅ Clean, maintainable code

---

## 🚀 SETUP & USAGE

### 1. Run Migrations
```bash
php artisan migrate
```

### 2. Create Seeder (Optional)
```bash
php artisan make:seeder ProjectSeeder
```

### 3. Populate Test Data
```bash
# Edit database/seeders/ProjectSeeder.php
# Add sample project data

# Run seeder
php artisan db:seed --class=ProjectSeeder
```

### 4. Access Page
```
http://localhost:8000/proyek
```

---

## 📋 FUTURE ENHANCEMENTS

- [ ] Project detail page (modal atau separate page)
- [ ] Advanced filtering (multiple categories, date range)
- [ ] Search functionality
- [ ] Project gallery (multiple images per project)
- [ ] Client testimonials per project
- [ ] Project timeline view
- [ ] Export/download project list
- [ ] Admin dashboard untuk CRUD projects
- [ ] Image optimization & CDN integration

---

## ✅ CONSISTENCY CHECKLIST

Projects Page fully konsisten dengan:

✅ **Architecture Guidelines**
- Blade = MARKUP ONLY
- CSS = STYLING ONLY
- JS = BEHAVIOR ONLY
- Zero inline styles/scripts

✅ **Design Philosophy**
- Mobile-first responsive
- Slim, modern, compact spacing
- Light/Dark mode support
- Accessibility first

✅ **Code Quality**
- Semantic HTML
- Scoped CSS classes (`.projects-` prefix)
- Clean JavaScript (class-based)
- No dependencies

✅ **Integration**
- SPA navigation dengan wire:navigate
- AOS animations
- Font Awesome icons
- Bootstrap 5.3 grid system
- Livewire v3 with pagination

✅ **Performance**
- Lazy image loading
- CSS variables (efficient)
- GPU-accelerated transforms
- Debounced handlers
- Requestanimationframe for smooth animations

---

**Last Updated:** January 3, 2026  
**Status:** Production Ready ✅
