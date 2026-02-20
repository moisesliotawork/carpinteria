<?php

namespace App\Filament\Resources\MaterialStocks\Pages;

use App\Filament\Resources\MaterialStocks\MaterialStockResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewMaterialStock extends ViewRecord
{
    protected static string $resource = MaterialStockResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
