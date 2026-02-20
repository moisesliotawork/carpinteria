<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\FurnitureCalculation;
use App\Models\FurniturePreset;

class FurnitureCalculationSeeder extends Seeder
{
    public function run(): void
    {
        $preset = FurniturePreset::first();

        FurnitureCalculation::create([
            'furniture_preset_id' => $preset?->id,
            'height_cm' => 240,
            'width_cm' => 150,
            'depth_cm' => 60,
            'placement_type' => 'entre_paredes',
            'door_type' => 'abatibles',
            'modules_count' => 2,
            'shelves_count' => 3,
            'sheet_thickness_cm' => 1.60,
            'side_discount_cm' => 4.50,
            'doors_count' => 3,
            'result_json' => json_encode([
                'laterales' => [
                    ['cantidad' => 2, 'medidas' => '240 x 60']
                ],
                'baldas' => [
                    ['cantidad' => 3, 'medidas' => '140 x 60']
                ],
                'puertas' => [
                    ['cantidad' => 3, 'tipo' => 'abatibles']
                ]
            ])
        ]);
    }
}