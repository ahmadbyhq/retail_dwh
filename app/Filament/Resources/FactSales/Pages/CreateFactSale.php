<?php

namespace App\Filament\Resources\FactSales\Pages;

use App\Filament\Resources\FactSales\FactSaleResource;
use Filament\Resources\Pages\CreateRecord;

class CreateFactSale extends CreateRecord
{
    protected static string $resource = FactSaleResource::class;

    protected static bool $canCreateAnother = false;

    protected function getRedirectUrl(): string
    {
        return static::getResource()::getUrl('index');
    }
}
