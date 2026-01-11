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
                                        <button wire:click="deleteProject({{ $project->id }})"
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus proyek ini?')"
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
                            </button>
                            <button wire:click="deleteProject({{ $project->id }})"
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus proyek ini?')"
                                    class="admin-card-action-btn admin-action-delete"
                                    title="Hapus">
                                <i class="fas fa-trash"></i>
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
        <div class="admin-modal-overlay" wire:click="closeModal()">
            <div class="admin-modal" @click.stop>

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
                        <div class="admin-modal-view">
                            <div class="admin-modal-info mb-3">
                                <label class="admin-modal-label">Judul</label>
                                <p class="admin-modal-value">{{ $selectedProject->title }}</p>
                            </div>

                            <div class="admin-modal-info mb-3">
                                <label class="admin-modal-label">Kategori</label>
                                <p class="admin-modal-value">{{ $selectedProject->getCategoryLabel() }}</p>
                            </div>

                            <div class="admin-modal-info mb-3">
                                <label class="admin-modal-label">Deskripsi</label>
                                <p class="admin-modal-value">{{ $selectedProject->description }}</p>
                            </div>

                            <div class="admin-modal-info mb-3">
                                <label class="admin-modal-label">Status</label>
                                <p class="admin-modal-value">
                                    @if($selectedProject->is_published)
                                        <span class="badge bg-success">Dipublikasi</span>
                                    @else
                                        <span class="badge bg-warning">Draft</span>
                                    @endif
                                </p>
                            </div>

                            @if($selectedProject->images && count($selectedProject->images) > 0)
                                <div class="admin-modal-info mb-3">
                                    <label class="admin-modal-label">Foto Proyek</label>
                                    <div class="admin-images-gallery" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(150px, 1fr)); gap: 1rem; margin-top: 0.5rem;">
                                        @foreach($selectedProject->getImageUrls() as $imageUrl)
                                            <div style="aspect-ratio: 1; overflow: hidden; border-radius: 8px;">
                                                <img src="{{ $imageUrl }}"
                                                     alt="Project image"
                                                     style="width: 100%; height: 100%; object-fit: cover;">
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
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

                            <!-- Multiple Image Upload Section -->
                            <div class="admin-form-group mb-4">
                                <label for="projectImages" class="admin-form-label">
                                    Upload Foto Proyek *
                                    <span class="text-muted" style="font-size: 0.85rem;">
                                        (JPG, PNG, WebP - Auto compress & watermark)
                                    </span>
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
                                        <small>Setiap gambar akan dikompresi otomatis dan ditambahkan watermark</small>
                                    </div>
                                </div>
                                @error('uploadedImages')
                                    <span class="admin-form-error">{{ $message }}</span>
                                @enderror

                                <!-- Uploaded Images Preview -->
                                <div class="admin-images-preview mt-4" id="imagesPreview">
                                    @if(!empty($uploadedImages))
                                        @foreach($uploadedImages as $imagePath)
                                            <div class="admin-image-preview-item" data-image-path="{{ $imagePath }}">
                                                <img src="{{ asset('storage/' . $imagePath) }}"
                                                     alt="Preview"
                                                     class="admin-preview-img">
                                                <button type="button"
                                                        class="admin-preview-delete"
                                                        wire:click="markImageForDelete('{{ $imagePath }}')">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                        @endforeach
                                    @endif
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

</div>
