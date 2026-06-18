<?php

namespace App\Filament\Resources\DimProducts\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class DimProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('product_code')
                    ->label('Kode Produk')
                    ->required(),
                TextInput::make('product_name')
                    ->label('Nama Produk')
                    ->required(),
                TextInput::make('category')
                    ->label('Kategori')
                    ->required(),
                TextInput::make('price')
                    ->label('Harga')
                    ->required()
                    ->numeric()
                    ->prefix('Rp'),
            ]);
    }
}
