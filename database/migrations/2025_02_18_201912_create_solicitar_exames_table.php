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
        Schema::create('solicitar_exames', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');   // Criar as colunas primeiro
            $table->unsignedBigInteger('utente_id');
            $table->unsignedBigInteger('exame_id');
            $table->enum('status', ['Pendente', 'confirmado', 'concluido', 'cancelado'])->default('Pendente');
            $table->timestamps();

            // Agora definir as chaves estrangeiras
            $table->foreign('user_id')  ->references('id')->on('users')  ->cascadeOnDelete();
            $table->foreign('utente_id')->references('id')->on('utentes')->cascadeOnDelete();
            $table->foreign('exame_id') ->references('id')->on('exames') ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('solicitar_exames');
    }
};
