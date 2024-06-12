<?php

namespace App\Livewire\Posts;

use App\Models\Post;
use Livewire\Component;

class PostItem extends Component
{
    public Post $post;

    public function edit($post){
        return redirect()->route('posts.edit', $post);
    }

    public function show($post){
        return redirect()->route('posts.show', $post);
    }

    public function delete($post)
    {
        $post->delete();
        session()->flash('message', 'Post deleted successfully.');
    }
}
