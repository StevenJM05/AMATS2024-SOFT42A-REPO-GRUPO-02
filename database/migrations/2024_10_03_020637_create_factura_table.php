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
        Schema::create('factura', function (Blueprint $table) {
            $table->id(); // id bigint unsigned AUTO_INCREMENT PRIMARY KEY
            $table->date('fecha'); // fecha date NOT NULL
            $table->string('cliente', 255); // cliente varchar(255) NOT NULL
            $table->unsignedBigInteger('numero_factura'); // numero_factura bigint unsigned NOT NULL
            $table->float('total'); // total float NOT NULL
            $table->float('impuesto'); // impuesto float NOT NULL
            $table->float('total_con_impuesto'); // total_con_impuesto float NOT NULL
            $table->unsignedBigInteger('ventas_id'); // ventas_id bigint unsigned NOT NULL
            $table->timestamps(); // created_at and updated_at timestamps

            // Foreign key constraints
            $table->foreign('ventas_id')
                  ->references('id')->on('ventas')
                  ->onDelete('cascade'); // Llave foránea ventas_id con ON DELETE CASCADE

            // Índices
            $table->index('ventas_id'); // KEY factura_ventas_id_foreign
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('factura');
    }
};
