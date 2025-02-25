<?php

namespace App\Http\Controllers;

use App\Models\SolicitarExame;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;

class SolicitarExameController extends Controller
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

            // dd($request);

            $dados = SolicitarExame::where('utente_id', $request['utente_id'])->first();
            // dd($dados->id);

            if (!$dados) {
                $dados = SolicitarExame::create([
                    'user_id'   => auth()->id(),
                    'utente_id' => $request['utente_id'],
                    'exame_id'  => $request['exame_id'],
                ]);

                return  back()->with('success', 'cadastrado com sucesso!');

            } else {

                $criacao = $dados->created_at;
                $diferencaHoras = Carbon::now()->diffInHours($criacao);
                if ($diferencaHoras > 24) {

                    $dados = SolicitarExame::create([
                        'user_id'   => auth()->id(),
                        'utente_id' => $request['utente_id'],
                        'exame_id'  => $request['exame_id'],
                        'status'    => $request['status'],
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
    public function show(SolicitarExame $solicitarExame)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SolicitarExame $solicitarExame)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SolicitarExame $solicitarExame)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SolicitarExame $solicitarExame)
    {
        //
    }
}
