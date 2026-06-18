<?php

namespace App\Filament\Resources\DimTimes;

use App\Filament\Resources\DimTimes\Pages\CreateDimTime;
use App\Filament\Resources\DimTimes\Pages\EditDimTime;
use App\Filament\Resources\DimTimes\Pages\ListDimTimes;
use App\Filament\Resources\DimTimes\Schemas\DimTimeForm;
use App\Filament\Resources\DimTimes\Tables\DimTimesTable;
use App\Models\DimTime;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class DimTimeResource extends Resource
{
    protected static ?string $model = DimTime::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedCalendar;

    protected static ?string $recordTitleAttribute = 'transaction_date';

    protected static ?string $navigationLabel = 'Dimensi Waktu';

    protected static ?string $modelLabel = 'Waktu';

    protected static ?string $pluralModelLabel = 'Waktu';

    protected static string | UnitEnum | null $navigationGroup = 'Data Warehouse';

    protected static ?int $navigationSort = 3;

    protected static ?string $slug = 'dim_time';

    public static function form(Schema $schema): Schema
    {
        return DimTimeForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return DimTimesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListDimTimes::route('/'),
            'create' => CreateDimTime::route('/create'),
            'edit' => EditDimTime::route('/{record}/edit'),
        ];
    }
}
