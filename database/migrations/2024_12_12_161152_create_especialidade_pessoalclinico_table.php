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
        Schema::create('especialidade_pessoalclinico', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pessoal_clinico_id'); // Correto
            $table->unsignedBigInteger('especialidade_id');   // Correto

            $table->foreign('pessoal_clinico_id')->references('id')->on('pessoal_clinicos')->onDelete('cascade');
            $table->foreign('especialidade_id')->references('id')->on('especialidades')->onDelete('cascade');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('especialidade_pessoalclinico');
    }
};
