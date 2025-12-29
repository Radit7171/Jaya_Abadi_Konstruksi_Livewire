<?php

namespace App\Livewire;

trait WithNavigation
{
    public function mount()
    {
        // Set active state for navbar
        $this->dispatch('page-changed', page: $this->getPageName());
    }

    protected function getPageName()
    {
        return strtolower(class_basename($this));
    }
}
