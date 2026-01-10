/**
 * ==========================================================
 * ABOUT PAGE JAVASCRIPT - Modern & Enhanced
 * File: about-page.js
 * ==========================================================
 *
 * Progressive enhancement dengan:
 * - Intersection Observer untuk animations
 * - Lazy loading images
 * - Interactive card effects dengan advanced animations
 * - Smooth scroll untuk anchor links
 * - Advanced button interactions
 *
 * SEMUA SCOPE KE .about-page SAJA
 */

class AboutPage {
    constructor() {
        this.root = document.querySelector('.about-page');
        this.observers = [];
        this.animationCache = new WeakMap();
        this.animatingCounters = new Set();
        this.init();
    }

    /**
     * Initialize semua features
     */
    init() {
        if (!this.root) return;

        this.setupIntersectionObserver();
        this.setupCardInteractions();
        this.setupSmoothScroll();
        this.setupButtonEffects();
        this.setupImageLoading();
        this.setupNumberCounters();
        this.setupAnalytics();
    }

    /**
     * Intersection Observer untuk fade-in animations dengan stagger effect
     */
    setupIntersectionObserver() {
        const elements = this.root.querySelectorAll(
            '.about-card, ' +
            '.about-section-title, ' +
            '.about-hero-title, ' +
            '.about-quick-stat'
        );

        const observer = new IntersectionObserver((entries) => {
            entries.forEach((entry, index) => {
                if (entry.isIntersecting) {
                    // Stagger animation based on element position
                    const delay = index * 50;
                    entry.target.style.animationDelay = `${delay}ms`;
                    entry.target.classList.add('about-fade-in');
                    observer.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.1,
            rootMargin: '0px 0px -100px 0px'
        });

        elements.forEach(el => observer.observe(el));
        this.observers.push(observer);
    }

    /**
     * Card hover effects dengan advanced interactions
     */
    setupCardInteractions() {
        const cards = this.root.querySelectorAll('.about-card');

        cards.forEach(card => {
            // Hover effect dengan mouse tracking
            card.addEventListener('mouseenter', (e) => {
                this.addCardHoverEffect(card);
                this.trackMouseOnCard(card, e);
            });

            card.addEventListener('mousemove', (e) => {
                this.trackMouseOnCard(card, e);
            });

            card.addEventListener('mouseleave', () => {
                this.removeCardHoverEffect(card);
                this.resetCardTilt(card);
            });

            // Click animation
            card.addEventListener('click', (e) => {
                this.addRippleEffect(e, card);
            });
        });
    }

    /**
     * Track mouse position untuk subtle tilt effect
     */
    trackMouseOnCard(card, event) {
        const rect = card.getBoundingClientRect();
        const x = event.clientX - rect.left;
        const y = event.clientY - rect.top;

        const rotateX = (y / rect.height - 0.5) * 5;
        const rotateY = (x / rect.width - 0.5) * 5;

        card.style.transform = `perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) translateZ(20px)`;
    }

    /**
     * Reset card tilt effect
     */
    resetCardTilt(card) {
        card.style.transform = 'perspective(1000px) rotateX(0) rotateY(0) translateZ(0)';
    }

    /**
     * Add hover effect ke card
     */
    addCardHoverEffect(card) {
        card.classList.add('about-card-hovered');
    }

    /**
     * Remove hover effect dari card
     */
    removeCardHoverEffect(card) {
        card.classList.remove('about-card-hovered');
    }

    /**
     * Add ripple effect ke element
     */
    addRippleEffect(e, element) {
        this.createRipple(e, element);
    }

    /**
     * Create ripple element
     */
    createRipple(e, element) {
        const rect = element.getBoundingClientRect();
        const size = Math.max(rect.width, rect.height);
        const x = e.clientX - rect.left - size / 2;
        const y = e.clientY - rect.top - size / 2;

        const ripple = document.createElement('span');
        ripple.style.width = ripple.style.height = size + 'px';
        ripple.style.left = x + 'px';
        ripple.style.top = y + 'px';
        ripple.classList.add('about-ripple');

        element.appendChild(ripple);

        setTimeout(() => ripple.remove(), 600);
    }

    /**
     * Smooth scroll untuk anchor links
     */
    setupSmoothScroll() {
        const links = this.root.querySelectorAll('a[href^="#"]');

        links.forEach(link => {
            link.addEventListener('click', (e) => {
                const target = document.querySelector(link.getAttribute('href'));

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
     * Button click effects
     */
    setupButtonEffects() {
        const buttons = this.root.querySelectorAll('.about-btn');

        buttons.forEach(btn => {
            btn.addEventListener('click', (e) => {
                this.addRippleEffect(e, btn);
            });
        });
    }

    /**
     * Lazy load images
     */
    setupImageLoading() {
        const images = this.root.querySelectorAll('img[loading="lazy"]');

        if ('IntersectionObserver' in window) {
            const imageObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const img = entry.target;
                        img.src = img.dataset.src || img.src;
                        img.classList.add('about-image-loaded');
                        imageObserver.unobserve(img);
                    }
                });
            });

            images.forEach(img => imageObserver.observe(img));
            this.observers.push(imageObserver);
        }
    }

    /**
     * Animate number counters dalam achievement cards
     */
    setupNumberCounters() {
        const counters = this.root.querySelectorAll('.about-achievement-number');

        if (counters.length === 0) return;

        // Clear animating counters set dan reset semua counter display
        this.animatingCounters.clear();

        counters.forEach(counter => {
            // Always reset display dan remove data attribute
            counter.textContent = '0';
            counter.removeAttribute('data-animated');
        });

        // Create fresh intersection observer untuk counters
        const countObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const element = entry.target;

                    // Get target value dari data-target attribute
                    const finalValue = parseInt(element.getAttribute('data-target'));

                    // Skip jika tidak valid atau sudah animating
                    if (!finalValue || isNaN(finalValue) || this.animatingCounters.has(element)) {
                        return;
                    }

                    // Mark sebagai sedang animating
                    this.animatingCounters.add(element);

                    // Reset ke 0 dan mulai animasi
                    element.textContent = '0';
                    this.animateCounter(element, finalValue);

                    // Unobserve setelah trigger
                    countObserver.unobserve(element);
                }
            });
        }, {
            threshold: 0.3,
            rootMargin: '50px'
        });

        // Observe semua counter
        counters.forEach(counter => {
            countObserver.observe(counter);
        });

        this.observers.push(countObserver);
    }

    /**
     * Animate counter dari 0 ke target value
     */
    animateCounter(element, finalValue) {
        const duration = 2000; // 2 seconds
        let currentValue = 0;
        const increment = finalValue / (duration / 16); // 16ms per frame (~60fps)

        const updateCounter = () => {
            currentValue += increment;

            if (currentValue >= finalValue) {
                element.textContent = finalValue;
                // Remove dari animating set saat selesai
                this.animatingCounters.delete(element);
            } else {
                element.textContent = Math.floor(currentValue);
                setTimeout(updateCounter, 16);
            }
        };

        updateCounter();
    }

    /**
     * Analytics tracking untuk user interactions
     */
    setupAnalytics() {
        // Track card clicks
        const cards = this.root.querySelectorAll('.about-card');
        cards.forEach((card, index) => {
            card.addEventListener('click', () => {
                this.trackEvent('about_card_click', {
                    card_number: index + 1,
                    card_title: card.querySelector('.about-card-title')?.textContent
                });
            });
        });

        // Track CTA button clicks
        const ctaButtons = this.root.querySelectorAll('.about-hero-actions .about-btn');
        ctaButtons.forEach(btn => {
            btn.addEventListener('click', () => {
                this.trackEvent('about_cta_button_click', {
                    button_text: btn.textContent.trim()
                });
            });
        });
    }

    /**
     * Track events dengan Google Analytics atau custom analytics
     */
    trackEvent(eventName, eventData = {}) {
        if (typeof gtag !== 'undefined') {
            gtag('event', eventName, eventData);
        } else if (typeof window.analytics !== 'undefined') {
            window.analytics.track(eventName, eventData);
        }
        // Console log untuk development
        console.log('Analytics Event:', eventName, eventData);
    }

    /**
     * Cleanup untuk Livewire navigation
     */
    cleanup() {
        // Guard clause - jika root sudah null atau tidak ada, jangan lanjut
        if (!this.root || !document.contains(this.root)) {
            // Hanya disconnect observers
            this.observers.forEach(observer => observer.disconnect());
            this.observers = [];
            this.animatingCounters.clear();
            return;
        }

        // Disconnect semua observers
        this.observers.forEach(observer => observer.disconnect());
        this.observers = [];

        // Clear animating counters set
        this.animatingCounters.clear();

        // Remove event listeners dari cards - dengan null check
        try {
            const cards = this.root.querySelectorAll('.about-card');
            if (cards && cards.length > 0) {
                cards.forEach(card => {
                    card.replaceWith(card.cloneNode(true));
                });
            }
        } catch (e) {
            console.debug('[AboutPage] Error removing card listeners:', e);
        }

        // Reset counter display - dengan null check
        try {
            const counters = this.root.querySelectorAll('.about-achievement-number');
            if (counters && counters.length > 0) {
                counters.forEach(counter => {
                    counter.textContent = '0';
                    counter.removeAttribute('data-animated');
                });
            }
        } catch (e) {
            console.debug('[AboutPage] Error resetting counters:', e);
        }
    }
}

