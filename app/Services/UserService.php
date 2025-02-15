<?php

namespace App\Services;

use App\Models\User;
use App\Models\Seguradora;
use App\Models\Utente;
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
            'password' => $dados['password'],
        ]);
    }

    public function createUtente($userId, array $dados)
    {
        try {
            // Criar o utente com `create()`
            $utente = Utente::create([
                'user_id'      => $userId,
                'dataAnivers'  => $dados['dataAnivers'] ?? null,
                'morada'       => $dados['morada'] ?? null,
                'localizacao'  => $dados['localizacao'] ?? null,
                'estadoCivil'  => $dados['estadoCivil'] ?? null,
                'codigoPostal' => $dados['codigoPostal'] ?? null,
            ]);
    
            return $utente;
        } catch (\Exception $e) {
            
            return null;
        }
    }
    

    public function createSeguradora($utenteId, array $dados)
{
    try {
        // Criar e salvar a seguradora
        $seguradora = Seguradora::create([
            'utente_id'     => $utenteId,
            'entidaFinance' => $dados['entidaFinance'] ?? null,
            'numSegura'     => intval($dados['numSegura'] ?? 0),
        ]);

        return $seguradora;
    } catch (\Exception $e) {
        return null;
    }
}

}
