/**
 * Livewire SPA Navigation Handler
 * Digunakan oleh: resources/views/layouts/app.blade.php
 */

document.addEventListener("DOMContentLoaded", () => {
    // Scroll ke atas setelah navigasi SPA
    document.addEventListener("livewire:navigated", () => {
        window.scrollTo({ top: 0, behavior: "smooth" });
    });
});
