/**
 * ==========================================================
 * SERVICES PAGE JAVASCRIPT - Modern & Enhanced
 * File: services-page.js
 * ==========================================================
 *
 * Progressive enhancement dengan:
 * - Intersection Observer untuk animations
 * - Lazy loading images
 * - Smooth scroll untuk anchor links
 * - Interactive card effects with advanced animations
 * - Process timeline enhancements
 * - Advanced button interactions
 * - Number counter animations
 *
 * SEMUA SCOPE KE .services-page SAJA
 */

class ServicesPage {
    constructor() {
        this.root = document.querySelector('.services-page');
        this.observers = [];
        this.animationCache = new WeakMap();
        this.init();
    }

    /**
     * Initialize semua features
     */
    init() {
        if (!this.root) return;

        this.setupIntersectionObserver();
        this.setupCardInteractions();
        this.setupProcessTimeline();
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
            '.services-card, ' +
            '.services-why-card, ' +
            '.services-process-item, ' +
            '.services-section-title'
        );

        const observer = new IntersectionObserver((entries) => {
            entries.forEach((entry, index) => {
                if (entry.isIntersecting) {
                    // Stagger animation based on element position
                    const delay = index * 50;
                    entry.target.style.animationDelay = `${delay}ms`;
                    entry.target.classList.add('services-fade-in');
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
        const cards = this.root.querySelectorAll('.services-card');

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
        card.classList.add('services-card-hovered');
    }

    /**
     * Remove hover effect dari card
     */
    removeCardHoverEffect(card) {
        card.classList.remove('services-card-hovered');
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
        ripple.classList.add('services-ripple');

        element.appendChild(ripple);

        setTimeout(() => ripple.remove(), 600);
    }

    /**
     * Setup process timeline dengan visual enhancements
     */
    setupProcessTimeline() {
        const items = this.root.querySelectorAll('.services-process-item');

        items.forEach((item, index) => {
            const number = item.querySelector('.services-process-number');
            const content = item.querySelector('.services-process-content');

            // Add hover effect
            if (number && content) {
                item.addEventListener('mouseenter', () => {
                    number.style.transform = 'scale(1.1) rotate(10deg)';
                    content.style.boxShadow = '0 20px 40px rgba(0, 0, 0, 0.15)';
                });

                item.addEventListener('mouseleave', () => {
                    number.style.transform = 'scale(1) rotate(0deg)';
                    content.style.boxShadow = 'none';
                });
            }
        });
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
        const buttons = this.root.querySelectorAll('.services-btn');

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
                        img.classList.add('services-image-loaded');
                        imageObserver.unobserve(img);
                    }
                });
            });

            images.forEach(img => imageObserver.observe(img));
            this.observers.push(imageObserver);
        }
    }

    /**
     * Animate number counters dalam stats section
     */
    setupNumberCounters() {
        const stats = this.root.querySelectorAll('.services-quick-stat-number');

        const countObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting && !entry.target.dataset.counted) {
                    const finalValue = entry.target.textContent;
                    const numericValue = parseInt(finalValue.replace(/\D/g, ''));
                    const suffix = finalValue.replace(/\d/g, '');

                    entry.target.dataset.counted = true;
                    this.animateCounter(entry.target, numericValue, suffix);
                    countObserver.unobserve(entry.target);
                }
            });
        }, { threshold: 0.5 });

        stats.forEach(stat => countObserver.observe(stat));
        this.observers.push(countObserver);
    }

    /**
     * Animate counter dari 0 ke target value
     */
    animateCounter(element, targetValue, suffix = '') {
        let currentValue = 0;
        const increment = Math.ceil(targetValue / 30);
        const originalText = element.textContent;

        const counter = setInterval(() => {
            currentValue += increment;
            if (currentValue >= targetValue) {
                currentValue = targetValue;
                clearInterval(counter);
            }
            element.textContent = currentValue + suffix;
        }, 50);
    }

    /**
     * Analytics tracking untuk user interactions
     */
    setupAnalytics() {
        // Track card clicks
        const cards = this.root.querySelectorAll('.services-card');
        cards.forEach((card, index) => {
            card.addEventListener('click', () => {
                this.trackEvent('service_card_click', {
                    service_number: index + 1,
                    service_name: card.querySelector('.services-card-title')?.textContent
                });
            });
        });

        // Track CTA button clicks
        const ctaButtons = this.root.querySelectorAll('.services-cta .services-btn');
        ctaButtons.forEach(btn => {
            btn.addEventListener('click', () => {
                this.trackEvent('cta_button_click', {
                    button_text: btn.textContent.trim()
                });
            });
        });

        // Track process step views
        const processItems = this.root.querySelectorAll('.services-process-item');
        processItems.forEach((item, index) => {
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        this.trackEvent('process_step_viewed', {
                            step_number: index + 1
                        });
                    }
                });
            });

            observer.observe(item);
            this.observers.push(observer);
        });
    }

    /**
     * Track events (placeholder untuk analytics service)
     */
    trackEvent(eventName, eventData = {}) {
        if (window.gtag) {
            gtag('event', eventName, eventData);
        } else if (window.parent && window.parent.gtag) {
            window.parent.gtag('event', eventName, eventData);
        }
        // Fallback: console log untuk development
        console.log('📊 Event:', eventName, eventData);
    }

    /**
     * Cleanup observers saat page unmount
     */
    destroy() {
        this.observers.forEach(observer => observer.disconnect());
        this.observers = [];
    }
}

// Initialize saat DOM ready
document.addEventListener('DOMContentLoaded', () => {
    window.servicesPage = new ServicesPage();
});

// Cleanup saat Livewire navigate
document.addEventListener('livewire:navigating', () => {
    if (window.servicesPage) {
        window.servicesPage.destroy();
    }
});

// Re-init saat Livewire selesai navigate
document.addEventListener('livewire:navigated', () => {
    window.servicesPage = new ServicesPage();
});
