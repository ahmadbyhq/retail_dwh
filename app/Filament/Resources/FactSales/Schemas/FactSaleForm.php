<?php

namespace App\Filament\Resources\FactSales\Schemas;

use App\Models\DimProduct;
use App\Models\DimTime;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Carbon\Carbon;
use Filament\Support\RawJs;

class FactSaleForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(2)
            ->components([
                Select::make('product_id')
                    ->label('Produk')
                    ->options(
                        DimProduct::query()
                            ->get()
                            ->mapWithKeys(fn($product) => [
                                $product->product_id =>
                                "{$product->product_name} (Rp " .
                                    number_format($product->price, 0, ',', '.') . ")",
                            ])
                    )
                    ->searchable()
                    ->live()
                    ->afterStateUpdated(function ($state, Set $set, Get $get) {

                        $product = DimProduct::find($state);

                        $price = $product?->price ?? 0;

                        $set('unit_price', $price);

                        $set(
                            'total_price',
                            $price * ((int) ($get('quantity') ?: 0))
                        );
                    })
                    ->required(),
                Select::make('customer_id')
                    ->label('Pelanggan')
                    ->relationship('customer', 'customer_name')
                    ->searchable()
                    ->preload()
                    ->required(),
                Select::make('time_id')
                    ->label('Tanggal')
                    ->options(
                        DimTime::all()
                            ->mapWithKeys(fn ($time) => [
                                $time->time_id =>
                                Carbon::parse($time->transaction_date)
                                    ->locale('id')
                                    ->translatedFormat('d F Y')
                            ])
                    )
                    ->searchable()
                    ->required(),
                TextInput::make('quantity')
                    ->label('Jumlah')
                    ->numeric()
                    ->required()
                    ->live()
                    ->afterStateUpdated(function ($state, Get $get, Set $set) {
                        $unitPrice = (float) $get('unit_price');
                        $set('total_price', (int) $state * $unitPrice);
                    }),
                TextInput::make('unit_price')
                    ->label('Harga Satuan')
                    ->disabled()
                    ->dehydrated()
                    ->live()
                    ->prefix('Rp')
                    ->numeric()
                    ->mask(RawJs::make('$money($input, \',\', \'.\', 0)'))
                    ->stripCharacters('.')
                    ->afterStateUpdated(function ($state, Get $get, Set $set) {

                        $set(
                            'total_price',
                            (float) $state * (int) $get('quantity')
                        );
                    }),
                TextInput::make('total_price')
                    ->label('Total Harga')
                    ->disabled()
                    ->dehydrated()
                    ->prefix('Rp')
                    ->numeric()
                    ->mask(RawJs::make('$money($input, \',\', \'.\', 0)'))
                    ->stripCharacters('.'),
            ]);
    }
}
