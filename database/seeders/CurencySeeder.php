<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CurencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('currencies')->truncate();

        DB::table('currencies')->insert([
            [
                'code' => 'UAH',
                'symbol' => '₴',
                'is_main' => 1,
                'rate' => 1
            ],
            [
                'code' => 'USD',
                'symbol' => '$',
                'is_main' => 0,
                'rate' => 38.7
            ],
            [
                'code' => 'EUR',
                'symbol' => '€',
                'is_main' => 0,
                'rate' => 42.13
            ],
        ]);
    }
}
