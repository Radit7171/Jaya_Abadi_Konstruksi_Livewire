<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')]
#[Title('Jaya Abadi Konstruksi - Spesialis Konstruksi Besi & Baja Profesional')]
class HomePage extends Component
{
    use WithNavigation;
    public function render()
    {
        return view('livewire.home-page');
    }
}
