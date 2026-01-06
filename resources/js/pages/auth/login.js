/**
 * LOGIN PAGE JAVASCRIPT
 * Progressive enhancement untuk form functionality
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
        this.setupPasswordToggle();
        this.setupFormValidation();
        this.setupFormSubmit();
        this.setupAccessibility();
    }

    /**
     * Password visibility toggle
     */
    setupPasswordToggle() {
        const passwordInput = this.page.querySelector('#password');
        if (!passwordInput) return;

        const formGroup = passwordInput.closest('.auth-form-group');
        if (!formGroup) return;

        // Create wrapper only for toggle button positioning
        let wrapper = formGroup.querySelector('.auth-password-wrapper');
        if (!wrapper) {
            wrapper = document.createElement('div');
            wrapper.className = 'auth-password-wrapper';
            passwordInput.parentNode.insertBefore(wrapper, passwordInput);
            wrapper.appendChild(passwordInput);
        }

        // Create toggle button if not exists
        let toggleBtn = wrapper.querySelector('.auth-password-toggle');
        if (!toggleBtn) {
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
     * Real-time form validation
     */
    setupFormValidation() {
        const emailInput = this.page.querySelector('#email');
        const passwordInput = this.page.querySelector('#password');
        const form = this.page.querySelector('.auth-form');

        if (!form) return;

        // Email validation
        if (emailInput) {
            emailInput.addEventListener('blur', () => {
                this.validateEmail(emailInput);
            });

            emailInput.addEventListener('input', () => {
                if (emailInput.value.trim()) {
                    this.clearError(emailInput);
                }
            });
        }

        // Password validation
        if (passwordInput) {
            passwordInput.addEventListener('blur', () => {
                this.validatePassword(passwordInput);
            });

            passwordInput.addEventListener('input', () => {
                if (passwordInput.value.trim()) {
                    this.clearError(passwordInput);
                }
            });
        }
    }

    /**
     * Validate email format
     */
    validateEmail(input) {
        const email = input.value.trim();
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        if (!email) {
            this.showError(input, 'Email wajib diisi');
            return false;
        }

        if (!emailRegex.test(email)) {
            this.showError(input, 'Format email tidak valid');
            return false;
        }

        this.clearError(input);
        return true;
    }

    /**
     * Validate password
     */
    validatePassword(input) {
        const password = input.value;

        if (!password) {
            this.showError(input, 'Password wajib diisi');
            return false;
        }

        if (password.length < 8) {
            this.showError(input, 'Password minimal 8 karakter');
            return false;
        }

        this.clearError(input);
        return true;
    }

    /**
     * Show error message (disabled - Livewire handles server-side validation)
     */
    showError(input, message) {
        // Let Livewire handle error display via blade
        input.classList.add('auth-input-error');
    }

    /**
     * Clear error message (disabled - Livewire handles server-side validation)
     */
    clearError(input) {
        // Let Livewire handle error display via blade
        input.classList.remove('auth-input-error');
    }

    /**
     * Form submit handling
     */
    setupFormSubmit() {
        const form = this.page.querySelector('.auth-form');
        const submitBtn = form?.querySelector('.auth-btn-primary');

        if (!form || !submitBtn) return;

        form.addEventListener('submit', (e) => {
            const emailInput = form.querySelector('#email');
            const passwordInput = form.querySelector('#password');

            // Validate on submit
            const emailValid = emailInput ? this.validateEmail(emailInput) : true;
            const passwordValid = passwordInput ? this.validatePassword(passwordInput) : true;

            if (!emailValid || !passwordValid) {
                e.preventDefault();
                submitBtn.blur();
            }
        });
    }

    /**
     * Accessibility enhancements
     */
    setupAccessibility() {
        // Add aria-describedby to inputs with errors
        const inputs = this.page.querySelectorAll('.auth-input');
        inputs.forEach((input) => {
            const errorMsg = input.parentNode.querySelector('.auth-error-message');
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
            const inputs = form.querySelectorAll('input, button[type="submit"]');
            inputs.forEach((input, index) => {
                input.addEventListener('keydown', (e) => {
                    if (e.key === 'Enter' && input !== inputs[inputs.length - 1]) {
                        e.preventDefault();
                        inputs[index + 1]?.focus();
                    }
                });
            });
        }
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
