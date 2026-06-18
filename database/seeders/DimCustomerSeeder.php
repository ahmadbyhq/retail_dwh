<?php

namespace Database\Seeders;

use App\Models\DimCustomer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DimCustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $customers = [
            ['customer_code' => 'C001', 'customer_name' => 'Ahmad Fauzi', 'gender' => 'M', 'city' => 'Surabaya'],
            ['customer_code' => 'C002', 'customer_name' => 'Budi Santoso', 'gender' => 'M', 'city' => 'Malang'],
            ['customer_code' => 'C003', 'customer_name' => 'Siti Aisyah', 'gender' => 'F', 'city' => 'Sidoarjo'],
            ['customer_code' => 'C004', 'customer_name' => 'Dewi Lestari', 'gender' => 'F', 'city' => 'Gresik'],
            ['customer_code' => 'C005', 'customer_name' => 'Rudi Hartono', 'gender' => 'M', 'city' => 'Surabaya'],
            ['customer_code' => 'C006', 'customer_name' => 'Nabila Putri', 'gender' => 'F', 'city' => 'Mojokerto'],
            ['customer_code' => 'C007', 'customer_name' => 'Andi Saputra', 'gender' => 'M', 'city' => 'Lamongan'],
            ['customer_code' => 'C008', 'customer_name' => 'Putri Ayu', 'gender' => 'F', 'city' => 'Pasuruan'],
            ['customer_code' => 'C009', 'customer_name' => 'Fajar Nugroho', 'gender' => 'M', 'city' => 'Jombang'],
            ['customer_code' => 'C010', 'customer_name' => 'Intan Permata', 'gender' => 'F', 'city' => 'Kediri'],
        ];

        foreach ($customers as $customer) {
            DimCustomer::create($customer);
        }
    }
}
