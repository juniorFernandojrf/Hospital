<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use App\Services\PClinicoService;
use App\Services\SenhaService;
use App\Services\UserService;
use App\Utils\DataSanitizationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\RateLimiter;

use function Laravel\Prompts\password;

class AutenticacaoController extends Controller
{
    protected $senha;
    protected $user;
    protected $saniteze;
    protected $pClinico;

    public function __construct(
        SenhaService $senha,
        DataSanitizationService $saniteze,
        UserService $user,
        PClinicoService $pClinico,
    ) {
        $this->senha    = $senha;
        $this->saniteze = $saniteze;
        $this->user     = $user;
        $this->pClinico = $pClinico;
    }

    /**
     * Método para registrar um novo usuário.
     * Recebe os dados do formulário, valida-os e cria o usuário no banco de dados.
     */
    public function register(RegisterRequest $request)
    {
        $validated = $request->validated(); 

        // Sanitiza os dados do usuário (remove caracteres inválidos, formata campos, etc.)
        $dados = $this->saniteze->sanitizeUser($validated);

        $dados['password'] = $this->senha->gerarhash($validated['senha']); // Adiciona a senha criptografada aos dados sanitizados

        try {
            // Inicia uma transação de banco de dados
            DB::beginTransaction();             

            // Cria o usuário no banco de dados
            $user = $this->user->createUser($dados);
        // dd($user->id);

            // Cria o relacionamento com o Utente (paciente) associado ao usuário
            $utente = $this->user->createUtente($user->id, $this->saniteze->sanitizeUtente($validated));

            // Cria o relacionamento com a Seguradora associada ao utente
            $seguradora = $this->user->createSeguradora($utente->id, $this->saniteze->sanitizeSeguradora($validated));
            // dd($seguradora);
            
            
            // Confirma a transação (salva todas as alterações no banco de dados)
            DB::commit();

            // Loga o usuário recém-criado
            Auth::login($user);

            // Redireciona o usuário para a página inicial com uma mensagem de sucesso
            return $this->pClinico->verificarPessoalClinico();
        } catch (\Exception $e) {
            // Reverte a transação em caso de erro (nenhum dado será salvo no banco de dados)
            DB::rollBack();

            // Retorna uma mensagem de erro ao usuário
            return back()->withErrors([
                'message' => 'Ocorreu um erro ao realizar o cadastro. Por favor, tente novamente.',
            ])->withInput(); // Mantém os dados preenchidos no formulário
        }
    }

    public function login(LoginRequest $request)
    {
        // Valida os dados do formulário usando o LoginRequest
        $validated = $request->validated();
        
        // Sanitiza os dados de login
        $sanitizedData = $this->saniteze->sanitizeLogin($validated);

        // dd($sanitizedData);
        // Verifica tentativas excessivas de login para evitar ataques de força bruta
        $key = 'login-attempt:' . $request->ip();
        if (RateLimiter::tooManyAttempts($key, 5)) {
            return back()->withErrors([
                'email' => 'Muitas tentativas de login. Tente novamente mais tarde.',
            ]);
        }
        
        try {
            // dd($sanitizedData);
            // Autenticação usando as credenciais fornecidas
            if (!Auth::attempt($sanitizedData)) {
                // Incrementa o contador de tentativas falhas
                RateLimiter::hit($key, 60);

                // Retorna uma mensagem de erro específica para o usuário
                return back()->withErrors([
                    'message' => 'As credenciais estão incorretas. Verifique seu telefone e senha.',
                ])->withInput(); // Mantém os dados preenchidos no formulário
            }


            // Limpa o contador de tentativas após um login bem-sucedido
            RateLimiter::clear($key);          

            return $this->pClinico->verificarPessoalClinico();

      } catch (\Exception $e) {
            // Em caso de erro inesperado, retorna uma mensagem genérica
            return back()->withErrors([
                'message' => 'Ocorreu um erro ao realizar o login. Por favor, tente novamente.',
            ])->withInput();
        }
    }

    /**
     * Método para deslogar um usuário.
     * Invalida a sessão e redireciona o usuário para a página de login.
     */
    public function logout(Request $request)
    {
        // Desloga o usuário autenticado
        Auth::logout();

        // Invalida a sessão atual para garantir que o usuário seja desconectado
        $request->session()->invalidate();

        // Regenera o token CSRF para evitar ataques de fixação de token
        $request->session()->regenerateToken();

        // Redireciona o usuário para a página de login com uma mensagem de sucesso
        return redirect()->route('login')->with('success', 'Você foi desconectado com sucesso.');
    }

}
