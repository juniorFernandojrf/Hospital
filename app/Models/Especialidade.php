<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Especialidade extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nome',
        'estado',
    ];

    // Relacionamento com PessoalClinico
    public function pessoalClinicos()
    {
        return $this->hasMany(PessoalClinico::class);
    }

    public function exame()
    {
        return $this->hasOne(Exame::class);
    }
    
}
