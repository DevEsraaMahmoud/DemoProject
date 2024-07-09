<?php

namespace Tests\Feature\Livewire;

use Tests\TestCase;
use App\Models\Post;
use App\Models\User;
use Livewire\Livewire;
use App\Models\Category;
use App\Livewire\Posts\UpdatePost;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class UpdatePostTest extends TestCase
{
    use RefreshDatabase;

    public function test_title_field_is_populated()
    {
        $post = Post::factory()->make([
            'title' => 'Top ten bath bombs',
        ]);

        Livewire::test(UpdatePost::class, ['post' => $post])
            ->assertSet('title', 'Top ten bath bombs');
    }

    /** @test */
    public function it_can_update_a_post()
    {
        // Create a category and a post
        $category = Category::factory()->create();
        $post = Post::factory()->create([
            'category_id' => $category->id,
        ]);

        // Create a fake image upload
        $photo = TemporaryUploadedFile::fake()->image('photo.jpg');

        Livewire::test('posts.update-post', ['post' => $post])
            ->set('title', 'Updated Title')
            ->set('description', 'Updated Description')
            ->set('category_id', $category->id)
            ->set('is_published', true)
            ->set('photo', $photo)
            ->call('save')
            ->assertRedirect('/posts');

        $this->assertDatabaseHas('posts', [
            'id' => $post->id,
            'title' => 'Updated Title',
            'description' => 'Updated Description',
            'category_id' => $category->id,
            'is_published' => true,
        ]);
    }

    /** @test */
    public function test_cant_update_another_users_post()
    {
        $user = User::factory()->create();
        $stranger = User::factory()->create();

        $post = Post::factory()->for($stranger)->create();

        Livewire::actingAs($user)
            ->test(UpdatePost::class, ['post' => $post])
            ->set('title', 'Living the lavender life')
            ->call('save')
            ->assertUnauthorized();

        Livewire::actingAs($user)
            ->test(UpdatePost::class, ['post' => $post])
            ->set('title', 'Living the lavender life')
            ->call('save')
            ->assertForbidden();
    }
}
