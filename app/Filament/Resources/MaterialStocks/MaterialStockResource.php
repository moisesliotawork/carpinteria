<?php

namespace App\Filament\Resources\MaterialStocks;

use App\Filament\Resources\MaterialStocks\Pages\CreateMaterialStock;
use App\Filament\Resources\MaterialStocks\Pages\EditMaterialStock;
use App\Filament\Resources\MaterialStocks\Pages\ListMaterialStocks;
use App\Filament\Resources\MaterialStocks\Pages\ViewMaterialStock;
use App\Filament\Resources\MaterialStocks\Schemas\MaterialStockForm;
use App\Filament\Resources\MaterialStocks\Schemas\MaterialStockInfolist;
use App\Filament\Resources\MaterialStocks\Tables\MaterialStocksTable;
use App\Models\MaterialStock;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class MaterialStockResource extends Resource
{
    protected static ?string $model = MaterialStock::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'name';

    /* -------------------------------------------------
     | Traducciones / Labels en Español
     * -------------------------------------------------*/

    public static function getModelLabel(): string
    {
        return 'Material';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Materiales';
    }

    public static function getNavigationLabel(): string
    {
        return 'Materiales';
    }

    public static function getNavigationGroup(): ?string
    {
        return 'Inventario';
    }

    public static function getNavigationSort(): ?int
    {
        return 1;
    }

    public static function getBreadcrumb(): string
    {
        return 'Materiales';
    }

    /* -------------------------------------------------
     | Formularios / Tabla
     * -------------------------------------------------*/

    public static function form(Schema $schema): Schema
    {
        return MaterialStockForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return MaterialStockInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return MaterialStocksTable::configure($table);
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
            'index' => ListMaterialStocks::route('/'),
            'create' => CreateMaterialStock::route('/create'),
            'view' => ViewMaterialStock::route('/{record}'),
            'edit' => EditMaterialStock::route('/{record}/edit'),
        ];
    }
}