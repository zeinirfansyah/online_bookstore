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
                'nama_user' => 'Zein Irfansyah',
                'nomor_telpon' => '08912345678',
                'alamat' => 'Shibuya, Tokyo, Japan',
                'username' => 'zeinirfansyah',
                'email' => 'mail@zeinirfansyah.me',
                'password' => Hash::make('password123'),
                'role' => 'manager',
            ]
        ];
    
        foreach ($users as $key => $user) {
            User::create($user);
        }
    }
}
