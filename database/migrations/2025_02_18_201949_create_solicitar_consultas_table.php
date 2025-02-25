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
        Schema::create('solicitar_consultas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');    // Criar a coluna antes da chave estrangeira
            $table->unsignedBigInteger('utente_id');  
            $table->unsignedBigInteger('consulta_id'); 
            $table->text('motivo');
            $table->timestamps();

            // Definir as chaves estrangeiras depois de criar as colunas
            $table->foreign('user_id')    ->references('id')->on('users')    ->cascadeOnDelete();
            $table->foreign('utente_id')  ->references('id')->on('utentes')  ->cascadeOnDelete();
            $table->foreign('consulta_id')->references('id')->on('consultas')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('solicitar_consultas');
    }
};
