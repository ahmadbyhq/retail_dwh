<?php

namespace App\Filament\Resources\DimProducts\Pages;

use App\Filament\Resources\DimProducts\DimProductResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListDimProducts extends ListRecords
{
    protected static string $resource = DimProductResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->label('Tambah Data'),
        ];
    }
}
