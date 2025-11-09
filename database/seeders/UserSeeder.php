<?php

// database/seeders/UserSeeder.php

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Dikosongkan agar tidak ada user yang dibuat otomatis.
        // Anda akan mendaftarkan semua user melalui form registrasi.
    }
}
