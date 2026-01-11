# 📸 PROJECTS IMAGE UPLOAD & COMPRESSION SYSTEM

**Last Updated**: January 11, 2026  
**Status**: ✅ Fully Implemented

---

## 🎯 OVERVIEW

Sistem upload gambar proyek dengan fitur:
- ✅ **Multiple file upload** - Upload multiple images sekaligus
- ✅ **Client-side compression** - Compress ke WebP format (max 350KB)
- ✅ **Client-side watermark** - Watermark otomatis di 4 pojok + tengah
- ✅ **Drag-drop support** - Intuitive file upload
- ✅ **Preview before save** - Lihat preview sebelum save
- ✅ **Auto folder structure** - Folder `public/uploads/YYYY-MM-DD/`
- ✅ **Server-light processing** - Server hanya menerima file siap simpan

---

## 📁 FILES YANG DIBUAT

### Backend
- `app/Services/ImageService.php` - Service untuk save/delete images
- `database/migrations/2026_01_11_000001_add_images_to_projects_table.php` - Add kolom images (JSON)

### Frontend
- `resources/js/components/image-uploader.js` - Class untuk image processing
- `resources/js/pages/admin/admin-projects.js` - Handler untuk admin projects page
- `resources/css/components/admin-image-upload.css` - Styling upload component

### Files Modified
- `app/Models/Project.php` - Add `images` field & `getImageUrls()` method
- `app/Livewire/Admin/AdminProjects.php` - Add image handling logic
- `resources/views/livewire/admin/projects-page.blade.php` - Add image upload UI
- `resources/css/app.css` - Import admin-image-upload.css
- `resources/js/app.js` - Import admin-projects.js

---

## 🏗️ ARCHITECTURE

### Data Flow

```
User Select Files
     ↓
JavaScript: ImageUploader.processImage()
     ↓
Load → Compress → Add Watermark → Convert WebP → Validate Size
     ↓
Base64 Array stored in JS memory
     ↓
User click Submit
     ↓
Dispatch Livewire event: saveProjectImages([base64_array])
     ↓
AdminProjects.saveProjectImages() - validate & save paths
     ↓
Form submission: saveProject()
     ↓
Laravel: ImageService.saveUploadedImage(base64)
     ↓
Save to: storage/app/public/uploads/YYYY-MM-DD/{uuid}.webp
     ↓
Store paths array in DB as JSON
```

### Database Schema

```
projects table:
- id
- title
- description
- category
- image_url (legacy, untuk thumbnail)
- image_alt
- images (JSON) ← NEW
  [
    "uploads/2026-01-11/abc123def456.webp",
    "uploads/2026-01-11/xyz789uvw123.webp"
  ]
- is_published
- published_at
- created_at
- updated_at
```

---

## 🎨 CLIENT-SIDE IMAGE PROCESSING

### ImageUploader Class (`resources/js/components/image-uploader.js`)

**Main Methods:**

#### `init(inputSelector, previewSelector)`
Initialize uploader dengan file input dan preview container selectors.

```javascript
const uploader = new ImageUploader();
uploader.init('#projectImages', '#imagesPreview');
```

#### `processImage(file)`
Main processing pipeline:
1. Load image dari file
2. Add watermarks (pojok + center)
3. Compress & convert ke WebP
4. Validate size (≤ 350KB)
5. Return base64 data

#### `addWatermarks(img)`
Tambahkan watermark di:
- **Center**: Large text "Properti Jaya Abadi Konstruksi"
- **Corners**: Small text di 4 pojok (top-left, top-right, bottom-left, bottom-right)

Watermark styling:
- Text color: `rgba(255, 255, 255, 0.7)` (semi-transparent white)
- Shadow: `rgba(0, 0, 0, 0.5)` (dark shadow untuk contrast)
- Font: Arial/sans-serif
- Responsive sizing berdasarkan image height

#### `compressAndConvertToWebP(canvas, quality)`
Convert canvas ke WebP dengan quality control:
- Default quality: 0.75 (good balance)
- If size > 350KB, retry dengan quality 0.6
- Return base64 string dengan MIME type

#### `getAllImagesData()`
Get array semua base64 images yang sudah diproses.

#### `clearAll()`
Clear semua data dan reset preview.

---

## 🔧 LIVEWIRE COMPONENT (`AdminProjects.php`)

### New Properties

