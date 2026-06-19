<?php

namespace App\Filament\Resources\DimProducts\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class DimProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(2)
            ->components([
                TextInput::make('product_code')
                    ->label('Kode Produk')
                    ->required()
                    ->unique(ignoreRecord: true),
                TextInput::make('product_name')
                    ->label('Nama Produk')
                    ->required(),
                Select::make('category')
                    ->label('Kategori')
                    ->options([
                        'Electronics' => 'Elektronik',
                        'Accessories' => 'Aksesoris',
                        'Clothing' => 'Pakaian',
                    ])
                    ->required(),
                TextInput::make('price')
                    ->label('Harga')
                    ->numeric()
                    ->prefix('Rp')
                    ->required()
                    ->minValue(0),
            ]);
    }
}
