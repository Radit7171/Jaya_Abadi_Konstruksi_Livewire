<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')]
#[Title('Syarat & Ketentuan - Jaya Abadi Konstruksi')]
class TermsConditions extends Component
{
    public function render()
    {
        return view('livewire.terms-conditions');
    }
}
