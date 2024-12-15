<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Layout;

class ShoppingCart extends Component
{
    #[layout('components.layouts.app', ['hideBottomNav' => true])]
    public function render()
    {
        return view('livewire.shopping-cart');
    }
}
