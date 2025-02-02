<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\RateLimiter;

use function Laravel\Prompts\password;

class AutenticacaoController extends Controller
{   
    public function index() {
        return;
    }

    public function register(RegisterRequest $request)
    {
        $validated  = request()->validated();

        // Verifica se a senha foi enviada no formulário
        if (!$validated->filled('senha')) {

           // Conjunto de caracteres para gerar a senha
           $caracters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_+-=';
           $senha = '';

           // Garantir que haja ao menos uma letra maiúscula, uma minúscula, um número e um caractere especial
           $senha .= $caracters[rand(26, 51)]; // Uma letra maiúscula
           $senha .= $caracters[rand(0, 25)];  // Uma letra minúscula
           $senha .= $caracters[rand(52, 61)]; // Um número
           $senha .= $caracters[rand(62, strlen($caracters) - 1)]; // Um caractere especial

           // Preencher o restante da senha com caracteres aleatórios
           for ($i = 4; $i < 12; $i++) {
               $senha .= $caracters[rand(0, strlen($caracters) - 1)];
           }
           
           // Embaralhar a senha para distribuir os caracteres
           $senha = str_shuffle($senha);

           $sanitizedData['senha'] = Hash::make($senha);  // Hasheia a senha(criptogafia) 
           
        } else {
            $sanitizedData['senha'] = Hash::make($validated['senha']);  // Hasheia a senha(criptogafia)            
        }

        // Sanitização dos Dados
        $sanitizedData = [
            'nome'     => strip_tags($validated['nome']), // Remove tags HTML
            'sexo'     => strip_tags($validated['sexo']), // Remove tags HTML
            'telefone' => preg_replace('/\D/', '', $validated['telefone'] ?? ''), // Remove não numéricos
            'email'    => filter_var($validated['email'], FILTER_SANITIZE_EMAIL), // Sanitiza e-mail
            'dataAnivers'   => $validated['dataAnivers'] ?? null, // Mantém data válida
            'morada'        => htmlspecialchars($validated['morada'] ?? '', ENT_QUOTES, 'UTF-8'),      // Escapa caracteres especiais
            'localizacao'   => htmlspecialchars($validated['localizacao'] ?? '', ENT_QUOTES, 'UTF-8'), // Escapa caracteres especiais
            'estadoCivil'   => strip_tags($validated['estadoCivil'] ?? ''), // Remove tags HTML
            'codigoPostal'  => htmlspecialchars($validated['codigoPostal'] ?? '', ENT_QUOTES, 'UTF-8'),   // Escapa caracteres especiais
            'entidaFinance' => htmlspecialchars($validated['entidaFinance'] ?? '', ENT_QUOTES, 'UTF-8'),  // Escapa caracteres especiais
            'numSegura'     => intval($validated['numSegura'] ?? 0), // Converte para inteiro seguro
        ];
        

        // Criação do Usuário
        $user = User::create([
            'nome'     => $sanitizedData['nome'],
            'sexo'     => $sanitizedData['sexo'],
            'telefone' => $sanitizedData['telefone'],
            'email'    => $sanitizedData['email'],
            'senha'    => $sanitizedData['senha'],
        ]);

        // Criação do Relacionamento com Utente bolt.new
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

    // public function form_login(){
    //     return view('Autenticacao.login');
    // }

    // public function form_cadastro(){
    //     return view('Autenticacao.cadastro');
    // }
}
