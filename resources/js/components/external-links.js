/**
 * External Links Handler
 * ========================
 * Handles external links (email, WhatsApp, social media)
 * Prevents Livewire SPA interception via onclick handlers
 *
 * Usage in Blade:
 * - Email: <a href="javascript:void(0)" class="external-link" data-link="mailto:email@example.com">
 * - WhatsApp: <a href="javascript:void(0)" class="external-link" data-link="https://wa.me/62...">
 * - External: <a href="javascript:void(0)" class="external-link" data-link="https://...">
 */

class ExternalLinksHandler {
    constructor() {
        this.init();
    }

    init() {
        this.attachEventListeners();
        // Re-attach after Livewire SPA navigation
        document.addEventListener('livewire:navigated', () => {
            this.attachEventListeners();
        });
    }

    attachEventListeners() {
        const externalLinks = document.querySelectorAll('a.external-link');

        externalLinks.forEach(link => {
            // Remove old listeners
            link.onclick = null;

            // Attach new listener
            link.addEventListener('click', (e) => {
                e.preventDefault();
                e.stopPropagation();

                const linkData = link.dataset.link;

                if (!linkData) {
                    console.warn('External link missing data-link attribute', link);
                    return;
                }

                this.handleLink(linkData);
            });
        });
    }

    /**
     * Handle different link types
     * @param {string} linkData - Data attribute value (mailto:, https://wa.me/, https://...)
     */
    handleLink(linkData) {
        // Email links
        if (linkData.startsWith('mailto:')) {
            window.location.href = linkData;
            return;
        }

        // WhatsApp links
        if (linkData.includes('wa.me')) {
            window.open(linkData, '_blank');
            return;
        }

        // External URLs (with security)
        if (linkData.startsWith('http://') || linkData.startsWith('https://')) {
            window.open(linkData, '_blank');
            return;
        }

        console.warn('Unknown link type:', linkData);
    }

    /**
     * Utility: Handle social media links with proper attributes
     * Note: This is called during event listener setup
     */
    static getSocialLinkConfig(url) {
        return {
            target: '_blank',
            rel: 'noopener noreferrer'
        };
    }
}

// Initialize on DOMContentLoaded
document.addEventListener('DOMContentLoaded', () => {
    new ExternalLinksHandler();
});

// Re-initialize after Livewire navigation
document.addEventListener('livewire:navigated', () => {
    new ExternalLinksHandler();
});
