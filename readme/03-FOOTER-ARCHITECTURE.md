# FOOTER ARCHITECTURE

Footer diperlakukan sebagai bagian arsitektur,
bukan elemen dekoratif.

## PRINSIP FOOTER:

-   Modular
-   Mobile-first
-   Theme-aware
-   Accessible

---

## FOOTER COMPONENT STRUCTURE

`resources/views/components/`

```
footer.blade.php
footer/
  ├── brand.blade.php
  ├── contact.blade.php
  ├── links.blade.php
  ├── social.blade.php
  ├── copyright.blade.php
  └── theme-toggle.blade.php
```

---

## RESPONSIVE BEHAVIOR FOOTER

### Mobile (< 992px):

-   Single column
-   Links & contact menggunakan accordion
-   Touch target minimum 44px

### Desktop (>= 992px):

-   Grid 4 kolom
-   Konten selalu visible
-   Bottom section horizontal

---

## FOOTER CSS RULES

-   Semua selector prefix `footer-`
-   Tidak ada inline style
-   Theme-aware via `data-bs-theme`

---

## FOOTER JS RESPONSIBILITY

-   Accordion aktif hanya di mobile
-   Auto update tahun copyright
-   Re-init setelah Livewire SPA navigation
-   Tidak memanipulasi DOM global
