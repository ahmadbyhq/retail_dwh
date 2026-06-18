<?php

namespace Database\Seeders;

use App\Models\DimProduct;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DimProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            ['product_code' => 'P001', 'product_name' => 'Laptop Asus', 'category' => 'Electronics', 'price' => 8500000],
            ['product_code' => 'P002', 'product_name' => 'Laptop Lenovo', 'category' => 'Electronics', 'price' => 7800000],
            ['product_code' => 'P003', 'product_name' => 'Mouse Logitech', 'category' => 'Accessories', 'price' => 250000],
            ['product_code' => 'P004', 'product_name' => 'Keyboard Mechanical', 'category' => 'Accessories', 'price' => 650000],
            ['product_code' => 'P005', 'product_name' => 'Monitor LG', 'category' => 'Electronics', 'price' => 2200000],
            ['product_code' => 'P006', 'product_name' => 'Headset Gaming', 'category' => 'Accessories', 'price' => 450000],
            ['product_code' => 'P007', 'product_name' => 'T-Shirt Casual', 'category' => 'Clothing', 'price' => 120000],
            ['product_code' => 'P008', 'product_name' => 'Jacket Hoodie', 'category' => 'Clothing', 'price' => 350000],
            ['product_code' => 'P009', 'product_name' => 'Sneakers Sport', 'category' => 'Clothing', 'price' => 600000],
            ['product_code' => 'P010', 'product_name' => 'Smartphone Samsung', 'category' => 'Electronics', 'price' => 5500000],
        ];

        foreach ($products as $product) {
            DimProduct::create($product);
        }
    }
}
