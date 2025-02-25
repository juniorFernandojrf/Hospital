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
        Schema::create('diagnoticars', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');    // Criar a coluna antes da chave estrangeira
            $table->unsignedBigInteger('utente_id');
            $table->text('sintomas')->nullable();
            $table->text('nota')    ->nullable(); 
            $table->timestamps();

            $table->foreign('user_id')    ->references('id')->on('users')    ->cascadeOnDelete();
            $table->foreign('utente_id')  ->references('id')->on('utentes')  ->cascadeOnDelete();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('diagnoticars');
    }
};
