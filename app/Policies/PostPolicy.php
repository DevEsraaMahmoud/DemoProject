<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    public function view(User $user, Post $post)
    {
        // Define your authorization logic
        return $user->id === $post->user_id;
    }

    public function delete(User $user, Post $post)
    {
        // Define your authorization logic
        return $user->id === $post->user_id;
    }
}
