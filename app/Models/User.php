<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nome',
        'sexo',
        'telefone',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function utentes()
    {
        return $this->hasMany(Utente::class);
    }

    public function atriagems()
    {
        return $this->hasMany(Atriagem::class);
    }

    
    // Relacionamento entre um Usuario e Departamento
    public function departamento()
    {
        return $this->belongsTo(Utente::class);
    }

    // Relacionamento entre um Usuario e Seguradoras
    public function seguradoras()
    {
        return $this->hasMany(Seguradora::class);
    }

    // Relacionamento com PessoalClinico
    public function pessoalClinico()
    {
        return $this->hasOne(PessoalClinico::class);
    }

    // Relacionamento entre um Usuario e PessoalAdmin
    public function pessoalAdmin()
    {
        return $this->hasOne(PessoalAdmin::class);
    }
}
