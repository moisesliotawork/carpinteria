<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('material_stocks', function (Blueprint $table) {
            $table->id();

            $table->string('name')->nullable(); // opcional: "Tablero 1", "MDF 18mm", etc.

            // Material (default Textil)
            $table->enum('material_type', ['textil', 'machembrado', 'carton_piedra'])
                ->default('textil');

            // Medidas del tablero (según requerimiento: Alto/Ancho/Fondo)
            $table->decimal('board_height_cm', 8, 2);
            $table->decimal('board_width_cm', 8, 2);
            $table->decimal('board_depth_cm', 8, 2)->nullable(); // por si "fondo" aplica al tablero

            // Inventario
            $table->unsignedInteger('quantity')->default(0);

            $table->boolean('is_active')->default(true);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('material_stocks');
    }
};