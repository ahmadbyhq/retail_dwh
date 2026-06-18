<?php

namespace App\Filament\Resources\DimCustomers\Pages;

use App\Filament\Resources\DimCustomers\DimCustomerResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditDimCustomer extends EditRecord
{
    protected static string $resource = DimCustomerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getSavedNotificationTitle(): ?string
    {
        return 'Data Berhasil Diperbarui';
    }
}
