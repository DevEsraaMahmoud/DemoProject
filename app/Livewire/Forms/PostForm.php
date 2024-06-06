<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;
use App\Models\Post;

class PostForm extends Form
{
    #[Validate('required|min:5')]
    public $title = '';

    #[Validate('required|min:5')]
    public $description = '';

    #[Validate('required|boolean')]
    public $is_published = true;

    // #[Validate('required|exists:categories,id')]
    public $category_id = null;

    // protected $listeners = ['optionSelected'];

    // public function optionSelected($categoryId)
    // {
    //     dd($categoryId);
    //     // $this->form['category_id'] = $categoryId;
    // }

    public function store()
    {
        $this->validate();

        Post::create($this->all());
    }
}