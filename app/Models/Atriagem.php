<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Atriagem extends Model
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

    public function user()
{
    return $this->belongsTo(User::class, 'user_id');
}

    public function utente()
{
    return $this->belongsTo(Utente::class, 'utente_id');
}

}
