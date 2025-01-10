<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Option;
use App\Models\OptionValue;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Property;
use Database\Factories\CategoryFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{

    public function run(): void
    {
        $parentCategories = Category::factory()
            ->has(Brand::factory()->count(30))
            ->count(10)
            ->create();

        foreach ($parentCategories as $parentCategory) {
            Category::factory()
                ->create([
                    'parent_id' => $parentCategory->id,
                ]);
        }

        Option::factory()->count(5)->create();

        $optionValues = OptionValue::factory()->count(30)->create();

        $properties = Property::factory()->count(10)->create();

        Product::factory()
            ->has(ProductImage::factory()->count(3), 'images')
            ->hasAttached(
                $optionValues->random(2),
                []
            )
            ->hasAttached(
                $properties->random(rand(5, 10)),
                function () {
                    return ['value' => ucfirst(fake()->word())];
                }
            )
            ->count(200)
            ->create();

        \App\Models\User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            'is_admin' => 1,
        ]);
    }

}
