<?php

namespace App\Utils;

class Sanitizer
{
    public static function sanitize(array $dados): array
    {
        return [
            'nome'     => strip_tags($dados['nome']), // Remove tags HTML
            'sexo'     => strip_tags($dados['sexo']), // Remove tags HTML
            'telefone' => preg_replace('/\D/', '', $dados['telefone'] ?? ''), // Remove não numéricos
            'email'    => filter_var($dados['email'], FILTER_SANITIZE_EMAIL), // Sanitiza e-mail
            'senha'    => $dados['senha'], // Hasheia a senha(criptogafia)
            'dataAnivers'  => $dados['dataAnivers'] ?? null, // Mantém data válida
            'morada'       => htmlspecialchars($dados['morada'] ?? '', ENT_QUOTES, 'UTF-8'),      // Escapa caracteres especiais
            'localizacao'  => htmlspecialchars($dados['localizacao'] ?? '', ENT_QUOTES, 'UTF-8'), // Escapa caracteres especiais
            'estadoCivil'  => strip_tags($dados['estadoCivil'] ?? ''), // Remove tags HTML
            'codigoPostal' => htmlspecialchars($dados['codigoPostal'] ?? '', ENT_QUOTES, 'UTF-8'),   // Escapa caracteres especiais
            'entidaFinance'=> htmlspecialchars($dados['entidaFinance'] ?? '', ENT_QUOTES, 'UTF-8'),  // Escapa caracteres especiais
            'numSegura'    => intval($dados['numSegura'] ?? 0), // Converte para inteiro seguro];
        ];
    }
}
