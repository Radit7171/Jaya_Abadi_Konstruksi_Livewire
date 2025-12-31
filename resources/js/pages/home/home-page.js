/**
 * ==========================================================
 * HOME PAGE JAVASCRIPT - Modern & Enhanced
 * File: home-page.js
 * ==========================================================
 *
 * Progressive enhancement dengan:
 * - Intersection Observer untuk animations
 * - Lazy loading images yang advanced
 * - Smooth scroll untuk anchor links
 * - Analytics tracking untuk user interaction
 *
 * SEMUA SCOPE KE .home-page SAJA
 */

class HomePage {
    constructor() {
        this.root = document.querySelector('.home-page');
        this.observers = [];
        this.init();
    }

    /**
     * Initialize semua features
     */
    init() {
        if (!this.root) return;

        this.setupIntersectionObserver();
        this.setupImageLoading();
        this.setupSmoothScroll();
        this.setupButtonEffects();
        this.setupProjectCards();
        this.setupAnalytics();
    }

    /**
     * Intersection Observer untuk fade-in animations
     */
    setupIntersectionObserver() {
        const sections = this.root.querySelectorAll('.home-section-title, .home-service-card, .home-project-card');

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('home-fade-in');
                    observer.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        });

        sections.forEach(section => observer.observe(section));
        this.observers.push(observer);
    }

    /**
     * Enhanced image loading dengan placeholder
     */
    setupImageLoading() {
        const images = this.root.querySelectorAll('img[loading="lazy"]');

        images.forEach(img => {
            // Add loading class untuk CSS effects
            img.classList.add('home-image-loading');

            // Handle load completion
            if (img.complete) {
                this.handleImageLoad(img);
            } else {
                img.addEventListener('load', () => this.handleImageLoad(img));
                img.addEventListener('error', () => this.handleImageError(img));
            }
        });
    }

    handleImageLoad(img) {
        img.classList.remove('home-image-loading');
        img.classList.add('home-image-loaded');
    }

    handleImageError(img) {
        img.classList.remove('home-image-loading');
        img.classList.add('home-image-error');
        console.warn('Failed to load image:', img.src);
    }

    /**
     * Smooth scroll untuk internal anchor links
     */
    setupSmoothScroll() {
        const links = this.root.querySelectorAll('a[href^="#"]');

        links.forEach(link => {
            link.addEventListener('click', (e) => {
                const href = link.getAttribute('href');
                if (href === '#') return;

                const target = this.root.querySelector(href);
                if (target) {
                    e.preventDefault();
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    }

    /**
     * Button hover effects enhancement
     */
    setupButtonEffects() {
        const buttons = this.root.querySelectorAll('.home-btn');

        buttons.forEach(btn => {
            btn.addEventListener('mouseenter', () => {
                btn.style.transform = 'translateY(-2px)';
                btn.style.boxShadow = '0 10px 25px -5px rgba(0, 0, 0, 0.1)';
            });

            btn.addEventListener('mouseleave', () => {
                btn.style.transform = '';
                btn.style.boxShadow = '';
            });

            btn.addEventListener('mousedown', () => {
                btn.style.transform = 'translateY(0)';
            });
        });
    }

    /**
     * Project cards interaction
     */
    setupProjectCards() {
        const cards = this.root.querySelectorAll('.home-project-card');

        cards.forEach(card => {
            const link = card.querySelector('a');

            card.addEventListener('click', (e) => {
                if (e.target.tagName !== 'A' && link) {
                    e.preventDefault();
                    link.click();
                }
            });

            card.addEventListener('keydown', (e) => {
                if (e.key === 'Enter' || e.key === ' ') {
                    e.preventDefault();
                    if (link) link.click();
                }
            });
        });
    }

    /**
     * Basic analytics untuk user interaction
     */
    setupAnalytics() {
        const trackEvent = (category, action, label) => {
            if (typeof gtag !== 'undefined') {
                gtag('event', action, {
                    'event_category': category,
                    'event_label': label
                });
            }
        };

        // Track CTA clicks
        const ctas = this.root.querySelectorAll('.home-btn');
        ctas.forEach(btn => {
            btn.addEventListener('click', () => {
                const text = btn.textContent.trim();
                trackEvent('CTA', 'click', text);
            });
        });

        // Track project views
        const projectViews = this.root.querySelectorAll('.home-project-view');
        projectViews.forEach(view => {
            view.addEventListener('click', () => {
                const projectName = view.closest('.home-project-card')
                    .querySelector('.home-project-name').textContent;
                trackEvent('Projects', 'view', projectName);
            });
        });

        // Track section visibility
        const sectionObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const sectionName = entry.target.className.split(' ')[0];
                    trackEvent('Sections', 'view', sectionName);
                }
            });
        }, { threshold: 0.5 });

        const sections = this.root.querySelectorAll('section');
        sections.forEach(section => sectionObserver.observe(section));
    }

    /**
     * Cleanup semua observers dan event listeners
     */
    destroy() {
        this.observers.forEach(observer => observer.disconnect());
        // Remove event listeners jika diperlukan
    }
}

/**
 * ==========================================================
 * LIVEWIRE SPA INTEGRATION
 * ==========================================================
 */
let homePageInstance = null;

function initHomePage() {
    if (homePageInstance) {
        homePageInstance.destroy();
    }
    homePageInstance = new HomePage();
}

// Livewire SPA navigation
document.addEventListener('livewire:navigated', () => {
    // Delay sedikit untuk memastikan DOM sudah ready
    setTimeout(initHomePage, 100);
});

// Initial load
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initHomePage);
} else {
    initHomePage();
}

/**
 * ==========================================================
 * PERFORMANCE OPTIMIZATION
 * ==========================================================
 */
// Debounce function untuk performance
function debounce(func, wait) {
    let timeout;
    return function executedFunction(...args) {
        const later = () => {
            clearTimeout(timeout);
            func(...args);
        };
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
    };
}

// Handle window resize dengan debounce
const handleResize = debounce(() => {
    if (homePageInstance) {
        // Re-init beberapa features jika diperlukan
    }
}, 250);

window.addEventListener('resize', handleResize);

/**
 * ==========================================================
 * EXPORT UNTUK TESTING (optional)
 * ==========================================================
 */
if (typeof module !== 'undefined' && module.exports) {
    module.exports = { HomePage, initHomePage };
}
