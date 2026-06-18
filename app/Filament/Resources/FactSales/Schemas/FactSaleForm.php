<?php

namespace App\Filament\Resources\FactSales\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class FactSaleForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('product_id')
                    ->label('Produk')
                    ->relationship('product', 'product_id')
                    ->searchable()
                    ->preload()
                    ->required(),
                Select::make('customer_id')
                    ->label('Pelanggan')
                    ->relationship('customer', 'customer_id')
                    ->searchable()
                    ->preload()
                    ->required(),
                Select::make('time_id')
                    ->label('Tanggal')
                    ->relationship('time', 'time_id')
                    ->searchable()
                    ->preload()
                    ->required(),
                TextInput::make('quantity')
                    ->label('Jumlah')
                    ->required()
                    ->numeric(),
                TextInput::make('unit_price')
                    ->label('Harga Satuan')
                    ->required()
                    ->numeric()
                    ->prefix('Rp'),
                TextInput::make('total_price')
                    ->label('Total Harga')
                    ->required()
                    ->numeric()
                    ->prefix('Rp'),
            ]);
    }
}
