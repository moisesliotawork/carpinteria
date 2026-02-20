<?php

namespace App\Filament\Resources\FurniturePresets\Schemas;

use Filament\Schemas\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class FurniturePresetForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('Información del preset')
                ->description('Define un mueble preconfigurado para agilizar cálculos.')
                ->columns(2)
                ->schema([
                    TextInput::make('name')
                        ->label('Nombre del preset')
                        ->required()
                        ->maxLength(120)
                        ->placeholder('Ej: Armario Clásico'),

                    Toggle::make('is_active')
                        ->label('Activo')
                        ->default(true)
                        ->required()
                        ->helperText('Si está desactivado, no se mostrará como preset disponible.'),
                ])->columnSpanFull(),

            Section::make('Detalles')
                ->columns(1)
                ->schema([
                    Textarea::make('description')
                        ->label('Descripción')
                        ->placeholder('Ej: Armario estándar para habitación...')
                        ->rows(3)
                        ->maxLength(500)
                        ->helperText('Opcional. Máx 500 caracteres.'),
                ])->columnSpanFull(),

            Section::make('Configuración de instalación')
                ->description('Define si el mueble va entre paredes o con costado visto.')
                ->columns(2)
                ->schema([
                    Select::make('placement_type')
                        ->label('Ubicación del mueble')
                        ->options([
                            'entre_paredes' => 'Entre paredes',
                            'costado_visto' => 'Costado visto',
                        ])
                        ->default('entre_paredes')
                        ->required()
                        ->native(false),

                    TextInput::make('side_discount_cm')
                        ->label('Descuento por lado (cm)')
                        ->numeric()
                        ->minValue(0)
                        ->default(4.50)
                        ->required()
                        ->helperText('Aplica normalmente en “Entre paredes” (ej: 4.5 cm por lado).'),
                ])->columnSpanFull(),

            Section::make('Puertas y material')
                ->description('Parámetros por defecto para cálculos.')
                ->columns(2)
                ->schema([
                    Select::make('door_type')
                        ->label('Tipo de puertas (por defecto)')
                        ->options([
                            'abatibles' => 'Puertas abatibles',
                            'corredizas' => 'Puertas corredizas',
                        ])
                        ->default('abatibles')
                        ->required()
                        ->native(false),

                    TextInput::make('sheet_thickness_cm')
                        ->label('Grosor de lámina (cm)')
                        ->numeric()
                        ->minValue(0.1)
                        ->default(1.60)
                        ->required()
                        ->helperText('Este grosor se usa para descontar en baldas/tramos.'),
                ])->columnSpanFull(),
        ]);
    }
}