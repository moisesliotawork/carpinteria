<?php

namespace App\Filament\Resources\FurniturePresets\Pages;

use App\Filament\Resources\FurniturePresets\FurniturePresetResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListFurniturePresets extends ListRecords
{
    protected static string $resource = FurniturePresetResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
