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
        //
        Schema::create('orden_trabajos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('diagnostico_id')->constrained('diagnosticos')->onDelete('cascade');
            $table->date('fecha_inicio');
            $table->date('fecha_final');
            $table->string('notas');
            $table->double('costo');
            $table->string('estado');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('orden_trabajos');
    }
};
