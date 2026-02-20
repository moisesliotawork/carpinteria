<?php

namespace App\Filament\Resources\FurniturePresets\Schemas;

use Filament\Schemas\Components\Section;
use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class FurniturePresetInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Section::make('Información general')
                    ->columns(2)
                    ->schema([
                        TextEntry::make('name')
                            ->label('Nombre del preset')
                            ->weight('bold'),

                        TextEntry::make('description')
                            ->label('Descripción')
                            ->placeholder('—')
                            ->columnSpanFull(),
                    ]),

                Section::make('Configuración de instalación')
                    ->columns(2)
                    ->schema([
                        TextEntry::make('placement_type')
                            ->label('Ubicación del mueble')
                            ->badge()
                            ->formatStateUsing(fn($state) => match ($state) {
                                'entre_paredes' => 'Entre paredes',
                                'costado_visto' => 'Costado visto',
                                default => $state,
                            })
                            ->color(fn($state) => match ($state) {
                                'entre_paredes' => 'info',
                                'costado_visto' => 'warning',
                                default => 'gray',
                            }),

                        TextEntry::make('side_discount_cm')
                            ->label('Descuento por lado (cm)')
                            ->numeric()
                            ->suffix(' cm')
                            ->placeholder('0'),
                    ]),

                Section::make('Parámetros técnicos')
                    ->columns(2)
                    ->schema([
                        TextEntry::make('door_type')
                            ->label('Tipo de puertas')
                            ->badge()
                            ->formatStateUsing(fn($state) => match ($state) {
                                'abatibles' => 'Abatibles',
                                'corredizas' => 'Corredizas',
                                default => $state,
                            })
                            ->color(fn($state) => match ($state) {
                                'abatibles' => 'success',
                                'corredizas' => 'primary',
                                default => 'gray',
                            }),

                        TextEntry::make('sheet_thickness_cm')
                            ->label('Grosor de lámina')
                            ->numeric()
                            ->suffix(' cm'),
                    ]),

                Section::make('Estado')
                    ->columns(2)
                    ->schema([
                        IconEntry::make('is_active')
                            ->label('Activo')
                            ->boolean(),
                    ]),

                Section::make('Auditoría')
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