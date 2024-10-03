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
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('codigo')->collate('utf8mb4_unicode_ci');
            $table->string('nombre')->collate('utf8mb4_unicode_ci');
            $table->string('descripcion')->collate('utf8mb4_unicode_ci');
            $table->foreignId('marca_id')->constrained('marca')->onDelete('cascade');
            $table->foreignId('categorias_id')->constrained('categorias')->onDelete('cascade');
            $table->foreignId('Unidad_medida_id')->constrained('unidad_medida')->onDelete('cascade');
            $table->boolean('is_available')->default(true);
            $table->unsignedBigInteger('stock');
            $table->timestamps();
            $table->foreignId('impuesto_id')->nullable()->constrained('impuestos')->onDelete('set null');
            $table->float('precio');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
