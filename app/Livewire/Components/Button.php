<?php

namespace App\Livewire\Components;

use Livewire\Component;

class Button extends Component
{
    public $text;
    public $url;

    public function mount($text, $url)
    {
        $this->text = $text;
        $this->url = $url;
    }

    public function render()
    {
        return view('livewire.components.button');
    }
}
