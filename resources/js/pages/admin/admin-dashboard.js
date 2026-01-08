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
        this.isMobile = window.innerWidth < 992;

        // Initialize mobile-hidden class on mobile
        if (this.isMobile && this.sidebar) {
            this.sidebar.classList.add('mobile-hidden');
        }

        this.setupSidebarToggle();
        this.setupModalClosing();
        this.setupFormValidation();
        this.setupTableInteractions();
        this.setupSearchDebounce();
    }

    /**
     * Setup sidebar toggle for mobile and desktop
     */
    setupSidebarToggle() {
        if (!this.sidebarToggleBtn) return;

        this.sidebarToggleBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            this.toggleSidebar();
        });

        // Close sidebar when clicking sidebar links on mobile only
        if (this.sidebar) {
            const sidebarLinks = this.sidebar.querySelectorAll('.admin-sidebar-link');
            sidebarLinks.forEach(link => {
                link.addEventListener('click', () => {
                    if (this.isMobile) {
                        this.closeSidebar();
                    }
                });
            });
        }

        // Close sidebar when clicking outside on mobile only
        document.addEventListener('click', (e) => {
            if (this.isMobile && this.sidebar) {
                if (!this.sidebar.contains(e.target) && !this.sidebarToggleBtn.contains(e.target)) {
                    this.closeSidebar();
                }
            }
        });

        // Update mobile flag on window resize
        window.addEventListener('resize', () => {
            this.isMobile = window.innerWidth < 992;
            if (window.innerWidth >= 992 && this.sidebar) {
                this.sidebar.classList.remove('mobile-hidden');
            } else if (window.innerWidth < 992 && this.sidebar && !this.sidebar.classList.contains('mobile-hidden')) {
                this.sidebar.classList.add('mobile-hidden');
            }
        });
    }

    /**
     * Toggle sidebar visibility
     */
    toggleSidebar() {
        this.sidebar.classList.toggle('mobile-hidden');
        // Also toggle the layout class for desktop
        this.layout.classList.toggle('sidebar-collapsed');
    }

    /**
     * Open sidebar
     */
    openSidebar() {
        this.sidebar.classList.remove('mobile-hidden');
        this.layout.classList.remove('sidebar-collapsed');
    }

    /**
     * Close sidebar
     */
    closeSidebar() {
        if (this.isMobile) {
            this.sidebar.classList.add('mobile-hidden');
            this.layout.classList.remove('sidebar-collapsed');
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
