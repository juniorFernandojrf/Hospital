<?php

namespace App\Services;

use Illuminate\Support\Facades\Hash;

class SenhaService implements SenhaServiceInterface {

    public function gerarSenha (){

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

    public function gerarhash (string $senha){
        return Hash::make($senha);
    }
}