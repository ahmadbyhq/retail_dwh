<?php

namespace App\Filament\Resources\DimCustomers\Pages;

use App\Filament\Resources\DimCustomers\DimCustomerResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListDimCustomers extends ListRecords
{
    protected static string $resource = DimCustomerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->label('Tambah Data'),
        ];
    }
}
