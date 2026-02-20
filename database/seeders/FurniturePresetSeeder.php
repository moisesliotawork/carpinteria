<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\FurniturePreset;

class FurniturePresetSeeder extends Seeder
{
    public function run(): void
    {
        FurniturePreset::create([
            'name' => 'Armario Clásico',
            'description' => 'Armario estándar para habitación',
            'placement_type' => 'entre_paredes',
            'side_discount_cm' => 4.50,
            'door_type' => 'abatibles',
            'sheet_thickness_cm' => 1.60,
            'is_active' => true,
        ]);

        FurniturePreset::create([
            'name' => 'Closet Moderno',
            'description' => 'Diseño moderno con puertas corredizas',
            'placement_type' => 'costado_visto',
            'side_discount_cm' => 0,
            'door_type' => 'corredizas',
            'sheet_thickness_cm' => 1.80,
            'is_active' => true,
        ]);
    }
}