/**
 * Initialize saat DOM siap
 */
let aboutPageInstance = null;

if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', () => {
        aboutPageInstance = new AboutPage();
    });
} else {
    aboutPageInstance = new AboutPage();
}

/**
 * Re-initialize saat navigasi Livewire
 */
if (typeof Livewire !== 'undefined') {
    // Cleanup dan reinitialize saat component diupdate
    document.addEventListener('livewire:updated', () => {
        try {
            if (aboutPageInstance) {
                aboutPageInstance.cleanup();
            }
            // Only create new instance if about page still exists in DOM
            const aboutSection = document.querySelector('.about-page-section');
            if (aboutSection) {
                aboutPageInstance = new AboutPage();
            }
        } catch (e) {
            console.debug('[AboutPage] Error during livewire:updated:', e);
        }
    });

    // Alternative hook untuk compatibility
    Livewire.hook('morph.updated', ({ component }) => {
        setTimeout(() => {
            try {
                if (aboutPageInstance) {
                    aboutPageInstance.cleanup();
                }
                // Only create new instance if about page still exists in DOM
                const aboutSection = document.querySelector('.about-page-section');
                if (aboutSection) {
                    aboutPageInstance = new AboutPage();
                }
            } catch (e) {
                console.debug('[AboutPage] Error during morph.updated:', e);
            }
        }, 100);
    });
}
