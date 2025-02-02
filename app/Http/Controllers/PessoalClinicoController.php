<?php

namespace App\Http\Controllers;

use App\Http\Requests\PClinicoRequest;
use App\Models\PessoalClinico;
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

    public function __construct(
        SenhaService $senha,
        DataSanitizationService $saniteze,
        UserService $user
    ) {
        $this->senha    = $senha;
        $this->saniteze = $saniteze;
        $this->user     = $user;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $date = PessoalClinico::paginate(10);

        return view('Admin.paginas.listar.listar_pclinico', compact('date'));
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

        DB::beginTransaction();

        try {
            
            $senha     = $this->senha->gerarSenha();
            $numOredem = $this->senha->gerarNumDeOrdem($dataValidated['categoria']);
            $dados     = $this->saniteze->sanitizeUser($dataValidated);
            $dados['senha'] = $this->senha->gerarhash($senha);

            $user = $this->user->createUser($dados);

            $user->pessoalClinico()->create([
                'numOrdem' => $numOredem,
            ]);

            DB::commit();

            return view('Admin.paginas.detalhe.datalhes_pclinico.blade')->with(['message' => 'Pessoal clínico cadastrado com sucesso!'], 201);
        } catch (\Exception $e) {

            DB::rollback();
            return view('message')->with(['error' => 'Erro ao cadastrar o pessoal clínico', 'details' => $e->getMessage()], 500);
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
     * Show the form for editing the specified resource.
     */
    public function edit(PessoalClinico $pessoalClinico)
    {
        return view('Admin.paginas.editar.editar_pclinico', compact('pessoalClinico'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PessoalClinico $pessoalClinico)
    {
        $dataValidated = $request->all();

        DB::beginTransaction();

        try {
            $dados = $this->saniteze->sanitizeUser($dataValidated);

            $pessoalClinico->update([
                'numOrdem' => $dados['numOrdem'] ?? $pessoalClinico->numOrdem,
            ]);

            $pessoalClinico->user->update($dados);

            DB::commit();

            return response()->json(['message' => 'Pessoal clínico atualizado com sucesso!'], 200);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['error' => 'Erro ao atualizar o pessoal clínico', 'details' => $e->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PessoalClinico $pessoalClinico)
    {
        DB::beginTransaction();

        try {
            $pessoalClinico->delete();
            $pessoalClinico->user->delete();

            DB::commit();

            return response()->json(['message' => 'Pessoal clínico removido com sucesso!'], 200);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['error' => 'Erro ao remover o pessoal clínico', 'details' => $e->getMessage()], 500);
        }
    }
}
