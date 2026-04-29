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
        Schema::create('mecanicos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('cedula')->unique();
            $table->string('email')->unique();
            $table->string('telefono');
            $table->string('direccion');
            $table->enum('estado', ['disponible', 'ocupado'])->default('disponible');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mecanicos');
    }
};
