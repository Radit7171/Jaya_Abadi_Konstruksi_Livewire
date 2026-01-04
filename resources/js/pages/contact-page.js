/**
 * ==========================================================
 * CONTACT PAGE JAVASCRIPT - Interactive & Modern
 * File: contact-page.js
 * ==========================================================
 *
 * Progressive enhancement dengan:
 * - FAQ Accordion toggle dengan smooth animation
 * - Smooth scroll untuk anchor links
 * - Button ripple effects
 * - Intersection Observer untuk stagger animations
 * - Re-init setelah Livewire SPA navigation
 *
 * SEMUA SCOPE KE .contact-page SAJA
 */

class ContactPage {
    constructor() {
        this.root = document.querySelector('.contact-page');
        this.observers = [];
        this.faqItems = [];
        this.eventListeners = []; // Store handlers for cleanup
        this.init();
    }

    /**
     * Initialize semua features
     */
    init() {
        if (!this.root) return;

        this.setupFAQAccordion();
        this.setupSmoothScroll();
        this.setupButtonEffects();
        this.setupIntersectionObserver();
        this.setupAnalytics();
    }

    /**
     * Setup FAQ Accordion - Toggle content on click
     */
    setupFAQAccordion() {
        const faqItems = this.root.querySelectorAll('.contact-faq-item');
        // console.log('[ContactPage] FAQ Items found:', faqItems.length);

        faqItems.forEach((item, index) => {
            const question = item.querySelector('.contact-faq-question');
            const answer = item.querySelector('.contact-faq-answer');
            const icon = item.querySelector('.contact-faq-icon');

            if (!question) return;

            // console.log('[ContactPage] Setting up FAQ item', index, { question, answer, icon });

            // Store for cleanup
            this.faqItems.push({ item, question, answer, icon });

            // Click handler - bind to preserve context for removal
            const clickHandler = (e) => {
                // console.log('[ContactPage] FAQ clicked:', index);
                e.preventDefault();
                this.toggleFAQItem(item, answer, icon);
            };

            const keydownHandler = (e) => {
                if (e.key === 'Enter' || e.key === ' ') {
                    e.preventDefault();
                    this.toggleFAQItem(item, answer, icon);
                }
            };

            // Add event listeners
            question.addEventListener('click', clickHandler);
            question.addEventListener('keydown', keydownHandler);

            // Store handlers for cleanup
            this.eventListeners.push({
                element: question,
                type: 'click',
                handler: clickHandler
            });
            this.eventListeners.push({
                element: question,
                type: 'keydown',
                handler: keydownHandler
            });

            // Keyboard support (Enter/Space)
            question.setAttribute('role', 'button');
            question.setAttribute('tabindex', '0');
        });
    }

    /**
     * Toggle FAQ item - Open/Close dengan animation
     */
    toggleFAQItem(item, answer, icon) {
        const isActive = item.classList.contains('active');
        // console.log('[ContactPage] Toggle FAQ - isActive:', isActive);

        // Close other items
        this.faqItems.forEach(({ item: otherItem, answer: otherAnswer }) => {
            if (otherItem !== item && otherItem.classList.contains('active')) {
                otherItem.classList.remove('active');
                this.animateHeightClose(otherAnswer);
            }
        });

        // Toggle current item
        if (isActive) {
            // console.log('[ContactPage] Closing item');
            item.classList.remove('active');
            // console.log('[ContactPage] Class removed, new classList:', item.classList);
            this.animateHeightClose(answer);
        } else {
            // console.log('[ContactPage] Opening item');
            item.classList.add('active');
            // console.log('[ContactPage] Class added, new classList:', item.classList);
            // console.log('[ContactPage] Answer element:', answer);
            // console.log('[ContactPage] Answer style:', window.getComputedStyle(answer));
            this.animateHeightOpen(answer);
        }
    }

    /**
     * Animate height open untuk smooth expansion
     */
    animateHeightOpen(element) {
        // Just toggle, CSS akan handle animasi
    }

    /**
     * Animate height close untuk smooth collapse
     */
    animateHeightClose(element) {
        // Just toggle, CSS akan handle animasi
    }

    /**
     * Smooth scroll untuk anchor links
     */
    setupSmoothScroll() {
        const links = this.root.querySelectorAll('a[href^="#"]');

        links.forEach(link => {
            const clickHandler = (e) => {
                const href = link.getAttribute('href');
                const target = document.querySelector(href);

                if (target) {
                    e.preventDefault();

                    // Add active state
                    link.classList.add('contact-link-active');
                    setTimeout(() => link.classList.remove('contact-link-active'), 300);

                    // Smooth scroll dengan offset
                    const offsetTop = target.getBoundingClientRect().top + window.scrollY - 80;
                    window.scrollTo({
                        top: offsetTop,
                        behavior: 'smooth'
                    });
                }
            };

            link.addEventListener('click', clickHandler);
            this.eventListeners.push({
                element: link,
                type: 'click',
                handler: clickHandler
            });
        });
    }

