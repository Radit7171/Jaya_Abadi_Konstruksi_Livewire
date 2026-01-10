# 📊 VISITOR TRACKING SYSTEM

## Overview

Sistem pencatatan pengunjung web yang lengkap dan terintegrasi dengan Livewire v3. Sistem ini otomatis mencatat setiap kunjungan ke website dengan informasi detail seperti IP address, device type, browser, OS, halaman yang dikunjungi, dan lainnya. **Setiap IP hanya dicatat sekali per 24 jam (1 hari) untuk halaman yang sama.**

---

## 📁 File Structure

```
app/
  ├── Models/
  │   └── Visitor.php (Model & Query Builder)
  ├── Services/
  │   └── VisitorTrackingService.php (Service untuk tracking)
  ├── Http/Middleware/
  │   └── TrackVisitor.php (Middleware untuk auto-track)
  └── Livewire/Admin/
      └── VisitorStats.php (Livewire Component untuk dashboard)

database/
  └── migrations/
      └── 2026_01_09_000000_create_visitors_table.php

resources/views/
  └── livewire/admin/
      └── visitor-stats.blade.php (Tampilan stats)

bootstrap/
  └── app.php (Middleware registration)
```

---

## 📋 Database Schema

### Tabel: `visitors`

| Column | Type | Nullable | Description |
|--------|------|----------|-------------|
| id | bigint | - | Primary key |
| ip_address | string | yes | IP address pengunjung |
| user_agent | string | yes | Browser/Device info |
| page_url | string | yes | URL halaman yang dikunjungi |
| referrer | string | yes | Dari mana pengunjung datang |
| country | string | yes | Negara |
| city | string | yes | Kota |
| device_type | string | yes | desktop/mobile/tablet |
| browser | string | yes | Chrome, Firefox, Safari, etc |
| os | string | yes | Windows, MacOS, Android, iOS, etc |
| user_id | bigint | yes | User ID (jika logged in) |
| created_at | timestamp | - | Waktu kunjungan |
| updated_at | timestamp | - | Updated at |

**Indexes:**
- `ip_address` - Cepat query berdasarkan IP
- `created_at` - Cepat query berdasarkan waktu
- `page_url` - Cepat query berdasarkan halaman
- `device_type` - Cepat query berdasarkan device

---

## 🚀 Cara Menggunakan

### 1. Migration & Database

Jalankan migration untuk membuat tabel:

```bash
php artisan migrate
```

### 2. Tracking Otomatis

Middleware `TrackVisitor` sudah didaftarkan di `bootstrap/app.php`, jadi **tracking otomatis berjalan** untuk setiap request ke website.

### 3. Query Data Pengunjung

#### Mendapatkan semua pengunjung:

```php
use App\Models\Visitor;

$visitors = Visitor::all();
```

#### Pengunjung hari ini:

```php
$todayVisitors = Visitor::today()->get();
```

#### Pengunjung minggu ini:

```php
$weekVisitors = Visitor::thisWeek()->get();
```

#### Pengunjung bulan ini:

```php
$monthVisitors = Visitor::thisMonth()->get();
```

#### Pengunjung unik (berdasarkan IP):

```php
$uniqueVisitors = Visitor::unique()->get();
```

#### Pengunjung berdasarkan device:

```php
$mobileVisitors = Visitor::byDevice('mobile')->get();
$desktopVisitors = Visitor::byDevice('desktop')->get();
$tabletVisitors = Visitor::byDevice('tablet')->get();
```

#### Pengunjung berdasarkan halaman:

```php
$pageVisitors = Visitor::byPage('/proyek')->get();
```

#### Total pengunjung unik:

```php
$totalUnique = Visitor::totalUniqueVisitors(); // int
```

#### Total pengunjung unik hari ini:

```php
$todayUnique = Visitor::totalUniqueVisitorsToday(); // int
```

#### Halaman paling banyak dikunjungi:

```php
$mostVisited = Visitor::mostVisitedPages(10); // array[page_url, visits]
```

#### Dapatkan semua statistik:

```php
$stats = Visitor::getStats(); // array dengan semua data

// Returns:
// [
//     'total_visits' => 1250,
//     'total_unique' => 450,
//     'today_visits' => 45,
//     'today_unique' => 23,
//     'this_week_visits' => 320,
//     'this_month_visits' => 1200,
//     'most_visited_pages' => [...],
//     'device_breakdown' => ['desktop' => 750, 'mobile' => 400, 'tablet' => 100]
// ]
```

---

## 🔧 VisitorTrackingService

Service ini menangani logika tracking pengunjung.

### Methods:

#### `track(Request $request): Visitor`

Track visitor baru dan simpan ke database.

```php
use App\Services\VisitorTrackingService;
use Illuminate\Http\Request;

$request = request();
$visitor = VisitorTrackingService::track($request);
```

