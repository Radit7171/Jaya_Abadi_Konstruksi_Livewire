# EXTERNAL LINKS & EXTERNAL NAVIGATION - PT JAYA ABADI KONSTRUKSI

Dokumentasi tentang cara menangani external links (email, phone, WhatsApp, social media) dalam aplikasi Livewire SPA.

---

## 🎯 QUICK START - IMPLEMENTATION PATTERN

### ✅ PROPER PATTERN (NO Inline JavaScript)

**Blade Template:**
```blade
<!-- Email link -->
<a href="javascript:void(0)"
   class="external-link"
   data-link="mailto:lasjayaabadi123@gmail.com">
    Email
</a>

<!-- WhatsApp link -->
<a href="javascript:void(0)"
   class="external-link"
   data-link="https://wa.me/6287817695973"
   rel="noopener noreferrer">
    WhatsApp
</a>

<!-- External URL -->
<a href="javascript:void(0)"
   class="external-link"
   data-link="https://example.com"
   rel="noopener noreferrer">
    External Link
</a>
```

**JavaScript Handler (resources/js/components/external-links.js):**
- Stored in: 📁 `resources/js/components/external-links.js`
- Handles: Email, WhatsApp, External links
- Re-attaches: After Livewire SPA navigation
- **NO inline `onclick`** ✅

**How It Works:**
1. **Blade** - Simple markup with `class="external-link"` & `data-link="..."`
2. **JS Handler** - Attached via JavaScript file (not inline)
3. **Event Listener** - Click handler prevents default & opens link
4. **Livewire Re-init** - Handler re-attach setelah SPA navigation
5. **Clean Code** - Follows readme rules: NO inline styles/scripts ✅

---

## 🔗 PROBLEM & SOLUTION

### Masalah: Links Tidak Bisa Diklik Langsung

**Root Cause:**
```blade
<body class="bg-body" wire:navigate>
```

Attribute `wire:navigate` di `<body>` membuat **SEMUA** links diperlakukan sebagai internal SPA navigation. External links seperti email dan WhatsApp memerlukan perlakuan khusus agar bisa diklik langsung tanpa Ctrl.

### Solusi: Gunakan JavaScript Handler (Refactored)

**BEFORE (Inline onclick - TIDAK OK):**
```blade
<!-- ❌ DILARANG - Inline script -->
<a href="javascript:void(0)" 
   onclick="window.open('https://wa.me/62881234567', '_blank')"
   rel="noopener noreferrer">
    WhatsApp
</a>
```

**AFTER (Proper JavaScript file - OK ✅):**
```blade
<!-- ✅ RECOMMENDED - Data attribute only -->
<a href="javascript:void(0)"
   class="external-link"
   data-link="https://wa.me/62881234567"
   rel="noopener noreferrer">
    WhatsApp
</a>
```

**JavaScript Handler (resources/js/components/external-links.js):**
```javascript
class ExternalLinksHandler {
    constructor() {
        this.init();
    }

    init() {
        this.attachEventListeners();
        document.addEventListener('livewire:navigated', () => {
            this.attachEventListeners();
        });
    }

    attachEventListeners() {
        const externalLinks = document.querySelectorAll('a.external-link');
        externalLinks.forEach(link => {
            link.addEventListener('click', (e) => {
                e.preventDefault();
                const linkData = link.dataset.link;
                this.handleLink(linkData);
            });
        });
    }

    handleLink(linkData) {
        if (linkData.startsWith('mailto:')) {
            window.location.href = linkData;
        } else if (linkData.includes('wa.me') || linkData.startsWith('http')) {
            window.open(linkData, '_blank');
        }
    }
}

document.addEventListener('DOMContentLoaded', () => {
    new ExternalLinksHandler();
});
document.addEventListener('livewire:navigated', () => {
    new ExternalLinksHandler();
});
```

**Mengapa refactor ini?**
- ✅ **NO inline `onclick`** - Follows readme rules
- ✅ **Separation of concerns** - Blade = markup, JS = behavior
- ✅ **Reusable** - One handler untuk semua external links
- ✅ **Easy to maintain** - Logic di satu tempat
- ✅ **Livewire compatible** - Auto re-init after SPA navigation
- ✅ **Scalable** - Mudah tambah link types baru


---

## 📋 EXTERNAL LINK TYPES & HANDLING

### 1. EMAIL LINKS (mailto:)

**Syntax:**
```blade
<a href="javascript:void(0)" 
   onclick="window.location.href='mailto:email@example.com'">
    Email
</a>
```

