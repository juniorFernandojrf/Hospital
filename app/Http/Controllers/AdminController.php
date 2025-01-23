<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Admin.paginas.home_admin');
    }

    public function listar_exame(){
        return view('Admin.paginas.listar_exame');
    }

    public function listar_consulta(){
        return view('Admin.paginas.listar_consulta');
    }
    
    public function listar_pclinico(){
        return view('Admin.paginas.listar_pclinico');
    }

    public function listar_paciente(){
        return view('Admin.paginas.listar_paciente');
    }

    public function agendamento_consulta(){
        return view('Admin.paginas.agendamento_consulta');
    }

    public function agendamento_exames(){
        return view('Admin.paginas.agendamento_exame');
    }

    public function cadastro_pclinico(){
        return view('Admin.paginas.cadastro_pclinico');
    }

    public function especialidade(){
        return view('Admin.paginas.cadastrar_especialidade');
    }

    public function consultas(){
        return view('Admin.paginas.cadastro_consulta');
    }

    public function exames(){
        return view('Admin.paginas.cadastro_exames');
    }
}
