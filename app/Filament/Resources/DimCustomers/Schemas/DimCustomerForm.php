<?php

namespace App\Filament\Resources\DimCustomers\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class DimCustomerForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(2)
            ->components([
                TextInput::make('customer_code')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->label('Kode Pelanggan'),
                TextInput::make('customer_name')
                    ->required()
                    ->label('Nama Pelanggan'),
                Select::make('gender')
                    ->label('Jenis Kelamin')
                    ->options(['M' => 'Laki-Laki', 'F' => 'Perempuan'])
                    ->required(),
                TextInput::make('city')
                    ->required()
                    ->label('Kota'),
            ]);
    }
}
