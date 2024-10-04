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
        Schema::create('usuario', function (Blueprint $table) {
            $table->id(); // Crea la columna `id` como BIGINT UNSIGNED AUTO_INCREMENT
            $table->string('user', 255); // Columna para el nombre de usuario
            $table->string('password', 255); // Columna para la contraseña
            $table->timestamps(); // Crea las columnas `created_at` y `updated_at`
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuario');
    }
};
