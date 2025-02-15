<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'utente_id'
    ];

    public function user() { 
        return $this->belongsTo(User::class);
    }
    
    public function utente() { 
        return $this->belongsTo(Utente::class);
    }
}
