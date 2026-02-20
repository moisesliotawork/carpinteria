<?php

namespace App\Filament\Resources\FurniturePresets\Pages;

use App\Filament\Resources\FurniturePresets\FurniturePresetResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewFurniturePreset extends ViewRecord
{
    protected static string $resource = FurniturePresetResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
