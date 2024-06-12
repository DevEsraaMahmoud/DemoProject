<?php

namespace App\Livewire\Posts;

use App\Models\Post;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Locked;

class ShowPost extends Component
{
    // #[Locked]
    public Post $post;

    #[On('post-deleted')]
    public function delete(Post $post){
        $post->delete();
        session()->flash('message', 'Post deleted successfully.');
        return $this->redirectRoute('posts.index', navigate: true);
    }

    public function exception($e, $stopPropagation) {
        dd('here');
        if($e instanceof NotFoundException) {
            $this->notify('Post is not found');
        }
    }
}
