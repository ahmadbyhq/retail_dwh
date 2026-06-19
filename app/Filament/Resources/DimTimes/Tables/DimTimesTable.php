<?php

namespace App\Filament\Resources\DimTimes\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class DimTimesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->recordUrl(null)
            ->columns([
                TextColumn::make('transaction_date')
                    ->label('Tanggal')
                    ->date()
                    ->sortable(),
                TextColumn::make('year')
                    ->label('Tahun')
                    ->sortable(),
                TextColumn::make('month')
                    ->label('Bulan')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('month_name')
                    ->label('Nama Bulan')
                    ->formatStateUsing(fn($state) => match ($state) {
                        'January' => 'Januari',
                        'February' => 'Februari',
                        'March' => 'Maret',
                        'April' => 'April',
                        'May' => 'Mei',
                        'June' => 'Juni',
                        'July' => 'Juli',
                        'August' => 'Agustus',
                        'September' => 'September',
                        'October' => 'Oktober',
                        'November' => 'November',
                        'December' => 'Desember',
                        default => $state,
                    })
                    ->searchable(),
                TextColumn::make('quarter')
                    ->label('Kuartal')
                    ->badge()
                    ->color(fn($state) => match ($state) {
                        1 => 'info',
                        2 => 'success',
                        3 => 'warning',
                        4 => 'danger',
                        default => 'gray',
                    }),
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
