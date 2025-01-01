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
            $table->foreignId('atendimento_id')->constrained()->cascadeOnDelete(); 
            $table->foreignId('pessoal_clinico_id')->constrained()->cascadeOnDelete(); 
            $table->string('tipo');
            $table->date('data');
            $table->text('resultado')->nullable();
            $table->string('status')->default('Em_andamento');
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
