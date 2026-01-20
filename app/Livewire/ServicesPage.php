<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')]
#[Title('Layanan Konstruksi Besi & Baja - Jaya Abadi Konstruksi')]
class ServicesPage extends Component
{
    use WithNavigation;
    public function render()
    {
        return view('livewire.services-page');
    }
}
