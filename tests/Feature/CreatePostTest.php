<?php

namespace Tests\Feature;

use Tests\TestCase;
use Livewire\Livewire;
use App\Livewire\Posts\CreatePost;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreatePostTest extends TestCase
{
    use RefreshDatabase;

    // /** @test */
    // public function it_dispatches_post_created_event()
    // {
    //     Livewire::test(CreatePost::class)
    //         ->call('create')
    //         ->assertDispatched('post-created');
    // }

    // public function it_updates_post_count_when_a_post_is_created()
    // {
    //     Livewire::test(Dashboard::class)
    //         ->assertSee('Posts created: 0')
    //         ->dispatch('post-created')
    //         ->assertSee('Posts created: 1');
    // }
}
