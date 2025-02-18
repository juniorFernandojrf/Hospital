<?php

namespace App\Services;

use App\Models\PessoalClinico;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PClinicoService
{
    public function cadastrarPClinico($user, $especialidade, $numOrdem)
    {
        // Criar o registro de pessoal clínico
        $pessoalClinico = new PessoalClinico();

        $pessoalClinico->user_id = $user;
        $pessoalClinico->especialidade_id = $especialidade;
        $pessoalClinico->numOrdem = $numOrdem;
        $pessoalClinico->save();
    }

    public function actualizarPClinico($id, $dataValidated)
    {
        // Buscar o pessoal clínico pelo ID
        $pessoalClinico = PessoalClinico::findOrFail($id);

        // Atualizar os dados do usuário
        $pessoalClinico->user->update([
            'name'  => $dataValidated['nome'],
            'email' => $dataValidated['email'],
        ]);

        // Atualizar os dados do pessoal clínico
        $pessoalClinico->update([
            'especialidade_id' => $dataValidated['especialidade'],
        ]);
    }

    function verificarPessoalClinico()
    {
        // Obtém o usuário autenticado
        $user = Auth::user();

        if (!$user) {
            return "Usuário não autenticado.";
        }

        $adm = User::where('id', $user->id)->first();
        if($adm->nome == 'admin') {
            return redirect()->route('pclinico')->with('success', 'Login realizado com sucesso.');
        }

        // Verifica se o usuário autenticado está associado a um PessoalClinico
        $pessoalClinico = PessoalClinico::where('user_id', $user->id)->first();

        if (!$pessoalClinico) {
            // Redireciona o usuário para a página inicial com uma mensagem de sucesso
            return redirect()->intended(route('inicio'))->with('success', 'Login realizado com sucesso.');
        }

        // Verifica se e um medico ou enfermeiro ou recpcionista
        if (str_starts_with($pessoalClinico->numOrdem, 'MED')) {
            return redirect()->route('consulta_listar')->with('success', 'Login realizado com sucesso.');
        } elseif (str_starts_with($pessoalClinico->numOrdem, 'ENF')) {
            return redirect()->route('triagem_index')->with('success', 'Login realizado com sucesso.');
        } elseif (str_starts_with($pessoalClinico->numOrdem, 'RECP')) {
            return redirect()->route('atendimento_index')->with('success', 'Login realizado com sucesso.');
        }

        return redirect()->intended(route('inicio'))->with('success', 'Login realizado com sucesso.');

    }
}
