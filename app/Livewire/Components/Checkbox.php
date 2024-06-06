<?php

namespace App\Livewire\Components;

use Livewire\Component;

class Checkbox extends Component
{
    public $isChecked = false;

    public function toggle()
    {
        $this->isChecked = !$this->isChecked;
    }

    public function render()
    {
        return view('livewire.components.checkbox');
    }
}
