/**
 * ADMIN DASHBOARD JAVASCRIPT
 * Handles all admin interactions (sidebar toggle, modal, form, etc)
 */

export class AdminDashboard {
    constructor() {
        this.init();
    }

    /**
     * Initialize all elements and setup handlers
     */
    init() {
        this.sidebarToggleBtn = document.getElementById('sidebarToggle');
        this.sidebar = document.querySelector('.admin-sidebar');
        this.mainWrapper = document.querySelector('.admin-main-wrapper');
        this.layout = document.querySelector('.admin-layout');
        this.isMobile = window.innerWidth < 992;

        // Initialize mobile-hidden class on mobile
        if (this.isMobile && this.sidebar) {
            this.sidebar.classList.add('mobile-hidden');
        } else if (!this.isMobile && this.sidebar) {
            this.sidebar.classList.remove('mobile-hidden');
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
        if (!this.sidebarToggleBtn || !this.sidebar || !this.layout) return;

        // Remove old listeners if they exist
        this.removeSidebarListeners();

        // Toggle button click handler
        this.boundToggleClick = (e) => {
            e.preventDefault();
            e.stopPropagation();
            this.sidebar.classList.toggle('mobile-hidden');
            this.layout.classList.toggle('sidebar-collapsed');
            this.updateToggleIcon();
        };

        // Click outside to close sidebar on mobile
        this.boundDocumentClick = (e) => {
            if (!this.isMobile) return;

            const clickedOnSidebar = this.sidebar.contains(e.target);
            const clickedOnToggle = this.sidebarToggleBtn.contains(e.target);

            if (!clickedOnSidebar && !clickedOnToggle) {
                this.sidebar.classList.add('mobile-hidden');
                this.updateToggleIcon();
            }
        };

        // Window resize handler
        this.boundWindowResize = () => {
            this.isMobile = window.innerWidth < 992;
            if (window.innerWidth >= 992 && this.sidebar) {
                this.sidebar.classList.remove('mobile-hidden');
                this.updateToggleIcon();
            } else if (window.innerWidth < 992 && this.sidebar) {
                this.sidebar.classList.add('mobile-hidden');
                this.updateToggleIcon();
            }
        };

        // Attach event listeners
        this.sidebarToggleBtn.addEventListener('click', this.boundToggleClick);
        document.addEventListener('click', this.boundDocumentClick);
        window.addEventListener('resize', this.boundWindowResize);

        // Close sidebar on link click (mobile only)
        const sidebarLinks = this.sidebar.querySelectorAll('.admin-sidebar-link');
        sidebarLinks.forEach(link => {
            link.addEventListener('click', () => {
                if (this.isMobile) {
                    setTimeout(() => {
                        this.sidebar.classList.add('mobile-hidden');
                        this.updateToggleIcon();
                    }, 100);
                }
            });
        });

        // Initialize icon
        this.updateToggleIcon();
    }

    /**
     * Update toggle icon based on sidebar state
     */
    updateToggleIcon() {
        const icon = document.getElementById('sidebarToggleIcon');
        if (!icon) return;

        const isCollapsed = this.layout.classList.contains('sidebar-collapsed');
        if (isCollapsed) {
            icon.className = 'fas fa-chevron-right';
        } else {
            icon.className = 'fas fa-chevron-left';
        }
    }

    /**
     * Remove old sidebar event listeners
     */
    removeSidebarListeners() {
        if (this.boundToggleClick && this.sidebarToggleBtn) {
            this.sidebarToggleBtn.removeEventListener('click', this.boundToggleClick);
        }
        if (this.boundDocumentClick) {
            document.removeEventListener('click', this.boundDocumentClick);
        }
        if (this.boundWindowResize) {
            window.removeEventListener('resize', this.boundWindowResize);
        }
    }

    /**
     * Toggle sidebar visibility
     */
    toggleSidebar() {
        if (this.sidebar && this.layout) {
            this.sidebar.classList.toggle('mobile-hidden');
            this.layout.classList.toggle('sidebar-collapsed');
        }
    }

    /**
     * Open sidebar
     */
    openSidebar() {
        if (this.sidebar && this.layout) {
            this.sidebar.classList.remove('mobile-hidden');
            this.layout.classList.remove('sidebar-collapsed');
        }
    }

    /**
     * Close sidebar
     */
    closeSidebar() {
        if (this.sidebar) {
            this.sidebar.classList.add('mobile-hidden');
            if (!this.isMobile && this.layout) {
                this.layout.classList.remove('sidebar-collapsed');
            }
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
        // Refresh DOM element references
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
