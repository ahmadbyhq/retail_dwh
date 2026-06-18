<?php

namespace App\Filament\Resources\FactSales\Pages;

use App\Filament\Resources\FactSales\FactSaleResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListFactSales extends ListRecords
{
    protected static string $resource = FactSaleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->label('Tambah Data'),
        ];
    }
}
