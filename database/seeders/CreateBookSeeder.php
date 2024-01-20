<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class CreateBookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            DB::table('books')->insert([
                'title' => $faker->sentence(3),
                'author' => $faker->name,
                'description' => $faker->paragraph,
                'image' => $faker->imageUrl(),
                'price' => $faker->randomFloat(2, 10, 50),
                'category' => $faker->word,
                'publisher' => $faker->company,
                'year' => $faker->year,
                'isbn' => $faker->isbn13,
                'pages' => $faker->numberBetween(100, 500),
                'language' => $faker->languageCode,
                'weight' => $faker->randomFloat(2, 0.5, 2),
                'dimensions' => $faker->randomNumber(2) . 'x' . $faker->randomNumber(2),
                'quantity' => $faker->numberBetween(50, 200),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
