<?php

namespace Tests\Feature\Livewire;

use Tests\TestCase;
use App\Models\Post;
use App\Models\User;
use Livewire\Livewire;
use App\Livewire\Posts\ShowPost;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class ShowPostsTest extends TestCase
{
    use RefreshDatabase;

    // /** @test */
    // public function test_it_can_view_a_post()
    // {
    //     $post = Post::factory()->create([
    //         'title' => 'Test Post',
    //         'description' => 'Test Description',
    //     ]);

    //     Livewire::test(ShowPost::class, ['post' => $post])
    //         ->assertSee('Test Post')
    //         ->assertSee('Test Description');
    // }

    // /** @test */
    // public function test_it_can_delete_a_post()
    // {
    //     $post = Post::factory()->create();

    //     Livewire::test('posts.show-post', ['post' => $post])
    //         ->call('delete')
    //         ->assertRedirect('/posts');

    //     $this->assertDatabaseMissing('posts', [
    //         'id' => $post->id,
    //     ]);
    // }

    /** @test */
    public function test_cant_show_another_users_post()
    {
        $user = User::factory()->create();
        $stranger = User::factory()->create();

        $post = Post::factory()->for($stranger)->create();

        Livewire::actingAs($user)
            ->test(ShowPost::class, ['post' => $post])
            ->assertForbidden();
    }

    /** @test */
    public function test_authorized_user_can_view_post()
    {
        $user = User::factory()->create();
        $post = Post::factory()->create(['user_id' => $user->id]);

        $this->actingAs($user);

        Livewire::test(ShowPost::class, ['post' => $post])
            ->assertSee($post->title);
    }

    /** @test */
    public function test_unauthorized_user_cannot_view_post()
    {
        $user = User::factory()->create();
        $otherUser = User::factory()->create();
        $post = Post::factory()->create(['user_id' => $otherUser->id]);

        $this->actingAs($user);

        Livewire::test(ShowPost::class, ['post' => $post])
            ->assertForbidden();
    }

    /** @test */
    public function test_authorized_user_can_delete_post()
    {
        $user = User::factory()->create();
        $post = Post::factory()->create(['user_id' => $user->id]);

        $this->actingAs($user);

        Livewire::test(ShowPost::class, ['post' => $post])
            ->call('delete')
            ->assertRedirect(route('posts.index'));

        $this->assertDatabaseMissing('posts', ['id' => $post->id]);
    }
}