```php
public array $uploadedImages = [];      // Image paths di DB
public array $imagesToDelete = [];      // Paths untuk didelete
```

### New Methods

#### `saveProjectImages($imagesBase64Array)`
Livewire listener untuk menerima base64 array dari JavaScript.

```php
#[\Livewire\Attributes\On('saveProjectImages')]
public function saveProjectImages($imagesBase64Array): void
{
    foreach ($imagesBase64Array as $base64Data) {
        // Validate size (max 350KB)
        if (!ImageService::validateBase64Image($base64Data)) {
            session()->flash('error', 'Size exceeded');
            return;
        }

        // Save image
        $imagePath = ImageService::saveUploadedImage($base64Data);
        if ($imagePath) {
            $this->uploadedImages[] = $imagePath;
        }
    }
}
```

#### `markImageForDelete($imagePath)`
Mark image untuk didelete saat save.

#### `saveProject()`
Updated untuk save images array ke database:

```php
$this->selectedProject->update([
    'images' => $this->uploadedImages,  // JSON array
    // ... other fields
]);

// Delete marked images dari storage
if (!empty($this->imagesToDelete)) {
    ImageService::deleteImages($this->imagesToDelete);
}
```

#### `deleteProject($projectId)`
Sekarang juga delete semua associated images dari storage:

```php
$project = Project::findOrFail($projectId);
if ($project->images && is_array($project->images)) {
    ImageService::deleteImages($project->images);
}
$project->delete();
```

---

## 💾 IMAGE SERVICE (`app/Services/ImageService.php`)

### `saveUploadedImage($base64Data): ?string`
- Decode base64 data
- Create folder `uploads/YYYY-MM-DD/`
- Generate random filename: `{uuid}.webp`
- Save ke `storage/app/public/{path}`
- Return relative path

### `deleteImage($path): bool`
Delete single image dari storage.

### `deleteImages($paths): bool`
Delete multiple images sekaligus.

### `getImageUrl($path): string`
Get full URL untuk access image:
```
/storage/uploads/2026-01-11/abc123.webp
```

### `validateBase64Image($base64Data): bool`
Validate base64 data:
- Decode valid?
- Size ≤ 400KB (buffer untuk variance)?

---

## 🎯 FRONTEND - ADMIN PROJECTS PAGE

### Upload Component

Located in modal form (edit/create mode):

```blade
<!-- Multiple Image Upload Section -->
<div class="admin-form-group mb-4">
    <label for="projectImages" class="admin-form-label">
        Upload Foto Proyek * 
        <span>(JPG, PNG, WebP - Auto compress & watermark)</span>
    </label>
    
    <div class="admin-image-upload-area">
        <input type="file"
               id="projectImages"
               class="admin-image-input"
               multiple
               accept="image/jpeg,image/png,image/webp">
        <div class="admin-upload-hint">
            <i class="fas fa-cloud-upload-alt"></i>
            <p>Klik atau drag-drop gambar di sini</p>
            <small>Setiap gambar akan dikompresi dan watermarked</small>
        </div>
    </div>

    <!-- Uploaded Images Preview -->
    <div class="admin-images-preview mt-4" id="imagesPreview">
        <!-- Dynamic preview items added by JS -->
    </div>
</div>
```

### Upload Area Features

- **Drag-drop support** - Drag files ke upload area
- **Click to select** - Click untuk file picker
- **Live preview** - Preview immediately setelah select
- **Delete button** - Delete individual images before save
- **Visual feedback** - Hover effects, drag-active state

### Preview Grid Styling

```css
.admin-images-preview {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(140px, 1fr));
    gap: 1rem;
}

.admin-image-preview-item {
    aspect-ratio: 1;
    border-radius: 8px;
    position: relative;
    overflow: hidden;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12);
}

.admin-image-preview-item:hover .admin-preview-delete {
    opacity: 1;
}
```

---

## 📊 VIEW MODE - SHOW IMAGES

Di view mode, semua images ditampilkan dalam grid:

```blade
@if($selectedProject->images && count($selectedProject->images) > 0)
    <div class="admin-modal-info mb-3">
        <label class="admin-modal-label">Foto Proyek</label>
        <div class="admin-images-gallery">
            @foreach($selectedProject->getImageUrls() as $imageUrl)
                <img src="{{ $imageUrl }}" alt="Project image">
            @endforeach
        </div>
    </div>
@endif
```

