# PROJECTS PAGE MODAL SYSTEM — PT JAYA ABADI KONSTRUKSI

Dokumentasi lengkap sistem modal untuk Project Detail yang diimplementasikan di Projects Page untuk menampilkan informasi detail proyek.

**File Structure:**
- [app/Livewire/ProjectsPage.php](../app/Livewire/ProjectsPage.php) — Livewire component dengan modal logic
- [resources/views/livewire/projects-page.blade.php](../resources/views/livewire/projects-page.blade.php) — Modal markup
- [resources/css/pages/projects-page.css](../resources/css/pages/projects-page.css) — Modal styling (300+ lines)

---

## 📋 OVERVIEW

Modal system di Projects Page memungkinkan user melihat detail lengkap dari setiap proyek tanpa meninggalkan halaman Projects. Ketika user mengklik tombol "Lihat Detail" pada card proyek, modal akan terbuka menampilkan:

- 🖼️ Gambar proyek (resolusi tinggi)
- 📝 Deskripsi lengkap proyek
- 🏷️ Kategori proyek
- 📅 Tanggal publikasi
- ✅ Status publikasi (Published/Draft)
- 📞 Call-to-action untuk konsultasi

---

## 🎯 LIVEWIRE COMPONENT LOGIC

### Properties & State Management

**File:** `app/Livewire/ProjectsPage.php`

```php
// Modal visibility state
public bool $showModal = false;

// Selected project untuk ditampilkan di modal
public ?Project $selectedProject = null;
```

**Keuntungan menggunakan public properties:**
- ✅ Reactive state management
- ✅ Otomatis re-render saat state berubah
- ✅ Simple, predictable behavior
- ✅ Tidak memerlukan event listeners

### Methods

#### `openProjectDetail(int $projectId): void`

**Purpose:** Membuka modal dengan data proyek tertentu

```php
public function openProjectDetail(int $projectId): void
{
    $this->selectedProject = Project::findOrFail($projectId);
    $this->showModal = true;
}
```

**Flow:**
1. Menerima project ID dari button click
2. Query database untuk mendapatkan project data
3. Set `$selectedProject` dengan data yang ditemukan
4. Set `$showModal = true` untuk trigger render modal

**Error Handling:**
- Jika project tidak ditemukan, Livewire otomatis throw `404 Not Found`
- Tidak ada data inconsistency karena menggunakan findOrFail

#### `closeModal(): void`

**Purpose:** Menutup modal dan clear selected project

```php
public function closeModal(): void
{
    $this->showModal = false;
    $this->selectedProject = null;
}
```

**Flow:**
1. Set `$showModal = false` untuk hide modal
2. Set `$selectedProject = null` untuk clear state
3. Livewire otomatis re-render

**Cleanup Benefits:**
- ✅ Mencegah memory leak
- ✅ Menghindari selected project tersimpan di state
- ✅ Clean slate untuk modal berikutnya

### Data Passing ke View

```php
public function render()
{
    return view('livewire.projects-page', [
        'projects' => $this->getProjects(),
        'showModal' => $this->showModal,
        'selectedProject' => $this->selectedProject,
    ]);
}
```

Data dipass ke Blade untuk conditional rendering dan binding.

---

## 🎨 BLADE MARKUP ARCHITECTURE

### Modal Trigger Button

**Location:** Card section di projects grid

```blade
<button wire:click="openProjectDetail({{ $project->id }})" 
        class="projects-card-link">
    Lihat Detail
    <svg width="16" height="16" ...>
        <!-- Arrow icon -->
    </svg>
</button>
```

**Key Points:**
- ✅ Menggunakan `wire:click` untuk Livewire method call
- ✅ Mengirim project ID sebagai parameter
- ✅ Semantic button element (tidak anchor tag)
- ✅ Include icon untuk visual clarity

### Modal Container

**Conditional Rendering:**
```blade
@if($showModal && $selectedProject)
    <div class="projects-modal-overlay" 
         wire:click="closeModal()" 
         @keydown.escape="closeModal()">
        <!-- Modal content -->
    </div>
@endif
```

**Safety Checks:**
- ✅ Check `$showModal` untuk visibility
- ✅ Check `$selectedProject` untuk data existence
- ✅ Jika salah satu false/null, modal tidak dirender sama sekali

### Modal Structure

Modal terdiri dari **3 section utama**: header, body, footer.

#### 1️⃣ Modal Header

