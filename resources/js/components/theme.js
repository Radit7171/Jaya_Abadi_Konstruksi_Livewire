/**
 * Alpine Theme Store
 * Registers when alpine:init event fires
 */

document.addEventListener("alpine:init", () => {
    // window.Alpine is provided by Livewire
    const Alpine = window.Alpine;
    if (!Alpine) return;

    // Register theme store
    Alpine.store("theme", {
        current: "system",

        init() {
            const savedTheme = localStorage.getItem("theme");
            if (savedTheme) {
                this.current = savedTheme;
            }
            this.apply();
        },

        set(mode) {
            this.current = mode;
            localStorage.setItem("theme", mode);
            this.apply();
        },

        apply() {
            const html = document.documentElement;

            if (this.current === "light") {
                html.setAttribute("data-bs-theme", "light");
                return;
            }

            if (this.current === "dark") {
                html.setAttribute("data-bs-theme", "dark");
                return;
            }

            // system - detect preference
            const prefersDark = window.matchMedia(
                "(prefers-color-scheme: dark)"
            ).matches;

            html.setAttribute(
                "data-bs-theme",
                prefersDark ? "dark" : "light"
            );
        },
    });

    // Listen untuk perubahan system theme
    window
        .matchMedia("(prefers-color-scheme: dark)")
        .addEventListener("change", () => {
            const themeStore = Alpine.store("theme");
            if (themeStore && themeStore.current === "system") {
                themeStore.apply();
            }
        });

    // Initialize theme after store is created
    const themeStore = Alpine.store("theme");
    if (themeStore && themeStore.init) {
        themeStore.init();
    }
});
