/**
 * IMAGE UPLOADER WITH CLIENT-SIDE COMPRESSION & WATERMARK
 *
 * Features:
 * - Compress images to WebP format
 * - Add watermark (corner + center) dengan text "Properti Jaya Abadi Konstruksi"
 * - All processing happens on client-side
 * - Server receives ready-to-save base64 data
 */

export class ImageUploader {
    constructor() {
        this.maxSize = 350 * 1024; // 350KB
        this.quality = 0.75; // Initial quality untuk compression
        this.watermarkText = 'Properti Jaya Abadi Konstruksi';
        this.imageInput = null;
        this.previewContainer = null;
        this.uploadedImagesData = new Map(); // Store base64 data
    }

    /**
     * Initialize uploader
     */
    init(inputSelector, previewSelector) {
        this.imageInput = document.querySelector(inputSelector);
        this.previewContainer = document.querySelector(previewSelector);

        if (this.imageInput) {
            this.imageInput.addEventListener('change', (e) => this.handleImageSelect(e));
        }

        return this;
    }

    /**
     * Handle image selection dari file input
     */
    async handleImageSelect(event) {
        const files = Array.from(event.target.files);

        for (const file of files) {
            if (!this.validateFile(file)) {
                continue;
            }

            try {
                const base64Data = await this.processImage(file);
                if (base64Data) {
                    const imageId = `img_${Date.now()}_${Math.random()}`;
                    this.uploadedImagesData.set(imageId, base64Data);
                    this.addPreviewImage(imageId, base64Data, file.name);
                }
            } catch (error) {
                console.error('Error processing image:', error);
                alert('Error memproses gambar: ' + error.message);
            }
        }

        // Reset input
        this.imageInput.value = '';
    }

    /**
     * Validate file sebelum processing
     */
    validateFile(file) {
        const allowedTypes = ['image/jpeg', 'image/png', 'image/webp'];
        const maxFileSize = 10 * 1024 * 1024; // 10MB before compression

        if (!allowedTypes.includes(file.type)) {
            alert('Format file tidak didukung. Gunakan JPG, PNG, atau WebP.');
            return false;
        }

        if (file.size > maxFileSize) {
            alert('Ukuran file terlalu besar. Maksimal 10MB.');
            return false;
        }

        return true;
    }

    /**
     * Process image: load -> compress -> add watermark -> convert to WebP
     */
    async processImage(file) {
        return new Promise((resolve, reject) => {
            const reader = new FileReader();

            reader.onload = async (e) => {
                try {
                    const img = new Image();

                    img.onload = async () => {
                        // Add watermark ke image
                        const canvas = await this.addWatermarks(img);

                        // Compress dan convert ke WebP
                        const base64Data = await this.compressAndConvertToWebP(canvas);

                        // Validate size
                        if (!this.validateSize(base64Data)) {
                            // Reduce quality dan try again
                            return resolve(await this.compressAndConvertToWebP(canvas, 0.6));
                        }

                        resolve(base64Data);
                    };

                    img.onerror = () => {
                        reject(new Error('Gagal memuat gambar'));
                    };

                    img.src = e.target.result;
                } catch (error) {
                    reject(error);
                }
            };

            reader.onerror = () => {
                reject(new Error('Gagal membaca file'));
            };

            reader.readAsDataURL(file);
        });
    }

    /**
     * Add watermarks: pojok + center
     */
    async addWatermarks(img) {
        const canvas = document.createElement('canvas');
        const ctx = canvas.getContext('2d');

        // Set canvas size same as image
        canvas.width = img.width;
        canvas.height = img.height;

        // Draw original image
        ctx.drawImage(img, 0, 0);

        // Configure watermark text
        const fontSize = Math.max(20, Math.floor(canvas.height / 15));
        const fontFamily = 'Arial, sans-serif';
        const textColor = 'rgba(255, 255, 255, 0.7)';
        const shadowColor = 'rgba(0, 0, 0, 0.5)';

        // Draw center watermark (larger)
        this.drawWatermark(
            ctx,
            this.watermarkText,
            canvas.width / 2,
            canvas.height / 2,
            fontSize * 1.5,
            fontFamily,
            textColor,
            shadowColor,
            'center'
        );

        // Draw corner watermarks (smaller)
        const cornerFontSize = fontSize * 0.7;
        const padding = fontSize;

        // Top-left
        this.drawWatermark(
            ctx,
            this.watermarkText,
            padding,
            padding + cornerFontSize,
            cornerFontSize,
            fontFamily,
            textColor,
            shadowColor,
            'left'
        );

        // Top-right
        this.drawWatermark(
            ctx,
            this.watermarkText,
            canvas.width - padding,
            padding + cornerFontSize,
            cornerFontSize,
            fontFamily,
            textColor,
            shadowColor,
            'right'
        );

        // Bottom-left
        this.drawWatermark(
            ctx,
            this.watermarkText,
            padding,
            canvas.height - padding,
            cornerFontSize,
            fontFamily,
            textColor,
            shadowColor,
            'left'
        );

        // Bottom-right
        this.drawWatermark(
            ctx,
            this.watermarkText,
            canvas.width - padding,
            canvas.height - padding,
            cornerFontSize,
            fontFamily,
            textColor,
            shadowColor,
            'right'
        );

        return canvas;
    }

