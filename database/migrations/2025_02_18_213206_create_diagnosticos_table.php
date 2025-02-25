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
        Schema::create('diagnostics', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('utente_id');
            $table->text('sintomas')->nullable();
            $table->text('nota')    ->nullable();
            $table->timestamps();

            // Chaves estrangeiras
            $table->foreign('user_id')  ->references('id')->on('users')  ->onDelete('cascade');
            $table->foreign('utente_id')->references('id')->on('utentes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('diagnosticos');
    }
};
