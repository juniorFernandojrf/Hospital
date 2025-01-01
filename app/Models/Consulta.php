<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'data',
        'diagnostico',
        'examesSolicitados',
    ];

     // Relacionamento entre um PessoalClinico e Utente
     public function atendimento()
     {
         return $this->belongsTo(Atendimento::class);
     }
}
