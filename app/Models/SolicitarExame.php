<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SolicitarExame extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'utente_id', 'exame_id', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function utente()
    {
        return $this->belongsTo(Utente::class);
    }

    public function exame()
    {
        return $this->belongsTo(Exame::class);
    }
}

