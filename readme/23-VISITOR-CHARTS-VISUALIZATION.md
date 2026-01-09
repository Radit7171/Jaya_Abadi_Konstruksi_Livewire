# 📊 VISITOR CHARTS & VISUALIZATION

## Overview

Sistem visualisasi data pengunjung dengan **Chart.js** yang menampilkan berbagai metrik visitor dalam bentuk grafik interaktif dan menarik di admin dashboard.

---

## 📁 Files Created

```
app/Livewire/Admin/
  └── VisitorCharts.php (Livewire component untuk charts)

resources/views/livewire/admin/
  └── visitor-charts.blade.php (View dengan Chart.js)

Updated:
  └── resources/views/livewire/admin/dashboard-page.blade.php
```

---

## 🎯 Charts yang Tersedia

### 1. **Line Chart - Tren Kunjungan** 📈
Menampilkan tren kunjungan pengunjung dengan opsi:
- **Harian** - 30 hari terakhir
- **Mingguan** - 12 minggu terakhir
- **Bulanan** - 12 bulan terakhir
- **Tahunan** - 5 tahun terakhir

### 2. **Doughnut Chart - Distribusi Perangkat** 📱
Menunjukkan breakdown pengunjung berdasarkan tipe perangkat:
- Desktop
- Mobile
- Tablet
- Pie chart dengan persentase

### 3. **Bar Chart - Browser Pengunjung** 🌐
Menampilkan browser yang paling sering digunakan:
- Top 8 browsers
- Horizontal bar chart
- Sortir berdasarkan jumlah kunjungan

---

## 🚀 Cara Menggunakan

### Di Admin Dashboard

Charts sudah otomatis terintegrasi di dashboard. Anda bisa:

1. **Lihat Tren Kunjungan**
   - Klik tombol "Harian", "Mingguan", "Bulanan", atau "Tahunan"
   - Line chart akan update otomatis

2. **Analisis Perangkat**
   - Lihat pie chart distribusi device
   - Hover untuk melihat persentase detail

3. **Monitor Browser**
   - Lihat bar chart browser yang digunakan
   - Identify most used browsers

---

## 💻 Component Methods

### `VisitorCharts` Component

#### `getDailyData(): array`
Dapatkan data kunjungan 30 hari terakhir
```php
$data = $this->getDailyData();
// Returns: ['labels' => [...], 'data' => [...], 'period' => '30 Hari Terakhir']
```

#### `getWeeklyData(): array`
Dapatkan data kunjungan 12 minggu terakhir
```php
$data = $this->getWeeklyData();
// Returns: ['labels' => ['W01', 'W02', ...], 'data' => [...]]
```

#### `getMonthlyData(): array`
Dapatkan data kunjungan 12 bulan terakhir
```php
$data = $this->getMonthlyData();
// Returns: ['labels' => ['Jan 2025', 'Feb 2025', ...], 'data' => [...]]
```

#### `getYearlyData(): array`
Dapatkan data kunjungan 5 tahun terakhir
```php
$data = $this->getYearlyData();
// Returns: ['labels' => ['2021', '2022', ...], 'data' => [...]]
```

#### `getDeviceData(): array`
Dapatkan distribusi perangkat
```php
$data = $this->getDeviceData();
// Returns: ['labels' => ['Desktop', 'Mobile', 'Tablet'], 'data' => [750, 400, 100]]
```

#### `getBrowserData(): array`
Dapatkan top 8 browsers
```php
$data = $this->getBrowserData();
// Returns: ['labels' => ['Chrome', 'Firefox', ...], 'data' => [...]]
```

#### `getSelectedData(): array`
Dapatkan data berdasarkan periode yang dipilih
```php
$data = $this->getSelectedData();
// Returns: data untuk periode yang aktif
```

---

## 📊 Chart Configuration

### Chart.js Library
- **CDN**: `https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js`
- **Version**: 4.4.0
- **Type**: Line, Doughnut, Bar charts

### Styling
- **Line Chart**: Blue color scheme dengan gradient fill
- **Device Chart**: Multiple colors untuk setiap device
- **Browser Chart**: Horizontal bar chart dengan colors
- **Responsive**: Otomatis resize sesuai screen size

