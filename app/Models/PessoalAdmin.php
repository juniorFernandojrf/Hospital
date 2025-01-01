<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PessoalAdmin extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'cargo',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }    

    public function departamento()
    {
        return $this->hasMany(User::class);
    }
    
}