    /**
     * Button click effects dengan ripple
     */
    setupButtonEffects() {
        const buttons = this.root.querySelectorAll('.contact-btn, .contact-maps-btn');

        buttons.forEach(btn => {
            const clickHandler = (e) => {
                // Don't create ripple for external links
                if (!btn.classList.contains('external-link')) {
                    this.createRipple(e, btn);
                }
            };

            const keydownHandler = (e) => {
                if (e.key === 'Enter' || e.key === ' ') {
                    e.preventDefault();
                    btn.click();
                }
            };

            btn.addEventListener('click', clickHandler);
            this.eventListeners.push({
                element: btn,
                type: 'click',
                handler: clickHandler
            });

            // Keyboard support
            if (btn.tagName !== 'BUTTON') {
                btn.addEventListener('keydown', keydownHandler);
                this.eventListeners.push({
                    element: btn,
                    type: 'keydown',
                    handler: keydownHandler
                });
            }
        });
    }

    /**
     * Create ripple effect untuk button clicks
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
        ripple.classList.add('contact-ripple');

        // Add ripple styles inline since it's dynamic
        ripple.style.position = 'absolute';
        ripple.style.borderRadius = '50%';
        ripple.style.backgroundColor = 'rgba(255, 255, 255, 0.6)';
        ripple.style.transform = 'scale(0)';
        ripple.style.animation = 'contact-ripple-animation 0.6s ease-out';
        ripple.style.pointerEvents = 'none';

        element.style.position = 'relative';
        element.style.overflow = 'hidden';
        element.appendChild(ripple);

        setTimeout(() => ripple.remove(), 600);
    }

    /**
     * Intersection Observer untuk stagger animations
     */
    setupIntersectionObserver() {
        const elements = this.root.querySelectorAll(
            '.contact-info-card, ' +
            '.contact-maps-location-card, ' +
            '.contact-faq-item, ' +
            '.contact-social-link'
        );

        const observer = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('contact-visible');
                    observer.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        });

        elements.forEach(el => observer.observe(el));
        this.observers.push(observer);
    }

    /**
     * Setup analytics tracking
     */
    setupAnalytics() {
        // Track FAQ clicks
        this.faqItems.forEach(({ question }, index) => {
            const analyticsHandler = () => {
                if (typeof gtag !== 'undefined') {
                    gtag('event', 'contact_faq_click', {
                        faq_index: index,
                        faq_question: question.querySelector('.contact-faq-question-text')?.textContent || 'Unknown'
                    });
                }
            };

            question.addEventListener('click', analyticsHandler);
            this.eventListeners.push({
                element: question,
                type: 'click',
                handler: analyticsHandler
            });
        });

        // Track button clicks
        const actionButtons = this.root.querySelectorAll(
            '.contact-maps-btn, ' +
            '.contact-social-link'
        );

        actionButtons.forEach(btn => {
            const analyticsHandler = () => {
                if (typeof gtag !== 'undefined') {
                    const text = btn.textContent?.trim() || 'Unknown';
                    const link = btn.getAttribute('data-link') || btn.getAttribute('href') || '';

                    gtag('event', 'contact_action_click', {
                        action_type: text,
                        action_link: link
                    });
                }
            };

            btn.addEventListener('click', analyticsHandler);
            this.eventListeners.push({
                element: btn,
                type: 'click',
                handler: analyticsHandler
            });
        });
    }

    /**
     * Cleanup - Disconnect observers & remove event listeners
     */
    destroy() {
        // Remove all event listeners
        this.eventListeners.forEach(({ element, type, handler }) => {
            element.removeEventListener(type, handler);
        });
        this.eventListeners = [];

        // Disconnect observers
        this.observers.forEach(observer => observer.disconnect());
        this.observers = [];

        // Clear FAQ items
        this.faqItems = [];
    }
}

/**
 * Ripple animation keyframes
 */
const style = document.createElement('style');
style.textContent = `
    @keyframes contact-ripple-animation {
        to {
            transform: scale(4);
            opacity: 0;
        }
    }
`;
document.head.appendChild(style);

/**
 * Initialize ContactPage
 */
let contactPageInstance = null;

// Initial load
document.addEventListener('DOMContentLoaded', () => {
    if (document.querySelector('.contact-page')) {
        contactPageInstance = new ContactPage();
    }
});

// Re-init on Livewire navigation
document.addEventListener('livewire:navigated', () => {
    // Destroy previous instance
    if (contactPageInstance) {
        contactPageInstance.destroy();
    }

    // Create new instance
    if (document.querySelector('.contact-page')) {
        contactPageInstance = new ContactPage();
    }
});

// Make instance available globally for debugging
window.ContactPage = ContactPage;
window.contactPageInstance = contactPageInstance;
