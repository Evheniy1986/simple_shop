<?php

namespace Database\Factories;

use App\Actions\ImageAction;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
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
           'description' => fake()->text(100),
           'slug' => Str::slug($title),
           'parent_id' => null,
            'image' => ImageAction::createImage('categories', 100,100)
        ];
    }

//    public function withParent($parentId): static
//    {
//        return $this->state(function (array $attributes) use ($parentId) {
//            return [
//                'parent_id' => $parentId,
//            ];
//        });
//    }
}
