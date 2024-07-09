<?php

namespace Tests\Feature\Livewire;

use Tests\TestCase;
use App\Models\Post;
use Livewire\Livewire;
use App\Models\Category;
use App\Livewire\Posts\CreatePost;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class CreatePostTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function test_it_renders_successfully()
    {
        Livewire::test(CreatePost::class)
            ->assertStatus(200);
    }

    /** @test */
    public function test_it_pass_categories_to_view(){
        // Create a category and multiple posts
        Category::factory()->create();
        Post::factory()->create();

        Livewire::test(CreatePost::class)
        ->assertViewHas('categories');
    }

    /** @test */
    public function test_can_set_title()
    {
        Livewire::test(CreatePost::class)
            ->set('title', 'Confessions of a serial soaker')
            ->assertSet('title', 'Confessions of a serial soaker');
    }

    public function test_it_can_create_post()
    {
        $photo = TemporaryUploadedFile::fake()->image('photo.jpg');
        $category = Category::factory()->create();

        Livewire::test(CreatePost::class)
            ->set('title', 'test name')
            ->set('description', '...')
            ->set('category_id', $category->id)
            ->set('photo', $photo)
            ->call('create')
            ->assertHasNoErrors(['title', 'description','category_id', 'photo']);

        $this->assertEquals(1, Post::count());
    }

    public function test_title_field_is_required()
    {
        Livewire::test(CreatePost::class)
            ->set('title', '')
            ->call('create')
            ->assertHasErrors('title');
    }

    public function test_redirected_to_all_posts_after_creating_a_post()
    {
        $category = Category::factory()->create();
        $photo = TemporaryUploadedFile::fake()->image('photo.jpg');

        Livewire::test(CreatePost::class)
            ->set('title', 'test name')
            ->set('description', '...')
            ->set('category_id', $category->id)
            ->set('photo', $photo)
            ->call('create')
            ->assertHasNoErrors(['title', 'description','category_id', 'photo'])
            ->assertRedirect('/posts');
    }

    /** @test */
    public function test_it_updates_category_id_when_selected_option_is_triggered()
    {
        $category = Category::factory()->create();
        $post = Post::factory()->create();

        Livewire::test('posts.create-post', ['post' => $post])
            ->dispatch('selectedOption', $category->id)
            ->assertSet('category_id', $category->id);
    }

    /** @test */
    public function test_it_validates_photo_upload()
    {
        Livewire::test('posts.create-post')
            ->set('photo', \Illuminate\Http\UploadedFile::fake()->create('document.pdf'))
            ->call('create')
            ->assertHasErrors(['photo']);
    }

    /** @test */
    public function test_it_upload_photo()
    {
        Livewire::test('posts.create-post')
            ->set('photo', \Illuminate\Http\UploadedFile::fake()->create('image.png'))
            ->call('create')
            ->assertHasNoErrors(['photo']);
    }
}
