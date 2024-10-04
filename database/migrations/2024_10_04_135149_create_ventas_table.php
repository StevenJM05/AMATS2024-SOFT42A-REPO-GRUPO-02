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
        Schema::create('ventas', function (Blueprint $table) {
            $table->id(); // Esto crea la columna `id` como BIGINT UNSIGNED AUTO_INCREMENT
            $table->foreignId('usuario_id')->constrained('users')->onDelete('cascade'); // Clave foránea
            $table->unsignedBigInteger('cantidad_total'); // Columna para cantidad total
            $table->float('subtotal'); // Columna para subtotal
            $table->decimal('descuentos_totales', 8, 2)->nullable(); // Columna para descuentos totales, puede ser NULL
            $table->float('total_impuestos'); // Columna para total de impuestos
            $table->float('total'); // Columna para total
            $table->timestamps(); // Esto crea las columnas `created_at` y `updated_at`
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ventas');
    }
};
