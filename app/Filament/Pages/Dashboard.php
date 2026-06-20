<?php

namespace App\Filament\Pages;

use App\Filament\Widgets\ProductSalesTable;
use App\Filament\Widgets\TopCustomerTable;
use App\Filament\Widgets\SalesTrendChart;
use Filament\Pages\Dashboard as BaseDashboard;

class Dashboard extends BaseDashboard
{
    protected static ?string $navigationLabel = 'Dashboard';
    protected static ?string $modelLabel = 'Dashboard';
    protected static ?string $pluralModelLabel = 'Dashboard';
    protected ?string $heading = 'Dashboard';
    protected static ?string $title = 'Dashboard';

    // public ?string $category = null;

    // protected string $view = 'filament.pages.dashboard';

    // Daftarkan semua widget Anda di sini
    public function getWidgets(): array
    {
        return [
            ProductSalesTable::class,
            TopCustomerTable::class,
            SalesTrendChart::class,
        ];
    }
}
