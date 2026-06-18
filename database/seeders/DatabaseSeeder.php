<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Seeders\DimCustomerSeeder;
use Database\Seeders\DimProductSeeder;
use Database\Seeders\DimTimeSeeder;
use Database\Seeders\FactSaleSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            DimProductSeeder::class,
            DimCustomerSeeder::class,
            DimTimeSeeder::class,
            FactSaleSeeder::class,
        ]);
    }
}
