<?php

namespace App\Http\Controllers;

use App\Models\Consulta;
use App\Models\Exame;
use App\Models\Rcu;
use App\Models\Utente;
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

        $UtenteTriagem = DB::table('utentes')
            ->join('users',       'users.id',              '=', 'utentes.user_id')
            ->join('atriagems',   'atriagems.utente_id',   '=', 'utentes.id')
            ->join('seguradoras', 'seguradoras.utente_id', '=', 'utentes.id')
            ->select('users.*',   'utentes.*', 'atriagems.*', 'seguradoras.*')
            ->where('atriagems.id', $id)
            ->first();

        $exame    = Exame::paginate(10);
        $consulta = DB::table('consultas')
            ->join('especialidades', 'especialidades.id', '=', 'consultas.especialidade_id')
            ->select('consultas.*', 'especialidades.*')
            ->get();

        $exameUser = DB::table('solicitar_exames')
            ->join('utentes', 'solicitar_exames.utente_id', '=', 'utentes.id')
            ->select('solicitar_exames.*',   'utentes.*')
            ->where('solicitar_exames.utente_id', $id)
            ->first();


        dd($id);


        return view('PClinico.Medico.paginas.listar.realizar_consulta', compact('UtenteTriagem', 'exame', 'consulta'));
    }


    public function listar()
    {
        $UtenteTriagem = DB::table('utentes')
            ->join('users',     'users.id',            '=', 'utentes.user_id')
            ->join('atriagems', 'atriagems.utente_id', '=', 'utentes.id') // Mantém apenas um JOIN
            ->select('users.*', 'utentes.*', 'atriagems.*')
            ->where('utentes.status', 'concluido')
            ->get();

        // dd($consulta->id); 

        return view('PClinico.Medico.paginas.listar.listar_consulta', compact('UtenteTriagem'));
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
