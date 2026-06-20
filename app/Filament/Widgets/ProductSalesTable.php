<?php

namespace App\Filament\Widgets;

use App\Models\DimProduct;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;
use Illuminate\Support\Facades\DB;

class ProductSalesTable extends TableWidget
{
    protected static ?string $heading = 'Total Penjualan per Produk';

    protected int|string|array $columnSpan = 1;

    protected static ?int $sort = 1;

    public function table(Table $table): Table
    {
        return $table
            ->recordUrl(null)
            ->recordAction(null)
            ->query(
                DimProduct::query()
                    ->join('fact_sales', 'dim_products.product_id', '=', 'fact_sales.product_id')
                    ->select([
                        'dim_products.product_id',
                        'dim_products.product_name',
                        DB::raw('SUM(fact_sales.quantity) as total_sold'),
                        DB::raw('SUM(fact_sales.total_price) as total_revenue'),
                    ])
                    ->groupBy(
                        'dim_products.product_id',
                        'dim_products.product_name'
                    )
            )
            ->columns([
                TextColumn::make('product_name')
                    ->label('Nama Produk')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('total_sold')
                    ->label('Total Terjual')
                    ->badge()
                    ->color('primary')
                    ->numeric()
                    ->sortable(),

                TextColumn::make('total_revenue')
                    ->label('Total Pendapatan')
                    ->numeric(
                        decimalPlaces: 0,
                        thousandsSeparator: '.',
                    )
                    ->prefix('Rp ')
                    ->sortable(),
            ]);
    }
}
