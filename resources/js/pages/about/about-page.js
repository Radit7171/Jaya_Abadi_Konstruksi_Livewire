/**
 * ==========================================================
 * ABOUT PAGE JAVASCRIPT - Professional & Interactive
 * File: about-page.js
 * ==========================================================
 *
 * Progressive enhancement dengan:
 * - Number counter animations untuk achievements
 * - Timeline interactions
 * - Image lazy loading
 * - Button effects
 * - Accessibility enhancements
 *
 * SEMUA SCOPE KE .about-page SAJA
 */

class AboutPage {
    constructor() {
        this.root = document.querySelector('.about-page');
        this.counters = [];
        this.observers = [];
        this.init();
    }

    /**
     * Initialize semua features
     */
    init() {
        if (!this.root) return;

        this.setupCounterAnimations();
        this.setupTimelineInteractions();
        this.setupImageLoading();
        this.setupButtonEffects();
        this.setupAccordionBehavior();
        this.setupSmoothScroll();
        this.setupValueCardInteractions();
    }

    /**
     * Counter animations untuk achievement section
     * Hitung dari 0 sampai target number dengan smooth animation
     */
    setupCounterAnimations() {
        const counterElements = this.root.querySelectorAll('.about-achievement-number');

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting && !entry.target.classList.contains('counted')) {
                    this.animateCounter(entry.target);
                    entry.target.classList.add('counted');
                }
            });
        }, {
            threshold: 0.5,
            rootMargin: '0px 0px -100px 0px'
        });

        counterElements.forEach(counter => observer.observe(counter));
        this.observers.push(observer);
    }

    /**
     * Animate counter dari 0 ke target value
     */
    animateCounter(element) {
        const target = parseInt(element.getAttribute('data-target')) || 0;
        if (target === 0) return;

        const duration = 2000; // 2 seconds
        const increment = target / (duration / 16); // 16ms per frame (60fps)
        let current = 0;

        const timer = setInterval(() => {
            current += increment;

            if (current >= target) {
                element.textContent = target;
                clearInterval(timer);
            } else {
                element.textContent = Math.floor(current);
            }
        }, 16);
    }

    /**
     * Timeline item hover interactions
     */
    setupTimelineInteractions() {
        const timelineItems = this.root.querySelectorAll('.about-timeline-item');

        timelineItems.forEach(item => {
            const dot = item.querySelector('.about-timeline-dot');

            item.addEventListener('mouseenter', () => {
                dot.style.transform = 'scale(1.2)';
                dot.style.transition = 'transform 0.3s ease';
            });

            item.addEventListener('mouseleave', () => {
                dot.style.transform = 'scale(1)';
            });

            // Accessibility: keyboard navigation
            item.setAttribute('tabindex', '0');
            item.addEventListener('focus', () => {
                item.style.outline = '2px solid var(--about-primary)';
                item.style.outlineOffset = '4px';
            });

            item.addEventListener('blur', () => {
                item.style.outline = 'none';
            });
        });
    }

    /**
     * Image lazy loading dengan placeholder effects
     */
    setupImageLoading() {
        const images = this.root.querySelectorAll('img[loading="lazy"]');

        images.forEach(img => {
            img.classList.add('about-image-loading');

            if (img.complete) {
                this.handleImageLoad(img);
            } else {
                img.addEventListener('load', () => this.handleImageLoad(img));
                img.addEventListener('error', () => this.handleImageError(img));
            }
        });
    }

    handleImageLoad(img) {
        img.classList.remove('about-image-loading');
        img.classList.add('about-image-loaded');
    }

    handleImageError(img) {
        img.classList.remove('about-image-loading');
        img.classList.add('about-image-error');
        console.warn('Failed to load image:', img.src);
    }

    /**
     * Button hover & click effects
     */
    setupButtonEffects() {
        const buttons = this.root.querySelectorAll('.about-btn');

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

            // Ripple effect pada button click
            btn.addEventListener('click', (e) => {
                this.createRipple(e, btn);
            });
        });
    }

    /**
     * Create ripple effect pada button click
     */
    createRipple(event, button) {
        const ripple = document.createElement('span');
        const rect = button.getBoundingClientRect();
        const size = Math.max(rect.width, rect.height);
        const x = event.clientX - rect.left - size / 2;
        const y = event.clientY - rect.top - size / 2;

        ripple.style.position = 'absolute';
        ripple.style.width = ripple.style.height = size + 'px';
        ripple.style.left = x + 'px';
        ripple.style.top = y + 'px';
        ripple.style.backgroundColor = 'rgba(255, 255, 255, 0.5)';
        ripple.style.borderRadius = '50%';
        ripple.style.transform = 'scale(0)';
        ripple.style.animation = 'ripple 0.6s ease-out';
        ripple.style.pointerEvents = 'none';

        button.style.position = 'relative';
        button.style.overflow = 'hidden';
        button.appendChild(ripple);

        setTimeout(() => ripple.remove(), 600);
    }

    /**
     * Accordion behavior untuk sections (jika diperlukan di mobile)
     */
    setupAccordionBehavior() {
        // Implementasi jika ada accordion di about page
        const accordionHeaders = this.root.querySelectorAll('[data-accordion-header]');

        accordionHeaders.forEach(header => {
            header.addEventListener('click', () => {
                const accordion = header.closest('[data-accordion]');
                const content = accordion.querySelector('[data-accordion-content]');

                if (content.style.maxHeight) {
                    content.style.maxHeight = null;
                    header.classList.remove('active');
                } else {
                    content.style.maxHeight = content.scrollHeight + 'px';
                    header.classList.add('active');
                }
            });
        });
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

                const target = document.querySelector(href);
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
     * Value card interactions dengan enhanced hover effects
     */
    setupValueCardInteractions() {
        const valueCards = this.root.querySelectorAll('.about-value-card');

        valueCards.forEach(card => {
            const icon = card.querySelector('.about-value-icon');

            card.addEventListener('mouseenter', () => {
                icon.style.transform = 'scale(1.1) rotate(5deg)';
                card.style.transform = 'translateY(-6px)';
            });

            card.addEventListener('mouseleave', () => {
                icon.style.transform = '';
                card.style.transform = '';
            });

            // Accessibility: keyboard focus
            card.setAttribute('tabindex', '0');
            card.addEventListener('focus', () => {
                card.style.outline = '2px solid var(--about-primary)';
                card.style.outlineOffset = '4px';
            });

            card.addEventListener('blur', () => {
                card.style.outline = 'none';
            });
        });
    }

    /**
     * Cleanup observers saat component destroy (Livewire navigation)
     */
    destroy() {
        this.observers.forEach(observer => observer.disconnect());
        this.observers = [];
    }
}

// Initialize tentang saat halaman load
document.addEventListener('DOMContentLoaded', () => {
    window.aboutPage = new AboutPage();
});

// Reinitialize saat Livewire navigate (SPA navigation)
document.addEventListener('livewire:navigated', () => {
    if (window.aboutPage) {
        window.aboutPage.destroy();
    }
    window.aboutPage = new AboutPage();
});

// Export untuk global access jika diperlukan
export { AboutPage };
