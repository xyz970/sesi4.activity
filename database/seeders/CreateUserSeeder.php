<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CreateUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name'=>'Admin User',
                'email'=>'admin@gmail.com',
                'type'=>1,
                'password'=>bcrypt('123456')
            ],
            [
                'name'=>'Manager User',
                'email'=>'manager@gmail.com',
                'type'=>2,
                'password'=>bcrypt('123456')
            ],
            [
                'name'=>'User',
                'email'=>'user@gmail.com',
                'type'=>0,
                'password'=>bcrypt('123456')
            ],
        ];
        foreach ($users as $key => $user){
            DB::table('users')->insert($user);
    }
    }
}
