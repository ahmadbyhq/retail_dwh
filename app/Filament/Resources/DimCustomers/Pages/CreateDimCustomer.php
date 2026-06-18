<?php

namespace App\Filament\Resources\DimCustomers\Pages;

use App\Filament\Resources\DimCustomers\DimCustomerResource;
use Filament\Resources\Pages\CreateRecord;

class CreateDimCustomer extends CreateRecord
{
    protected static string $resource = DimCustomerResource::class;

    protected static bool $canCreateAnother = false;

    protected function getRedirectUrl(): string
    {
        return static::getResource()::getUrl('index');
    }

    protected function getSavedNotificationTitle(): ?string
    {
        return 'Data Berhasil Disimpan';
    }
}
