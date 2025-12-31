// resources/js/components/footer.js
class FooterEnhancements {
    constructor() {
        this.footer = document.querySelector('.site-footer');
        this.init();
    }

    init() {
        this.addHoverEffects();
        this.addTouchEffects();
        this.observeFooterVisibility();
    }

    addHoverEffects() {
        // Add ripple effect untuk social icons
        const socialIcons = this.footer?.querySelectorAll('.social-icon');
        socialIcons?.forEach(icon => {
            icon.addEventListener('mouseenter', (e) => {
                const rect = icon.getBoundingClientRect();
                const x = e.clientX - rect.left;
                const y = e.clientY - rect.top;

                icon.style.setProperty('--x', `${x}px`);
                icon.style.setProperty('--y', `${y}px`);
            });
        });
    }

    addTouchEffects() {
        // Touch feedback untuk mobile
        const touchElements = this.footer?.querySelectorAll('.footer-link, .social-icon, .footer-contact a');
        touchElements?.forEach(el => {
            el.addEventListener('touchstart', () => {
                el.classList.add('active');
            });

            el.addEventListener('touchend', () => {
                setTimeout(() => {
                    el.classList.remove('active');
                }, 50);
            });
        });
    }

    observeFooterVisibility() {
        // Observer untuk animasi saat footer masuk viewport
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('in-view');
                }
            });
        }, { threshold: 0.1 });

        const sections = this.footer?.querySelectorAll('.footer-top, .footer-bottom');
        sections?.forEach(section => observer.observe(section));
    }
}

// Initialize
document.addEventListener('DOMContentLoaded', () => {
    new FooterEnhancements();
});