    /**
     * Draw text watermark dengan shadow
     */
    drawWatermark(ctx, text, x, y, fontSize, fontFamily, textColor, shadowColor, align) {
        ctx.font = `${fontSize}px ${fontFamily}`;
        ctx.textAlign = align;
        ctx.textBaseline = 'middle';

        // Draw shadow
        ctx.fillStyle = shadowColor;
        ctx.lineWidth = 3;
        ctx.strokeStyle = shadowColor;
        ctx.strokeText(text, x, y);

        // Draw text
        ctx.fillStyle = textColor;
        ctx.fillText(text, x, y);
    }

    /**
     * Compress canvas image dan convert ke WebP base64
     */
    async compressAndConvertToWebP(canvas, quality = this.quality) {
        return new Promise((resolve, reject) => {
            try {
                // Convert canvas ke WebP dengan quality setting
                canvas.toBlob(
                    (blob) => {
                        if (!blob) {
                            reject(new Error('Gagal convert ke WebP'));
                            return;
                        }

                        // Convert blob ke base64
                        const reader = new FileReader();
                        reader.onload = () => {
                            resolve(reader.result);
                        };
                        reader.onerror = () => {
                            reject(new Error('Gagal convert blob ke base64'));
                        };
                        reader.readAsDataURL(blob);
                    },
                    'image/webp',
                    quality
                );
            } catch (error) {
                reject(error);
            }
        });
    }

    /**
     * Validate base64 data size
     */
    validateSize(base64Data) {
        // base64 string berisi header "data:image/webp;base64,"
        const base64String = base64Data.split(',')[1];
        const sizeInBytes = (base64String.length * 3) / 4;
        return sizeInBytes <= this.maxSize;
    }

    /**
     * Add preview image ke UI
     */
    addPreviewImage(imageId, base64Data, originalFileName) {
        if (!this.previewContainer) return;

        const previewItem = document.createElement('div');
        previewItem.className = 'image-preview-item';
        previewItem.dataset.imageId = imageId;
        previewItem.innerHTML = `
            <div class="image-preview-wrapper">
                <img src="${base64Data}" alt="Preview" class="image-preview-img">
                <div class="image-preview-info">
                    <p class="image-preview-name">${originalFileName}</p>
                </div>
                <button type="button" class="image-preview-delete" data-image-id="${imageId}">
                    <i class="fas fa-trash"></i>
                </button>
            </div>
        `;

        this.previewContainer.appendChild(previewItem);

        // Add delete handler
        previewItem.querySelector('.image-preview-delete').addEventListener('click', (e) => {
            e.preventDefault();
            this.removePreviewImage(imageId);
        });
    }

    /**
     * Remove preview image dari UI dan data
     */
    removePreviewImage(imageId) {
        const previewItem = document.querySelector(`[data-image-id="${imageId}"]`);
        if (previewItem) {
            previewItem.remove();
        }
        this.uploadedImagesData.delete(imageId);
    }

    /**
     * Get all uploaded images data (base64 array)
     */
    getAllImagesData() {
        return Array.from(this.uploadedImagesData.values());
    }

    /**
     * Clear all data
     */
    clearAll() {
        this.uploadedImagesData.clear();
        if (this.previewContainer) {
            this.previewContainer.innerHTML = '';
        }
    }

    /**
     * Get count of uploaded images
     */
    getImageCount() {
        return this.uploadedImagesData.size;
    }
}

// Initialize when DOM ready
document.addEventListener('DOMContentLoaded', () => {
    // Initialization will be handled by Livewire component
});
