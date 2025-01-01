<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoricoMedico extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'alergia',
        'medicamentosEmUso',
        'estiloDeVida',
    ];

    public function utente(){ 
                       
        return $this->belongsTo(Utente::class);        
    }

    public function boletinsVacina(){ 
                       
        return $this->belongsToMany(BoletinsVacina::class);        
    }
    public function historicoFamiliar(){ 
                       
        return $this->belongsToMany(HistoricoFamiliar::class);        
    }
}
