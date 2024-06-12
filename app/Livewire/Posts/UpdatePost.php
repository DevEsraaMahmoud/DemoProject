<?php

namespace App\Livewire\Posts;

use App\Models\Post;
use Livewire\Component;
use App\Models\Category;
use App\Livewire\Forms\PostForm;

class UpdatePost extends Component
{
    public PostForm $form;

    public function mount(Post $post)
    {
        $this->form->setPost($post);
    }

    public function save()
    {
        $this->form->update();

        return $this->redirect('/posts');
    }

    public function render()
    {
        return view('livewire.posts.update-post')->with([
            'categories' => Category::all()->pluck('name', 'id')->toArray()
        ]);
    }
}
