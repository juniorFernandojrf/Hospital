<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Executa as migrações.
     */
    public function up(): void
    {
        Schema::create('historico_medicos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('utente_id')->constrained()->cascadeOnDelete();
            $table->foreignId('historico_familiar_id')->nullable()->constrained()->cascadeOnDelete();
            $table->text('alergia')->nullable();
            $table->text('medicamentos_em_uso')->nullable();
            $table->text('estilo_de_vida')     ->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverter as migrações.
     */
    public function down(): void
    {
        Schema::dropIfExists('historico_medicos');
    }
};
