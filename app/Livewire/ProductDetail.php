<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Layout;

class ProductDetail extends Component
{
    #[layout('components.layouts.app', ['hideBottomNav' => true])]
    public function render()
    {
        return view('livewire.product-detail');
    }
}
