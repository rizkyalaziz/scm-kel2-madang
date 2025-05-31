<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummyUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'name'=>'Mas Admin',
                'email'=>'admingudang@gmail.com',
                'role'=>'admin',
                'password'=>bcrypt('123456')
            ],
            [
                'name'=>'Mas Manajer',
                'email'=>'manajer@gmail.com',
                'role'=>'manajer',
                'password'=>bcrypt('123456')
            ],
            
            ];

            foreach($userData as $key => $val){
                User::create($val);
            }
    }
}
