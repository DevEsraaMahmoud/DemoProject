<?php

namespace App\Livewire\Components;

use Livewire\Component;

class Select extends Component
{
    public $options = [];
    public $selectedOption = null;

    public function mount($options = [], $selectedOption = null)
    {
        $this->options = $options;
        $this->selectedOption = $selectedOption;
    }

    public function updatedSelectedOption($value)
    {
        $this->emit('optionSelected', $value);
    }

    public function render()
    {
        return view('livewire.components.select');
    }
}
