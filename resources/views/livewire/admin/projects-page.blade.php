<div class="admin-projects-page">

    <!-- Page Header -->
    <div class="admin-page-header">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-12 col-md-8">
                    <h1 class="admin-page-title">Kelola Proyek</h1>
                    <p class="admin-page-subtitle">Atur dan kelola semua proyek Jaya Abadi Konstruksi</p>
                </div>
                <div class="col-12 col-md-4 text-md-end">
                    <button wire:click="createProject" class="admin-btn admin-btn-primary">
                        <i class="fas fa-plus me-2"></i>
                        Proyek Baru
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Filter & Search Bar -->
    <div class="admin-filter-section">
        <div class="container-fluid">
            <div class="row g-3">

                <!-- Search Bar -->
                <div class="col-12 col-md-6">
                    <div class="admin-search-input">
                        <i class="fas fa-search"></i>
                        <input type="text"
                               wire:model.live="searchQuery"
                               placeholder="Cari proyek berdasarkan judul atau deskripsi..."
                               class="form-control">
                    </div>
                </div>

                <!-- Status Filter -->
                <div class="col-12 col-md-6">
                    <div class="admin-filter-buttons d-flex gap-2 flex-wrap">
                        <button wire:click="filterByStatus('all')"
                                class="admin-filter-btn {{ $filterStatus === 'all' ? 'active' : '' }}">
                            Semua
                        </button>
                        <button wire:click="filterByStatus('published')"
                                class="admin-filter-btn {{ $filterStatus === 'published' ? 'active' : '' }}">
                            Dipublikasi
                        </button>
                        <button wire:click="filterByStatus('draft')"
                                class="admin-filter-btn {{ $filterStatus === 'draft' ? 'active' : '' }}">
                            Draft
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Projects Table & Cards -->
    <div class="admin-table-section">
        <div class="container-fluid">

            <!-- Desktop Table View -->
            <div class="admin-projects-table-wrapper">
                <div class="admin-table-wrapper">
                    <table class="admin-table">
                    <thead class="admin-table-head">
                        <tr>
                            <th class="admin-table-th" style="width: 80px;">Foto</th>
                            <th class="admin-table-th">Judul Proyek</th>
                            <th class="admin-table-th">Kategori</th>
                            <th class="admin-table-th">Status</th>
                            <th class="admin-table-th">Tanggal</th>
                            <th class="admin-table-th text-end">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="admin-table-body">
                        @forelse($projects as $project)
                            <tr class="admin-table-row">
                                <td class="admin-table-td">
                                    <div class="admin-table-image-container">
                                        @if($project->images && count($project->images) > 0)
                                            <img src="{{ asset('storage/' . $project->images[0]) }}"
                                                 alt="{{ $project->title }}"
                                                 class="admin-table-thumb">
                                        @else
                                            <div class="admin-table-thumb-empty">
                                                <i class="fas fa-image"></i>
                                            </div>
                                        @endif
                                    </div>
                                </td>
                                <td class="admin-table-td">
                                    <div>
                                        <p class="admin-table-project-title">{{ $project->title }}</p>
                                        <p class="admin-table-project-desc">{{ $project->getShortDescription() }}</p>
                                        <small class="text-muted">
                                            {{ count($project->images ?? []) }}
                                            {{ count($project->images ?? []) === 1 ? 'gambar' : 'gambar' }}
                                        </small>
                                    </div>
                                </td>
                                <td class="admin-table-td">
                                    <span class="admin-badge admin-badge-info">
                                        {{ $project->getCategoryLabel() }}
                                    </span>
                                </td>
                                <td class="admin-table-td">
                                    @if($project->is_published)
                                        <span class="admin-badge admin-badge-success">
                                            <i class="fas fa-check-circle me-1"></i>
                                            Dipublikasi
                                        </span>
                                    @else
                                        <span class="admin-badge admin-badge-warning">
                                            <i class="fas fa-file-alt me-1"></i>
                                            Draft
                                        </span>
                                    @endif
                                </td>
                                <td class="admin-table-td">
                                    <span class="admin-table-date">
                                        {{ $project->created_at->format('d M Y') }}
                                    </span>
                                </td>
                                <td class="admin-table-td text-end">
                                    <div class="admin-table-actions d-flex justify-content-end gap-2">
                                        <button wire:click="viewProject({{ $project->id }})"
                                                class="admin-action-btn admin-action-view"
                                                title="Lihat">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button wire:click="editProject({{ $project->id }})"
                                                class="admin-action-btn admin-action-edit"
                                                title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button wire:click="togglePublish({{ $project->id }})"
                                                class="admin-action-btn {{ $project->is_published ? 'admin-action-hide' : 'admin-action-show' }}"
                                                title="{{ $project->is_published ? 'Sembunyikan' : 'Tampilkan' }}">
                                            <i class="fas {{ $project->is_published ? 'fa-eye-slash' : 'fa-eye' }}"></i>
                                        </button>
                                        <button wire:click="confirmDelete({{ $project->id }})"
                                                class="admin-action-btn admin-action-delete"
                                                title="Hapus">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr class="admin-table-row">
                                <td colspan="5" class="admin-table-td text-center py-5">
                                    <div class="admin-empty-state">
                                        <i class="fas fa-inbox"></i>
                                        <p>Tidak ada proyek ditemukan</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                </div>
            </div>

            <!-- Mobile Card View -->
            <div class="admin-projects-cards">
                @forelse($projects as $project)
                    <div class="admin-projects-card">
                        @if($project->images && count($project->images) > 0)
                            <img src="{{ asset('storage/' . $project->images[0]) }}"
                                 alt="Gambar proyek {{ $project->title }}"
                                 class="admin-card-image">
                        @else
                            <div class="admin-card-image" style="background-color: #e9ecef; display: flex; align-items: center; justify-content: center;">
                                <i class="fas fa-image" style="font-size: 3rem; color: #adb5bd;"></i>
                            </div>
                        @endif

                        <div class="admin-card-header">
                            <h3 class="admin-card-title">{{ $project->title }}</h3>
                            <p class="admin-card-desc">{{ $project->getShortDescription() }}</p>
                        </div>

                        <div class="admin-card-meta">
                            <span class="admin-card-category admin-badge admin-badge-info">
                                {{ $project->getCategoryLabel() }}
                            </span>
                            <span class="admin-card-date">
                                {{ $project->created_at->format('d M Y') }}
                            </span>
                            <span class="admin-card-status">
                                @if($project->is_published)
                                    <span class="admin-badge admin-badge-success">
                                        <i class="fas fa-check-circle"></i>
                                    </span>
                                @else
                                    <span class="admin-badge admin-badge-warning">
                                        <i class="fas fa-file-alt"></i>
                                    </span>
                                @endif
                            </span>
                        </div>

                        <div class="admin-card-actions">
                            <button wire:click="viewProject({{ $project->id }})"
                                    class="admin-card-action-btn admin-action-view"
                                    title="Lihat">
                                <i class="fas fa-eye"></i>
                                <span>Lihat</span>
                            </button>
                            <button wire:click="editProject({{ $project->id }})"
                                    class="admin-card-action-btn admin-action-edit"
                                    title="Edit">
                                <i class="fas fa-edit"></i>
                                <span>Edit</span>
                            </button>
                            <button wire:click="togglePublish({{ $project->id }})"
                                    class="admin-card-action-btn {{ $project->is_published ? 'admin-action-hide' : 'admin-action-show' }}"
                                    title="{{ $project->is_published ? 'Sembunyikan' : 'Tampilkan' }}">
                                <i class="fas {{ $project->is_published ? 'fa-eye-slash' : 'fa-eye' }}"></i>
                                <span>{{ $project->is_published ? 'Sembunyi' : 'Tampil' }}</span>
                            </button>
                            <button wire:click="confirmDelete({{ $project->id }})"
                                    class="admin-card-action-btn admin-action-delete"
                                    title="Hapus">
                                <i class="fas fa-trash"></i>
                                <span>Hapus</span>
                            </button>
                        </div>
                    </div>
                @empty
                    <div class="admin-empty-state" style="text-align: center; padding: 2rem;">
                        <i class="fas fa-inbox"></i>
                        <p>Tidak ada proyek ditemukan</p>
                    </div>
                @endforelse
            </div>

            <!-- Pagination -->
            <x-admin-pagination :paginator="$projects" />

        </div>
    </div>

    <!-- Modal - Create/Edit/View Project -->
    @if($showModal && ($selectedProject || $modalMode === 'create'))
        <div class="admin-modal-overlay"
             wire:click.self="closeModal()"
             role="presentation"
             aria-modal="true"
             tabindex="-1">
            <div class="admin-modal" onclick="event.stopPropagation()">

                <!-- Modal Header -->
                <div class="admin-modal-header d-flex align-items-center justify-content-between">
                    <h2 class="admin-modal-title">
                        @if($modalMode === 'view')
                            Detail Proyek
                        @elseif($modalMode === 'edit')
                            Edit Proyek
                        @else
                            Proyek Baru
                        @endif
                    </h2>
                    <button type="button"
                            class="admin-modal-close"
                            wire:click="closeModal()">
                        <i class="fas fa-times"></i>
                    </button>
                </div>

                <!-- Modal Body -->
                <div class="admin-modal-body">
                    @if($modalMode === 'view')
                        <!-- View Mode -->
                        <div class="admin-modal-view" x-data="{
                            activeImage: '{{ count($selectedProject->getImageUrls()) > 0 ? $selectedProject->getImageUrls()[0] : '' }}'
                        }">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="admin-modal-info mb-3">
                                        <label class="admin-modal-label">Judul</label>
                                        <p class="admin-modal-value fw-bold text-primary" style="font-size: 1.1rem;">{{ $selectedProject->title }}</p>
                                    </div>

                                    <div class="admin-modal-info mb-3">
                                        <label class="admin-modal-label">Kategori</label>
                                        <p class="admin-modal-value">
                                            <span class="admin-badge admin-badge-info">
                                                {{ $selectedProject->getCategoryLabel() }}
                                            </span>
                                        </p>
                                    </div>

                                    <div class="admin-modal-info mb-3">
                                        <label class="admin-modal-label">Status</label>
                                        <p class="admin-modal-value">
                                            @if($selectedProject->is_published)
                                                <span class="admin-badge admin-badge-success">
                                                    <i class="fas fa-check-circle me-1"></i> Dipublikasi
                                                </span>
                                            @else
                                                <span class="admin-badge admin-badge-warning">
                                                    <i class="fas fa-file-alt me-1"></i> Draft
                                                </span>
                                            @endif
                                        </p>
                                    </div>

                                    <div class="admin-modal-info mb-3">
                                        <label class="admin-modal-label">Deskripsi</label>
                                        <p class="admin-modal-value text-muted" style="line-height: 1.6; font-size: 0.9rem;">
                                            {{ $selectedProject->description }}
                                        </p>
                                    </div>
                                </div>

                                <div class="col-md-7">
                                    @if($selectedProject->images && count($selectedProject->images) > 0)
                                        <div class="admin-modal-info mb-3">
                                            <label class="admin-modal-label">Galeri Proyek</label>

                                            <!-- Main Image Display -->
                                            <div class="admin-gallery-main mb-3">
                                                <div class="admin-main-image-wrapper">
                                                    <img :src="activeImage" alt="Active Project Image" class="admin-main-img">
                                                </div>
                                            </div>

                                            <!-- Thumbnails List -->
                                            <div class="admin-gallery-thumbs">
                                                <div class="admin-thumbs-grid">
                                                    @foreach($selectedProject->getImageUrls() as $imageUrl)
                                                        <div class="admin-thumb-item"
                                                             :class="{ 'active': activeImage === '{{ $imageUrl }}' }"
                                                             @click="activeImage = '{{ $imageUrl }}'">
                                                            <img src="{{ $imageUrl }}" alt="Project thumb">
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <div class="admin-empty-gallery py-5 text-center bg-light rounded">
                                            <i class="fas fa-image text-muted mb-2" style="font-size: 2rem;"></i>
                                            <p class="text-muted smaller">Tidak ada foto untuk proyek ini</p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @else
                        <!-- Edit/Create Mode -->
                        <form wire:submit="saveProject" class="admin-modal-form">

                            <div class="admin-form-group mb-4">
                                <label for="title" class="admin-form-label">Judul Proyek *</label>
                                <input type="text"
                                       id="title"
                                       wire:model="title"
                                       class="admin-form-input @error('title') is-invalid @enderror"
                                       placeholder="Masukkan judul proyek">
                                @error('title')
                                    <span class="admin-form-error">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="admin-form-group mb-4">
                                <label for="category" class="admin-form-label">Kategori *</label>
                                <select id="category"
                                        wire:model="category"
                                        class="admin-form-select @error('category') is-invalid @enderror">
                                    <option value="konstruksi-gedung">Konstruksi Gedung</option>
                                    <option value="infrastruktur">Infrastruktur</option>
                                    <option value="renovasi">Renovasi</option>
                                </select>
                                @error('category')
                                    <span class="admin-form-error">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="admin-form-group mb-4">
                                <label for="description" class="admin-form-label">Deskripsi *</label>
                                <textarea id="description"
                                          wire:model="description"
                                          class="admin-form-textarea @error('description') is-invalid @enderror"
                                          rows="5"
                                          placeholder="Masukkan deskripsi lengkap proyek"></textarea>
                                @error('description')
                                    <span class="admin-form-error">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Uploaded Images Section (Shows for both Create and Edit) -->
                            @if(!empty($uploadedImages))
                                <div class="admin-existing-images-section mb-4">
                                    <label class="admin-form-label">
                                        {{ $modalMode === 'edit' ? 'Gambar Saat Ini' : 'Gambar Terupload' }}
                                    </label>
                                    <div class="admin-existing-images-grid">
                                        @foreach($uploadedImages as $index => $path)
                                            <div class="admin-existing-image-item" x-data="{ confirmingDelete: false }">
                                                <img src="{{ asset('storage/' . $path) }}" alt="Project image {{ $index + 1 }}">

                                                <!-- Trash Icon (Initial State) -->
                                                <button type="button"
                                                        class="admin-image-remove-btn"
                                                        x-show="!confirmingDelete"
                                                        @click="confirmingDelete = true">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>

                                                <!-- Confirm Overlay (Active State) -->
                                                <div class="admin-image-delete-confirm" x-show="confirmingDelete" x-cloak x-transition>
                                                    <p>Hapus?</p>
                                                    <div class="d-flex gap-1 justify-content-center">
                                                        <button type="button"
                                                                class="btn btn-danger btn-sm p-1"
                                                                style="font-size: 0.6rem;"
                                                                wire:click="markImageForDelete('{{ $path }}')">
                                                            Ya
                                                        </button>
                                                        <button type="button"
                                                                class="btn btn-light btn-sm p-1"
                                                                style="font-size: 0.6rem;"
                                                                @click="confirmingDelete = false">
                                                            No
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endif

                            <!-- Multiple Image Upload Section -->
                            <div class="admin-form-group mb-4">
                                <label for="projectImages" class="admin-form-label">
                                    Upload Foto Baru
                                    <span class="text-muted" style="font-size: 0.85rem;">
                                        (JPG, PNG, WebP - Auto compress & watermark)
                                    </span>
                                </label>
                                <div class="admin-image-upload-area" wire:ignore>
                                    <input type="file"
                                           id="projectImages"
                                           class="admin-image-input"
                                           multiple
                                           accept="image/jpeg,image/png,image/webp">
                                    <div class="admin-upload-hint">
                                        <i class="fas fa-cloud-upload-alt"></i>
                                        <p>Klik atau drag-drop gambar di sini</p>
                                        <small>Setiap gambar akan dikompresi otomatis dan ditambahkan watermark</small>
                                    </div>
                                </div>
                                @error('uploadedImages')
                                    <span class="admin-form-error">{{ $message }}</span>
                                @enderror

                                <!-- Uploaded Images Preview (handled by JavaScript) -->
                                <div class="admin-images-preview mt-4" id="imagesPreview" wire:ignore>
                                </div>
                            </div>

                            <div class="admin-form-group mb-4">
                                <div class="admin-form-checkbox">
                                    <input type="checkbox"
                                           id="isPublished"
                                           wire:model="isPublished">
                                    <label for="isPublished" class="admin-form-checkbox-label">
                                        Publikasikan proyek ini
                                    </label>
                                </div>
                            </div>

                            <div class="admin-modal-actions d-flex gap-2">
                                <button type="submit" class="admin-btn admin-btn-primary">
                                    <i class="fas fa-save me-2"></i>
                                    Simpan Proyek
                                </button>
                                <button type="button"
                                        wire:click="closeModal()"
                                        class="admin-btn admin-btn-outline">
                                    Batal
                                </button>
                            </div>

                        </form>
                    @endif
                </div>

            </div>
        </div>
    @endif

    <!-- Delete Confirmation Modal -->
    @if($showDeleteModal)
        <div class="admin-modal-overlay"
             wire:click.self="cancelDelete()"
             role="presentation"
             aria-modal="true"
             tabindex="-1">
            <div class="admin-modal admin-modal-sm" onclick="event.stopPropagation()">
                <div class="admin-modal-body text-center py-5">
                    <div class="admin-delete-icon-wrapper mb-4">
                        <i class="fas fa-exclamation-triangle"></i>
                    </div>
                    <h3 class="admin-modal-title mb-3">Hapus Proyek?</h3>
                    <p class="text-muted mb-4">
                        Apakah Anda yakin ingin menghapus proyek ini? Tindakan ini tidak dapat dibatalkan dan semua data terkait akan hilang secara permanen.
                    </p>
                    <div class="d-flex justify-content-center gap-3">
                        <button wire:click="deleteProject" class="admin-btn admin-btn-danger px-4">
                            <i class="fas fa-trash me-2"></i>Hapus
                        </button>
                        <button wire:click="cancelDelete" class="admin-btn admin-btn-outline px-4">
                            Batal
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endif

</div>
