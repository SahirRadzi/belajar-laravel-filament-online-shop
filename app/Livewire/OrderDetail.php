<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Layout;

class OrderDetail extends Component
{
    #[layout('components.layouts.app', ['hideBottomNav' => true])]
    public function render()
    {
        return view('livewire.order-detail');
    }
}
