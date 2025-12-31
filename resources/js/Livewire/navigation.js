/**
 * Livewire SPA Navigation Handler
 * Digunakan oleh: resources/views/layouts/app.blade.php
 */

document.addEventListener("DOMContentLoaded", () => {
    // Apply theme BEFORE Livewire renders new DOM
    // (prevent FOUC - Flash of Unstyled Content)
    document.addEventListener("livewire:navigating", () => {
        // Apply theme sebelum DOM baru render
        if (window.Alpine && window.Alpine.store) {
            const themeStore = window.Alpine.store("theme");
            if (themeStore && typeof themeStore.apply === "function") {
                themeStore.apply();
            }
        }
    });

    // Also apply after navigation complete (failsafe)
    document.addEventListener("livewire:navigated", () => {
        // Scroll ke atas setelah navigasi SPA
        window.scrollTo({ top: 0, behavior: "smooth" });

        // Re-apply theme after SPA navigation (failsafe)
        if (window.Alpine && window.Alpine.store) {
            const themeStore = window.Alpine.store("theme");
            if (themeStore && typeof themeStore.apply === "function") {
                themeStore.apply();
            }
        }
    });
});


