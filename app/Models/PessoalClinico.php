<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PessoalClinico extends Model
{
    use HasFactory;

      /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'especialidade_id',
        'numOrdem',
    ];

    // Relacionamento com User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relacionamento com Especialidade
    public function especialidade()
    {
        return $this->belongsTo(Especialidade::class);
    }
    

    // Relacionamento entre um PessoalClinico e Triagem
    public function triagem()
    {
        return $this->belongsTo(Triagem::class);
    }
}
