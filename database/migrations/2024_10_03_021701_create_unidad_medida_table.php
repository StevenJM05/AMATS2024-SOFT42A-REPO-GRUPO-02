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
        Schema::create('unidad_medida', function (Blueprint $table) {
            $table->bigIncrements('id'); // Llave primaria, auto incrementable
            $table->string('nombre', 255)->collation('utf8mb4_unicode_ci'); // Columna nombre, tipo varchar(255)
            $table->string('prefijo', 255)->collation('utf8mb4_unicode_ci'); // Columna prefijo, tipo varchar(255)
            $table->timestamp('created_at')->nullable(); // Columna created_at con timestamp
            $table->timestamp('updated_at')->nullable(); // Columna updated_at con timestamp
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('unidad_medida');
    }
};
