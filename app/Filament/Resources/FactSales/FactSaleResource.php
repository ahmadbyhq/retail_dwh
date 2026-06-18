<?php

namespace App\Filament\Resources\FactSales;

use App\Filament\Resources\FactSales\Pages\CreateFactSale;
use App\Filament\Resources\FactSales\Pages\EditFactSale;
use App\Filament\Resources\FactSales\Pages\ListFactSales;
use App\Filament\Resources\FactSales\Schemas\FactSaleForm;
use App\Filament\Resources\FactSales\Tables\FactSalesTable;
use App\Models\FactSale;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class FactSaleResource extends Resource
{
    protected static ?string $model = FactSale::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedShoppingCart;

    protected static ?string $recordTitleAttribute = 'sale_id';

    protected static ?string $navigationLabel = 'Fact Penjualan';

    protected static ?string $modelLabel = 'Penjualan';

    protected static ?string $pluralModelLabel = 'Penjualan';

    protected static string | UnitEnum | null $navigationGroup = 'Data Warehouse';

    protected static ?int $navigationSort = 4;

    protected static ?string $slug = 'fact_sales';

    public static function form(Schema $schema): Schema
    {
        return FactSaleForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return FactSalesTable::configure($table);
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
            'index' => ListFactSales::route('/'),
            'create' => CreateFactSale::route('/create'),
            'edit' => EditFactSale::route('/{record}/edit'),
        ];
    }
}
