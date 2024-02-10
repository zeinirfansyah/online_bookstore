<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class CreateSupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            DB::table('suppliers')->insert([
                'supplier_name' => $faker->name,
                'supplier_address' => $faker->address(),
                'supplier_phone' => $faker->phoneNumber,
                'supplier_email' => $faker->email,
                'supplier_website' => $faker->url,
                'supplier_description' => $faker->paragraph,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
