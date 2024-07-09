<?php

namespace App\Livewire\Categories;

use Livewire\Component;
use App\Models\Category;
use Livewire\Attributes\Validate;
use Illuminate\Contracts\View\View;
use Filament\Forms\Concerns\InteractsWithForms;

class CreateCategory extends Component
{
    use InteractsWithForms;

    #[Validate('required|min:5')]
    public $name = '';

    #[Validate('required|min:5')]
    public $slug = '';


    public function updated($property)
    {
        if ($property === 'name') {
            $this->name = strtolower($this->name);
        }
    }

    public function create()
    {
        $this->validate();

        Category::create($this->all());

        return $this->redirect('/categories');
    }

    public function render(): View
    {
        return view('livewire.categories.create-category');
    }
}
