<?php

namespace Database\Factories;

use App\Actions\ImageAction;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use function Laravel\Prompts\text;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->sentence(2);
        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'description' => fake()->text(200),
            'preview_image' => ImageAction::createImage('product_preview', 300, 300),
            'price' => fake()->numberBetween(999, 10000),
            'count' => rand(1,9),
            'is_published' => 1,
            'category_id' => Category::all()->random()->id,
            'brand_id' => Brand::all()->random()->id,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
