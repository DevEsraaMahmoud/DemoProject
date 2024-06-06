<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;
use App\Models\Category;

class CategoryForm extends Form
{
    #[Validate('required|min:5')]
    public $name = '';

    #[Validate('required|min:5')]
    public $slug = '';

    public function store()
    {
        $this->validate();

        Category::create($this->all());
    }
}