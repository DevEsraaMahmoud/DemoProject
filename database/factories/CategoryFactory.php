<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    /**
     * Configure the model factory.
     */
    public function configure(): static
    {
        return $this->afterCreating(function (Category $category) {
            SubCategory::factory()->create([
                'category_id' => $category
            ]);
        });
    }

    public function definition(): array
    {
        return [
            'name' => fake()->title,
            'slug' => fake()->text,
        ];
    }
}
