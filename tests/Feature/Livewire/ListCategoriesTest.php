<?php

namespace Tests\Feature\Livewire;

use Tests\TestCase;
use Livewire\Livewire;
use App\Models\Category;
use App\Livewire\Categories\CreateCategory;
use App\Livewire\Categories\ListCategories;
use Illuminate\Foundation\Testing\RefreshDatabase;


class ListCategoriesTest extends TestCase{

    use RefreshDatabase;

    /** @test */
    public function test_can_search_categories_via_url_query_string()
    {
        $category = Category::factory()->create(['name' => 'Testing the first water-proof hair dryer']);
        Category::factory()->create(['name' => 'Rubber duckies that actually float']);

        // dd($category);

        Livewire::withQueryParams(['search' => 'hair'])
            ->test(ListCategories::class)
            ->assertSee('Testing the first')
            ->assertDontSee('Rubber duckies');
    }

}