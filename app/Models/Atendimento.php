<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Atendimento extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'horaChegada',
        'status',
    ];

    public function utente(){                
        return $this->hasOne(Utente::class);        
    }

    public function triagem(){                        
        return $this->hasOne(Triagem::class);        
    }
    public function consulta(){                        
        return $this->hasOne(Triagem::class);        
    }
}
