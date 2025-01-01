<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserService
{
    public function createUser(array $dados)
    {
        return User::create([
            'nome'     => $dados['nome'],
            'sexo'     => $dados['sexo'],
            'telefone' => $dados['telefone'],
            'email'    => $dados['email'],
            'senha'    => Hash::make($dados['senha']),
        ]);
    }

    public function createUtente($user, array $dados)
    {
        return $user->utente()->create([
            'dataAnivers'  => $dados['dataAnivers'],
            'morada'       => $dados['morada'],
            'localizacao'  => $dados['localizacao'],
            'estadoCivil'  => $dados['estadoCivil'],
            'codigoPostal' => $dados['codigoPostal'],
        ]);
    }

    public function createSeguradora($utente, array $dados)
    {
        $utente->seguradora()->create([
            'entidaFinance' => $dados['entidaFinance'],
            'numSegura'     => intval($dados['numSegura']),
        ]);
    }
}
