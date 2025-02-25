<?php

namespace App\Http\Controllers;

use App\Models\Exame;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SiteController extends Controller
{
    public function index()
    {
        return view('layout.site.home');
    }

    public function portaInterno()
    {


        // $user = DB::table('users')
        //     ->join('utentes', 'users.id', '=', 'utentes.user_id')
        //     ->select('users.*', 'utentes.*')
        //     ->where('user.id', auth()->id())
        //     ->get();

        // $consulta = DB::table('consultas')
        //     ->join('especialidades', 'especialidades.id', '=', 'consultas.especialidade_id')
        //     ->select('consultas.*', 'especialidades.*')
        //     ->get();

        // $exame    = Exame::paginate(10);

        // $prescricao = DB::table('utentes')
        //     ->join('prescricaos', 'prescricaos.utente_id', '=', 'utentes.id')
        //     ->select('prescricaos.*')
        //     ->where('utentes.user_id', auth()->id())
        //     ->get();

        // $prescricao = DB::table('utentes')
        //     ->join('prescricaos',        'prescricaos.utente_id',         '=', 'utentes.id')
        //     ->join('diagnosticars',      'diagnosticars.utente_id',       '=', 'utentes.id')
        //     ->join('solicitar_consultas','solicitar_consultas.utente_id', '=', 'utentes.id')
        //     ->select('prescricaos.*', 'diagnosticars.*', 'solicitar_consultas.*',)
        //     ->where('utentes.user_id', auth()->id())
        //     ->get();

        // dd($user);

        return view('Paciente.paginas.realizar_consulta');
        
        // return view('Paciente.paginas.realizar_consulta', compact('exame', 'consulta', 'user',));
    }

    public function marcacao()
    {

        return "EM CONSTRUÇÂO";
    }
}