```blade
<div class="projects-modal-header">
    <h2 class="projects-modal-title">{{ $selectedProject->title }}</h2>
    <button wire:click="closeModal()"
            class="projects-modal-close"
            aria-label="Tutup modal">
        <svg><!-- X icon --></svg>
    </button>
</div>
```

**Components:**
| Element | Purpose | Notes |
|---------|---------|-------|
| Title | Menampilkan nama proyek | H2 semantic, max content width |
| Close button | User dapat close modal | SVG icon X, aria-label untuk a11y |

**Semantics:**
- ✅ Heading hierarchy (H2)
- ✅ Accessible button dengan aria-label
- ✅ Icon untuk visual affordance

#### 2️⃣ Modal Body

**Project Image:**
```blade
<div class="projects-modal-image-wrapper">
    <img src="{{ $selectedProject->image_url ?? '/images/home/hero-project.jpg' }}"
         alt="{{ $selectedProject->image_alt ?? $selectedProject->title }}"
         class="projects-modal-image"
         loading="lazy">
</div>
```

**Features:**
- ✅ Fallback image jika tidak ada
- ✅ Semantic alt text (dari image_alt atau title)
- ✅ Lazy loading untuk performance
- ✅ 300px fixed height, cover fit

**Meta Information:**
```blade
<div class="projects-modal-meta">
    <span class="projects-modal-category">
        {{ $selectedProject->getCategoryLabel() }}
    </span>
    <span class="projects-modal-date">
        <i class="fas fa-calendar-alt"></i>
        {{ $selectedProject->published_at?->translatedFormat('d F Y') 
           ?? 'Tanggal tidak tersedia' }}
    </span>
</div>
```

**Components:**
| Element | Purpose | Details |
|---------|---------|---------|
| Category | Menampilkan kategori | Menggunakan helper method getCategoryLabel() |
| Date | Tanggal publikasi | Format: "d F Y" (e.g., "03 Januari 2026") |

**Description Section:**
```blade
<div class="projects-modal-description">
    <h3 class="projects-modal-description-title">Deskripsi Proyek</h3>
    <p class="projects-modal-description-text">{{ $selectedProject->description }}</p>
</div>
```

**Features:**
- ✅ H3 heading untuk hierarchy
- ✅ Full description text (tidak truncated)
- ✅ Better readability dengan line-height

**Details Grid:**
```blade
<div class="projects-modal-details">
    <div class="projects-modal-detail-item">
        <span class="projects-modal-detail-label">Kategori</span>
        <span class="projects-modal-detail-value">
            {{ $selectedProject->getCategoryLabel() }}
        </span>
    </div>
    <div class="projects-modal-detail-item">
        <span class="projects-modal-detail-label">Status</span>
        <span class="projects-modal-detail-value">
            @if($selectedProject->is_published)
                <span class="projects-modal-badge-success">Dipublikasikan</span>
            @else
                <span class="projects-modal-badge-warning">Belum Dipublikasikan</span>
            @endif
        </span>
    </div>
</div>
```

**Features:**
- ✅ 2-column grid layout
- ✅ Label + value structure
- ✅ Status badge dengan color coding
- ✅ Responsive: 1 column di mobile

#### 3️⃣ Modal Footer

```blade
<div class="projects-modal-footer">
    <a wire:navigate href="/kontak" class="projects-btn projects-btn-primary">
        <span>Hubungi Kami</span>
        <svg><!-- Arrow icon --></svg>
    </a>
    <button wire:click="closeModal()" class="projects-btn projects-btn-outline">
        Tutup
    </button>
</div>
```

**Buttons:**
| Button | Action | Purpose |
|--------|--------|---------|
| Hubungi Kami | Navigate to `/kontak` | CTA untuk konsultasi |
| Tutup | Close modal | Secondary action |

**Details:**
- ✅ Primary button untuk main CTA
- ✅ Outline button untuk secondary action
- ✅ Flex layout dengan equal width (flex: 1)
- ✅ Hubungi Kami menggunakan `wire:navigate` untuk SPA

---

## 🎨 CSS ARCHITECTURE & STYLING

### Color & Background

**Overlay Background:**
```css
.projects-modal-overlay {
    background-color: rgba(0, 0, 0, 0.5);
    backdrop-filter: blur(4px);
}
```

**Dark Mode:**
```css
[data-bs-theme="dark"] .projects-modal-overlay {
    background-color: rgba(0, 0, 0, 0.7);
}
```

