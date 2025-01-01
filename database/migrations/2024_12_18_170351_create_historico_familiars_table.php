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
        Schema::create('historico_familiars', function (Blueprint $table) {
            $table->id();
            $table->string('parente'); 
            $table->string('codicaoMedica'); 
            $table->integer('idade'); 
            $table->text('comentario');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historico_familiars');
    }
};
