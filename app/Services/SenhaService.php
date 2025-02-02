<?php

namespace App\Services;

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
    public function gerarhash(string $senha)
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
                $date = "SEC";
                break;
            default:
                $date = "AU";
                break;
        }

        // Obtém o timestamp atual
        $timestamp = time();

        // Gera um identificador único baseado no tempo atual e um número randômico
        $idUnico = uniqid();

        // Opcionalmente, adicione um prefixo para identificar o tipo de ordem
        return strtoupper($date) . '-' . $timestamp . '-' . strtoupper(substr($idUnico, -6));
    }
}
