<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class CreateBookCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            DB::table('book_categories')->insert([
                'category_name' => $faker->name(),
                'category_description' => $faker->sentence(2),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
