<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')]
#[Title('Hubungi Kami - Konsultasi Konstruksi Gratis | Jaya Abadi Konstruksi')]
class ContactPage extends Component
{
    use WithNavigation;
    public function render()
    {
        return view('livewire.contact-page');
    }
}
