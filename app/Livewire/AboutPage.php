<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')]
#[Title('Tentang Kami - Jaya Abadi Konstruksi | Profil Perusahaan')]
class AboutPage extends Component
{
    use WithNavigation;
    public function render()
    {
        return view('livewire.about-page');
    }
}
