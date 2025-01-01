<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AutenticacaoController extends Controller
{
    public function register(Request $request)
    {
        // $validated  = request()->validated();

        // dd($request->all());

        // Sanitização dos Dados
        $sanitizedData = [
            'nome'     => strip_tags($request['nome']), // Remove tags HTML
            'sexo'     => strip_tags($request['sexo']), // Remove tags HTML
            'telefone' => preg_replace('/\D/', '', $request['telefone'] ?? ''), // Remove não numéricos
            'email'    => filter_var($request['email'], FILTER_SANITIZE_EMAIL), // Sanitiza e-mail
            'senha'    => Hash::make($request['senha']),       // Hasheia a senha(criptogafia)
            'dataAnivers'  => $request['dataAnivers'] ?? null, // Mantém data válida
            'morada'       => htmlspecialchars($request['morada'] ?? '', ENT_QUOTES, 'UTF-8'),      // Escapa caracteres especiais
            'localizacao'  => htmlspecialchars($request['localizacao'] ?? '', ENT_QUOTES, 'UTF-8'), // Escapa caracteres especiais
            'estadoCivil'  => strip_tags($request['estadoCivil'] ?? ''), // Remove tags HTML
            'codigoPostal' => htmlspecialchars($request['codigoPostal'] ?? '', ENT_QUOTES, 'UTF-8'),   // Escapa caracteres especiais
            'entidaFinance' => htmlspecialchars($request['entidaFinance'] ?? '', ENT_QUOTES, 'UTF-8'),  // Escapa caracteres especiais
            'numSegura'    => intval($request['numSegura'] ?? 0), // Converte para inteiro seguro
        ];

        // Criação do Usuário
        $user = User::create([
            'nome'     => $sanitizedData['nome'],
            'sexo'     => $sanitizedData['sexo'],
            'telefone' => $sanitizedData['telefone'],
            'email'    => $sanitizedData['email'],
            'senha'    => $sanitizedData['senha'],
        ]);

        // Criação do Relacionamento com Utente
        $utente = $user->utente()->create([
            'dataAnivers'  => $sanitizedData['dataAnivers'],
            'morada'       => $sanitizedData['morada'],
            'localizacao'  => $sanitizedData['localizacao'],
            'estadoCivil'  => $sanitizedData['estadoCivil'],
            'codigoPostal' => $sanitizedData['codigoPostal'],
        ]);

        $utente = $user->utente;
        // Criação do Relacionamento com Seguradora
        $utente->seguradora()->create([
            'entidaFinance' => $sanitizedData['entidaFinance'],
            'numSegura'     => $sanitizedData['numSegura'],
        ]);

        dd($user);

        // Logar o usuario cadastrado   
        // Auth::login($user);

        return view('inicio');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
           
        }
    }
}
