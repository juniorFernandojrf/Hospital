<?php

namespace App\Http\Controllers;

use App\Http\Requests\TriagemRequest;
use App\Models\Atriagem;
use App\Models\Triagem;
use App\Models\User;
use App\Models\Utente;
use App\Services\SolicitarService;
use Illuminate\Http\Request;
use App\Services\TriagemService;
use App\Utils\DataSanitizationService;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\DB;

class TriagemController extends Controller
{
    protected $saniteze;
    protected $triagem;
    protected $serviceSolicitar;

    public function __construct(
        DataSanitizationService $saniteze,
        TriagemService $triagem,
        SolicitarService $serviceSolicitar
    ) {
        $this->saniteze = $saniteze;
        $this->triagem  = $triagem;
        $this->serviceSolicitar = $serviceSolicitar;
    }
    public function index()
    {
        // $UtenteTriagem = DB::table('atriagems')
        //         ->join('users',     'users.id',   '=', 'atriagems.user_id')
        //         ->join('utentes',   'utentes.id', '=', 'atriagems.user_id')
        //         ->select('users.*', 'utentes.*', 'atriagems.*')
        //         ->first();     

        $UtenteTriagem = Atriagem::paginate(10);

        return view('PClinico.Enfermeiro.paginas.listar.listar_pacientes');
    }

    public function listar()
    {
        $UtenteTriagem = DB::table('utentes')
                            ->join('users', 'users.id', '=', 'utentes.user_id')
                            ->join('atriagems', 'atriagems.utente_id', '=', 'utentes.id') // Mantém apenas um JOIN
                            ->select('users.*', 'utentes.*', 'atriagems.*')
                            ->where('utentes.status', 'concluido')
                            ->get();

        // dd($UtenteTriagem);
        // dd($UtenteTriagem->toArray());

        return view('PClinico.Enfermeiro.paginas.listar.listar_triagem', compact('UtenteTriagem'));
    }

    public function show($id)
    {
        $UtenteTriagem = Utente::findOrFail($id);

        return view('PClinico.Enfermeiro.paginas.listar.detalhe_paciente', compact('UtenteTriagem'));
    }

    public function criar($id)
    {
        $UtenteTriagem = Utente::findOrFail($id);

        return view('PClinico.Enfermeiro.paginas.cadastrar.editar_Pclinico', compact('UtenteTriagem'));
    }

    public function detalhes($id)
    {
        // dd($id);


        $UtenteTriagem = DB::table('utentes')
            ->join('users', 'users.id',   '=', 'utentes.user_id')
            ->join('atriagems', 'atriagems.utente_id', '=', 'utentes.id')
            ->join('seguradoras', 'seguradoras.utente_id', '=', 'utentes.id')
            ->select('users.*', 'utentes.*', 'atriagems.*', 'seguradoras.*')
            ->where('atriagems.id', $id)
            ->first();

            $user = DB::table('users') 
            ->join('atriagems', 'atriagems.user_id', '=', 'users.id')
            ->select('users.*') 
            ->where('atriagems.id', $id)
            ->first(); 

            // dd($UtenteTriagem);

            return view('PClinico.Enfermeiro.paginas.listar.detalhe_triagem', compact('UtenteTriagem', 'user'));
    }

    public function store(Request $request)
    {
        // Validação dos dados
        $validated = $request->all();

        try {
            // Criar a triagem
            $triagem = $this->triagem->createTriagem($validated);



            // Retornar mensagem de sucesso
            return redirect()->back()->with('success', 'Triagem cadastrada com sucesso!');
        } catch (\Exception $e) {
            return back()->withErrors([
                'message' => 'Erro ao cadastrar triagem: ' . $e->getMessage(),
            ])->withInput();
        }
    }

    public function cadastrar(TriagemRequest $request)
    {
        $validated = $request->validated();

        try {

            // Criar a triagem
            $triagem = $this->triagem->createTriagem($this->saniteze->sanitezerTriagem($validated));

            // Encontrar o Utente pelo ID
            $utente = Utente::where('id', $validated['utente_id'])->get();
            $dados  = $utente->first();

            if ($dados->status == 'activo') {
                $dados->update([
                    'status' => 'inactivo'
                ]);
            } elseif ($dados->status == 'inactivo') {
                $dados->update([
                    'status' => 'concluido'
                ]);
            }

            $dados->save();
            // dd($dados);

            // Retornar mensagem de sucesso
            return redirect()->route('triagem_create')->with('success', 'Triagem cadastrada com sucesso!');
        } catch (\Exception $e) {
            return back()->withErrors([
                'message' => 'Erro ao cadastrar triagem: ' . $e->getMessage(),
            ])->withInput();
        }
    }
}
