<?php

namespace Tests\Feature\Livewire;

use Tests\TestCase;
use App\Models\Post;
use Livewire\Livewire;
use App\Livewire\Posts\ListPosts;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SearchPostsTest extends TestCase
{
     /** @test */
    //  public function can_search_posts_via_url_query_string()
    //  {
    //      Post::factory()->create(['title' => 'Testing the first water-proof hair dryer']);
    //      Post::factory()->create(['title' => 'Rubber duckies that actually float']);

    //      Livewire::withQueryParams(['search' => 'hair'])
    //          ->test(ListPosts::class)
    //          ->assertSee('Testing the first')
    //          ->assertDontSee('Rubber duckies');
    //  }
}
