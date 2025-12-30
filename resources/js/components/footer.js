// resources/js/components/footer.js
class MobileFooter {
    constructor() {
        this.footer = document.querySelector('.site-footer');
        this.init();
    }

    init() {
        this.updateCopyrightYear();
        this.optimizeMobileView();
        this.addEventListeners();
    }

    updateCopyrightYear() {
        const yearElements = document.querySelectorAll('[data-current-year]');
        const currentYear = new Date().getFullYear();

        yearElements.forEach(el => {
            el.textContent = currentYear;
        });
    }

    optimizeMobileView() {
        if (!this.footer) return;

        const isMobile = window.innerWidth < 992;

        if (isMobile) {
            // Close all accordions by default
            const accordions = this.footer.querySelectorAll('.accordion-collapse');
            accordions.forEach(acc => {
                if (!acc.classList.contains('show')) {
                    new bootstrap.Collapse(acc, { toggle: false });
                }
            });
        }
    }

    addEventListeners() {
        window.addEventListener('resize', () => {
            this.optimizeMobileView();
        });

        // Social media click tracking
        const socialLinks = this.footer?.querySelectorAll('.social-icon');
        socialLinks?.forEach(link => {
            link.addEventListener('click', (e) => {
                const platform = link.getAttribute('aria-label');
                console.log(`Social clicked: ${platform}`);
            });
        });
    }
}

// Initialize when DOM is ready
document.addEventListener('DOMContentLoaded', () => {
    new MobileFooter();
});

// Livewire support
document.addEventListener('livewire:navigated', () => {
    new MobileFooter();
});
