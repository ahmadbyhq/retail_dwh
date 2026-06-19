<?php

namespace App\Filament\Resources\DimCustomers\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class DimCustomersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->recordUrl(null)
            ->columns([
                TextColumn::make('customer_code')
                    ->label('Kode Pelanggan')
                    ->searchable(),
                TextColumn::make('customer_name')
                    ->label('Nama Pelanggan')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('gender')
                    ->badge()
                    ->color(fn($state) => match ($state) {
                        'M' => 'danger',
                        'F' => 'success',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn($state) => match ($state) {
                        'M' => 'Laki-laki',
                        'F' => 'Perempuan',
                        default => $state,
                    }),
                TextColumn::make('city')
                    ->label('Kota')
                    ->searchable()
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