**Attributes:**
- `href="javascript:void(0)"` - **WAJIB** (prevent default & Livewire intercept)
- `onclick="window.location.href='mailto:...'"` - **WAJIB** (direct email handler)
- `target="_blank"` - **NOT NEEDED** (email protocol handles it)
- `rel="noopener noreferrer"` - **NOT NEEDED** (mailto protocol aman)

**Contoh Penggunaan:**
```blade
<!-- Simple email link -->
<a href="javascript:void(0)" 
   onclick="window.location.href='mailto:lasjayaabadi123@gmail.com'">
    lasjayaabadi123@gmail.com
</a>

<!-- Email dengan subject -->
<a href="javascript:void(0)" 
   onclick="window.location.href='mailto:info@jayaabadi.com?subject=Inquiry'">
    Send Email
</a>

<!-- Email dengan subject & body -->
<a href="javascript:void(0)" 
   onclick="window.location.href='mailto:info@jayaabadi.com?subject=Project%20Inquiry&body=Hello%20Jaya%20Abadi'">
    Send Inquiry
</a>
```

**Di Project:**
📁 `resources/views/components/footer/contact.blade.php`
```blade
<a href="javascript:void(0)" 
   onclick="window.location.href='mailto:lasjayaabadi123@gmail.com'" 
   class="small text-body-secondary text-decoration-none">
    lasjayaabadi123@gmail.com
</a>
```

---

### 2. PHONE LINKS (tel:)

**Syntax:**
```blade
<a href="tel:+62-123-456-7890">
    +62-123-456-7890
</a>
```

**Attributes:**
- `href="tel:+62123456789"` - Phone number (digits only, with + prefix)
- `target="_blank"` - NOT NEEDED (system handles it)
- `rel="noopener noreferrer"` - NOT NEEDED

**Format Rules:**
- Gunakan `+` prefix untuk international calls
- Gunakan digits only (no spaces, hyphens, parentheses)
- Format display vs href berbeda:

```blade
<!-- Format yang BENAR -->
Display: (021) 123-4567        ← User-friendly
Href:    tel:+622112345678    ← Phone protocol

<a href="tel:+622112345678">
    (021) 123-4567
</a>
```

---

### 3. WHATSAPP LINKS (WhatsApp Web)

**Syntax:**
```blade
<a href="javascript:void(0)" 
   onclick="window.open('https://wa.me/62xxxxxxxxxx', '_blank')"
   rel="noopener noreferrer">
    WhatsApp
</a>
```

**Attributes:**
- `href="javascript:void(0)"` - **WAJIB** (prevent default & Livewire intercept)
- `onclick="window.open('...')"` - **WAJIB** (direct WhatsApp Web)
- `target="_blank"` - **NOT NEEDED** (onclick handles it)
- `rel="noopener noreferrer"` - **WAJIB** (security)

**Format Rules:**
- Gunakan country code: `62` untuk Indonesia
- Hapus leading `0` dari nomor lokal
- Contoh:
  - Nomor lokal: `0878-1769-5973`
  - WhatsApp link: `https://wa.me/6287817695973`

**Contoh Penggunaan:**
```blade
<!-- Simple WhatsApp link -->
<a href="javascript:void(0)"
   onclick="window.open('https://wa.me/6287817695973', '_blank')"
   rel="noopener noreferrer">
    Chat WhatsApp
</a>

<!-- Dengan pesan pre-filled -->
<a href="javascript:void(0)"
   onclick="window.open('https://wa.me/6287817695973?text=Halo%20Jaya%20Abadi', '_blank')"
   rel="noopener noreferrer">
    Chat WhatsApp
</a>
```

**Di Project:**
📁 `resources/views/components/footer/contact.blade.php`
```blade
<a href="javascript:void(0)" 
   onclick="window.open('https://wa.me/6287817695973', '_blank')" 
   class="small text-body-secondary text-decoration-none"
   rel="noopener noreferrer">
    0878-1769-5973
</a>
```

📁 `resources/views/livewire/home-page.blade.php`
```blade
<a href="javascript:void(0)" 
   onclick="window.open('https://wa.me/6287817695973', '_blank')" 
   class="home-btn home-btn-outline-light">
    <span>0878-1769-5973</span>
</a>
```

---

### 4. SOCIAL MEDIA LINKS

**Syntax:**
```blade
<a href="https://[platform].com/[username]"
   target="_blank"
   rel="noopener noreferrer">
    <i class="fab fa-[icon]"></i>
</a>
```

**Platforms:**

