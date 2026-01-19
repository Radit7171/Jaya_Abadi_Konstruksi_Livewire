/**
 * Alpine Theme Store
 * Registers when alpine:init event fires
 */

const setupThemeStore = () => {
    // window.Alpine is provided by Livewire
    const Alpine = window.Alpine;
    if (!Alpine || Alpine.store("theme")) return;

    console.log('Registering theme store...');

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

            // Disable transitions temporarily to prevent visual glitches
            html.classList.add('theme-transition-disabled');

            if (this.current === "light") {
                html.setAttribute("data-bs-theme", "light");
            } else if (this.current === "dark") {
                html.setAttribute("data-bs-theme", "dark");
            } else {
                // system - detect preference
                const prefersDark = window.matchMedia(
                    "(prefers-color-scheme: dark)"
                ).matches;

                html.setAttribute(
                    "data-bs-theme",
                    prefersDark ? "dark" : "light"
                );
            }

            // Re-enable transitions after theme change
            setTimeout(() => {
                html.classList.remove('theme-transition-disabled');
            }, 100);
        }
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
};

// Listen for alpine:init
document.addEventListener("alpine:init", setupThemeStore);

// If Alpine is already loaded (can happen with Livewire 3)
if (window.Alpine) {
    setupThemeStore();
}
