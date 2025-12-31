<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')]
#[Title('Proyek - Jaya Abadi Konstruksi')]
class ProjectsPage extends Component
{
    use WithNavigation;
    public function render()
    {
        return view('livewire.projects-page');
    }
}
