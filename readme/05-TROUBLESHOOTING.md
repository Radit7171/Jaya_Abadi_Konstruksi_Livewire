# TROUBLESHOOTING & ISSUES

## LIVEWIRE SPA SETUP & TROUBLESHOOTING GUIDE

### 1. MULTIPLE ALPINE INSTANCES ERROR

**Masalah:**

-   Pesan: "Detected multiple instances of Alpine running"
-   Theme store tidak bekerja
-   JavaScript intermittent

**Penyebab:**

-   `app.js` import Alpine (instance 1)
-   Livewire juga include Alpine (instance 2)
-   Conflict menyebabkan store register ke instance yang salah

**Solusi:**

```javascript
// ❌ WRONG
import Alpine from "alpinejs";
window.Alpine = Alpine;

// ✅ CORRECT
// Alpine disediakan oleh Livewire di window.Alpine
// app.js hanya orchestrate components
```

---

### 2. THEME STORE UNDEFINED

**Masalah:**

-   Error: "Cannot read properties of undefined (reading 'current')"
-   Theme switcher tidak bekerja

**Penyebab:**

-   `x-data x-init="$store.theme.init()"` di HTML tag
-   Trigger terlalu cepat, sebelum store ter-register
-   Race condition dengan Alpine initialization

**Solusi:**

```html
<!-- ❌ WRONG -->
<html x-data x-init="$store.theme.init()">
    <!-- ✅ CORRECT -->
    <html></html>
</html>
```

---

### 3. SPA NAVIGATION TIDAK KONSISTEN

**Masalah:**

-   SPA kadang bekerja, kadang full page reload
-   Livewire navigate event kadang tidak fire

**Penyebab:**

-   `Alpine.start()` dipanggil di waktu yang salah
-   Race condition antara script loading
-   Layout middleware conflict

**Solusi:**

```javascript
// ❌ WRONG
import Alpine from "alpinejs";
Alpine.start(); // Jangan di app.js!

// ✅ CORRECT
// Layout file handle initialization
// app.js hanya import components
```

---

### 4. VITE HMR CORS BLOCKED

**Masalah:**

-   Error: "net::ERR_BLOCKED_BY_CLIENT"
-   CSS dan JS tidak ter-load

**Penyebab:**

-   Browser akses via 0.0.0.0, Vite via localhost
-   Origin mismatch

**Solusi:**

```javascript
// vite.config.js
server: {
    host: '0.0.0.0',
    port: 5173,
    hmr: {
        host: 'localhost',
        port: 5173,
    },
}

// SELALU akses via http://localhost:8000
// Jangan via http://0.0.0.0:8000 atau IP address
```

---

### 5. MIDDLEWARE CONFLICT

**Masalah:**

-   Middleware redirect guest atau CSRF validation error

**Penyebab:**

-   Overly restrictive middleware di `bootstrap/app.php`

**Solusi:**

```php
// bootstrap/app.php
->withMiddleware(function (Middleware $middleware): void {
    $middleware->use([
        \Illuminate\Http\Middleware\HandleCors::class,
    ]);
    // Jangan tambah middleware kompleks
    // Livewire handle sendiri
})
```

---

### 6. CSS TRANSITIONS CONFLICT DENGAN THEME SWITCHING

**Masalah:**

-   Visual glitches saat switch theme (light/dark)
-   Warna berflash atau tidak smooth
-   Transition pada background-color bertabrakan dengan theme change

**Penyebab:**

-   CSS transitions mencoba animate perubahan warna
-   Theme switch terjadi instant via JS
-   Race condition antara CSS animation dan JS execution
-   Background-color transition pada navbar mengganggu

**Solusi:**

1. **JavaScript Theme Store** (`resources/js/components/theme.js`)
    - Tambah class `theme-transition-disabled` saat theme change
    - Disable SEMUA transition untuk saat itu
    - Re-enable dengan requestAnimationFrame untuk smooth execution

```javascript
apply() {
    const html = document.documentElement;

    // Disable transitions temporarily
    html.classList.add('theme-transition-disabled');

    // Apply theme...
    html.setAttribute("data-bs-theme", this.current);

    // Re-enable transitions after paint
    requestAnimationFrame(() => {
        requestAnimationFrame(() => {
            html.classList.remove('theme-transition-disabled');
        });
    });
}
```

2. **Global CSS** (`resources/css/app.css`)
    - Ketika class `theme-transition-disabled` aktif, matikan semua transition

```css
html.theme-transition-disabled,
html.theme-transition-disabled * {
    transition: none !important;
    animation: none !important;
}
```

3. **Navbar CSS** (`resources/css/components/navbar.css`)
    - Remove `background-color` dari transition
    - Hanya transition `box-shadow` dan `border-color`
    - Background theme change instant, tanpa flicker

```css
.navbar {
    transition: box-shadow 0.3s ease, border-color 0.3s ease;
    /* JANGAN transition background-color */
}
```

4. **Theme Toggle CSS** (`resources/css/components/theme-toggle.css`)
    - Tambah `background-color` ke transition untuk pseudo-element
    - Ini untuk handle primary color change yang smooth

```css
.theme-capsule::before {
    transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1), background-color
            0.3s cubic-bezier(0.4, 0, 0.2, 1);
}
```

**Hasil:**

-   ✅ Theme switch tanpa glitch visual
-   ✅ Transition on hover tetap smooth
-   ✅ Tidak ada flashing atau color pop
-   ✅ Konsisten di light & dark mode

---

## DEVELOPMENT CHECKLIST

Sebelum commit perubahan frontend, pastikan:

-   [ ] Tidak ada "multiple Alpine instances" di console
-   [ ] SPA navigation berfungsi (URL change, no reload)
-   [ ] Theme switcher bekerja (light/dark)
-   [ ] Tidak ada race condition di Livewire navigasi
-   [ ] Vite HMR bekerja (file save instant reload)
-   [ ] Console log bersih (no errors/warnings)

---

## TESTING COMMANDS

```bash
# Clear cache
php artisan cache:clear
php artisan view:clear
php artisan config:clear

# Start development
npm run dev        # Terminal 1
php artisan serve --host=0.0.0.0 --port=8000  # Terminal 2

# Access via
# http://localhost:8000
```

---

## COMMON GOTCHAS

1. **Jangan akses via 0.0.0.0:8000 atau IP**
    - Browser tidak bisa akses 0.0.0.0
    - Vite HMR akan blocked
    - Gunakan localhost:8000

2. **Jangan import Alpine di app.js**
    - Livewire sudah provide `window.Alpine`
    - Dual instance akan menyebabkan masalah
    - Percayakan ke Livewire

3. **Jangan gunakan x-data x-init di HTML root**
    - Trigger sebelum stores ter-register
    - Akan cause undefined store errors
    - Gunakan `alpine:init` event listener

4. **Jangan manual Alpine.start() atau Alpine.reinit()**
    - Livewire handle otomatis
    - Bisa cause race condition
    - Biarkan framework yang manage lifecycle
