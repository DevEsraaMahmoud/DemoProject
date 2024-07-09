<?php

namespace Tests\Feature\Livewire;

use Tests\TestCase;
use App\Models\Post;
use App\Models\User;
use Livewire\Livewire;
use App\Models\Category;
use App\Livewire\Posts\ListPosts;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;

class ListPostsTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_renders_successfully()
    {
        Livewire::test(ListPosts::class)
            ->assertStatus(200);
    }

    /** @test */
    public function test_it_can_render_posts_with_nested_post_item_component()
    {
        // Create a category and multiple posts
        $category = Category::factory()->create();
        Post::factory()->create([
            'title' => 'First Post',
            'description' => 'Description of first post',
            'category_id' => $category->id,
        ]);
        Post::factory()->create([
            'title' => 'Second Post',
            'description' => 'Description of second post',
            'category_id' => $category->id,
        ]);

        Livewire::test(ListPosts::class)
            ->set('search', 'Post') // Set search term to match both posts
            ->assertSee('First Post')
            ->assertSee('Description of first post')
            ->assertSee('Second Post')
            ->assertSee('Description of second post')
            ->assertDontSee('No posts found'); // Ensure both posts are rendered
    }

    // /** @test */
    // public function test_it_can_search_posts_via_url_query_string()
    // {
    //     // Create posts with specific titles
    //     Post::factory()->create(['title' => 'Testing the first water-proof hair dryer']);
    //     Post::factory()->create(['title' => 'Rubber duckies that actually float']);

    //     // Simulate search with query parameter 'search'
    //     Livewire::withQueryParams(['search' => 'hair'])
    //         ->test(ListPosts::class)
    //         ->assertSee('Testing the first water-proof hair dryer')
    //         ->assertDontSee('Rubber duckies that actually float');
    // }

    // /** @test */
    // public function test_it_displays_paginated_posts()
    // {
    //     Post::factory()->count(30)->create();

    //     Livewire::test('posts.list-posts')
    //         ->assertSeeInOrder(Post::orderBy('created_at', 'desc')->take(10)->pluck('title')->toArray());
    // }

    /** @test */
    public function it_can_download_post_photo()
    {
        // Create a user
        $user = User::factory()->create();

        // Fake the storage
        Storage::fake('public');

        // Create a post with a fake photo
        $photo = UploadedFile::fake()->image('photo.jpg');
        $photoPath = $photo->store('photos');

        $post = Post::factory()->create([
            'user_id' => $user->id,
            'photo' => $photoPath,
        ]);

        Livewire::test(\App\Livewire\Posts\ListPosts::class)
            ->call('download', $post)
            ->assertFileDownloaded('photo.jpg');
    }
}
