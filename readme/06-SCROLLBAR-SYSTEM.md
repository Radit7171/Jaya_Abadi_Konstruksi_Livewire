# GLOBAL SCROLLBAR SYSTEM

Sebagai bagian dari peningkatan kualitas UI global,
aplikasi ini menggunakan **custom scrollbar CSS**
untuk menggantikan scrollbar default browser.

Scrollbar diperlakukan sebagai **global UI concern**,
bukan sebagai komponen terpisah.

## TUJUAN:

-   Memberikan tampilan yang lebih profesional & corporate
-   Konsisten dengan identitas industri (konstruksi, baja)
-   Mendukung Light / Dark Mode
-   Tidak mengganggu SPA navigation & theme switching
-   Tetap aman dan maintainable jangka panjang

---

## DESIGN PRINCIPLES (SCROLLBAR)

Scrollbar dirancang dengan prinsip:

-   Clean & minimal
-   Tidak mencolok
-   Tidak menggunakan animasi berlebihan
-   Tidak mengganggu konten utama
-   Konsisten di seluruh halaman aplikasi

Warna dan ukuran scrollbar mengikuti **CSS Variables**
dan otomatis menyesuaikan dengan theme aktif.

---

## IMPLEMENTATION DETAILS

**IMPLEMENTASI:**

-   CSS only (tanpa JavaScript)
-   Didefinisikan di: `resources/css/app.css`
-   Menggunakan CSS Variables
-   Theme-aware via atribut:

```html
<html data-bs-theme="light|dark">
```

**BROWSER SUPPORT:**

-   Chrome / Edge / Safari (WebKit scrollbar)
-   Firefox (scrollbar-color)
-   Browser yang tidak mendukung akan fallback ke default scrollbar
    tanpa menyebabkan error atau layout issue.

---

## ARCHITECTURE COMPLIANCE

Custom scrollbar ini **WAJIB mematuhi arsitektur frontend**:

✔ CSS hanya untuk styling  
✔ Tidak ada inline style  
✔ Tidak ada JavaScript behavior  
✔ Tidak override Bootstrap component  
✔ Tidak terikat ke Blade atau Livewire lifecycle

**Scrollbar TIDAK:**

-   Menggunakan JavaScript
-   Menggunakan event listener
-   Mengikat ke SPA navigation
-   Mengganggu theme switching logic

---

## THEME SYSTEM INTEGRATION

Scrollbar terintegrasi penuh dengan sistem tema:

**Light Mode:**

-   Track terang
-   Thumb netral abu-abu
-   Hover lebih gelap untuk affordance visual

**Dark Mode:**

-   Track gelap
-   Thumb kontras sedang
-   Hover lebih terang untuk visibility

**Theme switching:**

-   Tidak menggunakan transition
-   Aman terhadap class `theme-transition-disabled`
-   Tidak menyebabkan flicker atau visual glitch

---

## MAINTAINABILITY NOTES

**ATURAN:**

-   Custom scrollbar hanya boleh didefinisikan di `app.css`
-   Perubahan warna / ukuran dilakukan via CSS Variables
-   Tidak diperbolehkan override scrollbar di level component
-   Tidak diperbolehkan custom scrollbar per halaman

**Pendekatan ini memastikan:**

-   Konsistensi UI global
-   Mudah dipahami oleh developer & AI
-   Aman untuk scaling jangka panjang
-   Zero technical debt
