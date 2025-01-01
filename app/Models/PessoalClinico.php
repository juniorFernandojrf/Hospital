<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PessoalClinico extends Model
{
    use HasFactory;

    // Relacionamento entre um PessoalClinico e Utente
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relacionamento entre um PessoalClinico e Especialidades
    public function especialidades()
    {
        return $this->belongsToMany(Especialidade::class, 'especialidade_pessoalclinico');
    }

    // Relacionamento entre um PessoalClinico e Triagem
    public function triagem()
    {
        return $this->belongsTo(Triagem::class);
    }
}
