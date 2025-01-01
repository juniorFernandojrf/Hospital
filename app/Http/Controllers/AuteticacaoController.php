<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\Login;
use Illuminate\Http\Request;

class AuteticacaoController extends Controller
{    

    /**
     * Metodo que Cadastra o usuario na Base dados
     *  
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function cadastrar(Request $request)
    {
        // verifica se a passe sao iguais  
        if ($request->password == $request->confirmPassword) {

            $input = $request->all();
            return redirect()->intended(route('login'))->with('login', 'Usuario Cadastrado com Sucesso !');
        } else {
            return redirect()->back()->with('erro', 'Email ou Senha invalida !');
        };

        return;
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
