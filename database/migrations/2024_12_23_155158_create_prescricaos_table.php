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
        Schema::create('prescricaos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('utente_id')->constrained()->cascadeOnDelete();
            $table->string('medicamento');
            $table->string('duracao');
            $table->string('Observacao');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prescricaos');
    }
};
