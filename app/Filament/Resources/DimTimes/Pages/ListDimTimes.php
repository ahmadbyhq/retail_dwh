<?php

namespace App\Filament\Resources\DimTimes\Pages;

use App\Filament\Resources\DimTimes\DimTimeResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListDimTimes extends ListRecords
{
    protected static string $resource = DimTimeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->label('Tambah Data'),
        ];
    }
}
