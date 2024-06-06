<?php

namespace App\Livewire\Posts;

use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use App\Livewire\Forms\PostForm;
use App\Models\Category;
use Livewire\Component;
use Illuminate\Contracts\View\View;

class CreatePost extends Component implements HasForms
{
    use InteractsWithForms;

    public PostForm $form;

    public function create()
    {
        $this->form->store();

        session()->flash('status', 'Post successfully updated.');

        return $this->redirect('/posts');
    }

    public function render(): View
    {
        $categories = Category::all()->pluck('name', 'id')->toArray();
        return view('livewire.posts.create-post', compact('categories'));
    }
}
