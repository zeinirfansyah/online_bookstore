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
                'nama_user' => 'zeemarimo',
                'nomor_telpon' => '3252525',
                'alamat' => 'Shibuya, Tokyo, Japan',
                'username' => 'zeemarimo',
                'email' => '12.zeinirfansyah@gmail.com',
                'password' => Hash::make('password123'),
                'role' => 'manager',
            ],
            [
                'nama_user' => 'zeinirfansyah',
                'nomor_telpon' => '3252525',
                'alamat' => 'Shibuya, Tokyo, Japan',
                'username' => 'zeinirfansyah',
                'email' => 'mail@zeinirfansyah.me',
                'password' => Hash::make('password123'),
                'role' => 'admin',
            ],
            [
                'nama_user' => 'nom nom',
                'nomor_telpon' => '3252525',
                'alamat' => 'Shibuya, Tokyo, Japan',
                'username' => 'nomnom',
                'email' => 'zeinirfansyah7@gmail.com',
                'password' => Hash::make('password123'),
                'role' => 'customer',
            ],


        ];
    
        foreach ($users as $key => $user) {
            User::create($user);
        }
    }
}
