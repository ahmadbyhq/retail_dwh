<?php

namespace App\Filament\Resources\DimTimes\Pages;

use App\Filament\Resources\DimTimes\DimTimeResource;
use Filament\Resources\Pages\CreateRecord;

class CreateDimTime extends CreateRecord
{
    protected static string $resource = DimTimeResource::class;

    protected static bool $canCreateAnother = false;

    protected function getRedirectUrl(): string
    {
        return static::getResource()::getUrl('index');
    }
}
