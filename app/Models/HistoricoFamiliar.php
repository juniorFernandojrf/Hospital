<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoricoFamiliar extends Model
{
    use HasFactory;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'parente',
        'codicaoMedica',
        'idade',
        'comentario',
    ];

    public function historicoMedico(){                        
        return $this->belongsTo(HistoricoMedico::class);        
    }
}
