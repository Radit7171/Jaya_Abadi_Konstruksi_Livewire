# ADMIN DASHBOARD - CSS & JAVASCRIPT DOCUMENTATION

## ✅ FILES YANG SUDAH DIBUAT

### CSS Files (3 files)

1. **resources/css/pages/admin/admin-layout.css** (9.8 KB)
   - Styling untuk layout utama (sidebar + navbar)
   - Responsive design (desktop, tablet, mobile)
   - CSS variables untuk consistency
   - Light/dark mode support

2. **resources/css/pages/admin/admin-dashboard.css** (3.7 KB)
   - Dashboard stat cards
   - Quick actions section
   - Hover effects & animations
   - Responsive adjustments

3. **resources/css/pages/admin/admin-projects.css** (14.3 KB)
   - Filter & search bar styling
   - Table styling dengan hover effects
   - Modal overlay & dialog
   - Form inputs dengan validation styling
   - Pagination
   - Badge components
   - Action buttons dengan color variants
   - Empty state styling

### JavaScript File (1 file)

1. **resources/js/pages/admin/admin-dashboard.js** (5.7 KB)
   - AdminDashboard class untuk all interactions
   - Sidebar toggle untuk mobile
   - Modal closing (overlay click + Escape key)
   - Form validation styling
   - Table row interactions
   - Search input debounce
   - Livewire SPA navigation support (livewire:navigated event)

### Main Entry Points Updated

1. **resources/css/app.css** - Added admin imports
2. **resources/js/app.js** - Added admin JS import

---

## 🎨 CSS FEATURES

### Admin Layout
- **Sidebar**: Fixed width 260px (desktop), full-width horizontal (tablet), collapsed (mobile)
- **Navbar**: Sticky height 60px dengan user dropdown & theme toggle
- **Main Content**: Flexible layout dengan proper spacing
- **CSS Variables**: --admin-primary, --admin-sidebar-width, etc
- **Theme Support**: Light/Dark mode via `[data-bs-theme]`
- **Transitions**: Smooth 0.3s cubic-bezier animations
- **Accessibility**: Respects prefers-reduced-motion

### Color Palette
```css
--admin-primary: #2563eb (Blue)
--admin-danger: #dc2626 (Red)
--admin-success: #16a34a (Green)
--admin-warning: #ca8a04 (Amber)
--admin-info: #0891b2 (Cyan)
--admin-text: #1e293b (Dark mode: #f1f5f9)
--admin-text-muted: #64748b (Dark mode: #94a3b8)
```

### Responsive Breakpoints
- **Desktop** (≥992px): Full sidebar + navbar
- **Tablet** (768px-991px): Horizontal sidebar menu
- **Mobile** (<576px): Collapsed sidebar + mobile optimized

---

## 🔧 JAVASCRIPT FEATURES

### AdminDashboard Class

#### Methods:
- `init()` - Initialize semua interactions
- `setupSidebarToggle()` - Mobile sidebar toggle dengan click outside behavior
- `toggleSidebar() / openSidebar() / closeSidebar()` - Control sidebar visibility
- `setupModalClosing()` - Modal close on overlay click & Escape key
- `setupFormValidation()` - Remove error styling on input
- `setupTableInteractions()` - Button click feedback
- `setupSearchDebounce()` - Debounce search input (300ms)
- `reinit()` - Re-initialize after Livewire navigation
- `destroy()` - Cleanup (for future use)

#### Features:
✅ Sidebar auto-open on desktop resize  
✅ Modal Escape key support  
✅ Form error styling removal on input  
✅ Button click scale animation  
✅ Search input debounce visual feedback  
✅ Livewire SPA navigation support  
✅ Auto re-initialization after page navigation  

---

## 📦 COMPONENT CLASSES

### Layout Components
- `.admin-layout` - Main flex container
- `.admin-sidebar` - Sidebar container
- `.admin-navbar` - Navbar container
- `.admin-main-wrapper` - Main content wrapper
- `.admin-main-content` - Page content area