**Features:**
- ✅ Semi-transparent black background
- ✅ Backdrop blur untuk glassmorphism effect
- ✅ Darker overlay pada dark mode

### Modal Container Styling

```css
.projects-modal-container {
    background-color: var(--projects-card-bg);
    border-radius: 12px;
    box-shadow: var(--projects-shadow-lg);
    width: 100%;
    max-width: 600px;
    max-height: 90vh;
    overflow-y: auto;
}
```

**Characteristics:**
- ✅ Max width 600px untuk readability
- ✅ Max height 90vh untuk scroll pada content panjang
- ✅ Rounded corners (12px) untuk modern look
- ✅ Responsive width (100% pada mobile)

### Animations

**Fade-in Animation:**
```css
@keyframes projects-modal-fade-in {
    from {
        opacity: 0;
    }
    to {
        opacity: 1;
    }
}
```

**Slide-up Animation:**
```css
@keyframes projects-modal-slide-up {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
```

**Applied to:**
- Overlay: `fade-in 0.3s ease-out`
- Container: `slide-up 0.3s ease-out`

**User Experience:**
- ✅ Smooth entrance untuk modal
- ✅ 0.3s duration cukup cepat (tidak annoying)
- ✅ ease-out timing function untuk natural feel

### Header Styling

```css
.projects-modal-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 1.5rem;
    border-bottom: 1px solid var(--projects-border);
}

.projects-modal-title {
    font-size: 1.5rem;
    font-weight: 600;
    color: var(--projects-text);
}

.projects-modal-close {
    width: 40px;
    height: 40px;
    background: transparent;
    border: none;
    border-radius: 8px;
    color: var(--projects-text-muted);
    cursor: pointer;
    transition: var(--projects-transition);
}

.projects-modal-close:hover {
    background-color: var(--projects-light);
    color: var(--projects-text);
}
```

**Design Details:**
- ✅ Title: Large, bold untuk prominence
- ✅ Close button: 40x40px untuk touch targets
- ✅ Hover effect: Subtle background color change
- ✅ Smooth transition untuk visual feedback

### Body Styling

**Image Wrapper:**
```css
.projects-modal-image-wrapper {
    width: 100%;
    height: 300px;
    border-radius: 8px;
    overflow: hidden;
    margin-bottom: 1.5rem;
    background-color: var(--projects-light);
}

.projects-modal-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
}
```

**Features:**
- ✅ Fixed 300px height
- ✅ Object-fit: cover untuk proper scaling
- ✅ Background color jika image gagal load
- ✅ Rounded corners untuk aesthetic

**Meta & Description:**
```css
.projects-modal-meta {
    display: flex;
    align-items: center;
    gap: 1rem;
    flex-wrap: wrap;
}

.projects-modal-category {
    display: inline-block;
    background: linear-gradient(135deg, rgba(37, 99, 235, 0.1), rgba(16, 185, 129, 0.1));
    color: var(--projects-primary);
    font-size: 0.875rem;
    font-weight: 600;
    padding: 0.375rem 0.75rem;
    border-radius: 6px;
}

.projects-modal-description {
    display: flex;
    flex-direction: column;
    gap: 0.75rem;
}

.projects-modal-description-text {
    font-size: 0.95rem;
    line-height: 1.6;
    color: var(--projects-text-muted);
}
```

**Design Philosophy:**
- ✅ Category: Subtle gradient background
- ✅ Description: Better readability dengan line-height 1.6
- ✅ Flex layout untuk consistent spacing

**Details Grid:**
```css
.projects-modal-details {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 1rem;
    padding: 1rem;
    background-color: var(--projects-light);
    border-radius: 8px;
}

.projects-modal-detail-item {
    display: flex;
    flex-direction: column;
    gap: 0.5rem;
}

.projects-modal-detail-label {
    font-size: 0.875rem;
    font-weight: 600;
    color: var(--projects-text-muted);
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.projects-modal-badge-success {
    display: inline-block;
    background-color: rgba(16, 185, 129, 0.1);
    color: var(--projects-secondary);
    padding: 0.375rem 0.75rem;
    border-radius: 6px;
}
```

**Features:**
- ✅ 2-column grid untuk compact layout
- ✅ Label uppercase untuk visual hierarchy
- ✅ Status badge dengan semantic colors
- ✅ Light background section untuk grouping

### Responsive Design

