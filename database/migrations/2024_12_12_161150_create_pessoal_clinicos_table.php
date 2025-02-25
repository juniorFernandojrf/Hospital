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
        Schema::create('pessoal_clinicos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')         ->constrained()->cascadeOnDelete();
            $table->foreignId('especialidade_id')->constrained()->cascadeOnDelete();
            $table->string('numOrdem')->nullable(); //Um identificador para referência interna. Exemplo: ADM, CARDIO, LAB.
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pessoal_clinicos');
    }
};
