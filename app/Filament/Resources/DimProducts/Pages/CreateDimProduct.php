<?php

namespace App\Filament\Resources\DimProducts\Pages;

use App\Filament\Resources\DimProducts\DimProductResource;
use Filament\Resources\Pages\CreateRecord;

class CreateDimProduct extends CreateRecord
{
    protected static string $resource = DimProductResource::class;

    protected static bool $canCreateAnother = false;

    protected function getRedirectUrl(): string
    {
        return static::getResource()::getUrl('index');
    }
}
