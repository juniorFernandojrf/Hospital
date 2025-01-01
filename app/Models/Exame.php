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
        'tipo',
        'data',
        'resultado',
        'status',
    ];

    public function pessoalClinico()
    {
        return $this->belongsTo(PessoalClinico::class);
    }
}
