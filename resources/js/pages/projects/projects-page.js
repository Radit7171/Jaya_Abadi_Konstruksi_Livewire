/**
 * PROJECTS PAGE - JavaScript Behavior
 * PT Jaya Abadi Konstruksi
 *
 * Responsibilities:
 * - Image lazy loading
 * - Card interactions & animations
 * - Button effects & ripple
 * - Filter interactions
 * - Smooth scroll for anchor links
 * - Livewire integration for SPA navigation
 *
 * Pattern: Progressive Enhancement
 * - Works without JavaScript
 * - Enhanced with JS for better UX
 */

class ProjectsPage {
    constructor() {
        this.page = document.querySelector('.projects-page');
        if (!this.page) return;

        this.init();
    }

    /**
     * Initialize all behaviors
     */
    init() {
        this.setupImages();
        this.setupCards();
        this.setupButtons();
        this.setupFilters();
        this.setupSmoothScroll();
        this.registerLivewireListener();
    }

    /**
     * Setup image lazy loading & load states
     */
    setupImages() {
        const images = this.page.querySelectorAll('img[loading="lazy"]');

        images.forEach(img => {
            // Track loading state
            img.addEventListener('load', () => {
                img.classList.add('projects-image-loaded');
            });

            // Handle errors gracefully
            img.addEventListener('error', () => {
                img.classList.add('projects-image-error');
                console.warn(`Failed to load image: ${img.src}`);
            });

            // If image is already cached, trigger load event
            if (img.complete) {
                img.dispatchEvent(new Event('load'));
            }
        });
    }

    /**
     * Setup project card interactions
     */
    setupCards() {
        const cards = this.page.querySelectorAll('.projects-card');

        cards.forEach(card => {
            // Card click to navigate to detail (future implementation)
            card.addEventListener('click', (e) => {
                // Only prevent if clicking on links
                if (e.target.closest('a')) return;

                const link = card.querySelector('.projects-card-link');
                if (link && link.href) {
                    link.click();
                }
            });

            // Keyboard accessibility (Enter/Space)
            card.addEventListener('keydown', (e) => {
                if ((e.key === 'Enter' || e.key === ' ') && !card.querySelector('a:focus')) {
                    const link = card.querySelector('.projects-card-link');
                    if (link) {
                        link.click();
                        e.preventDefault();
                    }
                }
            });

            // Overlay fade on mouse enter/leave
            const imageWrapper = card.querySelector('.projects-card-image-wrapper');
            if (imageWrapper) {
                imageWrapper.addEventListener('mouseenter', () => {
                    card.classList.add('projects-card-image-active');
                });

                imageWrapper.addEventListener('mouseleave', () => {
                    card.classList.remove('projects-card-image-active');
                });
            }
        });
    }

    /**
     * Setup button hover effects & ripple animation
     */
    setupButtons() {
        const buttons = this.page.querySelectorAll('.projects-btn');

        buttons.forEach(btn => {
            // Ripple effect on click
            btn.addEventListener('click', (e) => {
                this.createRipple(e, btn);
            });

            // Hover effect with audio cue (optional)
            btn.addEventListener('mouseenter', () => {
                btn.classList.add('projects-btn-hover');
            });

            btn.addEventListener('mouseleave', () => {
                btn.classList.remove('projects-btn-hover');
            });
        });
    }

    /**
     * Create ripple effect for buttons
     * @param {Event} event - Click event
     * @param {HTMLElement} button - Button element
     */
    createRipple(event, button) {
        const rect = button.getBoundingClientRect();
        const size = Math.max(rect.width, rect.height);
        const x = event.clientX - rect.left - size / 2;
        const y = event.clientY - rect.top - size / 2;

        const ripple = document.createElement('span');
        ripple.style.width = ripple.style.height = size + 'px';
        ripple.style.left = x + 'px';
        ripple.style.top = y + 'px';
        ripple.classList.add('projects-ripple');

        // Prevent multiple ripples
        const existingRipple = button.querySelector('.projects-ripple');
        if (existingRipple) {
            existingRipple.remove();
        }

        button.appendChild(ripple);

        // Remove ripple after animation
        setTimeout(() => ripple.remove(), 600);
    }

    /**
     * Setup filter button interactions
     */
    setupFilters() {
        const filterBtns = this.page.querySelectorAll('.projects-filter-btn');

        filterBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                // Remove active class from all buttons
                filterBtns.forEach(b => b.classList.remove('projects-filter-btn-active'));

                // Add active class to clicked button
                btn.classList.add('projects-filter-btn-active');
            });

            // Keyboard support
            btn.addEventListener('keydown', (e) => {
                if (e.key === 'Enter' || e.key === ' ') {
                    btn.click();
                    e.preventDefault();
                }
            });
        });
    }

    /**
     * Setup smooth scroll for anchor links
     */
    setupSmoothScroll() {
        const links = this.page.querySelectorAll('a[href^="#"]');

        links.forEach(link => {
            link.addEventListener('click', (e) => {
                const href = link.getAttribute('href');
                if (href === '#') return;

                const target = document.querySelector(href);
                if (!target) return;

                e.preventDefault();

                // Smooth scroll with navbar offset (65px)
                const offset = 65;
                const targetPosition = target.offsetTop - offset;

                window.scrollTo({
                    top: targetPosition,
                    behavior: 'smooth'
                });
            });
        });
    }

    /**
     * Register Livewire navigation listener
     * Re-init behaviors after SPA navigation
     */
    registerLivewireListener() {
        document.addEventListener('livewire:navigated', () => {
            // Small delay to ensure DOM is updated
            requestAnimationFrame(() => {
                this.page = document.querySelector('.projects-page');
                if (this.page) {
                    this.init();
                }
            });
        });
    }

    /**
     * Cleanup method (optional, for future use)
     */
    destroy() {
        // Remove event listeners if needed
        // This is called when navigating away
    }
}

/**
 * Initialize when DOM is ready
 */
document.addEventListener('DOMContentLoaded', () => {
    new ProjectsPage();
});

/**
 * Also initialize on Livewire navigation
 */
document.addEventListener('livewire:initialized', () => {
    new ProjectsPage();
});
