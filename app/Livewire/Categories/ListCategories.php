<?php

namespace App\Livewire\Categories;

use Livewire\Component;
use App\Models\Category;
use Livewire\Attributes\Url;
use Livewire\WithPagination;

class ListCategories extends Component
{
    use WithPagination;
    
    #[Url]
    public $search = '';

    public function createCategory(){
        return redirect()->route('categories.create');
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.categories.list-categories', [
            'categories' => Category::where('name', 'like', '%' . $this->search . '%')
                ->paginate(10)
        ]);
    }
}