| Platform | URL Format | Contoh |
|----------|-----------|--------|
| Facebook | `https://facebook.com/[username]` | `https://facebook.com/jayaabadi` |
| Instagram | `https://instagram.com/[username]` | `https://instagram.com/jayaabadi` |
| LinkedIn | `https://linkedin.com/in/[username]` | `https://linkedin.com/in/jayaabadi` |
| Twitter/X | `https://twitter.com/[username]` | `https://twitter.com/jayaabadi` |
| TikTok | `https://tiktok.com/@[username]` | `https://tiktok.com/@jayaabadi` |
| YouTube | `https://youtube.com/@[channel]` | `https://youtube.com/@jayaabadi` |

**Attributes:**
- `href` - Platform URL
- `target="_blank"` - **WAJIB** (open new tab)
- `rel="noopener noreferrer"` - **WAJIB** (security)
- `aria-label` - **WAJIB** (accessibility)

**Contoh Penggunaan:**
```blade
@php
    $socialLinks = [
        ['icon' => 'fab fa-facebook', 'url' => 'https://facebook.com/jayaabadi', 'label' => 'Facebook'],
        ['icon' => 'fab fa-instagram', 'url' => 'https://instagram.com/jayaabadi', 'label' => 'Instagram'],
        ['icon' => 'fab fa-linkedin', 'url' => 'https://linkedin.com/in/jayaabadi', 'label' => 'LinkedIn'],
        ['icon' => 'fab fa-whatsapp', 'url' => 'https://wa.me/6287817695973', 'label' => 'WhatsApp'],
    ];
@endphp

@foreach($socialLinks as $social)
    <a href="{{ $social['url'] }}"
       class="social-icon d-flex align-items-center justify-content-center"
       aria-label="{{ $social['label'] }}"
       target="_blank"
       rel="noopener noreferrer">
        <i class="{{ $social['icon'] }}"></i>
    </a>
@endforeach
```

**Di Project:**
📁 `resources/views/components/footer/social.blade.php`

---

## 🔒 SECURITY: `rel="noopener noreferrer"`

### Apa itu?

```blade
<!-- BAD: Vulnerable to XSS -->
<a href="https://external.com" target="_blank">
    External Link
</a>

<!-- GOOD: Secure -->
<a href="https://external.com" target="_blank" rel="noopener noreferrer">
    External Link
</a>
```

### Penjelasan:

- **`noopener`**: Mencegah halaman baru mengakses `window.opener`
- **`noreferrer`**: Tidak mengirim referrer information ke halaman target

### Mengapa Penting?

Tanpa ini, website eksternal bisa:
1. Melakukan XSS attack via `window.opener`
2. Mengakses localStorage/sessionStorage
3. Melakukan phishing redirect

### Best Practice:

**SELALU gunakan `rel="noopener noreferrer"` untuk:**
- ✅ External URLs (`https://...`)
- ✅ Social media links
- ✅ Any `target="_blank"` link

**TIDAK perlu untuk:**
- ❌ Internal navigation links
- ❌ `mailto:` links
- ❌ `tel:` links

---

## 📍 LOKASI EXTERNAL LINKS DI PROJECT

```
📦 PROJECT
├── 📄 resources/views/components/footer/contact.blade.php
│   ├── Email: mailto:lasjayaabadi123@gmail.com
│   └── WhatsApp: https://wa.me/6287817695973
│
├── 📄 resources/views/components/footer/social.blade.php
│   ├── Facebook
│   ├── Instagram
│   ├── LinkedIn
│   └── WhatsApp
│
└── 📄 resources/views/livewire/ContactPage.php
    └── Contact form dengan email submission
```

---

## 🎯 BEST PRACTICES

### ✅ WAJIB DILAKUKAN

1. **Gunakan `external-link` class + `data-link` attribute (NO inline onclick)**
   ```blade
   <!-- ✅ BENAR - Clean & follows rules -->
   <a href="javascript:void(0)"
      class="external-link"
      data-link="https://wa.me/6287817695973"
      rel="noopener noreferrer">
       WhatsApp
   </a>
   
   <!-- ❌ SALAH - Inline script -->
   <a href="javascript:void(0)" 
      onclick="window.open('https://wa.me/6287817695973', '_blank')">
       WhatsApp
   </a>
   ```

