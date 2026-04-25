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
        Schema::create('detalle_diagnosticos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('diagnostico_id')->constrained('diagnosticos')->onDelete('cascade');
            $table->foreignId('problema_id')->constrained('problemas')->onDelete('cascade');
            $table->string('observacion');
            $table->string('prioridad');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('detalle_diagnosticos');
    }
};