### Sidebar Components
- `.admin-sidebar-header` - Sidebar header with logo
- `.admin-sidebar-menu` - Navigation menu
- `.admin-sidebar-link` - Menu links dengan active state
- `.admin-sidebar-link.active` - Active menu indicator

### Navbar Components
- `.admin-navbar-container` - Navbar flex container
- `.admin-navbar-toggle` - Mobile menu toggle
- `.admin-navbar-user` - User profile dropdown
- `.admin-navbar-theme` - Theme toggle component

### Dashboard Components
- `.admin-stat-card` - Stat card dengan icon
- `.admin-stat-icon` - Icon container (bg-primary, bg-success, etc)
- `.admin-stat-value` - Large stat number
- `.admin-stat-label` - Stat label text
- `.admin-actions-card` - Quick actions card
- `.admin-btn` - Button (primary, outline variants)

### Projects Components
- `.admin-filter-section` - Filter & search container
- `.admin-search-input` - Search input dengan icon
- `.admin-filter-buttons` - Filter button group
- `.admin-filter-btn` - Individual filter button
- `.admin-table-wrapper` - Table container
- `.admin-table` - HTML table
- `.admin-table-row` - Table row dengan hover
- `.admin-table-td` - Table data cell
- `.admin-action-btn` - Table action buttons
- `.admin-empty-state` - Empty data state
- `.admin-pagination` - Pagination container

### Modal Components
- `.admin-modal-overlay` - Modal backdrop
- `.admin-modal` - Modal dialog container
- `.admin-modal-header` - Modal header dengan close button
- `.admin-modal-body` - Modal content area
- `.admin-modal-form` - Form container inside modal
- `.admin-form-group` - Form field group
- `.admin-form-label` - Form label
- `.admin-form-input` - Text input
- `.admin-form-textarea` - Textarea
- `.admin-form-select` - Select dropdown
- `.admin-form-checkbox` - Checkbox container
- `.admin-form-error` - Error message styling
- `.admin-modal-actions` - Modal button footer

### Utility Classes
- `.admin-badge` - Badge container (.admin-badge-info, success, warning, danger)
- `.admin-page-header` - Page title & subtitle
- `.admin-page-title` - Main page heading
- `.admin-page-subtitle` - Secondary heading

---

## 🚀 USAGE EXAMPLES

### Sidebar Toggle (Mobile)
Automatically handled by JavaScript - user clicks hamburger icon

### Modal Opening/Closing
Handled by Livewire `wire:click` yang trigger component methods:
```blade
<button wire:click="viewProject({{ $project->id }})">View</button>
```

### Form Validation
Livewire automatically adds `.is-invalid` class, CSS handles styling

### Table Interactions
JavaScript adds visual feedback on button clicks

---

## 📱 MOBILE OPTIMIZATIONS

✅ Sidebar collapses to horizontal menu (tablet) then hidden (mobile)  
✅ Navbar stays sticky untuk easy access  
✅ Table responsive dengan proper spacing  
✅ Modal full-width pada mobile  
✅ Touch-friendly button sizes (36px minimum)  
✅ Form inputs full-width pada mobile  
✅ Pagination wraps properly  

---

## 🎯 INTEGRATION WITH LIVEWIRE

CSS & JS fully integrate dengan Livewire v3:
- ✅ Wire attributes fully supported
- ✅ Form validation styling via Livewire errors
- ✅ Modal state managed by Livewire components
- ✅ SPA navigation friendly (livewire:navigated event)
- ✅ Auto re-initialization after page changes

---

## 📝 NOTES

- All CSS uses `.admin-*` prefix untuk scoping
- All colors support light/dark mode via CSS variables
- JavaScript uses ES6 module syntax
- Accessibility first (keyboard support, ARIA ready)
- Performance optimized (minimal animations, GPU acceleration)

---

## ✨ SIAP UNTUK TESTING!

Semua CSS & JS sudah terintegrasi. Sekarang bisa test di browser!

**Untuk full development server:**
```bash
npm run dev          # Frontend watch mode
php artisan serve    # Backend server
```

Admin dashboard sudah siap digunakan dengan styling dan interaktivitas lengkap! 🎉
