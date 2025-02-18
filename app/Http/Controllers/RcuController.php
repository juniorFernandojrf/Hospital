<?php

namespace App\Http\Controllers;

use App\Models\Rcu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RcuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $UtenteTriagem = DB::table('utentes')
                            ->join('users', 'users.id', '=', 'utentes.user_id')
                            ->join('atriagems', 'atriagems.utente_id', '=', 'utentes.id') // Mantém apenas um JOIN
                            ->select('users.*', 'utentes.*', 'atriagems.*')
                            ->where('utentes.status', 'concluido')
                            ->get();

        return view('PClinico.Medico.paginas.home.home_admin', compact('UtenteTriagem'));
    }
    
    public function consulta($id)
    {
        return view('PClinico.Medico.paginas.listar.realizar_consulta');
    }
    
    
    public function listar()
    {
        return view('PClinico.Medico.paginas.listar.listar_consulta');
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
       return view('PClinico.Medico.paginas.listar.detalhe_paciente');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rcu $rcu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Rcu $rcu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rcu $rcu)
    {
        //
    }
}
