<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            [
                'name' => 'Мобильные телефоны',
                'code' => 'mobiles',
                'description' => 'В этом разделе продаються мобильные телефоны',
                'image' => 'categories/yABzRLNNtVcPbIsJcf5gc44p2H8DLxMK5WtLYhah.png',
            ],
            [
                'name' => 'Портативная техника',
                'code' => 'portable',
                'description' => 'Раздел с портативной техникой',
                'image' => 'categories/tLpZ3bvY3UPb4vBRL7X4nD9myrBbp1mIEEZIcsMA.jpg',
            ],
            [
                'name' => 'Бытовая техника',
                'code' => 'technics',
                'description' => 'Раздел с бытовой техникой',
                'image' => 'categories/t6gUmzvyX9ivnCJKRDyoJ3xU3AFhsTISJNmlqxrx.png',
            ],
        ]);
    }
}
