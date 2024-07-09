<?php

namespace App\Livewire\Posts;

use App\Models\Post;
use Livewire\Component;
use App\Models\Category;
use Livewire\Attributes\On;
use Livewire\WithFileUploads;
use App\Livewire\Forms\PostForm;
use Livewire\Attributes\Validate;
use Illuminate\Contracts\View\View;

class CreatePost extends Component
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

    #[Validate('required', message: 'Please select a photo.')]
    #[Validate('image', message: 'Please select an image.')]
    public $photo;

    public $updateTypes = [];

    public $receiveUpdates = '';

    public $selectedPost = null;

    public $selectedOption = null;

    public $showCategories = false;

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

    public function update()
    {
        $this->post->update(
            $this->all()
        );
    }

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
        $this->category_id = $categoryId;
    }

    public function create()
    {
        Post::create(array_merge($this->validate(), ['photo'=> $this->photo->store(path: 'photos')]));
        $this->reset();
        return $this->redirectRoute('posts.index', navigate: true);
    }

    public function render(): View
    {
        return view('livewire.posts.create-post')->with([
            'categories' => Category::all()->pluck('name', 'id')->toArray()
        ]);
    }
}
