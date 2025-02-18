<?php

namespace App\Services;

use App\Models\Atriagem;
use App\Models\Triagem;

class TriagemService
{
    public function createTriagem($request)
    {
        $Triagem = Atriagem::create([
            'user_id'           => auth()->id(),
            'utente_id'         => $request['utente_id'],
            'pressao_arterial'  => $request['pressao_arterial'],
            'temperatura'       => $request['temperatura'],
            'queixas_iniciais'  => $request['queixas_iniciais'],
        ]);

        return $Triagem;
    }

    public function updateTriagem(array $dados, $id)
    {
        $registro = Triagem::findOrFail($id);
        $registro->update($dados);
        return $registro;
    }
}
