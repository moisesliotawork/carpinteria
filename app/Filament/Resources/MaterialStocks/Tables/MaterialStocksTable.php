<?php

namespace App\Filament\Resources\MaterialStocks\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;

class MaterialStocksTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([

                TextColumn::make('name')
                    ->label('Nombre / Referencia')
                    ->searchable()
                    ->placeholder('—')
                    ->weight('medium'),

                TextColumn::make('material_type')
                    ->label('Tipo de material')
                    ->badge()
                    ->formatStateUsing(fn($state) => match ($state) {
                        'textil' => 'Textil',
                        'machembrado' => 'Machembrado',
                        'carton_piedra' => 'Cartón piedra',
                        default => $state,
                    })
                    ->color(fn($state) => match ($state) {
                        'textil' => 'info',
                        'machembrado' => 'success',
                        'carton_piedra' => 'warning',
                        default => 'gray',
                    })
                    ->sortable(),

                TextColumn::make('dimensions')
                    ->label('Medidas (cm)')
                    ->state(
                        fn($record) =>
                        "{$record->board_height_cm} x {$record->board_width_cm} x {$record->board_depth_cm}"
                    )
                    ->sortable(false),

                TextColumn::make('quantity')
                    ->label('Cantidad')
                    ->numeric()
                    ->sortable()
                    ->badge()
                    ->alignCenter()
                    ->color(fn($state) => $state <= 3 ? 'danger' : 'success')
                    ->weight('bold'),

                IconColumn::make('is_active')
                    ->label('Activo')
                    ->boolean(),

                TextColumn::make('created_at')
                    ->label('Creado')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('updated_at')
                    ->label('Actualizado')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])

            ->filters([

                SelectFilter::make('material_type')
                    ->label('Tipo de material')
                    ->options([
                        'textil' => 'Textil',
                        'machembrado' => 'Machembrado',
                        'carton_piedra' => 'Cartón piedra',
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