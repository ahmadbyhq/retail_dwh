<?php

namespace Database\Seeders;

use App\Models\FactSale;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FactSaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sales = [
            [1, 1, 1, 2, 8500000],
            [2, 2, 2, 1, 7800000],
            [3, 3, 3, 5, 250000],
            [4, 4, 4, 3, 650000],
            [5, 5, 5, 2, 2200000],
            [6, 6, 6, 4, 450000],
            [7, 7, 7, 6, 120000],
            [8, 8, 8, 2, 350000],
            [9, 9, 9, 3, 600000],
            [10, 10, 10, 1, 5500000],
            [1, 2, 3, 1, 8500000],
            [2, 3, 4, 2, 7800000],
            [3, 4, 5, 4, 250000],
            [4, 5, 6, 3, 650000],
            [5, 6, 7, 1, 2200000],
            [6, 7, 8, 2, 450000],
            [7, 8, 9, 5, 120000],
            [8, 9, 10, 2, 350000],
            [9, 10, 1, 3, 600000],
            [10, 1, 2, 1, 5500000],
        ];

        foreach ($sales as $sale) {
            FactSale::create([
                'product_id' => $sale[0],
                'customer_id' => $sale[1],
                'time_id' => $sale[2],
                'quantity' => $sale[3],
                'unit_price' => $sale[4],
                'total_price' => $sale[3] * $sale[4],
            ]);
        }
    }
}
