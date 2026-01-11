/**
 * AOS (Animate On Scroll) Integration
 * Centralized AOS management untuk project
 *
 * DESIGN PRINCIPLES:
 * - Performance optimized
 * - Respects prefers-reduced-motion
 * - Auto-reinitialize after Livewire navigation
 * - Modern, professional animations
 */

import AOS from 'aos';
import 'aos/dist/aos.css';

class AOSManager {
    constructor() {
        this.initialized = false;
        this.config = {
            duration: 800,
            easing: 'ease-in-out',
            once: false,
            mirror: false,
            offset: 100,
            delay: 0,
        };
        // Pages yang mendukung AOS animations
        this.aosEnabledPages = [
            'home',
            'about-page',
            'services-page',
            'projects-page',
            'contact-page',
        ];
        // Pages yang TIDAK boleh menggunakan AOS (untuk menghindar konflik dengan interactivity)
        this.aosDisabledPages = [
            'admin-layout',
            'admin-dashboard-page',
            'admin-projects-page',
            'auth-login-page',
            'login-page',
        ];
    }

    /**
     * Check if current page should have AOS enabled
     */
    shouldEnableAOS() {
        // Check if page has disabled AOS
        for (let disabled of this.aosDisabledPages) {
            if (document.querySelector(`.${disabled}`)) {
                console.info(`AOS disabled on page: ${disabled}`);
                return false;
            }
        }

        // Default: enable for supported pages
        for (let enabled of this.aosEnabledPages) {
            if (document.querySelector(`.${enabled}`)) {
                return true;
            }
        }

        // If no specific page found, check if it's a non-interactive page
        // Disable on admin/auth pages by default
        const bodyClass = document.body.className;
        if (bodyClass.includes('admin') || bodyClass.includes('auth') || bodyClass.includes('login')) {
            return false;
        }

        return true;
    }

    /**
     * Initialize AOS
     * Dipanggil saat aplikasi pertama kali load
     */
    init() {
        // If already marked as initialized (disabled), don't init
        if (this.initialized) {
            console.info('AOS initialization skipped (already marked)');
            return;
        }

        // Check if AOS should be enabled on this page
        if (!this.shouldEnableAOS()) {
            console.info('AOS disabled on this page');
            this.initialized = true; // Mark as disabled to prevent re-attempts
            return;
        }

        // Check prefers-reduced-motion
        if (this.prefersReducedMotion()) {
            console.info('AOS disabled: prefers-reduced-motion');
            this.initialized = true; // Mark as disabled
            return;
        }

        AOS.init(this.config);
        this.initialized = true;
        console.info('AOS initialized');

        // Setup Livewire event listeners untuk re-init setelah navigation
        this.setupLivewireListeners();
    }

    /**
     * Re-initialize AOS setelah Livewire navigation
     */
    reinit() {
        if (!this.initialized) return;

        // Check if we're navigating to a page that shouldn't have AOS
        if (!this.shouldEnableAOS()) {
            console.info('AOS disabled after navigation');
            return;
        }

        // Refresh AOS untuk elemen baru
        setTimeout(() => {
            AOS.refresh();
        }, 100);
    }

    /**
     * Setup listeners untuk Livewire SPA navigation
     */
    setupLivewireListeners() {
        if (typeof window.Livewire === 'undefined') return;

        // Livewire v3 navigation complete event
        window.Livewire.on('navigate', () => {
            this.reinit();
        });
    }

    /**
     * Check if user prefers reduced motion
     */
    prefersReducedMotion() {
        return window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    }

    /**
     * Update AOS config
     */
    updateConfig(newConfig) {
        this.config = { ...this.config, ...newConfig };
        if (this.initialized) {
            AOS.init(this.config);
        }
    }

    /**
     * Get animation preset untuk common use cases
     */
    static presets = {
        // Hero section animations
        hero: {
            fadeInUp: {
                'data-aos': 'fade-up',
                'data-aos-delay': '0',
                'data-aos-duration': '800',
            },
            fadeInDown: {
                'data-aos': 'fade-down',
                'data-aos-delay': '0',
                'data-aos-duration': '800',
            },

            // Card/Content animations
            zoomIn: {
                'data-aos': 'zoom-in',
                'data-aos-delay': '100',
                'data-aos-duration': '600',
            },
            fadeInLeft: {
                'data-aos': 'fade-in-left',
                'data-aos-delay': '0',
                'data-aos-duration': '700',
            },
            fadeInRight: {
                'data-aos': 'fade-in-right',
                'data-aos-delay': '0',
                'data-aos-duration': '700',
            },

            // List animations (staggered)
            listItem: {
                'data-aos': 'fade-up',
                'data-aos-delay': '50',
                'data-aos-duration': '600',
            },

            // Feature/Service cards
            serviceCard: {
                'data-aos': 'fade-up',
                'data-aos-delay': '100',
                'data-aos-duration': '700',
            },

            // Project portfolio
            portfolio: {
                'data-aos': 'zoom-in-up',
                'data-aos-delay': '100',
                'data-aos-duration': '700',
            },

            // CTA sections
            cta: {
                'data-aos': 'fade-up',
                'data-aos-delay': '0',
                'data-aos-duration': '800',
            },
        }
    };
}

// Export singleton instance
const aosManager = new AOSManager();

export default aosManager;
