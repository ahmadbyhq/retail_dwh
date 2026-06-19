<?php

namespace App\Filament\Resources\DimProducts\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class DimProductsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->recordUrl(null)
            ->columns([
                TextColumn::make('product_code')
                    ->label('Kode Produk')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('product_name')
                    ->label('Nama Produk')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('category')
                    ->label('Kategori')
                    ->formatStateUsing(fn(string $state): string => match ($state) {
                        'Electronics' => 'Elektronik',
                        'Accessories' => 'Aksesoris',
                        'Clothing' => 'Pakaian',
                        default => $state,
                    })
                    ->sortable()
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'Electronics' => 'info',
                        'Accessories' => 'warning',
                        'Clothing' => 'success',
                        default => 'gray',
                    }),
                TextColumn::make('price')
                    ->label('Harga')
                    ->numeric(
                        thousandsSeparator: '.',
                        decimalPlaces: 0,
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
