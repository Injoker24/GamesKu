<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::query()->insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin123'),
            'IsAdmin' => 1
        ]);

        User::create([
            'name' => 'user',
            'email' => 'user@gmail.com',
            'password' => bcrypt('password'),
            'IsAdmin' => 0
        ]);

        User::create([
            'name' => 'user1',
            'email' => 'user1@gmail.com',
            'password' => bcrypt('password'),
            'IsAdmin' => 0
        ]);

        User::create([
            'name' => 'user2',
            'email' => 'user2@gmail.com',
            'password' => bcrypt('password'),
            'IsAdmin' => 0
        ]);
    }
}
