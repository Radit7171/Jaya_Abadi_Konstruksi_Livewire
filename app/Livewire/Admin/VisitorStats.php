<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Visitor;

class VisitorStats extends Component
{
    /**
     * Get visitor statistics
     */
    public function getStats()
    {
        return Visitor::getStats();
    }

    public function render()
    {
        return view('livewire.admin.visitor-stats', [
            'stats' => $this->getStats(),
        ]);
    }
}
