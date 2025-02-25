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
        Schema::create('triagens', function (Blueprint $table) { // Nome no plural corrigido para "triagens"
            $table->id();            
            $table->foreignId('utente_id')->constrained()->cascadeOnDelete(); 
            $table->foreignId('user_id')  ->constrained()->cascadeOnDelete(); 
            $table->string('pressao_arterial'); // Nome corrigido
            $table->string('temperatura'); // Nome padronizado
            $table->text('queixas_iniciais'); // Nome corrigido
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('triagens'); // Nome atualizado
    }
};
