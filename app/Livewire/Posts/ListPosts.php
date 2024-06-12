<?php

namespace App\Livewire\Posts;

use App\Models\Post;
use Livewire\Component;
use Livewire\Attributes\Url;
use Livewire\WithPagination;
use Livewire\Attributes\Lazy;
use Livewire\Attributes\Title;
use Livewire\Attributes\Computed;

#[Lazy]
// #[Title('List Posts')]
class ListPosts extends Component
{
    use WithPagination;

    public $title = 'List Posts';

    #[Url(keep: true)]
    public ?string $search = '';

    // public function search()
    // {
    //     $this->resetPage();
    // }

    public function createPost(){
        return redirect()->route('posts.create');
    }

    #[Computed(persist: true, seconds: 7200)]
    public function posts() {
        return Post::with('category')->when($this->search, function($query) {
            $query->where('title', 'like', '%' . $this->search . '%')
            ->orWhere('description', 'like', '%' . $this->search . '%');
        })->latest()->paginate(10, pageName: 'posts-page');
    }

    public function download(Post $post)
    {
        return response()->download(
            storage_path('app/'. $post->photo), 'photo.jpg'
        );
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
}
