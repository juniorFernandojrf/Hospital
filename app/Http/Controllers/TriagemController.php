<?php

namespace App\Http\Controllers;

use App\Models\Triagem;
use App\Models\Utente;
use Illuminate\Http\Request;

class TriagemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('PClinico.Enfermeiro.paginas.listar.listar_pacientes');
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function listar()
    {        
        return view('PClinico.Enfermeiro.paginas.listar.listar_triagem');
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $userId = auth()->id();

        $dadosTriagem = Triagem::create();
    }
    
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $UtenteTriagem = Utente::find($id)->first();

        return view('PClinico.Enfermeiro.paginas.listar.detalhe_paciente', compact('UtenteTriagem'));       
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Triagem $triagem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Triagem $triagem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Triagem $triagem)
    {
        //
    }
}
