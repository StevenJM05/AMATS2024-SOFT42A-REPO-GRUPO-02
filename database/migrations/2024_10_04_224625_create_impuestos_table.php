<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('impuestos', function (Blueprint $table) {
            $table->id(); // Crea la columna `id` como BIGINT UNSIGNED AUTO_INCREMENT
            $table->float('porcentaje'); // Columna para el porcentaje del impuesto
            $table->string('nombre', 255)->nullable(); // Columna para el nombre del impuesto, puede ser NULL
            $table->timestamps(); // Crea las columnas `created_at` y `updated_at`
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('impuestos');
    }
};
