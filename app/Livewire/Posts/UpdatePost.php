<?php

namespace App\Livewire\Posts;

use App\Models\Post;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithFileUploads;

class UpdatePost extends Component
{
    use WithFileUploads;

    public ?Post $post = null;
    public $title = '';
    public $description = '';
    public $category_id = null;
    public $is_published;
    public $photo;
    public $updateTypes = [];
    public $receiveUpdates = '';
    public $selectedPost = null;
    public $selectedOption = null;
    public $showCategories = false;

    protected $rules = [
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'category_id' => 'required|exists:categories,id',
        'is_published' => 'boolean',
        'photo' => 'nullable|image|max:1024', // Optional and max size 1MB
    ];

    public function setPost(Post $post)
    {
        $this->post = $post;
        $this->title = $post->title;
        $this->description = $post->description;
        $this->category_id = $post->category_id;
        $this->is_published = $post->is_published;
    }

    public function mount(Post $post)
    {
        $this->setPost($post);
    }

    public function save()
    {
        $validatedData = $this->validate();

        if ($this->photo) {
            $validatedData['photo'] = $this->photo->store('photos');
        }

        $this->post->update($validatedData);

        session()->flash('message', 'Post updated successfully.');

        return redirect()->route('posts.index');
    }

    public function render()
    {
        return view('livewire.posts.update-post')->with([
            'categories' => Category::all()->pluck('name', 'id')->toArray()
        ]);
    }
}
