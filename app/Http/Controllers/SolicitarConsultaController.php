<?php

namespace App\Http\Controllers;

use App\Models\SolicitarConsulta;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SolicitarConsultaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }
    public function cadastrar(Request $request)
    {
        try {
            // dd($request->all());

            $validated = $request->validate([
                'utente_id'   => 'required|', // O ID da especialidade deve ser um número inteiro e existir na tabela "especialidades".
                'consulta_id' => 'required|', // O ID da especialidade deve ser um número inteiro e existir na tabela "especialidades".
                'motivos'      => 'required|string|min:3|max:255', // O tipo deve ser uma string com no máximo 255 caracteres.

            ], ([
                'utente_id.required' => 'O campo Especialidade é obrigatório.',
                'utente_id.integer'  => 'O campo Especialidade deve ser um número inteiro.',
                'utente_id.exists'   => 'A especialidade selecionada não existe.',
                'consulta_id.required' => 'O campo consulta é obrigatório.',
                'consulta_id.string'   => 'O campo consulta deve ser uma string.',
                'consulta_id.min'      => 'O campo consulta deve ter mais de 2 caracteres.',
                'motivo.max'           => 'O campo Tipo não pode ter mais de 255 caracteres.',
                'motivo.min'           => 'O campo deve ter mais de 3 caracteres.',

            ]));

            $dados = SolicitarConsulta::where('utente_id', $validated['utente_id'])->first();
            // dd($dados->id);

            if (!$dados) {
                $dados = SolicitarConsulta::create([
                    'user_id'     => auth()->id(),
                    'utente_id'   => $validated['utente_id'],
                    'consulta_id' => $validated['consulta_id'],
                    'motivo'      => $validated['motivos'],
                ]);

                return  back()->with('success', 'cadastrada com sucesso!');

            } else {

                $criacao = $dados->created_at;
                $diferencaHoras = Carbon::now()->diffInHours($criacao);
                if ($diferencaHoras > 24) {

                    $dados = SolicitarConsulta::create([
                        'user_id'     => auth()->id(),
                        'utente_id'   => $validated['utente_id'],
                        'consulta_id' => $validated['consulta_id'],
                        'motivo'      => $validated['motivos'],
                    ]);
                }else {
                    return back()->with('error', 'Ja possui uma consulta');

                }

            }
            // dd($dados);

            return  back()->with('success', 'cadastrada com sucesso!');
        } catch (Exception $e) {
            return back()->with('error', 'Erro ao cadastrar consulta: ' . $e->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            dd($request->all());

            $validated = $request->validate([
                'utente_id'   => 'required|', // O ID da especialidade deve ser um número inteiro e existir na tabela "especialidades".
                'consulta_id' => 'required|', // O ID da especialidade deve ser um número inteiro e existir na tabela "especialidades".
                'motivo'      => 'required|string|min:3|max:255', // O tipo deve ser uma string com no máximo 255 caracteres.

            ], ([
                'utente_id.required' => 'O campo Especialidade é obrigatório.',
                'utente_id.integer'  => 'O campo Especialidade deve ser um número inteiro.',
                'utente_id.exists'   => 'A especialidade selecionada não existe.',
                'consulta_id.required' => 'O campo consulta é obrigatório.',
                'consulta_id.string'   => 'O campo consulta deve ser uma string.',
                'consulta_id.min'      => 'O campo consulta deve ter mais de 2 caracteres.',
                'motivo.max'           => 'O campo Tipo não pode ter mais de 255 caracteres.',
                'motivo.min'           => 'O campo deve ter mais de 3 caracteres.',

            ]));
            // dd($validated);
            $dados = SolicitarConsulta::create($validated);

            return redirect()->route('listar_consulta')->with('success', 'Consulta cadastrada com sucesso!');
        } catch (Exception $e) {
            return back()->with('error', 'Erro ao cadastrar consulta: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(SolicitarConsulta $solicitarConsulta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SolicitarConsulta $solicitarConsulta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SolicitarConsulta $solicitarConsulta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SolicitarConsulta $solicitarConsulta)
    {
        //
    }
}
