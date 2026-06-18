<?php

namespace App\Filament\Resources\DimCustomers;

use App\Filament\Resources\DimCustomers\Pages\CreateDimCustomer;
use App\Filament\Resources\DimCustomers\Pages\EditDimCustomer;
use App\Filament\Resources\DimCustomers\Pages\ListDimCustomers;
use App\Filament\Resources\DimCustomers\Schemas\DimCustomerForm;
use App\Filament\Resources\DimCustomers\Tables\DimCustomersTable;
use App\Models\DimCustomer;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class DimCustomerResource extends Resource
{
    protected static ?string $model = DimCustomer::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedUsers;

    protected static ?string $recordTitleAttribute = 'customer_name';

    protected static ?string $navigationLabel = 'Dimensi Pelanggan';

    protected static ?string $modelLabel = 'Pelanggan';

    protected static ?string $pluralModelLabel = 'Pelanggan';

    protected static string | UnitEnum | null $navigationGroup = 'Data Warehouse';

    protected static ?int $navigationSort = 2;

    protected static ?string $slug = 'dim_customer';

    public static function form(Schema $schema): Schema
    {
        return DimCustomerForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return DimCustomersTable::configure($table);
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
            'index' => ListDimCustomers::route('/'),
            'create' => CreateDimCustomer::route('/create'),
            'edit' => EditDimCustomer::route('/{record}/edit'),
        ];
    }
}
