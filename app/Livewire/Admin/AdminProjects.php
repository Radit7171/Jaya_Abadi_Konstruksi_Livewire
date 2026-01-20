<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use App\Models\Project;
use App\Services\ImageService;

#[Layout('layouts.admin')]
#[Title('Kelola Proyek - Admin Jaya Abadi Konstruksi')]
class AdminProjects extends Component
{
    use WithPagination;

    public string $searchQuery = '';
    public string $filterStatus = 'all'; // all, published, draft
    public bool $showModal = false;
    public bool $showDeleteModal = false; // New: tracking deletion modal
    public ?Project $selectedProject = null;
    public ?int $projectIdToDelete = null; // New: tracking project to delete
    public string $modalMode = 'view'; // view, edit, create

    // Form properties for create/edit
    public string $title = '';
    public string $description = '';
    public string $category = 'konstruksi-gedung';
    public bool $isPublished = false;
    public array $uploadedImages = []; // JSON array of image paths
    public array $imagesToDelete = []; // Images to delete from storage

    private const ITEMS_PER_PAGE = 10;

    /**
     * Get projects with search and filter
     */
    public function getProjects()
    {
        $query = Project::query();

        // Filter by status
        if ($this->filterStatus === 'published') {
            $query->where('is_published', true);
        } elseif ($this->filterStatus === 'draft') {
            $query->where('is_published', false);
        }

        // Search by title or description
        if (!empty($this->searchQuery)) {
            $query->where(function ($q) {
                $q->where('title', 'like', '%' . $this->searchQuery . '%')
                  ->orWhere('description', 'like', '%' . $this->searchQuery . '%');
            });
        }

        return $query->orderBy('created_at', 'desc')
                     ->paginate(self::ITEMS_PER_PAGE);
    }

    /**
     * Update search query
     */
    public function updatedSearchQuery()
    {
        $this->resetPage();
    }

    /**
     * Update filter status
     */
    public function filterByStatus(string $status): void
    {
        $this->filterStatus = $status;
        $this->resetPage();
    }

    /**
     * Open project detail modal (view mode)
     */
    public function viewProject(int $projectId): void
    {
        $this->selectedProject = Project::findOrFail($projectId);
        $this->modalMode = 'view';
        $this->showModal = true;
    }

    /**
     * Open project edit modal
     */
    public function editProject(int $projectId): void
    {
        $this->selectedProject = Project::findOrFail($projectId);
        $this->modalMode = 'edit';

        // Fill form with project data
        $this->title = $this->selectedProject->title;
        $this->description = $this->selectedProject->description;
        $this->category = $this->selectedProject->category;
        $this->isPublished = $this->selectedProject->is_published;
        $this->uploadedImages = $this->selectedProject->images ?? [];
        $this->imagesToDelete = [];

        $this->showModal = true;

        // Trigger initialization of image uploader in JS
        $this->dispatch('projectFormReset');
    }

    /**
     * Open create modal
     */
    public function createProject(): void
    {
        $this->resetProjectForm();
        $this->selectedProject = null;
        $this->modalMode = 'create';
        $this->showModal = true;

        // Trigger initialization of image uploader in JS
        $this->dispatch('projectFormReset');
    }

    /**
     * Reset project form
     */
    public function resetProjectForm(): void
    {
        $this->title = '';
        $this->description = '';
        $this->category = 'konstruksi-gedung';
        $this->isPublished = false;
        $this->uploadedImages = [];
        $this->imagesToDelete = [];
    }

    /**
     * Save project images dari client-side base64 array
     * Called dari JavaScript setelah images sudah dikompresi & watermarked
     */
    #[\Livewire\Attributes\On('saveProjectImages')]
    public function saveProjectImages($imagesBase64Array): void
    {
        if (empty($imagesBase64Array)) {
            return;
        }

        foreach ($imagesBase64Array as $base64Data) {
            // Validate base64 size (max 350KB)
            if (!ImageService::validateBase64Image($base64Data)) {
                session()->flash('error', 'Ukuran salah satu gambar melebihi 350KB');
                return;
            }

            // Save image dan tambah path ke uploaded images
            $imagePath = ImageService::saveUploadedImage($base64Data);
            if ($imagePath) {
                $this->uploadedImages[] = $imagePath;
            }
        }
    }

    /**
     * Mark image untuk didelete saat save
     */
    public function markImageForDelete(string $imagePath): void
    {
        if (!in_array($imagePath, $this->imagesToDelete)) {
            $this->imagesToDelete[] = $imagePath;
        }

        // Remove dari uploaded images array dan re-index
        $this->uploadedImages = array_values(array_filter(
            $this->uploadedImages,
            fn ($path) => $path !== $imagePath
        ));
    }

    /**
     * Save project (create or update) dengan images
     */
    public function saveProject(): void
    {
        $this->validate([
            'title' => 'required|min:3|max:255',
            'description' => 'required|min:10',
            'category' => 'required|in:konstruksi-gedung,infrastruktur,renovasi,pekerjaan-selesai',
        ]);

        // Validate ada minimal 1 gambar
        if (empty($this->uploadedImages)) {
            $this->addError('uploadedImages', 'Minimal tambahkan 1 gambar proyek');
            return;
        }

        // Delete marked images dari storage
        if (!empty($this->imagesToDelete)) {
            ImageService::deleteImages($this->imagesToDelete);
        }

        if ($this->modalMode === 'create') {
            Project::create([
                'title' => $this->title,
                'description' => $this->description,
                'category' => $this->category,
                'images' => $this->uploadedImages, // Store as JSON
                'is_published' => $this->isPublished,
                'published_at' => $this->isPublished ? now() : null,
            ]);
        } else {
            $this->selectedProject->update([
                'title' => $this->title,
                'description' => $this->description,
                'category' => $this->category,
                'images' => $this->uploadedImages, // Store as JSON
                'is_published' => $this->isPublished,
                'published_at' => $this->isPublished ? now() : null,
            ]);
        }

        $this->closeModal();
        $this->dispatch('showSuccessNotification', ['message' => 'Proyek berhasil disimpan!']);
    }

    /**
     * Show delete confirmation modal
     */
    public function confirmDelete(int $projectId): void
    {
        $this->projectIdToDelete = $projectId;
        $this->showDeleteModal = true;
    }

    /**
     * Cancel deletion
     */
    public function cancelDelete(): void
    {
        $this->showDeleteModal = false;
        $this->projectIdToDelete = null;
    }

    /**
     * Delete project dan semua images nya
     */
    public function deleteProject(): void
    {
        if (!$this->projectIdToDelete) {
            return;
        }

        $project = Project::findOrFail($this->projectIdToDelete);

        // Delete all images from storage
        if ($project->images && is_array($project->images)) {
            ImageService::deleteImages($project->images);
        }

        $project->delete();

        $this->showDeleteModal = false;
        $this->projectIdToDelete = null;

        $this->dispatch('showSuccessNotification', ['message' => 'Proyek berhasil dihapus!']);
    }

    /**
     * Toggle publish status
     */
    public function togglePublish(int $projectId): void
    {
        $project = Project::findOrFail($projectId);
        $project->update([
            'is_published' => !$project->is_published,
            'published_at' => !$project->is_published ? now() : null,
        ]);
    }

    /**
     * Close modal
     */
    public function closeModal(): void
    {
        $this->showModal = false;
        $this->selectedProject = null;
        $this->resetProjectForm();
    }

    public function render()
    {
        return view('livewire.admin.projects-page', [
            'projects' => $this->getProjects(),
        ]);
    }
}

