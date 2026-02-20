<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FurnitureCalculation extends Model
{
    use HasFactory;

    protected $fillable = [
        'furniture_preset_id',
        'height_cm',
        'width_cm',
        'depth_cm',
        'placement_type',
        'door_type',
        'modules_count',
        'shelves_count',
        'sheet_thickness_cm',
        'side_discount_cm',
        'doors_count',
        'result_json',
    ];

    protected $casts = [
        'height_cm' => 'decimal:2',
        'width_cm' => 'decimal:2',
        'depth_cm' => 'decimal:2',
        'sheet_thickness_cm' => 'decimal:2',
        'side_discount_cm' => 'decimal:2',
        'modules_count' => 'integer',
        'shelves_count' => 'integer',
        'doors_count' => 'integer',
        'result_json' => 'array',
    ];

    /* ---------------------------------
     | Relaciones
     * ---------------------------------*/

    public function preset(): BelongsTo
    {
        return $this->belongsTo(FurniturePreset::class, 'furniture_preset_id');
    }

    /* ---------------------------------
     | Helpers de negocio
     * ---------------------------------*/

    public function isEntreParedes(): bool
    {
        return $this->placement_type === 'entre_paredes';
    }

    public function calculateDoors(): int
    {
        if ($this->width_cm <= 100) {
            return 2;
        }

        if ($this->width_cm <= 180) {
            return 3;
        }

        return 4; // escalable para futuro
    }
}