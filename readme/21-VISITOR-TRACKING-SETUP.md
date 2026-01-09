# 🚀 SETUP VISITOR TRACKING SYSTEM

## ✅ Apa yang Sudah Dibuat

Saya telah membuat sistem pencatatan pengunjung web yang lengkap dan terintegrasi. Berikut adalah file-file yang telah dibuat:

### 📁 File-File yang Dibuat:

```
✅ app/Models/Visitor.php
   - Model dengan scopes dan methods untuk query data

✅ app/Services/VisitorTrackingService.php
   - Service untuk tracking pengunjung
   - Deteksi browser, OS, device type
   - Get IP address dengan akurat

✅ app/Http/Middleware/TrackVisitor.php
   - Middleware untuk auto-track setiap request

✅ app/Livewire/Admin/VisitorStats.php
   - Livewire component untuk tampilan stats

✅ app/Console/Commands/CleanupOldVisitors.php
   - Command untuk cleanup data lama

✅ database/migrations/2026_01_09_000000_create_visitors_table.php
   - Migration untuk tabel visitors

✅ resources/views/livewire/admin/visitor-stats.blade.php
   - View untuk menampilkan statistics

✅ readme/20-VISITOR-TRACKING-SYSTEM.md
   - Dokumentasi lengkap sistem

✅ Updated: bootstrap/app.php
   - Middleware registration

✅ Updated: app/Livewire/Admin/AdminDashboard.php
   - Added visitor stats ke dashboard
```

---

## 🚀 Setup Instructions

### Step 1: Jalankan Migration

```bash
php artisan migrate
```

Ini akan membuat tabel `visitors` dengan struktur lengkap.

### Step 2: Install Dependencies

Jika belum terinstall, jalankan:

```bash
composer require jenssegers/agent
```

### Step 3: Done! 🎉

Sistem sudah otomatis berjalan! Setiap kunjungan ke website akan dicatat di database.

---

## 📊 Mengakses Data Pengunjung

### 1. **Di Admin Dashboard**

Dashboard admin sudah menampilkan:
- Total Kunjungan
- Pengunjung Unik
- Kunjungan Hari Ini

### 2. **Menggunakan Visitor Model**

```php
use App\Models\Visitor;

// Total kunjungan
Visitor::count();

// Pengunjung hari ini
Visitor::today()->count();

// Pengunjung minggu ini
Visitor::thisWeek()->count();

// Pengunjung bulan ini
Visitor::thisMonth()->count();

// Pengunjung unik
Visitor::totalUniqueVisitors();

// Statistik lengkap
Visitor::getStats();
```

### 3. **Menampilkan Component Stats**

Tambahkan ke template:

```blade
<livewire:admin.visitor-stats />
```

Component ini menampilkan:
- 📊 Total stats cards
- 📱 Device breakdown
- 🔗 Most visited pages
- 📋 Recent visitors table

---

## 🔧 Console Commands

### Cleanup Data Lama

```bash
# Hapus data lebih dari 90 hari
php artisan visitors:cleanup

# Hapus data lebih dari 30 hari
php artisan visitors:cleanup --days=30

# Hapus data lebih dari 180 hari
php artisan visitors:cleanup --days=180
```

---

## 📝 Database Struktur

Tabel `visitors` memiliki kolom:
- `id` - Primary key
- `ip_address` - IP pengunjung
- `user_agent` - Browser info
- `page_url` - Halaman yang dikunjungi
- `referrer` - Dari mana datang
- `country` - Negara (jika geolocation aktif)
- `city` - Kota (jika geolocation aktif)
- `device_type` - desktop/mobile/tablet
- `browser` - Chrome, Firefox, Safari, etc
- `os` - Windows, MacOS, Android, iOS, etc
- `user_id` - User ID (jika logged in)
- `created_at` - Waktu kunjungan
- `updated_at` - Updated at

---

## 💡 Contoh Query

```php
use App\Models\Visitor;

// Dapatkan statistik
$stats = Visitor::getStats();

// Pengunjung dengan device mobile
$mobile = Visitor::byDevice('mobile')->count();

// Halaman paling dikunjungi
$pages = Visitor::mostVisitedPages(10);

// Pengunjung dari IP tertentu
$ip = Visitor::where('ip_address', '192.168.1.1')->get();

// Pengunjung bulan lalu
$lastMonth = Visitor::whereMonth('created_at', now()->month - 1)->count();
```

---

## 🎯 Next Steps

1. ✅ Run migration: `php artisan migrate`
2. ✅ Kunjungi website, data otomatis tercatat
3. ✅ Buka admin dashboard untuk melihat stats
4. ✅ Customize component sesuai kebutuhan
5. ✅ Setup cleanup task di scheduler (opsional)

---

## 📋 Scheduler Setup (Opsional)

Untuk auto-cleanup data setiap hari, tambahkan ke `routes/console.php`:

```php
Schedule::command('visitors:cleanup --days=90')
    ->daily()
    ->at('02:00');
```

---

## ✨ Features Overview

| Feature | Status | Description |
|---------|--------|-------------|
| Auto Tracking | ✅ | Setiap request otomatis dicatat |
| Device Detection | ✅ | Desktop, Mobile, Tablet |
| Browser Detection | ✅ | Chrome, Firefox, Safari, dll |
| OS Detection | ✅ | Windows, MacOS, Linux, Android, iOS |
| IP Tracking | ✅ | Tracking berdasarkan IP |
| Page URL | ✅ | Catat halaman yang dikunjungi |
| Referrer | ✅ | Dari mana pengunjung datang |
| User Association | ✅ | Link dengan user jika logged in |
| Statistics | ✅ | Kumpulan stats lengkap |
| Dashboard Component | ✅ | Livewire component siap pakai |
| Geolocation | ⚠️ | Optional, butuh geoip2 package |

---

## 🎓 Dokumentasi Lengkap

Baca file dokumentasi untuk informasi lebih detail:

📄 [readme/20-VISITOR-TRACKING-SYSTEM.md](../20-VISITOR-TRACKING-SYSTEM.md)

---

**System siap digunakan! 🚀**

