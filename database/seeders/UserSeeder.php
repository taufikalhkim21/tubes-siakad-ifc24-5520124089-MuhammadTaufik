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
            'name' => 'admin',
            'email' => 'admin22@gmail.com',
            'password' => bcrypt('admin22'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Muhammad Taufik',
            'email' => 'mahasiswa@gmail.com',
            'password' => bcrypt('mahasiswa'),
            'role' => 'taufik2106',
            'npm' => '5520124089',
        ]);
    }
}
