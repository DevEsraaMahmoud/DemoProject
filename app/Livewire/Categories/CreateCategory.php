<?php

namespace App\Livewire\Categories;

use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use App\Livewire\Forms\CategoryForm;
use Livewire\Component;
use Illuminate\Contracts\View\View;

class CreateCategory extends Component implements HasForms
{
    use InteractsWithForms;

    public CategoryForm $form;

    public function updated($property)
    {
        if ($property === 'title') {
            $this->title = strtolower($this->title);
        }
    }

    public function create()
    {
        $this->form->store();

        session()->flash('status', 'Category successfully updated.');

        return $this->redirect('/categories');
    }

    public function render(): View
    {
        return view('livewire.categories.create-category');
    }
}
