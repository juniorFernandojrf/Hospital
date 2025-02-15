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
        Schema::create('exames', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('especialidade_id'); // Criação da coluna
            $table->foreign('especialidade_id')->references('id')->on('especialidades'); // Definição da FK
            $table->string('tipo');
            $table->enum('status', ['Ativo', 'Desativo']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exames');
    }
};
