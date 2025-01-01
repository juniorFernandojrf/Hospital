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
        Schema::create('consultas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('atendimento_id')->constrained()->onDelete('cascade');
            $table->foreignId('pessoal_clinico_id')->constrained()->onDelete('cascade');
            $table->date('data');
            // Registrar diagnóstico.
            // Prescrever medicamentos.
            // Solicitar exames.
            // Encaminhar para internação ou alta.
            $table->text('diagnostico');
            $table->text('examesSolicitados');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consultas');
    }
};
