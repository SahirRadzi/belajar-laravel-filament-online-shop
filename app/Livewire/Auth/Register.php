<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Livewire\Attributes\Layout;

class Register extends Component
{
    #[layout('components.layouts.app', ['hideBottomNav' => true])]
    public function render()
    {
        return view('livewire.auth.register');
    }
}
