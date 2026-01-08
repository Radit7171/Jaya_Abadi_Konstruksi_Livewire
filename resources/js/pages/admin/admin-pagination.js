/**
 * Admin Pagination JavaScript
 * Handles pagination interactions and animations
 */

class AdminPagination {
    constructor() {
        this.initPagination();
        this.addEventListeners();
    }

    /**
     * Initialize pagination on page load
     */
    initPagination() {
        const paginationLinks = document.querySelectorAll('.admin-pagination-link');
        paginationLinks.forEach((link) => {
            this.enhanceLink(link);
        });
    }

    /**
     * Enhance pagination link with smooth interactions
     */
    enhanceLink(link) {
        link.addEventListener('mouseenter', () => {
            if (!link.closest('.admin-pagination-item.disabled') && !link.closest('.admin-pagination-item.active')) {
                link.style.transform = 'translateY(-2px)';
            }
        });

        link.addEventListener('mouseleave', () => {
            link.style.transform = 'translateY(0)';
        });

        link.addEventListener('click', (e) => {
            if (link.closest('.admin-pagination-item.disabled')) {
                e.preventDefault();
                e.stopPropagation();
            }
        });
    }

    /**
     * Add global event listeners
     */
    addEventListeners() {
        // Handle Livewire pagination updates
        if (window.Livewire) {
            window.Livewire.on('paginate', () => {
                setTimeout(() => {
                    this.initPagination();
                    this.scrollToTable();
                }, 100);
            });
        }
    }

    /**
     * Smooth scroll to table after pagination
     */
    scrollToTable() {
        const tableSection = document.querySelector('.admin-table-section');
        if (tableSection) {
            tableSection.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }
    }

    /**
     * Update pagination UI after navigation
     */
    updatePaginationUI() {
        const paginationItems = document.querySelectorAll('.admin-pagination-item');
        paginationItems.forEach((item) => {
            if (item.classList.contains('active')) {
                item.setAttribute('aria-current', 'page');
            }
        });
    }
}

// Initialize pagination on DOM ready
document.addEventListener('DOMContentLoaded', () => {
    new AdminPagination();
});
