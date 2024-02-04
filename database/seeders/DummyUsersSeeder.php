<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class DummyUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userData = [
            [
               'name'=>'Admin',
               'email'=>'admin@gmail.com',
                'role'=>'admin',
               'password'=> bcrypt('password'),
            ],
            
        ];
  
        foreach ($userData as $key => $val) {
            User::create($val);
        }
    }
}
