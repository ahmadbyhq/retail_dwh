<?php

namespace App\Filament\Resources\DimTimes\Pages;

use App\Filament\Resources\DimTimes\DimTimeResource;
// use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditDimTime extends EditRecord
{
    protected static string $resource = DimTimeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // DeleteAction::make(),
        ];
    }
}
