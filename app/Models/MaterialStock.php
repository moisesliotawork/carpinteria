<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MaterialStock extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'material_type',
        'board_height_cm',
        'board_width_cm',
        'board_depth_cm',
        'quantity',
        'is_active',
    ];

    protected $casts = [
        'board_height_cm' => 'decimal:2',
        'board_width_cm'  => 'decimal:2',
        'board_depth_cm'  => 'decimal:2',
        'quantity'        => 'integer',
        'is_active'       => 'boolean',
    ];

    /* ---------------------------------
     | Helpers
     * ---------------------------------*/

    public function getDimensionsAttribute(): string
    {
        return "{$this->board_height_cm} x {$this->board_width_cm} x {$this->board_depth_cm}";
    }

    public function isTextil(): bool
    {
        return $this->material_type === 'textil';
    }

    public function isMachembrado(): bool
    {
        return $this->material_type === 'machembrado';
    }

    public function isCartonPiedra(): bool
    {
        return $this->material_type === 'carton_piedra';
    }
}