<?php

namespace App\Filament\Resources\FactSales\Pages;

use App\Filament\Resources\FactSales\FactSaleResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditFactSale extends EditRecord
{
    protected static string $resource = FactSaleResource::class;

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
