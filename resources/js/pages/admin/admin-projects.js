/**
 * ADMIN PROJECTS PAGE - IMAGE UPLOAD HANDLER
 *
 * Menangani file upload dengan compression dan watermark client-side
 * Form inputs are automatically clickable (no special handling needed)
 */

import { ImageUploader } from '../../components/image-uploader.js';

document.addEventListener('DOMContentLoaded', () => {
    const imageUploader = new ImageUploader();

    // Initialize image uploader
    imageUploader.init('#projectImages', '#imagesPreview');

    // Setup upload area drag & drop
    setupDragDrop(imageUploader);

    // Handle form submission
    setupFormSubmission(imageUploader);
});

/**
 * Setup drag & drop untuk upload area
 */
function setupDragDrop(imageUploader) {
    const uploadArea = document.querySelector('.admin-image-upload-area');

    if (!uploadArea) return;

    ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
        uploadArea.addEventListener(eventName, preventDefaults, false);
    });

    function preventDefaults(e) {
        e.preventDefault();
        e.stopPropagation();
    }

    ['dragenter', 'dragover'].forEach(eventName => {
        uploadArea.addEventListener(eventName, highlight, false);
    });

    ['dragleave', 'drop'].forEach(eventName => {
        uploadArea.addEventListener(eventName, unhighlight, false);
    });

    function highlight(e) {
        uploadArea.classList.add('drag-active');
    }

    function unhighlight(e) {
        uploadArea.classList.remove('drag-active');
    }

    uploadArea.addEventListener('drop', handleDrop, false);

    function handleDrop(e) {
        const dt = e.dataTransfer;
        const files = dt.files;
        const input = document.querySelector('#projectImages');

        // Set files ke input element
        input.files = files;

        // Trigger change event
        input.dispatchEvent(new Event('change', { bubbles: true }));
    }
}

/**
 * Setup form submission
 * Kirim images ke Livewire sebelum save
 */
function setupFormSubmission(imageUploader) {
    const form = document.querySelector('.admin-modal-form');

    if (!form) return;

    form.addEventListener('submit', async (e) => {
        e.preventDefault();

        // Get all compressed images dari imageUploader
        const imagesBase64Array = imageUploader.getAllImagesData();

        if (imagesBase64Array.length === 0) {
            alert('Minimal tambahkan 1 gambar proyek');
            return;
        }

        // Show loading state
        const submitBtn = form.querySelector('button[type="submit"]');
        const originalText = submitBtn.innerHTML;
        submitBtn.disabled = true;
        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Memproses gambar...';

        try {
            // Dispatch Livewire event untuk save images
            await window.Livewire.dispatch('saveProjectImages', [imagesBase64Array]);

            // Small delay untuk memastikan images tersimpan
            await new Promise(resolve => setTimeout(resolve, 500));

            // Submit form ke Livewire
            form.dispatchEvent(new SubmitEvent('submit', { bubbles: true }));

        } catch (error) {
            console.error('Error saving images:', error);
            alert('Error memproses gambar: ' + error.message);
            submitBtn.disabled = false;
            submitBtn.innerHTML = originalText;
        }
    });
}

/**
 * Listen untuk modal close event
 * Reset imageUploader state
 */
document.addEventListener('livewire:navigated', () => {
    // Jika modal ditutup, clear image uploader
    const modal = document.querySelector('.admin-modal-overlay');
    if (!modal) {
        const imageUploader = new ImageUploader();
        imageUploader.clearAll();
    }
});

// Handle modal close button click
document.addEventListener('click', (e) => {
    if (e.target.closest('.admin-modal-close')) {
        // Clear file input
        const input = document.querySelector('#projectImages');
        if (input) {
            input.value = '';
        }
    }

    // Force focus on admin form elements if left-clicked
    if (e.target.matches('.admin-form-input, .admin-form-textarea, .admin-form-select')) {
        e.target.focus();
    }
});

// Extra fix: Listen specifically for mousedown to ensure focus
document.addEventListener('mousedown', (e) => {
    if (e.target.matches('.admin-form-input, .admin-form-textarea, .admin-form-select')) {
        // Ensure element is not disabled
        if (!e.target.disabled) {
            e.target.focus();
        }
    }
});
