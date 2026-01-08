<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use App\Models\Project;

#[Layout('layouts.admin')]
#[Title('Kelola Proyek - Admin Jaya Abadi Konstruksi')]
class AdminProjects extends Component
{
    use WithPagination;

    public string $searchQuery = '';
    public string $filterStatus = 'all'; // all, published, draft
    public bool $showModal = false;
    public ?Project $selectedProject = null;
    public string $modalMode = 'view'; // view, edit, create

    // Form properties for create/edit
    public string $title = '';
    public string $description = '';
    public string $category = 'konstruksi-gedung';
    public string $imageUrl = '';
    public string $imageAlt = '';
    public bool $isPublished = false;

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
        $this->imageUrl = $this->selectedProject->image_url;
        $this->imageAlt = $this->selectedProject->image_alt;
        $this->isPublished = $this->selectedProject->is_published;

        $this->showModal = true;
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
    }

    /**
     * Reset project form
     */
    public function resetProjectForm(): void
    {
        $this->title = '';
        $this->description = '';
        $this->category = 'konstruksi-gedung';
        $this->imageUrl = '';
        $this->imageAlt = '';
        $this->isPublished = false;
    }

    /**
     * Save project (create or update)
     */
    public function saveProject(): void
    {
        $this->validate([
            'title' => 'required|min:3|max:255',
            'description' => 'required|min:10',
            'category' => 'required|in:konstruksi-gedung,infrastruktur,renovasi',
            'imageUrl' => 'required|url',
            'imageAlt' => 'required|min:3|max:255',
        ]);

        if ($this->modalMode === 'create') {
            Project::create([
                'title' => $this->title,
                'description' => $this->description,
                'category' => $this->category,
                'image_url' => $this->imageUrl,
                'image_alt' => $this->imageAlt,
                'is_published' => $this->isPublished,
                'published_at' => $this->isPublished ? now() : null,
            ]);
        } else {
            $this->selectedProject->update([
                'title' => $this->title,
                'description' => $this->description,
                'category' => $this->category,
                'image_url' => $this->imageUrl,
                'image_alt' => $this->imageAlt,
                'is_published' => $this->isPublished,
                'published_at' => $this->isPublished ? now() : null,
            ]);
        }

        $this->closeModal();
    }

    /**
     * Delete project
     */
    public function deleteProject(int $projectId): void
    {
        Project::findOrFail($projectId)->delete();
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
