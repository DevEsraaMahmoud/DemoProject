<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;
use App\Models\Post;
use Livewire\WithFileUploads;

class PostForm extends Form
{
    use WithFileUploads;

    public ?Post $post;

    #[Validate('required', message: 'Please enter a title.')]
    #[Validate('min:5', message: 'Your title is too short.')]
    public $title = '';

    #[Validate('required', message: 'Please enter a description.')]
    public $description = '';

    #[Validate('required', message: 'Please select a category.')]
    public $category_id = null;

    public $is_published;
    // #[Validate('image|max:1024')] // 1MB Max
    public $photo;

    public function setPost(Post $post)
    {
        $this->post = $post;

        $this->title = $post->title;

        $this->description = $post->description;

        $this->category_id = $post->category_id;

        $this->is_published = $post->is_published;
    }

    // public function updated($property)
    // {
    //     dd('here');

    //     if ($property === 'title') {
    //         $this->title = strtolower($this->title);
    //     }
    // }

    public function store()
    {
        Post::create(array_merge($this->validate(), ['photo'=> $this->photo->store(path: 'photos')]));
        $this->reset();
    }

    public function update()
    {
        $this->post->update(
            $this->all()
        );
    }
}