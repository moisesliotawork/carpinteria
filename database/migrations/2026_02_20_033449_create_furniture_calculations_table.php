<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('furniture_calculations', function (Blueprint $table) {
            $table->id();

            // Relación con preset (opcional por si el cálculo nace de un preset)
            $table->foreignId('furniture_preset_id')
                ->nullable()
                ->constrained('furniture_presets')
                ->nullOnDelete();

            // Dimensiones ingresadas (orden requerido: alto -> ancho -> fondo)
            $table->decimal('height_cm', 8, 2);
            $table->decimal('width_cm', 8, 2);
            $table->decimal('depth_cm', 8, 2);

            // Selecciones del usuario
            $table->enum('placement_type', ['entre_paredes', 'costado_visto']);
            $table->enum('door_type', ['abatibles', 'corredizas']);

            // Parámetros de cálculo
            $table->unsignedInteger('modules_count')->default(1);
            $table->unsignedInteger('shelves_count')->default(0); // baldas/tramos
            $table->decimal('sheet_thickness_cm', 6, 2)->default(1.60);
            $table->decimal('side_discount_cm', 6, 2)->default(4.50);

            // Resultado “resumen” para demo (luego lo refinamos a detalle)
            $table->unsignedInteger('doors_count')->default(0);
            $table->json('result_json')->nullable(); // piezas calculadas, etc.

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('furniture_calculations');
    }
};