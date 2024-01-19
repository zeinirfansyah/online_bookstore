<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $users = [
            [
               'nama'=>'Zein Irfansyah',
               'nomor_telpon'=>'08123456789',
               'alamat'=>'Kampung Durian Runtuh, Istanbul, Turkey',
               'username'=>'zeinirfansyah',
               'email'=>'12.zeinirfansyah@gmail.com',
               'role'=>"manager",
               'password'=> bcrypt('11111111'),
            ],
            [
               'nama'=>'Wildan Hilmi',
               'nomor_telpon'=>'08987654321',
               'alamat'=>'Kampung Slumirikiti, Jakarta, Indonesia',
               'username'=>'wildanhilmi',
               'email'=>'zeinirfansyah7@gmail.com',
               'role'=>"admin_obat",
               'password'=> bcrypt('11111111'),
            ]

           
        ];
    
        foreach ($users as $key => $user) {
            User::create($user);
        }
    }
}
