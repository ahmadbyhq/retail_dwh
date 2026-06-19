<?php

namespace App\Filament\Resources\DimTimes\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class DimTimeForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                DatePicker::make('transaction_date')
                    ->label('Tanggal')
                    ->required(),
                // TextInput::make('year')
                //     ->label('Tahun')
                //     ->required()
                //     ->numeric(),
                // TextInput::make('month')
                //     ->label('Bulan')
                //     ->required()
                //     ->numeric(),
                // TextInput::make('month_name')
                //     ->label('Nama Bulan')
                //     ->required(),
                // TextInput::make('quarter')
                //     ->label('Kuartal')
                //     ->required()
                //     ->numeric(),
            ]);
    }
}
