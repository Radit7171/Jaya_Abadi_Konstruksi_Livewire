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
        this.onImageProcessed = null; // Callback for immediate handling
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

        console.log('Image select triggered, files count:', files.length);

        for (const file of files) {
            if (!this.validateFile(file)) {
                continue;
            }

            try {
                console.log('Processing file:', file.name);
                const base64Data = await this.processImage(file);
                if (base64Data) {
                    const imageId = `img_${Date.now()}_${Math.random()}`;
                    this.uploadedImagesData.set(imageId, base64Data);
                    console.log('Image stored with ID:', imageId, 'Total images:', this.uploadedImagesData.size);
                    this.addPreviewImage(imageId, base64Data, file.name);

                    // Call immediate upload callback if exists
                    if (this.onImageProcessed) {
                        this.onImageProcessed(base64Data, imageId);
                    }
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
     * Add watermarks: Stylized diagonal pattern + main signature
     */
    async addWatermarks(img) {
        const canvas = document.createElement('canvas');
        const ctx = canvas.getContext('2d');

        // Set canvas size same as image
        canvas.width = img.width;
        canvas.height = img.height;

        // Draw original image
        ctx.drawImage(img, 0, 0);

        // Configure watermark style
        const baseFontSize = Math.max(16, Math.floor(canvas.width / 25));
        const fontFamily = 'Sora, Inter, Arial, sans-serif';
        const colorMain = 'rgba(255, 255, 255, 0.4)';
        const colorPattern = 'rgba(255, 255, 255, 0.15)';
        const colorShadow = 'rgba(0, 0, 0, 0.3)';

        // 1. Draw Tiled Diagonal Pattern (Professional background protection)
        this.drawDiagonalPattern(ctx, this.watermarkText, baseFontSize * 0.8, colorPattern);

        // 2. Draw Main Center Watermark (Semi-transparent, professional)
        ctx.save();
        ctx.translate(canvas.width / 2, canvas.height / 2);
        ctx.rotate(-Math.atan(canvas.height / canvas.width)); // Align with diagonal

        this.drawWatermark(
            ctx,
            this.watermarkText,
            0,
            0,
            baseFontSize * 2,
            fontFamily,
            colorMain,
            colorShadow,
            'center'
        );
        ctx.restore();

        // 3. Draw Bottom Right "Official Stamp" feel
        this.drawWatermark(
            ctx,
            `© JAYA ABADI KONSTRUKSI`,
            canvas.width - (baseFontSize),
            canvas.height - (baseFontSize),
            baseFontSize * 0.6,
            fontFamily,
            'rgba(255, 255, 255, 0.6)',
            colorShadow,
            'right'
        );

        return canvas;
    }

    /**
     * Draw repeating diagonal pattern across the canvas
     */
    drawDiagonalPattern(ctx, text, fontSize, color) {
        ctx.save();
        ctx.font = `600 ${fontSize}px Sora, Inter, sans-serif`;
        ctx.fillStyle = color;
        ctx.textAlign = 'center';
        ctx.textBaseline = 'middle';

        const angle = -30 * Math.PI / 180;
        ctx.rotate(angle);

        // Determine area to cover after rotation
        const spaceX = fontSize * 10;
        const spaceY = fontSize * 5;

        // Offset to start before the visible area to cover everything after rotation
        for (let y = -ctx.canvas.height; y < ctx.canvas.height * 2; y += spaceY) {
            for (let x = -ctx.canvas.width; x < ctx.canvas.width * 2; x += spaceX) {
                ctx.fillText(text, x, y);
            }
        }
        ctx.restore();
    }

    /**
     * Draw text watermark with stylized shadow/glow
     */
    drawWatermark(ctx, text, x, y, fontSize, fontFamily, textColor, shadowColor, align) {
        ctx.save();
        ctx.font = `700 ${fontSize}px ${fontFamily}`;
        ctx.textAlign = align;
        ctx.textBaseline = 'middle';

        // Add subtle glow/shadow for readability on light backgrounds
        ctx.shadowColor = shadowColor;
        ctx.shadowBlur = fontSize / 4;
        ctx.shadowOffsetX = 2;
        ctx.shadowOffsetY = 2;

        // Draw text
        ctx.fillStyle = textColor;
        ctx.fillText(text, x, y);

        ctx.restore();
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
     * Add preview image ke UI dengan info size
     */
    addPreviewImage(imageId, base64Data, originalFileName) {
        if (!this.previewContainer) return;

        // Calculate compressed size
        const base64String = base64Data.split(',')[1];
        const sizeInBytes = (base64String.length * 3) / 4;
        const sizeInKB = (sizeInBytes / 1024).toFixed(2);

        const previewItem = document.createElement('div');
        previewItem.className = 'admin-image-preview-item';
        previewItem.dataset.imageId = imageId;
        previewItem.innerHTML = `
            <img src="${base64Data}" alt="Preview - ${originalFileName}" class="admin-preview-img">
            <div class="admin-preview-info">
                <div class="admin-preview-filename">${originalFileName}</div>
                <div class="admin-preview-size">${sizeInKB} KB</div>
            </div>
            <button type="button" class="admin-preview-delete" data-image-id="${imageId}" title="Hapus gambar">
                <i class="fas fa-trash"></i>
            </button>
        `;

        this.previewContainer.appendChild(previewItem);

        // Add delete handler
        previewItem.querySelector('.admin-preview-delete').addEventListener('click', (e) => {
            e.preventDefault();
            e.stopPropagation();
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
