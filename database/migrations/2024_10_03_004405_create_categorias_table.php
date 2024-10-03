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
        Schema::create('categorias', function (Blueprint $table) {
            $table->bigIncrements('id'); // Big integer auto increment for id
            $table->string('nombre', 255)->collation('utf8mb4_unicode_ci'); // Nombre column with varchar(255)
            $table->string('descripcion', 255)->collation('utf8mb4_unicode_ci'); // Descripcion column with varchar(255)
            $table->timestamp('created_at')->nullable(); // Created_at timestamp
            $table->timestamp('updated_at')->nullable(); // Updated_at timestamp
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categorias');
    }
};
