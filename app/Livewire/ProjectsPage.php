<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use App\Models\Project;

#[Layout('layouts.app')]
#[Title('Proyek - Jaya Abadi Konstruksi')]
class ProjectsPage extends Component
{
    use WithNavigation;
    use WithPagination;

    // Properties
    public string $selectedFilter = 'all';
    public bool $showModal = false;
    public ?Project $selectedProject = null;
    private const ITEMS_PER_PAGE = 6;

    /**
     * Get projects based on filter with pagination
     */
    public function getProjects()
    {
        $query = Project::query()->where('is_published', true);

        // Apply category filter
        if ($this->selectedFilter !== 'all') {
            $query->where('category', $this->selectedFilter);
        }

        // Order by created_at descending & paginate
        return $query->orderBy('created_at', 'desc')
                     ->paginate(self::ITEMS_PER_PAGE);
    }

    /**
     * Update selected filter
     */
    public function filterProjects(string $category): void
    {
        $this->selectedFilter = $category;
        $this->resetPage();
    }

    /**
     * Open project detail modal
     */
    public function openProjectDetail(int $projectId): void
    {
        $this->selectedProject = Project::findOrFail($projectId);
        $this->showModal = true;
    }

    /**
     * Close project detail modal
     */
    public function closeModal(): void
    {
        $this->showModal = false;
        $this->selectedProject = null;
    }

    public function render()
    {
        return view('livewire.projects-page', [
            'projects' => $this->getProjects(),
            'showModal' => $this->showModal,
            'selectedProject' => $this->selectedProject,
        ]);
    }
}
