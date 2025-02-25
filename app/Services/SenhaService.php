<?php

namespace App\Services;

use App\Models\PessoalClinico;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class SenhaService
{
    // Gerar Senha Automaticamente
    public function gerarSenha()
    {
        // Conjunto de caracteres para gerar a senha
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_+-=';
        $senha = '';

        // Garantir que haja ao menos uma letra maiúscula, uma minúscula, um número e um caractere especial
        $senha .= $characters[rand(26, 51)]; // Uma letra maiúscula
        $senha .= $characters[rand(0, 25)];  // Uma letra minúscula
        $senha .= $characters[rand(52, 61)]; // Um número
        $senha .= $characters[rand(62, strlen($characters) - 1)]; // Um caractere especial

        // Preencher o restante da senha com caracteres aleatórios
        for ($i = 4; $i < 12; $i++) {
            $senha .= $characters[rand(0, strlen($characters) - 1)];
        }

        // Embaralhar a senha para distribuir os caracteres
        $senha = str_shuffle($senha);

        return $senha;
    }

    // Criptografar Senha
    public function gerarhash($senha)
    {
        return Hash::make($senha);
    }

    // Gerar Numero De Ordem 
    function gerarNumDeOrdem($prefixo)
    {
        switch ($prefixo) {
                        
            case 'Medico':
                $date = "MED";
                break;
            case 'Enfermeiro':
                $date = "ENF";
                break;
            case 'Recepcionista':
                $date = "RECP";
                break;
            default:
                $date = "AU";
                break;
        }

        // Exemplo de geração de número de ordem
        $getPrefixo = strtoupper(substr($date, 0, 3)); 

        $ultimoRegistro = PessoalClinico::where('numOrdem', 'like', $getPrefixo . '%')->orderBy('id', 'desc')->first();

        if ($ultimoRegistro) {
            $numero = intval(substr($ultimoRegistro->numOrdem, -3)) + 1;
        } else {
            $numero = 1;
        }

        return $getPrefixo . '-'. '#' . str_pad($numero, 3, '0', STR_PAD_LEFT);        
    }
}
