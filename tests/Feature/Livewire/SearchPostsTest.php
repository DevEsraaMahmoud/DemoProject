<?php

namespace Tests\Feature\Livewire;

use Tests\TestCase;
use App\Models\Post;
use Livewire\Livewire;
use App\Livewire\Posts\ListPosts;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class SearchPostsTest extends TestCase
{
    use RefreshDatabase;
     /** @test */
    public function test_it_can_search_posts_via_url_query_string()
    {
        $photo = TemporaryUploadedFile::fake()->image('photo.jpg');

        Post::factory()->create([
            'title' => 'Testing the first water-proof hair dryer',
            'photo' => $photo
        ]);
        Post::factory()->create([
            'title' => 'Rubber duckies that actually float',
            'photo' => $photo
        ]);

        Livewire::withQueryParams(['search' => 'hair'])
        ->test(ListPosts::class)
            ->assertSee('Testing the first')
            ->assertDontSee('Rubber duckies');
    }
}
