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
    }

    /**
     * Initialize AOS
     * Dipanggil saat aplikasi pertama kali load
     */
    init() {
        // Check prefers-reduced-motion
        if (this.prefersReducedMotion()) {
            console.info('AOS disabled: prefers-reduced-motion');
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
