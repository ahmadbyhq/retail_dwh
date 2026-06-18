<?php

namespace App\Filament\Resources\DimProducts\Pages;

use App\Filament\Resources\DimProducts\DimProductResource;
// use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditDimProduct extends EditRecord
{
    protected static string $resource = DimProductResource::class;

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
