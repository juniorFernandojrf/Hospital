<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Utente extends Model
{
    use HasFactory;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'dataAnivers',
        'morada',
        'localizacao',
        'estadoCivil',
        'codigoPostal',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function seguradora(){                
        return $this->hasOne(Seguradora::class);        
    }

    public function atendimento(){                
        return $this->belongsTo(Atendimento::class);        
    }
    
    public function historicoMedico(){ 

        return $this->hasOne(HistoricoMedico::class);        
    }
}
