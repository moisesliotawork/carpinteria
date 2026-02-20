<?php

namespace App\Filament\Resources\FurniturePresets\Pages;

use App\Filament\Resources\FurniturePresets\FurniturePresetResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditFurniturePreset extends EditRecord
{
    protected static string $resource = FurniturePresetResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
