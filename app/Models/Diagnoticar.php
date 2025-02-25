<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diagnoticar extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'utente_id',
        'sintomas',
        'nota'
    ];

    // Relacionamento com o Paciente
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relacionamento com o Médico
    public function utente()
    {
        return $this->belongsTo(Utente::class);
    }
}


