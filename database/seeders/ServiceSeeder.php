<?php

namespace Database\Seeders;

// database/seeders/ServiceSeeder.php

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        Service::create(['name' => 'Full Grooming', 'price' => 150000]);
        Service::create(['name' => 'Mandi Kering & Potong Kuku', 'price' => 50000]);
        Service::create(['name' => 'Potong Rambut Saja', 'price' => 80000]);
    }
}