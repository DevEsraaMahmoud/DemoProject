<?php

namespace Tests\Feature\Livewire;

use Tests\TestCase;
use App\Models\Post;
use Livewire\Livewire;
use App\Livewire\Posts\ShowPost;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ShowPostsTest extends TestCase
{
    public function displays_posts()
    {
        Post::factory()->make(['title' => 'On bathing well']);
        Post::factory()->make(['title' => 'There\'s no time like bathtime']);

        Livewire::test(ShowPost::class)
            ->assertSee('On bathing well')
            ->assertSee('There\'s no time like bathtime');
    }
}
