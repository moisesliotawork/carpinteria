<?php

namespace App\Filament\Resources\FurniturePresets;

use App\Filament\Resources\FurniturePresets\Pages\CreateFurniturePreset;
use App\Filament\Resources\FurniturePresets\Pages\EditFurniturePreset;
use App\Filament\Resources\FurniturePresets\Pages\ListFurniturePresets;
use App\Filament\Resources\FurniturePresets\Pages\ViewFurniturePreset;
use App\Filament\Resources\FurniturePresets\Schemas\FurniturePresetForm;
use App\Filament\Resources\FurniturePresets\Schemas\FurniturePresetInfolist;
use App\Filament\Resources\FurniturePresets\Tables\FurniturePresetsTable;
use App\Models\FurniturePreset;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class FurniturePresetResource extends Resource
{
    protected static ?string $model = FurniturePreset::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedSquaresPlus;

    protected static ?string $recordTitleAttribute = 'name';

    public static function getModelLabel(): string
    {
        return 'Preset de mueble';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Presets de muebles';
    }

    public static function getNavigationLabel(): string
    {
        return 'Presets de muebles';
    }

    public static function getNavigationGroup(): ?string
    {
        return 'Configuración';
    }

    public static function getNavigationSort(): ?int
    {
        return 1;
    }

    public static function getBreadcrumb(): string
    {
        return 'Presets de muebles';
    }

    public static function form(Schema $schema): Schema
    {
        return FurniturePresetForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return FurniturePresetInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return FurniturePresetsTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListFurniturePresets::route('/'),
            'create' => CreateFurniturePreset::route('/create'),
            'view' => ViewFurniturePreset::route('/{record}'),
            'edit' => EditFurniturePreset::route('/{record}/edit'),
        ];
    }
}