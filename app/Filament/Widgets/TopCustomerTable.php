<?php

namespace App\Filament\Widgets;

use App\Models\DimCustomer;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;
use Illuminate\Support\Facades\DB;

class TopCustomerTable extends TableWidget
{
    protected static ?string $heading = 'Pelanggan dengan Belanja Tertinggi';

    protected static ?int $sort = 2;

    protected int|string|array $columnSpan = 1;

    public function table(Table $table): Table
    {
        return $table
            ->recordUrl(null)
            ->recordAction(null)
            ->query(
                DimCustomer::query()
                    ->join('fact_sales', 'dim_customers.customer_id', '=', 'fact_sales.customer_id')
                    ->select([
                        'dim_customers.customer_id',
                        'dim_customers.customer_name',
                        DB::raw('COUNT(fact_sales.sale_id) as total_transactions'),
                        DB::raw('SUM(fact_sales.total_price) as total_revenue'),
                    ])
                    ->groupBy(
                        'dim_customers.customer_id',
                        'dim_customers.customer_name'
                    )
            )
            ->defaultSort('total_revenue', 'desc')
            ->columns([
                TextColumn::make('customer_name')
                    ->label('Nama Pelanggan')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('total_transactions')
                    ->label('Jumlah Transaksi')
                    ->numeric()
                    ->badge()
                    ->color('primary')
                    ->sortable(),

                TextColumn::make('total_revenue')
                    ->label('Total Belanja')
                    ->numeric(
                        decimalPlaces: 0,
                        thousandsSeparator: '.',
                    )
                    ->prefix('Rp ')
                    ->sortable(),
            ]);
    }
}
