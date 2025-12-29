// resources/js/components/navbar.js kosong

/**
 * Navbar behavior (mobile auto-close)
 */

document.addEventListener("livewire:navigated", () => {
    if (window.innerWidth < 992) {
        const navbar = document.getElementById("mainNavbar");

        if (navbar && navbar.classList.contains("show")) {
            const instance =
                window.bootstrap.Collapse.getInstance(navbar) ||
                new window.bootstrap.Collapse(navbar, { toggle: false });

            instance.hide();
        }
    }
});
