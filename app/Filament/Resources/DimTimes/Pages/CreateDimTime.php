<?php

namespace App\Filament\Resources\DimTimes\Pages;

use App\Filament\Resources\DimTimes\DimTimeResource;
use Carbon\Carbon;
use Filament\Resources\Pages\CreateRecord;

class CreateDimTime extends CreateRecord
{
    protected static string $resource = DimTimeResource::class;

    protected static bool $canCreateAnother = false;

    protected function getRedirectUrl(): string
    {
        return static::getResource()::getUrl('index');
    }

    protected function getSavedNotificationTitle(): ?string
    {
        return 'Data Berhasil Disimpan';
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $date = Carbon::parse($data['transaction_date']);

        $data['year'] = $date->year;
        $data['month'] = $date->month;
        $data['month_name'] = $date->format('F');
        $data['quarter'] = ceil($date->month / 3);

        return $data;
    }
}
