<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MaterialStock;

class MaterialStockSeeder extends Seeder
{
    public function run(): void
    {
        MaterialStock::create([
            'name' => 'Tablero MDF 240x120',
            'material_type' => 'textil',
            'board_height_cm' => 240,
            'board_width_cm' => 120,
            'board_depth_cm' => 1.6,
            'quantity' => 15,
            'is_active' => true,
        ]);

        MaterialStock::create([
            'name' => 'Machembrado Premium',
            'material_type' => 'machembrado',
            'board_height_cm' => 250,
            'board_width_cm' => 130,
            'board_depth_cm' => 1.8,
            'quantity' => 8,
            'is_active' => true,
        ]);
    }
}