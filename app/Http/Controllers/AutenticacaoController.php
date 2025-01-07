<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\RateLimiter;

class AutenticacaoController extends Controller
{
    public function register(Request $request)
    {
        // $validated  = request()->validated();

        // Sanitização dos Dados
        $sanitizedData = [
            'nome'     => strip_tags($request['nome']), // Remove tags HTML
            'sexo'     => strip_tags($request['sexo']), // Remove tags HTML
            'telefone' => preg_replace('/\D/', '', $request['telefone'] ?? ''), // Remove não numéricos
            'email'    => filter_var($request['email'], FILTER_SANITIZE_EMAIL), // Sanitiza e-mail
            'senha'    => Hash::make($request['senha']),       // Hasheia a senha(criptogafia)
            'dataAnivers'   => $request['dataAnivers'] ?? null, // Mantém data válida
            'morada'        => htmlspecialchars($request['morada'] ?? '', ENT_QUOTES, 'UTF-8'),      // Escapa caracteres especiais
            'localizacao'   => htmlspecialchars($request['localizacao'] ?? '', ENT_QUOTES, 'UTF-8'), // Escapa caracteres especiais
            'estadoCivil'   => strip_tags($request['estadoCivil'] ?? ''), // Remove tags HTML
            'codigoPostal'  => htmlspecialchars($request['codigoPostal'] ?? '', ENT_QUOTES, 'UTF-8'),   // Escapa caracteres especiais
            'entidaFinance' => htmlspecialchars($request['entidaFinance'] ?? '', ENT_QUOTES, 'UTF-8'),  // Escapa caracteres especiais
            'numSegura'     => intval($request['numSegura'] ?? 0), // Converte para inteiro seguro
        ];

        if ($request['senha'] == null) {
            
            $senha = random_int(1, 1000);

            // Criação do Usuário
            $user = User::create([
                'nome'     => $sanitizedData['nome'],
                'sexo'     => $sanitizedData['sexo'],
                'telefone' => $sanitizedData['telefone'],
                'email'    => $sanitizedData['email'],
                'senha'    => $sanitizedData['senha'],
            ]);

        }else {

            // Criação do Usuário
            $user = User::create([
                'nome'     => $sanitizedData['nome'],
                'sexo'     => $sanitizedData['sexo'],
                'telefone' => $sanitizedData['telefone'],
                'email'    => $sanitizedData['email'],
                'senha'    => $sanitizedData['senha'],
            ]);
        }


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

        // Logar o usuario cadastrado   
        // Auth::login($user);

        return redirect()->intended(route('inicio'))->with('success', 'Cadastro realizado com sucesso.');
    }

    public function login(Request $request)
    {
        // dd($request->all());

        $validated = $request->validate([
            'telefone' => 'required|string|min:9|max:9',
            'senha'    => 'required|string|min:8|regex:/[a-z]/|regex:/[A-Z]/|regex:/[0-9]/|regex:/[@$!%*#?&]/',
        ], [
            'telefone.required' => 'O campo telefone é obrigatório.',
            'telefone.string'   => 'O campo telefone deve ser uma string.',
            'telefone.max'      => 'O campo telefone não deve exceder 9 caracteres.',
            'telefone.min'      => 'O campo telefone deve ter pelo menos 9 caracteres.',
            'senha.required' => 'O campo senha é obrigatório.',
            'senha.string'   => 'O campo senha deve ser uma string.',
            'senha.min'      => 'O campo senha deve ter pelo menos 8 caracteres.',
            'senha.max'      => 'O campo senha não deve exceder 20 caracteres.',
            'senha.regex'    => 'A senha deve incluir letras maiúsculas, minúsculas, números e caracteres especiais.',
        ]);

        // Sanitização dos Dados
        $sanitizedData = [
            'telefone' => preg_replace('/\D/', '', $validated['telefone'] ?? ''), // Remove não numéricos
            'senha'    => Hash::make($validated['senha']), // Hasheia a senha(criptogafia)
        ];

        // Verificar tentativas excessivas de login para evitar força bruta
        $key = 'login-attempt:' . $request->ip();

        if (RateLimiter::tooManyAttempts($key, 5)) {
            return back()->withErrors([
                'email' => 'Muitas tentativas de login. Tente novamente mais tarde.',
            ]);
        }

        // RateLimiter::hit()
        // Registra uma tentativa de login falha.
        // hit($key, 60):
        // $key: Identifica a tentativa, geralmente baseado no IP do cliente.
        // 60: Define o tempo em segundos que a tentativa será bloqueada após atingir o limite (ex.: 5 tentativas).

        // Autenticação usando as credenciais fornecidas
        if (!Auth::attempt($request->only('telefone', 'senha'), $request->boolean('remember'))) {
            RateLimiter::hit($key, 60); // Incrementar o contador com tempo de bloqueio de 1 minuto
            return back()->withErrors([
                'email' => 'As credenciais estão incorretas.',
            ]);
        }

        // Sucesso no login
        RateLimiter::clear($key);
        $request->session()->regenerate(); // Regenerar o ID da sessão
        return redirect()->intended(route('inicio'))->with('success', 'Login realizado com sucesso.');
    }

    public function logout(Request $request)
    {
        // Invalidar o token da sessão autenticada
        Auth::logout();

        // Invalida a sessão atual e gera um novo ID
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redirecionar o usuário para a página inicial ou de login com mensagem de sucesso
        return redirect()->route('login')->with('success', 'Você foi desconectado com sucesso.');
    }
}
