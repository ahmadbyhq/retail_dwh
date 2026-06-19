<?php

namespace App\Filament\Resources\FactSales\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Carbon\Carbon;

class FactSalesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->recordUrl(null)
            ->columns([
                TextColumn::make('product.product_name')
                    ->label('Produk')
                    ->searchable(),
                TextColumn::make('customer.customer_name')
                    ->label('Pelanggan')
                    ->searchable(),
                TextColumn::make('time.transaction_date')
                    ->label('Tanggal')
                    ->formatStateUsing(
                        fn ($state) =>
                        Carbon::parse($state)
                            ->locale('id')
                            ->translatedFormat('d F Y')
                    )
                    ->searchable(),
                TextColumn::make('quantity')
                    ->label('Jumlah')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('unit_price')
                    ->label('Harga Satuan')
                    ->numeric(
                        decimalPlaces: 0,
                        thousandsSeparator: '.',
                    )
                    ->sortable(),
                TextColumn::make('total_price')
                    ->label('Total Harga')
                    ->numeric(
                        decimalPlaces: 0,
                        thousandsSeparator: '.',
                    )
                    ->prefix('Rp ')
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make()
                    ->modalHeading('Hapus Data')
                    ->modalDescription('Data yang dihapus tidak dapat dikembalikan.'),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
