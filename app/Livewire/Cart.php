<?php

namespace App\Livewire;

use Livewire\Component;

class Cart extends Component
{
    public $discountToken;

    public function mount()
    {
        $this->discountToken = request()->cookie('discountToken');
    }

    public function render()
    {
        return view('livewire.cart');
    }
}
