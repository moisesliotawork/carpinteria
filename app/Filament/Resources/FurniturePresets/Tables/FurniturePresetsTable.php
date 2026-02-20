<?php

namespace App\Filament\Resources\FurniturePresets\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;

class FurniturePresetsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Preset')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),

                TextColumn::make('placement_type')
                    ->label('Ubicación')
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
                    })
                    ->sortable(),

                TextColumn::make('door_type')
                    ->label('Puertas')
                    ->badge()
                    ->formatStateUsing(fn($state) => match ($state) {
                        'abatibles' => 'Abatibles',
                        'corredizas' => 'Corredizas',
                        default => $state,
                    })
                    ->sortable(),

                TextColumn::make('sheet_thickness_cm')
                    ->label('Grosor (cm)')
                    ->numeric()
                    ->sortable(),

                TextColumn::make('side_discount_cm')
                    ->label('Desc. por lado (cm)')
                    ->numeric()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                IconColumn::make('is_active')
                    ->label('Activo')
                    ->boolean(),

                TextColumn::make('created_at')
                    ->label('Creado')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('placement_type')
                    ->label('Ubicación')
                    ->options([
                        'entre_paredes' => 'Entre paredes',
                        'costado_visto' => 'Costado visto',
                    ]),

                SelectFilter::make('door_type')
                    ->label('Tipo de puertas')
                    ->options([
                        'abatibles' => 'Abatibles',
                        'corredizas' => 'Corredizas',
                    ]),

                TernaryFilter::make('is_active')
                    ->label('Estado')
                    ->trueLabel('Activos')
                    ->falseLabel('Inactivos')
                    ->native(false),
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
    }
}