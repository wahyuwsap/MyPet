<?php

// database/seeders/AdminUserSeeder.php

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'username' => 'admin1',
            'nama_lengkap' => 'Administrator MyPet',
            'email' => 'admin@mypet.com',
            'password' => Hash::make('aman123'),
            'no_telepon' => '081234567890',
            'alamat' => 'Kantor Pusat MyPet',
            'role' => 'admin',
        ]);
        
        // Contoh pengguna biasa (user)
        User::create([
            'username' => 'userbiasa',
            'nama_lengkap' => 'Pengguna Biasa',
            'email' => 'user@mypet.com',
            'password' => Hash::make('userpass'), 
            'no_telepon' => '081122334455',
            'alamat' => 'Jl. Merdeka No. 10',
            'role' => 'pengguna',
        ]);
    }
}