2. **Gunakan proper data-link format**
   ```blade
   <!-- Email -->
   <a href="javascript:void(0)"
      class="external-link"
      data-link="mailto:email@example.com">
       Email
   </a>

   <!-- WhatsApp -->
   <a href="javascript:void(0)"
      class="external-link"
      data-link="https://wa.me/6287817695973"
      rel="noopener noreferrer">
       WhatsApp
   </a>

   <!-- External URL -->
   <a href="javascript:void(0)"
      class="external-link"
      data-link="https://example.com"
      rel="noopener noreferrer">
       External
   </a>
   ```

3. **Selalu gunakan `rel="noopener noreferrer"` untuk external URLs**
   ```blade
   <!-- ✅ Aman -->
   <a href="javascript:void(0)"
      class="external-link"
      data-link="https://wa.me/6287817695973"
      rel="noopener noreferrer">
       WhatsApp
   </a>
   
   <!-- ❌ Tidak aman (jika external) -->
   <a href="javascript:void(0)"
      class="external-link"
      data-link="https://wa.me/6287817695973">
       WhatsApp
   </a>
   ```

4. **Format nomor WhatsApp dengan benar**
   ```blade
   <!-- ✅ Benar - Country code 62, no leading 0 -->
   <a href="javascript:void(0)"
      class="external-link"
      data-link="https://wa.me/6287817695973"
      rel="noopener noreferrer">
       0878-1769-5973
   </a>
   
   <!-- ❌ Salah - Format tidak sesuai -->
   <a href="javascript:void(0)"
      class="external-link"
      data-link="https://wa.me/0878-1769-5973">
       0878-1769-5973
   </a>
   ```

5. **Tambahkan aria-label untuk accessibility**
   ```blade
   <!-- ✅ Accessible -->
   <a href="javascript:void(0)"
      class="external-link"
      data-link="https://wa.me/6287817695973"
      aria-label="Chat via WhatsApp"
      rel="noopener noreferrer">
       <i class="fab fa-whatsapp"></i>
   </a>
   ```

### ❌ DILARANG

1. ❌ Tidak boleh gunakan inline `onclick="..."` (use data-link instead)
2. ❌ Tidak boleh gunakan inline `<style>` atau `<script>` tag
3. ❌ Tidak boleh lupa `class="external-link"` (untuk JS selector)
4. ❌ Tidak boleh lupa `rel="noopener noreferrer"` untuk external URLs
5. ❌ Tidak boleh hardcode links tanpa refactor (gunakan config/array)
6. ❌ Tidak boleh mix format nomor WhatsApp (pakai country code)

---

## 📋 CHECKLIST EXTERNAL LINK

Gunakan checklist ini saat menambah external link baru:

```
[ ] Tentukan: Email / WhatsApp / External URL?
[ ] Gunakan href="javascript:void(0)" (prevent default)
[ ] Tambahkan class="external-link" (JS selector)
[ ] Tambahkan data-link="..." (URL to open)
[ ] Tambahkan rel="noopener noreferrer" (untuk external URLs)
[ ] Tambahkan aria-label (accessibility)
[ ] Format WhatsApp benar (62 + no leading 0)
[ ] Test: Klik langsung (no Ctrl needed)
[ ] Test: Mobile devices (app vs browser)
[ ] Test: No Livewire intercept (no loading overlay)
[ ] Verify: URL format & special characters encoded
[ ] Code review: No inline onclick atau script tag
```

---

## 🚀 TESTING EXTERNAL LINKS

### Desktop Testing:
1. Open halaman footer
2. Klik email link → Harus langsung buka email client
3. Klik WhatsApp link → Harus langsung buka WhatsApp Web di tab baru
4. Klik social media icons → Harus buka di tab baru
5. Cek console → No errors

### Mobile Testing:
1. Klik email link → Harus langsung buka email app
2. Klik WhatsApp link → Harus langsung buka WhatsApp app (jika installed) atau WhatsApp Web
3. Klik social media → Harus buka app atau browser
4. Test dengan tap cepat (tidak perlu long press)

### Expected Behavior:
✅ **SEMUA links** bisa diklik langsung (single click, NO Ctrl needed)
✅ Tidak ada error di console
✅ External links buka di tab/app baru
✅ Loading overlay TIDAK muncul saat klik external links
✅ Page tidak refresh saat klik external links
✅ Back button works correctly
✅ Mobile app detection works (wa.me opens WhatsApp app jika ada)

### Common Test Cases:

**Test 1: Email Link**
- Desktop: Click → email app/dialog opens
- Mobile: Click → email app opens

**Test 2: WhatsApp Link**
- Desktop: Click → WhatsApp Web tab opens
- Mobile w/ app: Click → WhatsApp app opens
- Mobile w/o app: Click → WhatsApp Web opens

