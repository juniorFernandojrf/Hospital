<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SolicitarConsulta extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'utente_id', 'consulta_id', 'motivo'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function utente()
    {
        return $this->belongsTo(Utente::class);
    }

    public function consulta()
    {
        return $this->belongsTo(Consulta::class);
    }
}
