<?php

namespace App\Filament\Resources\MaterialStocks\Schemas;

use Filament\Schemas\Components\Section;
use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class MaterialStockInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Información del material')
                    ->description('Datos generales del tablero y tipo de material.')
                    ->columns(2)
                    ->schema([
                        TextEntry::make('name')
                            ->label('Nombre / Referencia')
                            ->placeholder('—'),

                        TextEntry::make('material_type')
                            ->label('Tipo de material')
                            ->badge()
                            ->formatStateUsing(fn(?string $state) => match ($state) {
                                'textil' => 'Textil',
                                'machembrado' => 'Machembrado',
                                'carton_piedra' => 'Cartón piedra',
                                default => $state ?? '—',
                            }),
                    ]),

                Section::make('Medidas del tablero')
                    ->description('Medidas registradas en centímetros (cm).')
                    ->columns(3)
                    ->schema([
                        TextEntry::make('board_height_cm')
                            ->label('Alto (cm)')
                            ->numeric()
                            ->placeholder('—'),

                        TextEntry::make('board_width_cm')
                            ->label('Ancho (cm)')
                            ->numeric()
                            ->placeholder('—'),

                        TextEntry::make('board_depth_cm')
                            ->label('Fondo / Grosor (cm)')
                            ->numeric()
                            ->placeholder('—'),
                    ]),

                Section::make('Inventario y estado')
                    ->description('Disponibilidad del material para cálculos y uso en el sistema.')
                    ->columns(2)
                    ->schema([
                        TextEntry::make('quantity')
                            ->label('Cantidad en stock')
                            ->numeric()
                            ->placeholder('0'),

                        IconEntry::make('is_active')
                            ->label('Activo')
                            ->boolean(),
                    ]),

                Section::make('Auditoría')
                    ->description('Fechas de creación y última actualización.')
                    ->columns(2)
                    ->schema([
                        TextEntry::make('created_at')
                            ->label('Creado el')
                            ->dateTime('d/m/Y H:i')
                            ->placeholder('—'),

                        TextEntry::make('updated_at')
                            ->label('Actualizado el')
                            ->dateTime('d/m/Y H:i')
                            ->placeholder('—'),
                    ]),
            ]);
    }
}