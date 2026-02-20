<?php

namespace App\Filament\Resources\MaterialStocks\Schemas;

use Filament\Schemas\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class MaterialStockForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Información del material')
                    ->description('Define el material y su disponibilidad en el sistema.')
                    ->columns(2)
                    ->schema([
                        TextInput::make('name')
                            ->label('Nombre / Referencia')
                            ->placeholder('Ej: Tablero MDF 240x120')
                            ->maxLength(120)
                            ->helperText('Opcional, pero recomendado para identificar el tablero en el stock.'),

                        Select::make('material_type')
                            ->label('Tipo de material')
                            ->options([
                                'textil' => 'Textil',
                                'machembrado' => 'Machembrado',
                                'carton_piedra' => 'Cartón piedra',
                            ])
                            ->default('textil')
                            ->required()
                            ->native(false),
                    ])->columnSpanFull(),

                Section::make('Medidas del tablero')
                    ->description('Las medidas se registran en centímetros (cm).')
                    ->columns(3)
                    ->schema([
                        TextInput::make('board_height_cm')
                            ->label('Alto (cm)')
                            ->placeholder('Ej: 240')
                            ->required()
                            ->numeric()
                            ->minValue(0.01)
                            ->rules(['gt:0'])
                            ->helperText('Debe ser mayor que 0.'),

                        TextInput::make('board_width_cm')
                            ->label('Ancho (cm)')
                            ->placeholder('Ej: 120')
                            ->required()
                            ->numeric()
                            ->minValue(0.01)
                            ->rules(['gt:0'])
                            ->helperText('Debe ser mayor que 0.'),

                        TextInput::make('board_depth_cm')
                            ->label('Fondo / Grosor (cm)')
                            ->placeholder('Ej: 1.6')
                            ->numeric()
                            ->minValue(0)
                            ->helperText('Opcional. Útil si quieres registrar el grosor del tablero.'),
                    ])->columnSpanFull(),

                Section::make('Inventario')
                    ->description('Control básico de existencia y disponibilidad.')
                    ->columns(2)
                    ->schema([
                        TextInput::make('quantity')
                            ->label('Cantidad en stock')
                            ->required()
                            ->numeric()
                            ->integer()
                            ->minValue(0)
                            ->default(0)
                            ->helperText('No se permiten valores negativos.'),

                        Toggle::make('is_active')
                            ->label('Activo')
                            ->helperText('Si está desactivado, no se mostrará como opción disponible.')
                            ->default(true)
                            ->required(),
                    ])->columnSpanFull(),
            ]);
    }
}