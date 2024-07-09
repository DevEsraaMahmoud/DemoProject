<?php

namespace Tests\Feature\Livewire;

use Tests\TestCase;
use Livewire\Livewire;
use App\Models\Category;
use App\Livewire\Categories\CreateCategory;
use App\Livewire\Categories\ListCategories;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreateCategoryTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function test_it_renders_successfully()
    {
        Livewire::test(CreateCategory::class)
            ->assertStatus(200);
    }

    public function test_it_can_create_category()
    {
        $this->assertEquals(0, Category::count());

        Livewire::test(CreateCategory::class)
            ->set('name', 'test slug')
            ->set('slug', 'test-slug')
            ->call('create');

        $this->assertEquals(1, Category::count());
    }

    public function test_it_validates_inputs()
    {
        Livewire::test(CreateCategory::class)
            ->set('name', '')
            ->set('name', '')
            ->call('create')
            ->assertHasErrors('name');
    }

    public function test_redirected_to_all_categories()
    {
        Livewire::test(CreateCategory::class)
            ->set('name', 'blah blah')
            ->set('slug', 'blah-blah')
            ->call('create')
            ->assertHasNoErrors(['name', 'slug'])
            ->assertRedirect(ListCategories::class);
    }

    // public function creating_a_category_dispatches_event()
    // {
    //     Livewire::test(CreatePost::class)
    //         ->set('title', 'Top 100 bubble bath brands')
    //         ->set('content', '...')
    //         ->call('save')
    //         ->assertDispatched('post-created');
    // }
}
