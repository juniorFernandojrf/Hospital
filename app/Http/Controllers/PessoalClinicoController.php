<?php

namespace App\Http\Controllers;

use App\Http\Requests\PClinicoRequest;
use App\Models\PessoalClinico;
use App\Models\Role;
use App\Services\PClinicoService;
use App\Services\SenhaService;
use App\Services\UserService;
use App\Utils\DataSanitizationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PessoalClinicoController extends Controller
{
    protected $senha;
    protected $user;
    protected $saniteze;
    protected $pClinico;

    public function __construct(
        SenhaService $senha,
        DataSanitizationService $saniteze,
        UserService $user,
        PClinicoService $pClinico
    ) {
        $this->senha    = $senha;
        $this->saniteze = $saniteze;
        $this->user     = $user;
        $this->pClinico = $pClinico;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Admin.paginas.listar.listar_pclinico');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.paginas.cadastrar.cadastro_pclinico');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PClinicoRequest $request)
    {
        $dataValidated = $request->validated();

        try {
            // dd($dataValidated);
            DB::beginTransaction();

            $senha     = $this->senha->gerarSenha();
            $numOrdem  = $this->senha->gerarNumDeOrdem($dataValidated['categoria']);
            $dados     = $this->saniteze->sanitizeUser($dataValidated);
            $dados['senha'] = $this->senha->gerarhash($senha);

            // Criar o registro de um usuario
            $user = $this->user->createUser($dados);

            // Criar o registro de pessoal clínico
            $pClinico = $this->pClinico->cadastrarPClinico($user->id, $dataValidated['especialidade'], $numOrdem);

            
            DB::commit();

            return view('Admin.paginas.detalhe.datalhes_pclinico.blade')->with(['message' => 'Pessoal clínico cadastrado com sucesso!'], 201);
        } catch (\Exception $e) {

            DB::rollback();
            return redirect()->route('cadastro_pclinico')->with(['error' => 'Erro ao cadastrar o pessoal clínico', 'details' => $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(PessoalClinico $pessoalClinico)
    {
        return view('Admin.paginas.detalhes_pclinico', compact('pessoalClinico'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PClinicoRequest $request, $id)
    {
        $dataValidated = $request->validated();
        try {
            DB::beginTransaction();
            // Buscar o pessoal clínico pelo ID
            $pessoalClinico = PessoalClinico::findOrFail($id);

            // Atualizar os dados do usuário
            $pessoalClinico->user->update([
                'name' => $dataValidated['nome'],
                'email' => $dataValidated['email'],
            ]);

            // Atualizar os dados do pessoal clínico
            $pessoalClinico->update([
                'especialidade_id' => $dataValidated['especialidade'],
            ]);

            DB::commit();
            return redirect()->route('pessoal_clinicos.index')->with('success', 'Pessoal clínico atualizado com sucesso!');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Erro ao atualizar o pessoal clínico: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            // Buscar o pessoal clínico pelo ID
            $pessoalClinico = PessoalClinico::findOrFail($id);

            // Excluir o usuário associado
            $pessoalClinico->user()->delete();

            // Excluir o registro de pessoal clínico
            $pessoalClinico->delete();

            DB::commit();

            return redirect()->route('pessoal_clinicos.index')->with('success', 'Pessoal clínico excluído com sucesso!');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Erro ao excluir o pessoal clínico: ' . $e->getMessage());
        }
    }
}
