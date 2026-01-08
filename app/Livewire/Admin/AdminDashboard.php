<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use App\Models\Project;
use App\Models\User;

#[Layout('layouts.admin')]
#[Title('Dashboard - Admin Jaya Abadi Konstruksi')]
class AdminDashboard extends Component
{
    /**
     * Get dashboard statistics
     */
    public function getDashboardStats(): array
    {
        return [
            'total_projects' => Project::count(),
            'published_projects' => Project::where('is_published', true)->count(),
            'draft_projects' => Project::where('is_published', false)->count(),
            'total_users' => User::count(),
        ];
    }

    public function render()
    {
        return view('livewire.admin.dashboard-page', [
            'stats' => $this->getDashboardStats(),
        ]);
    }
}
