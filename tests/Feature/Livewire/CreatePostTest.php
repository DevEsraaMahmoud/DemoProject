<?php

namespace Tests\Feature\Livewire;

use Tests\TestCase;
use App\Models\Post;
use Livewire\Livewire;
use App\Livewire\Forms\PostForm;
use App\Livewire\Posts\CreatePost;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreatePostTest extends TestCase
{
    /** @test */
    public function test_it_renders_successfully()
    {
        Livewire::test(CreatePost::class)
            ->assertStatus(200);
    }

    public function test_it_can_create_post()
    {
        $this->assertEquals(0, Post::count());

        Livewire::test(PostForm::class)
            ->set('title', 'Wrinkly fingers? Try this one weird trick')
            ->set('description', '...')
            ->call('create');

        $this->assertEquals(1, Post::count());
    }

    public function test_title_field_is_required()
    {
        Livewire::test(PostForm::class)
            ->set('title', '')
            ->call('create')
            ->assertHasErrors('title');
    }

    public function redirected_to_all_posts_after_creating_a_post()
    {
        Livewire::test(PostForm::class)
            ->set('title', 'Using a loofah doesn\'t make you aloof...ugh')
            ->set('description', '...')
            ->call('create')
            ->assertRedirect('/posts');
    }

    public function creating_a_post_dispatches_event()
    {
        Livewire::test(CreatePost::class)
            ->set('title', 'Top 100 bubble bath brands')
            ->set('content', '...')
            ->call('save')
            ->assertDispatched('post-created');
    }
}