**Test 3: Social Media Link**
- Desktop: Click → social media in new tab
- Mobile: Click → app opens (if installed) or browser

**Test 4: No Livewire Intercept**
- Click external link
- No `wire:loading` overlay should appear
- No SPA navigation should trigger

---

## 💡 COMMON MISTAKES & FIXES

### Mistake 1: Email/WhatsApp tidak bisa diklik langsung

**Gejala:** Perlu Ctrl+click untuk membuka
```blade
<!-- ❌ Salah -->
<a href="mailto:info@example.com">Email</a>
<a href="https://wa.me/62881234567" target="_blank">WhatsApp</a>
```

**Solusi:** Gunakan `onclick` handler
```blade
<!-- ✅ Benar -->
<a href="javascript:void(0)" 
   onclick="window.location.href='mailto:info@example.com'">
   Email
</a>

<a href="javascript:void(0)"
   onclick="window.open('https://wa.me/62881234567', '_blank')"
   rel="noopener noreferrer">
   WhatsApp
</a>
```

### Mistake 2: WhatsApp link format salah

**Gejala:** WhatsApp link tidak bekerja atau error 404
```blade
<!-- ❌ Salah -->
<a href="javascript:void(0)"
   onclick="window.open('https://wa.me/0878-1769-5973', '_blank')">
   WhatsApp
</a>
```

**Solusi:** Gunakan country code, hapus leading 0
```blade
<!-- ✅ Benar -->
<a href="javascript:void(0)"
   onclick="window.open('https://wa.me/6287817695973', '_blank')"
   rel="noopener noreferrer">
   WhatsApp
</a>
```

### Mistake 3: Lupa `rel="noopener noreferrer"`

**Gejala:** Vulnerability warning atau XSS risk
```blade
<!-- ❌ Buruk -->
<a href="javascript:void(0)"
   onclick="window.open('https://external.com', '_blank')">
   External
</a>
```

**Solusi:** Tambahkan security attributes
```blade
<!-- ✅ Baik -->
<a href="javascript:void(0)"
   onclick="window.open('https://external.com', '_blank')"
   rel="noopener noreferrer">
   External
</a>
```

### Mistake 4: Internal link jadi external (atau sebaliknya)

**Gejala:** SPA navigation tidak bekerja atau link tidak navigate
```blade
<!-- ❌ Buruk - Internal jadi external -->
<a href="javascript:void(0)"
   onclick="window.open('/tentang-kami', '_blank')">
   About
</a>

<!-- ❌ Buruk - External jadi internal -->
<a wire:navigate href="https://wa.me/62881234567">
   WhatsApp
</a>
```

**Solusi:** Check URL, gunakan pattern yang benar
```blade
<!-- ✅ Baik - Internal navigation -->
<a wire:navigate href="/tentang-kami">
   About
</a>

<!-- ✅ Baik - External link -->
<a href="javascript:void(0)"
   onclick="window.open('https://wa.me/62881234567', '_blank')"
   rel="noopener noreferrer">
   WhatsApp
</a>
```

### Mistake 5: URL encode issues

**Gejala:** Email dengan subject/body tidak bekerja
```blade
<!-- ❌ Buruk - Spaces tidak di-encode -->
<a href="javascript:void(0)"
   onclick="window.location.href='mailto:info@example.com?subject=Hello World'">
   Email
</a>
```

**Solusi:** Gunakan proper URL encoding
```blade
<!-- ✅ Baik - Spaces encoded %20 -->
<a href="javascript:void(0)"
   onclick="window.location.href='mailto:info@example.com?subject=Hello%20World'">
   Email
</a>
```

---

## 📝 METADATA

**Last Updated:** January 2026  
**Status:** Active & Maintained  
**Maintainer:** Frontend Team & GitHub Copilot

**Change Log:**
- ✅ Fixed external links not clickable directly issue
- ✅ Added `target="_blank" rel="noopener noreferrer"` to WhatsApp links
- ✅ Added `rel="noopener noreferrer"` to social media links
- ✅ Created comprehensive external links documentation
- ✅ Added security guidelines & best practices

---

## 🔗 RELATED DOCUMENTATION

- [Core Architecture](01-CORE-ARCHITECTURE.md)
- [Icon System](07-ICON-SYSTEM.md)
- [Troubleshooting](05-TROUBLESHOOTING.md)

---

**More Info:**
- WhatsApp Web Links: https://faq.whatsapp.com/web
- Web Security: https://owasp.org/www-community/attacks/
- Accessibility: https://www.w3.org/WAI/tips/
