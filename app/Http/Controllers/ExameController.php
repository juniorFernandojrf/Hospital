<?php

namespace App\Http\Controllers;

use App\Http\Requests\ExemeRequest;
use App\Models\Exame;
use App\Services\ExameService;
use App\Utils\DataSanitizationService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExameController extends Controller
{
    protected $sanitize;
    protected $exame;

    public function __construct(
        DataSanitizationService $sanitize,
        ExameService $exame
    ) {
        $this->sanitize = $sanitize;
        $this->exame    = $exame;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $exames = Exame::paginate(10);
        return view('Admin.paginas.listar.listar_exame', compact('exames'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.paginas.cadastrar.cadastro_exames');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ExemeRequest $request)
    {
        $validated = $request->validated();

        try {
            DB::beginTransaction();
            // dd($validated);

            $dadosSanitize = $this->sanitize->sanitezerExame($validated);

            $dadosExame = $this->exame->createExame($dadosSanitize);
            // dd($dadosExame);

            DB::commit();
            return redirect()->route('listar_exame', compact('dadosExame'))->with('success', 'Exame cadastrado com sucesso!');
        } catch (\Exception $e) {
            DB::rollback();

            return back()->withErrors(['error' => 'Erro ao cadastrar o exame: ' . $e->getMessage()]);
        }
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(ExemeRequest $request, $id)
    {
        $validated = $request->validated();

        try {
            DB::beginTransaction();

            $dadosSanitize = $this->sanitize->sanitezerExame($validated);

            $exame = Exame::findOrFail($id);

            $dados = $exame->update($dadosSanitize);
            DB::commit();
            return redirect()->route('listar_exame')->with('success', 'Exame atualizado com sucesso!');
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withErrors(['error' => 'Erro ao atualizar o exame: ' . $e->getMessage()]);
        }
    }

    /**
     * Remove o recurso especificado do banco de dados.
     */
    public function destroy($exame)
    {
        try {
            $date = Exame::findOrFail($exame);
            $date->delete();

            return redirect()->route('listar_exame')->with('success', 'Consulta excluída com sucesso!');
        } catch (Exception $e) {
            return back()->with('error', 'Erro ao excluír consulta: ' . $e->getMessage());
        }
    }
}
