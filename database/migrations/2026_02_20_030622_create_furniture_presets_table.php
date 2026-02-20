<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('furniture_presets', function (Blueprint $table) {
            $table->id();

            $table->string('name'); // Nombre del preset
            $table->text('description')->nullable();

            // ENTRE PAREDES / COSTADO VISTO
            $table->enum('placement_type', ['entre_paredes', 'costado_visto'])
                ->default('entre_paredes');

            // Descuento por lado (cm) cuando es entre paredes (ej: 4.5 cm)
            $table->decimal('side_discount_cm', 6, 2)->default(4.50);

            // Tipo de puertas por defecto (se puede recalcular en el cálculo)
            $table->enum('door_type', ['abatibles', 'corredizas'])->default('abatibles');

            // Grosor de lámina (cm) para descontar en baldas/tramos (default 1.60)
            $table->decimal('sheet_thickness_cm', 6, 2)->default(1.60);

            // Para demo / control
            $table->boolean('is_active')->default(true);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('furniture_presets');
    }
};