<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'テストユーザーＡ',
            'email' => 'a@example.com',
            'password' => bcrypt('password'),
        ]);

        User::create([
            'name' => 'テストユーザーＢ',
            'email' => 'b@example.com',
            'password' => bcrypt('password'),
        ]);

        User::create([
            'name' => 'テストユーザーＣ',
            'email' => 'c@example.com',
            'password' => bcrypt('password'),
        ]);
    }
}
