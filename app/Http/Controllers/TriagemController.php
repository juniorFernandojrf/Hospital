<?php

namespace App\Http\Controllers;

use App\Models\Triagem;
use Illuminate\Http\Request;

class TriagemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dateTriag = Triagem::paginate(10);

        return view('PClinico.Enfermeiro.paginas.listar.listar_triagem', compact('dateTriag'));
    
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('PClinico.Enfermeiro.paginas.cadastrar.cadastrar_triagem');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Triagem $triagem)
    {
        //
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
