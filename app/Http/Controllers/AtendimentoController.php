<?php

namespace App\Http\Controllers;

use App\Models\Atendimento;
use App\Models\Utente;
use App\Services\SenhaService;
use App\Services\UserService;
use App\Utils\DataSanitizationService;
use App\Http\Requests\RegisterRequest;
use App\Services\SolicitarService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AtendimentoController extends Controller
{
    protected $senha;
    protected $user;
    protected $solicitar;
    protected $saniteze;

    public function __construct(
        SenhaService $senha,
        DataSanitizationService $saniteze,
        SolicitarService $solicitar,
        UserService $user,
    ) {
        $this->senha     = $senha;
        $this->saniteze  = $saniteze;
        $this->user      = $user;
        $this->solicitar = $solicitar;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('PClinico.Recepcionista.paginas.listar.listar_paciente');    
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('PClinico.Recepcionista.paginas.cadastrar.cadastrar_paciente');
        
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function encaminhar()
    {
        return view('PClinico.Recepcionista.paginas.listar.listar_Cpaciente');
        
    }
     
     /**
     * Método para registrar um novo usuário.
     * Recebe os dados do formulário, valida-os e cria o usuário no banco de dados.
     */
    public function registerUtente(RegisterRequest $request)
    {
        $validated = $request->all(); 

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
            return redirect()->intended(route('inicio'))->with('success', 'Cadastro realizado com sucesso.');
        } catch (\Exception $e) {
            // Reverte a transação em caso de erro (nenhum dado será salvo no banco de dados)
            DB::rollBack();

            // Retorna uma mensagem de erro ao usuário
            return back()->withErrors([
                'message' => 'Ocorreu um erro ao realizar o cadastro. Por favor, tente novamente.',
            ])->withInput(); // Mantém os dados preenchidos no formulário
        }
    }

    public function solicitar(Request $request, $id)
    {
        $dados = $this->solicitar->solicitar($id);
       
        // Encontrar o Utente pelo ID
        $utente = Utente::where('id', $id)->get();
        $dados  = $utente->first();

        if (!$utente) {
            return redirect(route('atendimento_index'))->with(['message' => 'Utente não encontrado'], 404);
        }
        
        if ($dados->status == 'activo') {
            $dados->update([
                'status' => 'inactivo'
            ]);
        } else {
            $dados->update([
                'status' => 'activo'
            ]);
        }
    
        // Salvar as alterações
        $dados->save();

    return redirect(route('atendimento_index'))->with(['message' => 'Utente Foi Dirigido '], 404);
    
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     */
    public function show(Atendimento $atendimento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Atendimento $atendimento)
    {
        //
    }

    // public function update(Request $request, $id)
    public function update(Request $request, $id)
{
    

    return redirect(route('atendimento_index'))->with(['message' => 'Status do utente atualizado com sucesso']);
}
  
    
    public function consuta() {

        return view('PClinico.Recepcionista.paginas.agendar.agendamento_consulta');
    }

    public function exame() {
        return view('PClinico.Recepcionista.paginas.agendar.agendamento_exame');
    }
}
