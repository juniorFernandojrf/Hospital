<?php

namespace App\Http\Controllers;

use App\Models\Atendimento;
use Illuminate\Http\Request;

class AtendimentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dateAtend = Atendimento::paginate(10);

        return view('PClinico.Recepcionista.paginas.listar.listar_paciente', compact('dateAtend'));
    
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('PClinico.Recepcionista.paginas.cadastrar.cadastrar_paciente');
        
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

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Atendimento $atendimento)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Atendimento $atendimento)
    {
        //
    }
    
    public function consuta() {

        return view('PClinico.Recepcionista.paginas.agendar.agendamento_consulta');
    }

    public function exame() {
        return view('PClinico.Recepcionista.paginas.agendar.agendamento_exame');
    }
}
