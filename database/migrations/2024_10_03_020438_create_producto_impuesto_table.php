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
        Schema::create('producto_impuesto', function (Blueprint $table) {
            $table->id(); // id bigint unsigned AUTO_INCREMENT PRIMARY KEY
            $table->unsignedBigInteger('producto_id'); // producto_id bigint unsigned NOT NULL
            $table->unsignedBigInteger('impuestos_id'); // impuestos_id bigint unsigned NOT NULL
            $table->timestamps(); // created_at y updated_at timestamps

            // Llaves foráneas y llaves índices
            $table->foreign('producto_id')
                  ->references('id')->on('productos')
                  ->onDelete('cascade'); // Llave foránea producto_id

            $table->foreign('impuestos_id')
                  ->references('id')->on('impuestos')
                  ->onDelete('cascade'); // Llave foránea impuestos_id

            // Índices
            $table->index('producto_id'); // KEY producto_impuesto_producto_id_foreign
            $table->index('impuestos_id'); // KEY producto_impuesto_impuestos_id_foreign
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('producto_impuesto');
    }
};
