<?php

namespace App\Http\Controllers;

use App\Models\Prescricao;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;

class PrescricaoController extends Controller
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

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            // dd($request->all());

            $validated = $request->validate([
                'utente_id'    => 'required|', // O ID da especialidade deve ser um número inteiro e existir na tabela "especialidades".
                'medicamento'  => 'required|string|min:3|max:255', // O tipo deve ser uma string com no máximo 255 caracteres.
                'duracao'      => 'required|string|min:3|max:255', // O tipo deve ser uma string com no máximo 255 caracteres.
                'observacao'   => 'required|string|min:3|max:255', // O tipo deve ser uma string com no máximo 255 caracteres.

            ], ([
                'utente_id.required'    => 'O campo Especialidade é obrigatório.',
                'medicamento.required'  => 'O campo é obrigatório.',
                'medicamento.string'    => 'O campo deve ser uma string.',
                'medicamento.min'       => 'O campo deve ter mais de 2 caracteres.',
                'medicamento.max'       => 'O campo Tipo não pode ter mais de 255 caracteres.',
                'duracao.required'      => 'O campo é obrigatório.',
                'duracao.string'        => 'O campo deve ser uma string.',
                'duracao.min'           => 'O campo deve ter mais de 2 caracteres.',
                'duracao.max'           => 'O campo Tipo não pode ter mais de 255 caracteres.',
                'observacao.required'   => 'O campo é obrigatório.',
                'observacao.string'     => 'O campo deve ser uma string.',
                'observacao.min'        => 'O campo deve ter mais de 2 caracteres.',
                'observacao.max'        => 'O campo Tipo não pode ter mais de 255 caracteres.',

            ]));
            // dd($validated);

            $dados = Prescricao::where('utente_id', $validated['utente_id'])->first();
            // dd($dados->id);

            if (!$dados) {
                $dados = Prescricao::create([
                    'user_id'     => auth()->id(),
                    'utente_id'   => $validated['utente_id'],
                    'medicamento' => $validated['medicamento'],
                    'duracao'     => $validated['duracao'],
                    'Observacao'  => $validated['observacao'],
                ]);

                return  back()->with('success', 'cadastrado com sucesso!');

            } else {

                $criacao = $dados->created_at;
                $diferencaHoras = Carbon::now()->diffInHours($criacao);
                if ($diferencaHoras > 24) {

                    $dados = Prescricao::create([
                        'user_id'      => auth()->id(),
                        'utente_id'    => $validated['utente_id'],
                        'medicamento'  => $validated['medicamento'],
                        'duracao'      => $validated['duracao'],
                        'Observacao'   => $validated['Observacao'],
                    ]);
                }else {
                    return back()->with('error', 'Ja possui um Diagnostico');

                }
            }
            // dd($dados);

            return  back()->with('success', 'cadastrada com sucesso!');
        } catch (Exception $e) {
            return back()->with('error', 'Erro ao cadastrar Prescrição: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Prescricao $prescricao)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Prescricao $prescricao)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Prescricao $prescricao)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Prescricao $prescricao)
    {
        //
    }
}