**Mobile (max-width: 640px):**
```css
@media (max-width: 640px) {
    .projects-modal-container {
        max-width: 100%;
        border-radius: 12px 12px 0 0;  /* Bottom-sheet style */
    }

    .projects-modal-header {
        padding: 1rem;
    }

    .projects-modal-title {
        font-size: 1.25rem;
    }

    .projects-modal-body {
        padding: 1rem;
    }

    .projects-modal-image-wrapper {
        height: 200px;
        margin-bottom: 1rem;
    }

    .projects-modal-details {
        grid-template-columns: 1fr;  /* Single column */
    }
}
```

**Mobile Optimizations:**
- ✅ Full-width modal dengan bottom-sheet style (rounded top)
- ✅ Reduced padding untuk compact design
- ✅ Smaller image height (200px)
- ✅ Single column details grid
- ✅ Smaller font sizes untuk readability

### Dark Mode Support

**Automatic:** Semua warna menggunakan CSS variables yang sudah ter-override di `[data-bs-theme="dark"]`

```css
[data-bs-theme="dark"] {
    .projects-modal-overlay {
        background-color: rgba(0, 0, 0, 0.7);
    }

    .projects-modal-container {
        background-color: var(--projects-card-bg);
        color: var(--projects-text);
    }

    .projects-modal-details {
        background-color: var(--projects-light);
    }
}
```

**Features:**
- ✅ Darker overlay pada dark mode
- ✅ Theme-aware background & text colors
- ✅ Proper contrast maintained
- ✅ No manual color adjustments needed

---

## 🎯 ACCESSIBILITY & UX

### Keyboard Support

**Close on Escape:**
```blade
<div class="projects-modal-overlay" 
     wire:click="closeModal()" 
     @keydown.escape="closeModal()">
```

**Features:**
- ✅ Escape key menutup modal
- ✅ Click overlay background juga menutup
- ✅ Standard UX pattern users expect

### Semantic HTML

- ✅ Button untuk interactive elements
- ✅ Proper heading hierarchy (H2 > H3)
- ✅ Aria-label untuk icon buttons
- ✅ Alt text untuk images

### Visual Accessibility

- ✅ Sufficient color contrast (WCAG AA)
- ✅ Focus states pada buttons
- ✅ Readable font sizes
- ✅ Proper line-height untuk readability (1.6)

---

## 🔄 USER FLOW

### Opening Modal

```
1. User clicks "Lihat Detail" button on project card
2. wire:click="openProjectDetail(projectId)" triggered
3. Livewire queries database untuk project data
4. $showModal = true, $selectedProject = projectData
5. Blade re-renders dan menampilkan modal
6. CSS animations: fade-in (overlay) + slide-up (container)
```

### Closing Modal

```
User dapat close modal melalui:
1. Click close button (X icon di header)
2. Click overlay background
3. Press Escape key
4. Click "Tutup" button di footer

All actions trigger closeModal():
- $showModal = false
- $selectedProject = null
- Blade re-renders (modal hidden)
```

### CTA Action

```
1. User clicks "Hubungi Kami" di modal footer
2. wire:navigate href="/kontak" triggered
3. SPA navigation ke Contact page
4. Modal otomatis close saat navigate
```

---

## 📱 RESPONSIVE BEHAVIOR

### Desktop (≥992px)
- Modal: max-width 600px, centered
- Image: 300px height
- Details: 2-column grid
- Buttons: flex dengan equal width

### Tablet (768px-991px)
- Modal: max-width 600px, centered
- Same as desktop

### Mobile (<768px)
- Modal: 100% width, bottom-sheet style
- Image: 200px height
- Details: 1-column grid
- Buttons: Stack vertically (full width)

---

## 🚀 SETUP & USAGE

### 1. Database Migration

Pastikan sudah ada field yang dibutuhkan di `projects` table:

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
    $table->timestamps();
});
```

### 2. Model Methods

Pastikan Project model memiliki helper methods:

```php
public function getCategoryLabel(): string
{
    return match($this->category) {
        'konstruksi-gedung' => 'Konstruksi Gedung',
        'infrastruktur' => 'Infrastruktur',
        'renovasi' => 'Renovasi',
        default => ucfirst($this->category),
    };
}

