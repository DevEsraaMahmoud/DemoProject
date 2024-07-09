<?php

namespace App\Livewire\Posts;

use App\Models\Post;
use Livewire\Component;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Attributes\On;
use Illuminate\Contracts\View\View;

class ShowPost extends Component
{
    use AuthorizesRequests;

    public Post $post;
    public $title;
    public $description;

    public function mount(Post $post): void
    {
        $this->authorize('view', $post); // Authorization check
        $this->post = $post;
        $this->title = $post->title;
        $this->description = $post->description;
    }

    #[On('post-deleted')]
    public function delete()
    {
        $this->authorize('delete', $this->post);
        $this->post->delete();
        session()->flash('message', 'Post deleted successfully.');
        return $this->redirectRoute('posts.index');
    }

    public function render(): View
    {
        return view('livewire.posts.show-post', [
            'post' => $this->post
        ]);
    }
}
