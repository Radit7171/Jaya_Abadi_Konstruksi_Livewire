# ✅ Sistem Pencatatan Pengunjung - 24 Jam Per IP

## 📋 Penjelasan Sederhana

**1 orang (1 IP) = 1 record dalam 24 jam**

Tidak peduli:
- ❌ Berapa kali dia masuk
- ❌ Ke halaman mana saja
- ❌ Berapa lama dia browsing

Selama dalam **24 jam yang sama**, dia hanya dicatat **1 kali saja**.

---

## 🔄 Cara Kerja

### Scenario 1: Visitor Baru

```
10:00 - IP 192.168.1.1 masuk ke halaman /
        ✅ DICATAT - Record baru dibuat
        
Database: 1 record

status: Tercatat ✓
```

### Scenario 2: Visitor Kembali 10 Menit Kemudian (Halaman Berbeda)

```
10:00 - IP 192.168.1.1 masuk ke /
        ✅ DICATAT - Record baru dibuat
        
10:10 - IP 192.168.1.1 masuk ke /tentang-kami
        ❌ TIDAK DICATAT - Belum lewat 24 jam
        
Database: 1 record (sama, tidak tambah)

status: Masih dalam window 24 jam ⏱️
```

### Scenario 3: Visitor Kembali Besok Hari

```
10:00 - IP 192.168.1.1 masuk ke /
        ✅ DICATAT - Record 1 dibuat
        
Esok hari 10:30 - IP 192.168.1.1 masuk lagi
        ✅ DICATAT - Sudah lewat 24 jam, record baru (record 2) dibuat
        
Database: 2 records

status: Sudah lewat 24 jam, dihitung visitor baru ✓
```

### Scenario 4: IP Berbeda Hari Sama

```
10:00 - IP 192.168.1.1 masuk ke /
        ✅ DICATAT - Record 1 dibuat
        
11:00 - IP 192.168.1.2 masuk ke /
        ✅ DICATAT - IP berbeda, record 2 dibuat
        
Database: 2 records (2 visitor berbeda)

status: IP berbeda = visitor berbeda ✓
```

---

## 🛡️ Implementasi

### Database Check

```php
// Cek apakah IP sudah visit dalam 24 jam terakhir
$recentVisit = Visitor::where('ip_address', '192.168.1.1')
    ->where('created_at', '>=', now()->subHours(24))
    ->first();

if ($recentVisit) {
    return null;  // Skip, jangan insert
} else {
    // Insert record baru
    Visitor::create([...]);
}
```

### Code di VisitorTrackingService

```php
public static function track(Request $request): ?Visitor
{
    $ipAddress = self::getClientIp($request);
    
    // Cek apakah IP ini sudah visit dalam 24 jam
    $recentVisit = Visitor::where('ip_address', $ipAddress)
        ->where('created_at', '>=', now()->subHours(24))
        ->first();
    
    // Jika sudah ada, jangan insert ulang
    if ($recentVisit) {
        return null;  // ← Skip, tidak ada yang dicatat
    }
    
    // Jika belum ada, insert record baru
    return Visitor::create([...]);
}
```

---

## 📊 Contoh Data

```
ID | IP Address    | Page URL    | Created At          | Status
---|---------------|-------------|---------------------|---------
1  | 192.168.1.1   | /           | 2026-01-10 10:00:00 | ✓ Recorded
2  | 192.168.1.1   | /tentang    | -                   | ✗ Skipped (< 24h)
3  | 192.168.1.1   | /layanan    | -                   | ✗ Skipped (< 24h)
4  | 192.168.1.2   | /           | 2026-01-10 11:00:00 | ✓ Recorded (IP baru)
5  | 192.168.1.1   | /proyek     | 2026-01-11 10:05:00 | ✓ Recorded (> 24h)
```

---

## ✨ Keuntungan

| Aspek | Status |
|-------|--------|
| Tidak duplikat per halaman | ✅ Ya |
| Akurat count pengunjung | ✅ Ya |
| Database tidak penuh | ✅ Ya |
| Query cepat | ✅ Ya |
| Simple & mudah paham | ✅ Ya |

---

## 🧪 Testing

### Test dengan Command

```bash
php artisan visitor:test
```

### Manual Test

```bash
php artisan tinker
```

```php
// Lihat semua visitors
\App\Models\Visitor::all();

// Lihat visitors hari ini
\App\Models\Visitor::today()->count();

// Lihat detail visitor terakhir
\App\Models\Visitor::latest()->first();
```

---

## 📝 Konfigurasi

### Ubah durasi dari 24 jam ke custom

Edit `app/Services/VisitorTrackingService.php`:

```php
// Dari:
->where('created_at', '>=', now()->subHours(24))

// Ke:
->where('created_at', '>=', now()->subHours(1))   // 1 jam
->where('created_at', '>=', now()->subMinutes(30)) // 30 menit
->where('created_at', '>=', now()->subDays(7))    // 7 hari
```

---

## 🚀 Deploy

```bash
# Pastikan migration sudah run
php artisan migrate

# Test command
php artisan visitor:test

# Deploy!
```

---

**Status:** ✅ Ready to Use  
**Version:** 1.0.0 (IP-Based 24-Hour Tracking)  
**Updated:** January 10, 2026
