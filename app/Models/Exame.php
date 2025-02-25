<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exame extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'especialidade_id',
        'tipo',
        'status',
    ];


    public function especialidade()
    {
        return $this->belongsTo(Especialidade::class);
    }

    public function pessoalClinico()
    {
        return $this->belongsTo(PessoalClinico::class);
    }

    public function solicitarExames()
    {
        return $this->hasMany(SolicitarExame::class);
    }
}
