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
        Schema::create('historico_medicos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('utente_id')->constrained()->cascadeOnDelete();
            $table->foreignId('historico_familiar_id')->constrained()->cascadeOnDelete();
            $table->string('alergia');
            $table->string('medicamentosEmUso');
            $table->string('estiloDeVida');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historico_medicos');
    }
};
