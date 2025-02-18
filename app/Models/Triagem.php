<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Triagem extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'utente_id',
        'user_id', 
        'pressao_arterial',
        'temperatura',
        'queixas_iniciais',
    ];

    public function atendimento(){                        
        return $this->belongsTo(Atendimento::class);        
    }

    public function pessoalClinico(){                        
        return $this->hasOne(PessoalClinico::class);        
    }
}
