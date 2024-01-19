<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $users = [
            [
                'nama_user' => 'John Doe',
                'nomor_telpon' => '123456789',
                'alamat' => '123 Main Street, City',
                'username' => 'john_doe',
                'email' => 'john@example.com',
                'password' => Hash::make('password123'),
                'role' => 'manager',
            ]
        ];
    
        foreach ($users as $key => $user) {
            User::create($user);
        }
    }
}