public function getShortDescription(): string
{
    return Str::limit($this->description, 150);
}
```

### 3. Access Modal

Modal secara otomatis tersedia saat mengakses Projects Page:

```
http://localhost:8000/proyek
```

Klik tombol "Lihat Detail" pada card untuk membuka modal.

---

## 🔧 CUSTOMIZATION GUIDE

### Mengubah Max Width Modal

**File:** `resources/css/pages/projects-page.css` (line 950-960)

```css
.projects-modal-container {
    max-width: 600px;  /* Ubah value ini */
}
```

**Recommendations:**
- 500px: Compact (mobile-first)
- 600px: Standard (current)
- 700px: Spacious
- 800px: Full-featured

### Mengubah Ukuran Image

**File:** `resources/css/pages/projects-page.css` (line 1039-1048)

```css
.projects-modal-image-wrapper {
    height: 300px;  /* Desktop height */
}

@media (max-width: 640px) {
    .projects-modal-image-wrapper {
        height: 200px;  /* Mobile height */
    }
}
```

### Menambah Detail Field

**Blade (projects-page.blade.php):**
```blade
<div class="projects-modal-detail-item">
    <span class="projects-modal-detail-label">Location</span>
    <span class="projects-modal-detail-value">{{ $selectedProject->location }}</span>
</div>
```

**CSS:** Styles otomatis inherited dari `.projects-modal-detail-item`

### Mengubah Animation Duration

**File:** `resources/css/pages/projects-page.css` (line 938, 960)

```css
animation: projects-modal-fade-in 0.3s ease-out;  /* Ubah 0.3s */
animation: projects-modal-slide-up 0.3s ease-out;  /* Ubah 0.3s */
```

**Recommendations:**
- 0.2s: Snappy (too fast)
- 0.3s: Standard (current)
- 0.4s: Slow (can feel laggy)
- 0.5s: Very slow (cinematic)

---

## ✅ CONSISTENCY CHECKLIST

Modal System fully konsisten dengan:

✅ **Architecture Guidelines**
- Blade = MARKUP ONLY
- CSS = STYLING ONLY
- JS = Livewire only (no custom JS)
- Zero inline styles/scripts

✅ **Design Philosophy**
- Mobile-first responsive
- Slim, modern design
- Light/Dark mode support
- Accessibility first

✅ **Code Quality**
- Semantic HTML
- Scoped CSS classes (`.projects-modal-` prefix)
- Clean Livewire component
- No external dependencies

✅ **Integration**
- Full SPA navigation support
- Livewire v3 reactive state
- Bootstrap 5.3 grid system
- Font Awesome icons

✅ **Performance**
- Lazy image loading
- CSS variables (efficient)
- Minimal DOM re-renders
- No JavaScript overhead

---

## 🆕 2026-01-06: PROJECT MODAL SYSTEM IMPLEMENTATION

### Complete Modal System untuk Project Detail

- Implementasi modal detail proyek di Projects Page menggunakan **Livewire reactive state** untuk simple, maintainable logic.
- Modal components dengan **semantic HTML**, **scoped CSS classes** (`.projects-modal-` prefix), dan **dark mode support**.
- Markup di `resources/views/livewire/projects-page.blade.php`:
  - Conditional rendering: `@if($showModal && $selectedProject)`
  - Dynamic content binding dari `$selectedProject` model
  - Multiple close methods: X button, overlay click, Escape key
  - CTA button dengan `wire:navigate` untuk SPA navigation
- CSS styling di `resources/css/pages/projects-page.css` (300+ lines):
  - Overlay dengan backdrop blur glassmorphism effect
  - Smooth animations: fade-in + slide-up
  - Responsive design: 600px desktop, 100% mobile (bottom-sheet style)
  - Dark mode dengan automatic color override
  - Accessible touch targets (40x40px buttons)
- Livewire component di `app/Livewire/ProjectsPage.php`:
  - Properties: `$showModal` (visibility), `$selectedProject` (data)
  - Methods: `openProjectDetail()` (query & display), `closeModal()` (cleanup)
  - Simple, reactive state management
  - No custom JavaScript needed

**Benefits:**
- 🎯 User dapat melihat detail proyek tanpa meninggalkan halaman Projects
- ✨ Smooth animations untuk professional UX
- 📱 Responsive design: desktop modal, mobile bottom-sheet
- 🌙 Full dark mode support dengan proper contrast
- ♿ Accessible dengan keyboard support (Escape) & semantic HTML
- 🚀 Zero custom JavaScript: Livewire + Bootstrap logic saja
- 📦 Zero external dependencies (modals, popovers, tooltips)

