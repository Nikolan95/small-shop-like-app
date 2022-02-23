<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id' => 1,
            'is_admin' => false,
            'firstname' => 'Nikola',
            'lastname'  => 'Nicic',
            'username' => 'nicic995',
            'email'     => 'nikolanicic1995@gmail.com',
            'address' => 'njegoseva 3',
            'city' => 'Beograd',
            'password' => Hash::make('qwerty123'),
            'remember_token' => null,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('users')->insert([
            'id' => 2,
            'is_admin' => false,
            'firstname' => 'Jon',
            'lastname'  => 'Doe',
            'username' => 'JonDoe',
            'email'     => 'jondoe@gmail.com',
            'address' => 'njegoseva 3',
            'city' => 'Beograd',
            'password' => Hash::make('qwerty123'),
            'remember_token' => null,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('users')->insert([
            'id' => 3,
            'is_admin' => true,
            'firstname' => 'Admin',
            'lastname'  => 'Admin',
            'username' => 'Admin',
            'email'     => 'Admin@gmail.com',
            'address' => 'Admin 3',
            'city' => 'Admin',
            'password' => Hash::make('qwerty123'),
            'remember_token' => null,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }
}
