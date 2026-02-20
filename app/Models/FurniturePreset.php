<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FurniturePreset extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'placement_type',
        'side_discount_cm',
        'door_type',
        'sheet_thickness_cm',
        'is_active',
    ];

    protected $casts = [
        'side_discount_cm' => 'decimal:2',
        'sheet_thickness_cm' => 'decimal:2',
        'is_active' => 'boolean',
    ];

    /* ---------------------------------
     | Relaciones
     * ---------------------------------*/

    public function calculations(): HasMany
    {
        return $this->hasMany(FurnitureCalculation::class);
    }

    /* ---------------------------------
     | Helpers
     * ---------------------------------*/

    public function isEntreParedes(): bool
    {
        return $this->placement_type === 'entre_paredes';
    }

    public function isCostadoVisto(): bool
    {
        return $this->placement_type === 'costado_visto';
    }
}