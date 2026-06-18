<?php

namespace Database\Seeders;

use App\Models\DimTime;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DimTimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dates = [
            '2025-01-15',
            '2025-02-10',
            '2025-03-12',
            '2025-04-08',
            '2025-05-18',
            '2025-06-20',
            '2025-07-05',
            '2025-08-14',
            '2025-09-09',
            '2025-10-25',
        ];

        foreach ($dates as $date) {
            $timestamp = strtotime($date);

            DimTime::create([
                'transaction_date' => $date,
                'year' => date('Y', $timestamp),
                'month' => date('n', $timestamp),
                'month_name' => date('F', $timestamp),
                'quarter' => ceil(date('n', $timestamp) / 3),
            ]);
        }
    }
}
