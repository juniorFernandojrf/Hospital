<?php

namespace App\Utils;

use App\Services\DataSanitizacaoServiceInterface;

class DataSanitizationService
{
    public function sanitizeUser(array $dados): array
    {
        return [
            'nome'     => strip_tags($dados['nome']), // Remove tags HTML
            'sexo'     => strip_tags($dados['sexo']), // Remove tags HTML
            'telefone' => preg_replace('/\D/', '', $dados['telefone'] ?? ''), // Remove não numéricos
            'email'    => filter_var($dados['email'], FILTER_SANITIZE_EMAIL), // Sanitiza e-mail
        ];
    }

    public function sanitizeUtente(array $dados): array
    {
        return [
            'dataAnivers'   => $dados['dataAnivers'] ?? null, // Mantém data válida
            'morada'        => htmlspecialchars($dados['morada'] ?? '', ENT_QUOTES, 'UTF-8'),      // Escapa caracteres especiais
            'localizacao'   => htmlspecialchars($dados['localizacao'] ?? '', ENT_QUOTES, 'UTF-8'), // Escapa caracteres especiais
            'estadoCivil'   => strip_tags($dados['estadoCivil'] ?? ''), // Remove tags HTML
            'codigoPostal'  => htmlspecialchars($dados['codigoPostal'] ?? '', ENT_QUOTES, 'UTF-8'),   // Escapa caracteres especiais
            'entidaFinance' => htmlspecialchars($dados['entidaFinance'] ?? '', ENT_QUOTES, 'UTF-8'),  // Escapa caracteres especiais
            'numSegura'     => intval($dados['numSegura'] ?? 0), // Converte para inteiro seguro];
        ];
    }

    public function sanitizePclinico(array $dados): array
    {
        return [];
    }

    public function sanitizeEspecialidade(array $dados): array
    {
        return [
            'nome'   => htmlspecialchars($dados['nome'] ?? '', ENT_QUOTES, 'UTF-8'),      // Escapa caracteres especiais
            'estado' => htmlspecialchars($dados['estado'] ?? '', ENT_QUOTES, 'UTF-8'),      // Escapa caracteres especiais
        ];
    }
}
