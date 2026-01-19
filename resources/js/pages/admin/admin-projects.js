/**
 * ADMIN PROJECTS PAGE - IMAGE UPLOAD HANDLER
 *
 * Menangani file upload dengan compression dan watermark client-side
 */

import { ImageUploader } from '../../components/image-uploader.js';

// Store imageUploader globally untuk re-initialization
let currentImageUploader = null;

function initializeImageUploader() {
    // Clear old instance
    if (currentImageUploader) {
        currentImageUploader.clearAll();
    }

    // Create new uploader instance
    currentImageUploader = new ImageUploader();

    // Initialize image uploader
    currentImageUploader.init('#projectImages', '#imagesPreview');

    // Setup immediate upload to Livewire
    currentImageUploader.onImageProcessed = async (base64Data, imageId) => {
        const previewItem = document.querySelector(`[data-image-id="${imageId}"]`);
        if (previewItem) {
            const loader = document.createElement('div');
            loader.className = 'admin-image-upload-loader';
            loader.innerHTML = '<i class="fas fa-spinner fa-spin"></i>';
            previewItem.appendChild(loader);
        }

        try {
            const form = document.querySelector('.admin-modal-form');
            if (form) {
                const componentId = form.closest('[wire\\:id]').getAttribute('wire:id');
                const component = window.Livewire.find(componentId);

                // Upload single image immediately
                await component.saveProjectImages([base64Data]);

                // After successful upload to server, remove the temporary JS preview
                // because it will now appear in the Livewire-managed grid
                if (previewItem) {
                    previewItem.classList.add('fade-out');
                    setTimeout(() => {
                        currentImageUploader.removePreviewImage(imageId);
                    }, 300);
                }
            }
        } catch (error) {
            console.error('Immediate upload failed:', error);
            if (previewItem) {
                previewItem.innerHTML += '<div class="alert alert-danger p-1 mt-1 small">Gagal upload</div>';
            }
        }
    };

    // Setup upload area drag & drop
    setupDragDrop(currentImageUploader);

    // Handle form submission
    setupFormSubmission(currentImageUploader);

    console.log('ImageUploader initialized successfully');
}

// Initialize on page load
document.addEventListener('DOMContentLoaded', () => {
    initializeImageUploader();

    // Re-initialize when Livewire updates (modal opens/closes)
    // Livewire 3 uses Livewire.on
    if (window.Livewire) {
        window.Livewire.on('projectFormReset', () => {
            console.log('Resetting ImageUploader (Livewire event)...');
            // Give Livewire time to update the DOM
            setTimeout(() => {
                initializeImageUploader();
            }, 100);
        });
    }
});

// Also try Alpine.js initialization if available as backup
document.addEventListener('alpine:init', () => {
    // This can be used if we add x-init to the modal
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

    // Flag to prevent double submission
    let isProcessing = false;

    async function handleFormSubmit(e) {
        if (isProcessing) return;

        e.preventDefault();
        e.stopImmediatePropagation();

        const imagesBase64Array = imageUploader.getAllImagesData();
        console.log('Submit caught. New images:', imagesBase64Array.length);

        const submitBtn = form.querySelector('button[type="submit"]');
        const originalText = submitBtn ? submitBtn.innerHTML : '';

        if (submitBtn) {
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Memproses...';
        }

        isProcessing = true;

        try {
            const componentContainer = form.closest('[wire\\:id]');
            if (!componentContainer) throw new Error('Livewire component not found');

            const componentId = componentContainer.getAttribute('wire:id');
            const component = window.Livewire.find(componentId);

            // Images are now uploaded immediately via onImageProcessed
            // So we just call saveProject()

            console.log('Saving project data...');
            await component.saveProject();

        } catch (error) {
            console.error('Submission error:', error);
            alert('Gagal menyimpan: ' + error.message);
        } finally {
            if (submitBtn) {
                submitBtn.disabled = false;
                submitBtn.innerHTML = originalText;
            }
            isProcessing = false;
        }
    }

    form.removeEventListener('submit', handleFormSubmit);
    form.addEventListener('submit', handleFormSubmit);
}

// Handle modal close event
document.addEventListener('click', (e) => {
    if (e.target.closest('.admin-modal-close')) {
        // Clear file input
        const input = document.querySelector('#projectImages');
        if (input) {
            input.value = '';
        }
    }
});
