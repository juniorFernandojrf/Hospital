<?php

namespace App\Http\Controllers;

use App\Http\Requests\EspecialidadeRequest;
use App\Models\Especialidade;
use App\Services\EspecialidadeService;
use App\Utils\DataSanitizationService;
use Exception;
use Illuminate\Http\Request;

class EspecialidadeController extends Controller
{
    protected $especialidade;
    protected $sanitize;

    public function __construct(
        EspecialidadeService $especialidade,
        DataSanitizationService $sanitize,
    ) {
        $this->especialidade = $especialidade;
        $this->sanitize = $sanitize;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dateEsp = Especialidade::paginate(10);
        
        return view('Admin.paginas.listar.listar_especialidade', compact('dateEsp'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.paginas.cadastrar.cadastrar_especialidade');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EspecialidadeRequest $request)
    {
        // dd("entriuu");
        // Validação e obtenção dos dados
        $validated = $request->validated();

        // Criação do registro no banco de dados
        $especialidade = $this->especialidade->createEspecidade($this->sanitize->sanitizeEspecialidade($validated));

        return redirect()->route('especialidade');
    }

    // /**
    //  * Display the specified resource.
    //  */
    // public function show(Especialidade $especialidade)
    // {
    //     // Retorna uma view com os detalhes da especialidade
    //     return view('Admin.paginas.ver_especialidade', compact('especialidade'));
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(String $id)
    {
        $date = Especialidade::findOrFail($id);

        // Retorna uma view com o formulário de edição
        return view('Admin.paginas.editar.editar_especialidade', compact('date'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(EspecialidadeRequest $request, Especialidade $especialidade)
    {
        // Valida os dados
        $validated = $request->validated();

        // Atualiza os dados da especialidade
        $this->especialidade->updateEspecidade($this->sanitize->sanitizeEspecialidade($validated), $especialidade);

        // Redireciona com mensagem de sucesso
        return redirect()->route('especialidade')->with('success', 'Especialidade atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($especialidade)
    {

        try {
            $date = Especialidade::findOrFail($especialidade);
            $date->delete();

            return redirect()->route('especialidade')->with('success', 'Especialidade excluída com sucesso!');
        } catch (Exception $e) {
            return back()->with('error', 'Erro ao excluír Especialidade: ' . $e->getMessage());
        }

        // Redireciona com mensagem de sucesso
    }
}
