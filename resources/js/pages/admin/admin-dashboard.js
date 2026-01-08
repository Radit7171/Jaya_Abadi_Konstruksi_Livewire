/**
 * ADMIN DASHBOARD JAVASCRIPT
 * Handles all admin interactions (sidebar toggle, modal, form, etc)
 */

export class AdminDashboard {
    constructor() {
        this.sidebarToggleBtn = document.getElementById('sidebarToggle');
        this.sidebar = document.querySelector('.admin-sidebar');
        this.mainWrapper = document.querySelector('.admin-main-wrapper');
        this.layout = document.querySelector('.admin-layout');

        this.init();
    }

    /**
     * Initialize admin dashboard
     */
    init() {
        this.setupSidebarToggle();
        this.setupModalClosing();
        this.setupFormValidation();
        this.setupTableInteractions();
        this.setupSearchDebounce();
    }

    /**
     * Setup sidebar toggle for mobile
     */
    setupSidebarToggle() {
        if (!this.sidebarToggleBtn) return;

        this.sidebarToggleBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            this.toggleSidebar();
        });

        // Close sidebar when clicking outside on mobile
        document.addEventListener('click', (e) => {
            if (window.innerWidth < 992) {
                if (!this.sidebar.contains(e.target) && !this.sidebarToggleBtn.contains(e.target)) {
                    this.closeSidebar();
                }
            }
        });

        // Close sidebar on window resize
        window.addEventListener('resize', () => {
            if (window.innerWidth >= 992) {
                this.openSidebar();
            } else {
                this.closeSidebar();
            }
        });
    }

    /**
     * Toggle sidebar visibility
     */
    toggleSidebar() {
        if (this.sidebar.style.transform === 'translateX(0px)' || !this.sidebar.style.transform) {
            this.closeSidebar();
        } else {
            this.openSidebar();
        }
    }

    /**
     * Open sidebar
     */
    openSidebar() {
        if (window.innerWidth < 992) {
            this.sidebar.style.transform = 'translateX(0)';
        }
    }

    /**
     * Close sidebar
     */
    closeSidebar() {
        if (window.innerWidth < 992) {
            this.sidebar.style.transform = 'translateX(-100%)';
        }
    }

    /**
     * Setup modal closing on overlay click
     */
    setupModalClosing() {
        document.addEventListener('click', (e) => {
            const overlay = e.target.closest('.admin-modal-overlay');
            if (overlay) {
                const closeBtn = overlay.querySelector('.admin-modal-close');
                if (closeBtn) {
                    closeBtn.click();
                }
            }
        });

        // Escape key to close modal
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') {
                const modal = document.querySelector('.admin-modal');
                if (modal) {
                    const closeBtn = modal.querySelector('.admin-modal-close');
                    if (closeBtn) {
                        closeBtn.click();
                    }
                }
            }
        });
    }

    /**
     * Setup form validation styling
     */
    setupFormValidation() {
        document.addEventListener('change', (e) => {
            const input = e.target;
            if (input.classList.contains('admin-form-input') ||
                input.classList.contains('admin-form-textarea') ||
                input.classList.contains('admin-form-select')) {

                // Remove error class when user starts typing
                if (input.classList.contains('is-invalid')) {
                    input.addEventListener('input', () => {
                        input.classList.remove('is-invalid');
                    }, { once: true });
                }
            }
        });
    }

    /**
     * Setup table row interactions
     */
    setupTableInteractions() {
        // Action buttons feedback
        document.addEventListener('click', (e) => {
            const btn = e.target.closest('.admin-action-btn');
            if (btn) {
                this.addButtonFeedback(btn);
            }
        });
    }

    /**
     * Add visual feedback to button click
     */
    addButtonFeedback(btn) {
        btn.style.transform = 'scale(0.95)';
        setTimeout(() => {
            btn.style.transform = '';
        }, 150);
    }

    /**
     * Setup search input debounce
     */
    setupSearchDebounce() {
        const searchInput = document.querySelector('[wire\\:model\\.live="searchQuery"]');
        if (!searchInput) return;

        let debounceTimer;
        searchInput.addEventListener('input', () => {
            clearTimeout(debounceTimer);
            searchInput.style.opacity = '0.6';

            debounceTimer = setTimeout(() => {
                searchInput.style.opacity = '1';
            }, 300);
        });
    }

    /**
     * Reinitialize after Livewire navigation
     */
    reinit() {
        // Reset sidebar to open state on desktop
        if (window.innerWidth >= 992) {
            this.openSidebar();
        }

        // Re-setup all interactions
        this.init();
    }

    /**
     * Cleanup before navigation
     */
    destroy() {
        // Cleanup if needed
    }
}

/**
 * Initialize on DOMContentLoaded
 */
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', () => {
        window.adminDashboard = new AdminDashboard();
    });
} else {
    window.adminDashboard = new AdminDashboard();
}

/**
 * Re-initialize after Livewire SPA navigation
 */
document.addEventListener('livewire:navigated', () => {
    if (window.adminDashboard) {
        window.adminDashboard.reinit();
    } else {
        window.adminDashboard = new AdminDashboard();
    }
});
