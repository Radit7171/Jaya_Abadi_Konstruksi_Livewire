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
- `resources/views/livewire/admin/projects-page.blade.php` - Projects management page markup

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
- ✅ Projects table dengan pagination
- ✅ Action buttons per project (View, Edit, Toggle Publish, Delete)
- ✅ Create project button
- ✅ Modal untuk view/edit/create projects

### Table Columns
- Project Title (dengan thumbnail)
- Category Badge
- Publish Status
- Created Date
- Actions

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

## 🚀 NEXT STEP: CSS & JAVASCRIPT

Sekarang siap untuk menambahkan:
1. CSS untuk styling admin layout, navbar, sidebar, dashboard, dan projects table
2. JavaScript untuk behavior seperti:
   - Sidebar toggle
   - Modal animations
   - Search & filter interactions
   - Form validations
   - Table interactions