---

## 🚀 USAGE FLOW

### 1️⃣ CREATE PROJECT

```
1. Click "Proyek Baru" button
2. Fill form: Judul, Kategori, Deskripsi, URL Thumbnail, Alt Text
3. Select multiple images via file picker atau drag-drop
4. See live preview dengan watermark
5. Click "Simpan Proyek"
6. Livewire dispatch: saveProjectImages([base64_array])
7. Server save images ke storage/uploads/YYYY-MM-DD/
8. Save project dengan images array ke DB
```

### 2️⃣ EDIT PROJECT

```
1. Click "Edit" pada project
2. Modal open dengan form pre-filled
3. Existing images tampil di preview grid
4. Can add more images via file picker
5. Can delete existing images by clicking trash button
6. Click "Simpan Proyek"
7. Images array updated in DB
8. Deleted images removed dari storage
```

### 3️⃣ DELETE PROJECT

```
1. Click "Delete" pada project
2. Confirm dialog
3. Project deleted
4. All associated images deleted dari storage
```

---

## 🔐 VALIDATION

### Client-Side
- File type: JPG, PNG, WebP only
- File size: Max 10MB before compression
- Minimal 1 image per project

### Server-Side
- Base64 validation
- Size validation (max 400KB)
- Path security checks
- Database constraints

---

## 📁 FILE STORAGE STRUCTURE

```
public/
├── storage/ (symbolic link → storage/app/public)
│   └── uploads/
│       ├── 2026-01-11/
│       │   ├── abc123def456.webp (350KB)
│       │   ├── xyz789uvw123.webp (280KB)
│       │   └── ...
│       ├── 2026-01-12/
│       │   └── ...
```

**Folder naming**: `YYYY-MM-DD` format untuk mudah organize & cleanup old files.

---

## 🎨 WATERMARK TEXT & POSITIONING

**Text**: "Properti Jaya Abadi Konstruksi"

**Positions**:
- Center: Large, semi-transparent white dengan dark shadow
- Top-left: Small
- Top-right: Small
- Bottom-left: Small
- Bottom-right: Small

**Styling**:
- Font: Arial, sans-serif
- Color: `rgba(255, 255, 255, 0.7)` white 70% opacity
- Shadow: `rgba(0, 0, 0, 0.5)` black 50% opacity
- Responsive sizing based on image dimensions

---

## 🔧 COMPRESSION SETTINGS

**Format**: WebP (modern, smallest file size)

**Quality Levels**:
- Default: 0.75 (first attempt)
- Fallback: 0.6 (if exceeds 350KB)

**Size Target**: ≤ 350KB per image

**Aspect Ratio**: Maintained (no stretching)

---

## 📱 RESPONSIVE DESIGN

### Desktop (≥769px)
- Full modal with proper sizing
- Image preview grid: 140px items
- Drag-drop area spans full width

### Mobile (≤768px)
- Responsive modal
- Image preview grid: 100px items
- Touch-friendly buttons

---

## ✅ TESTING CHECKLIST

- [ ] Create project dengan 1+ images
- [ ] Check watermark visible pada images
- [ ] Check file size ≤ 350KB
- [ ] Check folder structure: `uploads/YYYY-MM-DD/`
- [ ] Check images accessible via `/storage/uploads/...`
- [ ] Edit project: add/remove images
- [ ] View project: show all images
- [ ] Delete project: images deleted dari storage
- [ ] Test drag-drop upload
- [ ] Test multiple file selection
- [ ] Test on mobile & desktop
- [ ] Check console for errors

---

## 🐛 TROUBLESHOOTING

### Images not saving
- Check folder permissions: `chmod 775 storage/app/public/uploads`
- Check storage:link created: `php artisan storage:link`
- Check ImageService logs

### Watermark not visible
- Check canvas API support
- Check image dimensions
- Test with different image sizes

### Size validation failing
- Check browser canvas compression
- Adjust quality levels in ImageUploader
- Check max file size limit in browser

### Livewire event not firing
- Check browser console for errors
- Check Livewire component is loaded
- Verify event name in dispatch matches listener

---

## 🚀 FUTURE IMPROVEMENTS

- [ ] Batch delete images
- [ ] Crop/resize preview
- [ ] Different watermark positions
- [ ] Watermark opacity control
- [ ] Image optimization service queue
- [ ] CDN integration untuk fast delivery