#### `getClientIp(Request $request): string`

Dapatkan IP address pengunjung dengan akurat.

```php
$ip = VisitorTrackingService::getClientIp($request);
```

#### `getDeviceType(Agent $agent): string`

Dapatkan tipe device dari user agent.

```php
// Returns: 'mobile', 'tablet', atau 'desktop'
```

#### `isSameVisitor(Request $request, string $ipAddress): bool`

Check apakah pengunjung adalah orang yang sama berdasarkan IP.

```php
$isSame = VisitorTrackingService::isSameVisitor($request, '192.168.1.1');
```

#### `getSummary(): array`

Dapatkan ringkasan statistik pengunjung.

```php
$summary = VisitorTrackingService::getSummary();
```

---

## 📊 Menampilkan Stats di Dashboard

### Menggunakan Livewire Component

Component `VisitorStats` sudah siap untuk ditampilkan di admin dashboard:

```blade
<!-- Di admin dashboard template -->
<livewire:admin.visitor-stats />
```

Component ini menampilkan:
- 📈 Total kunjungan
- 👥 Pengunjung unik
- 📅 Kunjungan hari ini
- 🎯 Pengunjung unik hari ini
- 📱 Breakdown berdasarkan device type
- 🔗 Halaman paling banyak dikunjungi
- 📋 Tabel pengunjung terbaru

---

## 💡 Contoh Implementasi di Controller

```php
<?php

namespace App\Http\Controllers;

use App\Models\Visitor;
use App\Services\VisitorTrackingService;
use Illuminate\Http\Request;

class AnalyticsController extends Controller
{
    /**
     * Tampilkan analytics dashboard
     */
    public function dashboard()
    {
        $stats = Visitor::getStats();
        $recentVisitors = Visitor::latest()->limit(20)->get();
        
        return view('analytics.dashboard', [
            'stats' => $stats,
            'recentVisitors' => $recentVisitors,
        ]);
    }

    /**
     * Export visitor data
     */
    public function exportVisitors()
    {
        $visitors = Visitor::all();
        
        return response()->json($visitors);
    }

    /**
     * Analisis device type
     */
    public function deviceAnalysis()
    {
        $devices = Visitor::selectRaw('device_type, COUNT(*) as count')
            ->groupBy('device_type')
            ->get();
        
        return response()->json($devices);
    }
}
```

---

## 🔐 Privacy & Security Notes

1. **IP Tracking**: System mencatat IP address untuk mengidentifikasi pengunjung unik
2. **User Agent**: Browser dan OS info dicatat dari user agent
3. **Geolocation**: Opsional menggunakan package `geoip2/geoip2`
4. **GDPR Compliance**: Pertimbangkan privacy policy dan GDPR jika melayani user EU
5. **Data Retention**: Pertimbangkan untuk delete data lama secara berkala

---

## 📦 Dependencies

Service ini menggunakan:

- **jenssegers/agent** - Untuk parsing user agent (browser, OS, device type)

Jika belum terinstall:

```bash
composer require jenssegers/agent
```

Untuk geolocation (optional):

```bash
composer require geoip2/geoip2
```

---

## 🎯 Fitur-Fitur

✅ **Auto Tracking** - Setiap request otomatis dicatat  
✅ **Device Detection** - Deteksi desktop, mobile, tablet  
✅ **Browser Detection** - Deteksi browser yang digunakan  
✅ **OS Detection** - Deteksi operating system  
✅ **IP Tracking** - Tracking berdasarkan IP address  
✅ **Page URL** - Catat halaman yang dikunjungi  
✅ **Referrer** - Catat dari mana pengunjung datang  
✅ **User Association** - Link dengan user jika logged in  
✅ **Geolocation** - Deteksi negara & kota (optional)  
✅ **Query Scopes** - Builder scopes untuk query mudah  
✅ **Statistics** - Kumpulan stats pengunjung  
✅ **Dashboard Component** - Livewire component siap pakai  

---

## 📝 Next Steps

1. Run `php artisan migrate` untuk membuat tabel
2. Akses admin dashboard dan lihat `<livewire:admin.visitor-stats />`
3. Data mulai tercatat otomatis dari setiap kunjungan
4. Customize component sesuai kebutuhan
5. Tambahkan cleaning task untuk data lama (opsional)

---

## 🐛 Troubleshooting

**Q: Data tidak tercatat?**  
A: Pastikan middleware `TrackVisitor` sudah terdaftar di `bootstrap/app.php`

**Q: IP address tidak akurat?**  
A: Pada server proxy/load balancer, pastikan header X-Forwarded-For dikonfigurasi dengan benar

**Q: Ingin exclude certain routes?**  
A: Edit `TrackVisitor` middleware untuk skip routes tertentu

**Q: Database terlalu penuh?**  
A: Buat cleanup job untuk delete visitor lama atau archive ke tabel lain

