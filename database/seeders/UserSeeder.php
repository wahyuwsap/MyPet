<?php

namespace database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin Hipet',
            'email' => 'admin@hipet.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Alia Rahayu',
            'email' => 'alia@hipet.com',
            'password' => Hash::make('user123'),
            'role' => 'user',
        ]);
    }
}
