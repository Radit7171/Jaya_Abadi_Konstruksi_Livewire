/**
 * LOGIN PAGE JAVASCRIPT
 * Progressive enhancement untuk form functionality
 * All validation handled by Livewire server-side
 */

class LoginPageEnhancer {
    constructor() {
        this.page = document.querySelector('.auth-login-page');
        if (!this.page) return;

        this.init();
        this.registerLivewireListener();
    }

    /**
     * Initialize all features
     */
    init() {
        this.ensureInputsClickable();
        this.setupPasswordToggle();
        this.setupAccessibility();
        console.log('Login page enhancer initialized (validation by Livewire)');
    }

    /**
     * Ensure inputs are clickable - fix for pointer-events issues
     */
    ensureInputsClickable() {
        const inputs = this.page.querySelectorAll('input, button, label');
        inputs.forEach((element) => {
            // Force pointer-events: auto
            element.style.pointerEvents = 'auto';

            // Set proper cursor for each element
            if (element.tagName === 'INPUT') {
                if (element.type === 'text' || element.type === 'email' || element.type === 'password') {
                    element.style.cursor = 'text';
                } else if (element.type === 'checkbox') {
                    element.style.cursor = 'pointer';
                }
            } else if (element.tagName === 'BUTTON') {
                element.style.cursor = 'pointer';
            } else if (element.tagName === 'LABEL') {
                element.style.cursor = 'pointer';
            }

            // Ensure elements can receive clicks
            element.addEventListener('mousedown', (e) => {
                e.stopPropagation();
            });

            // Also listen to click to ensure it works
            element.addEventListener('click', (e) => {
                e.stopPropagation();
            });
        });

        // Also ensure parent containers don't block events
        const containers = this.page.querySelectorAll('.auth-form, .auth-form-group, .auth-checkbox-label');
        containers.forEach((container) => {
            container.style.pointerEvents = 'auto';
        });

        // Specific fix for checkbox label - make it more interactive
        const checkboxLabel = this.page.querySelector('.auth-checkbox-label');
        if (checkboxLabel) {
            checkboxLabel.style.pointerEvents = 'auto';
            checkboxLabel.style.cursor = 'pointer';
        }
    }

    /**
     * Password visibility toggle
     */
    setupPasswordToggle() {
        const passwordInput = this.page.querySelector('#password');
        if (!passwordInput) return;

        const wrapper = passwordInput.closest('.auth-password-wrapper');
        if (!wrapper) return;

        // Get the toggle button (should already exist in blade)
        let toggleBtn = wrapper.querySelector('.auth-password-toggle');
        if (!toggleBtn) {
            // Fallback: create if somehow missing
            toggleBtn = document.createElement('button');
            toggleBtn.type = 'button';
            toggleBtn.className = 'auth-password-toggle';
            toggleBtn.setAttribute('aria-label', 'Toggle password visibility');
            toggleBtn.setAttribute('title', 'Tampilkan/Sembunyikan password');
            toggleBtn.innerHTML = '<i class="fas fa-eye"></i>';
            wrapper.appendChild(toggleBtn);
        }

        // Toggle functionality
        let isVisible = false;
        toggleBtn.addEventListener('click', (e) => {
            e.preventDefault();
            e.stopPropagation();
            isVisible = !isVisible;

            if (isVisible) {
                passwordInput.type = 'text';
                toggleBtn.innerHTML = '<i class="fas fa-eye-slash"></i>';
                toggleBtn.setAttribute('aria-label', 'Hide password');
            } else {
                passwordInput.type = 'password';
                toggleBtn.innerHTML = '<i class="fas fa-eye"></i>';
                toggleBtn.setAttribute('aria-label', 'Show password');
            }

            passwordInput.focus();
        });

        // Hide on blur for security
        passwordInput.addEventListener('blur', () => {
            if (isVisible) {
                isVisible = false;
                passwordInput.type = 'password';
                toggleBtn.innerHTML = '<i class="fas fa-eye"></i>';
            }
        });
    }

    /**
     * Setup accessibility enhancements
     */
    setupAccessibility() {
        // Add aria-describedby to inputs with errors
        const inputs = this.page.querySelectorAll('.auth-input');
        inputs.forEach((input) => {
            const errorMsg = input.closest('.auth-form-group')?.querySelector('.auth-error-text');
            if (errorMsg) {
                const errorId = `${input.id}-error`;
                errorMsg.id = errorId;
                input.setAttribute('aria-describedby', errorId);
                input.setAttribute('aria-invalid', 'true');
            }
        });

        // Keyboard navigation
        const form = this.page.querySelector('.auth-form');
        if (form) {
            const inputs = form.querySelectorAll('input:not([type="checkbox"]), button[type="submit"]');
            inputs.forEach((input, index) => {
                input.addEventListener('keydown', (e) => {
                    if (e.key === 'Enter' && input !== inputs[inputs.length - 1]) {
                        e.preventDefault();
                        inputs[index + 1]?.focus();
                    }
                });
            });
        }

        // Monitor for Livewire validation errors
        document.addEventListener('livewire:updated', () => {
            setTimeout(() => {
                const errorElements = this.page.querySelectorAll('.auth-error-text');
                if (errorElements.length > 0) {
                    console.log('Validation errors found:', errorElements.length);
                    errorElements.forEach((el, idx) => {
                        console.log(`Error ${idx + 1}:`, el.textContent);
                    });
                }
            }, 100);
        });
    }

    /**
     * Register Livewire listener for SPA navigation
     */
    registerLivewireListener() {
        document.addEventListener('livewire:navigated', () => {
            // Re-initialize after SPA navigation
            const newPage = document.querySelector('.auth-login-page');
            if (newPage) {
                this.page = newPage;
                this.init();
            }
        });
    }

    /**
     * Cleanup
     */
    destroy() {
        if (!this.page) return;
        // Cleanup logic if needed
    }
}

// Initialize on DOM ready
document.addEventListener('DOMContentLoaded', () => {
    new LoginPageEnhancer();
});

// Re-initialize after Livewire navigation
document.addEventListener('livewire:navigated', () => {
    new LoginPageEnhancer();
});