---

## 🎨 Customization

### Mengubah Warna Chart

Edit di `visitor-charts.blade.php`:

```javascript
// Ubah warna line chart
borderColor: '#0d6efd', // Blue
backgroundColor: 'rgba(13, 110, 253, 0.1)',
```

### Mengubah Periode Default

Edit di `VisitorCharts.php`:

```php
public $chartPeriod = 'daily'; // Ganti dengan: weekly, monthly, yearly
```

### Menambah Chart Baru

```php
// Di VisitorCharts.php - tambah method baru
public function getCustomData(): array
{
    // Logic untuk custom data
    return ['labels' => [...], 'data' => [...]];
}

// Di visitor-charts.blade.php - tambah canvas
<canvas id="customChart"></canvas>

// Di @script section - tambah chart initialization
new Chart(customCtx, { ... });
```

---

## 📈 Data Points

### Setiap Chart Menampilkan:

**Line Chart:**
- Jumlah kunjungan per periode
- Tooltip interaktif
- Smoothed line (tension: 0.4)
- Point indicators

**Device Chart:**
- Jumlah pengunjung per device type
- Persentase dari total
- Doughnut style untuk visual appeal

**Browser Chart:**
- Horizontal bars untuk kemudahan reading
- Sorted by count (terbanyak di atas)
- Limited to top 8 browsers

---

## 🎯 Fitur Interaktif

✅ **Hover Effects** - Tooltip muncul saat hover  
✅ **Period Selector** - Tombol untuk switch periode  
✅ **Responsive** - Otomatis resize di mobile  
✅ **Smooth Animations** - Chart animate saat load  
✅ **Percentage Display** - Doughnut chart show %  
✅ **Live Update** - Wire:click untuk update data  

---

## 📱 Mobile Friendly

Charts sudah responsive dan bekerja baik di:
- Desktop (full view)
- Tablet (stacked layout)
- Mobile (full width, scrollable)

---

## 🔄 Real-time Updates

Untuk update charts secara real-time, gunakan Livewire polling:

```blade
<livewire:admin.visitor-charts wire:poll-5000 />
```

Ini akan refresh data setiap 5 detik.

---

## 🐛 Troubleshooting

**Q: Charts tidak muncul?**
- ✅ Pastikan Chart.js CDN accessible
- ✅ Check browser console untuk errors
- ✅ Pastikan ada data visitors di database

**Q: Data terlihat salah?**
- ✅ Check timezone di Laravel config
- ✅ Verify data di database
- ✅ Check query logic di methods

**Q: Chart sangat lambat?**
- ✅ Gunakan wire:poll dengan interval lebih besar
- ✅ Limit data yang ditampilkan
- ✅ Index database untuk faster queries

---

## 📊 Example Data

### Daily Chart (30 days)
```
Day 1: 45 visitors
Day 2: 67 visitors
Day 3: 52 visitors
...
Day 30: 89 visitors
```

### Device Distribution
```
Desktop: 750 (60%)
Mobile: 400 (32%)
Tablet: 50 (4%)
```

### Top Browsers
```
Chrome: 650
Firefox: 300
Safari: 150
Edge: 100
...
```

---

## 💡 Tips & Best Practices

1. **Gunakan Period Selector** - Jangan hanya lihat daily, cek juga trend mingguan/bulanan
2. **Monitor Device Types** - Understand user device preferences
3. **Check Browser Stats** - Pastikan website compatible dengan browser populer
4. **Set Up Alerts** - Jika traffic drop significantly, investigate cause
5. **Export Data** - Save chart screenshots untuk reporting

---

## 🎓 Integrasi dengan Stats Component

Visitor Charts terintegrasi dengan `VisitorStats` component:

```blade
<!-- Dashboard menampilkan keduanya -->
<livewire:admin.visitor-charts />
<livewire:admin.visitor-stats />
```

Bersama-sama memberikan gambaran lengkap tentang visitor analytics.

---

**Charts & Visualization Siap Digunakan! 🚀**

Akses di: Admin Dashboard → Scroll ke bawah untuk melihat charts

