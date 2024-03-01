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
        Schema::create('peliculas', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->text('descripcion');
            $table->string('director');
            $table->date('fecha_lanzamiento');
            $table->unsignedBigInteger('categoria_id');
            $table->string('caratula');
            $table->string('movie_path')->nullable();
            $table->timestamps();
        
            $table->foreign('categoria_id')->references('id')->on('categorias')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peliculas');
    }
};
