# ADMIN DASHBOARD BLADE STRUCTURE

## ✅ FILES YANG SUDAH DIBUAT

### Layout Files
- `resources/views/layouts/admin.blade.php` - Master layout admin dengan sidebar dan navbar

### Component Files  
- `resources/views/components/admin-navbar.blade.php` - Navbar admin dengan user dropdown
- `resources/views/components/admin-sidebar.blade.php` - Sidebar dengan menu navigation

### Livewire Component Files
- `app/Livewire/Admin/AdminDashboard.php` - Dashboard component dengan stats
- `app/Livewire/Admin/AdminProjects.php` - Projects CRUD component dengan search & filter

### Blade View Files
- `resources/views/livewire/admin/dashboard-page.blade.php` - Dashboard page markup
- `resources/views/livewire/admin/projects-page.blade.php` - Projects management page markup dengan table & card layout

### Routes
- `routes/web.php` - Updated dengan admin routes + auth middleware

---

## 🔐 SECURITY

✅ **Semua admin routes protected dengan `middleware('auth')`**
- Hanya user yang sudah login dapat mengakses `/admin/*`
- User yang tidak login akan redirect ke login page

---

## 📍 ROUTES YANG TERSEDIA

```
GET  /admin/dashboard      => AdminDashboard (name: admin.dashboard)
GET  /admin/projects       => AdminProjects (name: admin.projects)
POST /logout               => Logout
```

---

## 🎯 STRUKTUR BLADE

### Admin Layout Structure
```
<html>
  <body>
    <div class="admin-layout">
      <aside class="admin-sidebar">
        <!-- Logo + Menu Navigation -->
      </aside>
      <div class="admin-main-wrapper">
        <nav class="admin-navbar">
          <!-- User Profile Dropdown + Theme Toggle -->
        </nav>
        <main class="admin-main-content">
          <!-- Page Content (Livewire Component Content) -->
        </main>
      </div>
    </div>
  </body>
</html>
```

### Admin Navbar Features
- Logo Jaya Abadi Konstruksi
- Sidebar toggle button (mobile)
- Theme toggle (light/dark/system)
- User profile dropdown dengan logout button
- Responsive design

### Admin Sidebar Features
- Logo + brand text
- Menu items:
  - Dashboard (dengan icon chart-line)
  - Kelola Proyek (dengan icon hammer)
- Active state indicator
- SPA navigation dengan `wire:navigate`
- Mobile: toggleable with slide animation
- Desktop: always visible dengan sidebar-collapsed mode support

---

## 📄 ADMIN DASHBOARD PAGE

### Stats Cards
- Total Proyek
- Proyek Dipublikasi  
- Proyek Draft
- Total Users

### Quick Actions
- Link ke Kelola Proyek
- Link kembali ke Website

---

## 📋 ADMIN PROJECTS PAGE

### Features
- ✅ Search bar (real-time dengan `wire:model.live`)
- ✅ Filter buttons (Semua, Dipublikasi, Draft)
- ✅ **Dual Layout:**
  - Desktop (≥769px): Projects table dengan pagination
  - Mobile (≤768px): Projects card grid dengan responsive sizing
- ✅ Action buttons per project (View, Edit, Toggle Publish, Delete)
- ✅ Create project button
- ✅ Modal untuk view/edit/create projects

### Table Columns (Desktop)
- Project Title (dengan thumbnail)
- Category Badge
- Publish Status
- Created Date
- Actions

### Card Layout (Mobile)
- Project image dengan 180px height
- Project title
- Description snippet
- Category badge, date, status
- Action buttons (color-coded: View, Edit, Show/Hide, Delete)

### Modal Modes
- **View** - Display project details (read-only)
- **Edit** - Edit existing project
- **Create** - Create new project

### Form Fields
- Title
- Category (dropdown)
- Description (textarea)
- Image URL
- Image Alt Text
- Publish checkbox

---

## ✨ RECENT ENHANCEMENTS (Jan 8, 2026)

### Pagination System
- ✅ **Custom pagination component** dengan smart page numbering
- ✅ **Modern slim design** dengan reduced button sizes (34px desktop → 28px mobile)
- ✅ **Responsive** dengan scaling at different breakpoints
- ✅ **Route-based** menggunakan `route('admin.projects', ['page' => $i])`

### Mobile Card Layout
- ✅ **Responsive card grid** dengan image, title, description, metadata
- ✅ **Color-coded action buttons** (View: Cyan, Edit: Blue, Show: Green, Hide: Amber, Delete: Red)
- ✅ **Proper metadata alignment** (category badge, date, status) dengan flexbox centering
- ✅ **Mobile-first breakpoints** (desktop, tablet, mobile, small mobile)

### Sidebar Toggle Fix
- ✅ **Fixed sidebar toggle** dengan proper event listener cleanup
- ✅ **Works after Livewire navigation** (reinit mechanism)
- ✅ **Mobile auto-hide** on link clicks
- ✅ **Desktop auto-show** on window resize

---

## 📁 CSS FILES STRUCTURE

1. **admin-layout.css** - Main layout, sidebar, navbar
2. **admin-dashboard.css** - Dashboard page styling
3. **admin-projects.css** - Table & filter styling
4. **admin-pagination.css** - Modern slim pagination design
5. **admin-projects-cards.css** - Mobile card layout dengan responsive grid
