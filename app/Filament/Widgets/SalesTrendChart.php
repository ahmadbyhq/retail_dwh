<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;
use App\Models\FactSale;

class SalesTrendChart extends ChartWidget
{
    protected ?string $heading = 'Tren Pendapatan Bulanan';

    protected static ?int $sort = 3;

    protected int|string|array $columnSpan = '1';
    // protected int|string|array $columnSpan = 'full';

    protected function getData(): array
    {
        $data = FactSale::query()
            ->join('dim_times', 'fact_sales.time_id', '=', 'dim_times.time_id')
            ->select([
                'dim_times.month_name',
                'dim_times.month',
                DB::raw('SUM(fact_sales.total_price) as total_revenue')
            ])
            ->groupBy('dim_times.month', 'dim_times.month_name')
            ->orderBy('dim_times.month', 'asc')
            ->get();

        return [
            'datasets' => [
                [
                    'label' => 'Total Pendapatan',
                    'data' => $data->pluck('total_revenue')->toArray(),
                    'borderColor' => '#84cc16',
                    'fill' => 'start',
                    'backgroundColor' => 'rgba(132, 204, 22, 0.25)',
                ],
            ],
            'labels' => $data->pluck('month_name')->toArray(),
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
