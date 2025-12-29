// resources/js/components/theme.js kosong

/**
 * Alpine Theme Store
 */

document.addEventListener("alpine:init", () => {
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

            // system
            const prefersDark = window.matchMedia(
                "(prefers-color-scheme: dark)"
            ).matches;

            html.setAttribute(
                "data-bs-theme",
                prefersDark ? "dark" : "light"
            );
        },
    });

    // Listen perubahan system theme
    window
        .matchMedia("(prefers-color-scheme: dark)")
        .addEventListener("change", () => {
            if (Alpine.store("theme").current === "system") {
                Alpine.store("theme").apply();
            }
        });

    Alpine.store("theme").init();
});
