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
        Schema::create('orden', function(Blueprint $table){
            $table->id();
            $table->foreignId('diagnostico_id')->constrained('diagnostico')->onDelete('cascade');
            $table->foreignId('mecanico_id')->constrained('mecanico')->onDelete('cascade');
            $table->string('trabajo');
            $table->string('estado');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('orden');
    }
};
