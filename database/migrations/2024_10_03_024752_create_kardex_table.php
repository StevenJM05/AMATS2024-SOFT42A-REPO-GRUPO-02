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
        Schema::create('kardex', function (Blueprint $table) {
            $table->id(); // Crea una columna `id` autoincremental
            $table->unsignedBigInteger('producto_id'); // Columna para el ID del producto
            $table->string('transaccionable_type', 255)->collate('utf8mb4_unicode_ci'); // Tipo de transacción
            $table->unsignedBigInteger('transaccionable_id'); // ID de transacción
            $table->integer('cantidad'); // Cantidad
            $table->decimal('precio_unitario', 10, 2); // Precio unitario
            $table->decimal('total', 10, 2); // Total
            $table->enum('tipo_movimiento', ['entrada', 'salida'])->collate('utf8mb4_unicode_ci'); // Tipo de movimiento
            $table->integer('stock_anterior'); // Stock anterior
            $table->integer('stock_actual'); // Stock actual
            $table->date('fecha'); // Fecha de la transacción
            $table->timestamps(); // Crea columnas `created_at` y `updated_at`

            // Índices
            $table->index(['transaccionable_type', 'transaccionable_id'], 'kardex_transaccionable_type_transaccionable_id_index');
            $table->foreign('producto_id', 'kardex_producto_id_foreign')
                  ->references('id')->on('productos')
                  ->onDelete('cascade'); // Relación con la tabla productos
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kardex');
    }
};
