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
        Schema::create('compras', function (Blueprint $table) {
            $table->id(); // id bigint unsigned AUTO_INCREMENT PRIMARY KEY
            $table->unsignedBigInteger('cantidad'); // cantidad bigint unsigned NOT NULL
            $table->float('subtotal'); // subtotal float NOT NULL
            $table->float('descuento')->nullable(); // descuento float DEFAULT NULL
            $table->float('total'); // total float NOT NULL
            $table->timestamps(); // created_at and updated_at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('compras');
    }
};
