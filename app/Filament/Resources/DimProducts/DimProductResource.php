<?php

namespace App\Filament\Resources\DimProducts;

use App\Filament\Resources\DimProducts\Pages\CreateDimProduct;
use App\Filament\Resources\DimProducts\Pages\EditDimProduct;
use App\Filament\Resources\DimProducts\Pages\ListDimProducts;
use App\Filament\Resources\DimProducts\Schemas\DimProductForm;
use App\Filament\Resources\DimProducts\Tables\DimProductsTable;
use App\Models\DimProduct;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class DimProductResource extends Resource
{
    protected static ?string $model = DimProduct::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedCube;

    protected static ?string $recordTitleAttribute = 'product_name';

    protected static ?string $navigationLabel = 'Dimensi Produk';

    protected static ?string $modelLabel = 'Produk';

    protected static ?string $pluralModelLabel = 'Produk';

    protected static ?string $slug = 'dim_produk';

    protected static string | UnitEnum | null $navigationGroup = 'Data Warehouse';

    protected static ?int $navigationSort = 1;



    public static function form(Schema $schema): Schema
    {
        return DimProductForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return DimProductsTable::configure($table);
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
            'index' => ListDimProducts::route('/'),
            'create' => CreateDimProduct::route('/create'),
            'edit' => EditDimProduct::route('/{record}/edit'),
        ];
    }
}
