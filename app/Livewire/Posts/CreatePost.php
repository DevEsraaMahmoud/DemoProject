<?php

namespace App\Livewire\Posts;

use Livewire\Component;
use App\Models\Category;
use Livewire\Attributes\On;
use Livewire\WithFileUploads;
use App\Livewire\Forms\PostForm;
use Illuminate\Contracts\View\View;

class CreatePost extends Component
{
    use WithFileUploads;

    public PostForm $form;

    public $updateTypes = [];

    public $receiveUpdates = '';

    public $selectedPost = null;

    public $selectedOption = null;

    public $showCategories = false;


    public function mount($selectedOption = null)
    {
        $this->selectedOption = $selectedOption;
    }

    public function updatedSelectedOption($value)
    {
        $this->dispatch('selectedOption', $value);
    }

    // public function rules()
    // {
    //     return [
    //         'title' => [
    //             'required',
    //             // Rule::unique('posts')->ignore($this->post),
    //         ],
    //         'description' => 'required|min:5',
    //     ];
    // }

    #[On('selectedOption')]
    public function selectedOption($categoryId)
    {
        $this->form->category_id = $categoryId;
    }

    public function create()
    {
        $this->form->store();
        return $this->redirectRoute('posts.index', navigate: true);
    }

    public function render(): View
    {
        return view('livewire.posts.create-post')->with([
            'categories' => Category::all()->pluck('name', 'id')->toArray()
        ]);
    }
}
