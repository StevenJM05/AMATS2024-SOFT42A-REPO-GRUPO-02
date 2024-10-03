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
        Schema::create('compras_items', function (Blueprint $table) {
            $table->id(); // Crea una columna `id` autoincremental
            $table->unsignedBigInteger('compra_id'); // ID de la compra
            $table->unsignedBigInteger('producto_id'); // ID del producto
            $table->unsignedBigInteger('cantidad'); // Cantidad
            $table->float('precio_unitario'); // Precio unitario
            $table->float('total'); // Total
            $table->timestamps(); // Crea columnas `created_at` y `updated_at`

            // Índices
            $table->foreign('compra_id', 'compras_items_compra_id_foreign')
                  ->references('id')->on('compras')
                  ->onDelete('cascade'); // Relación con la tabla compras

            $table->foreign('producto_id', 'compras_items_producto_id_foreign')
                  ->references('id')->on('productos')
                  ->onDelete('cascade'); // Relación con la tabla productos
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('compras_items');
    }
};
