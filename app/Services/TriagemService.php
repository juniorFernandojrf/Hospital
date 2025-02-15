<?php

namespace App\Services;

use App\Models\Triagem;

class TriagemService
{
    public function createTriagem($utente_id, $user_id, array $dados)
    {
        return Triagem::create([
            'utente_id'       => $utente_id,
            'user_id'         => $user_id,
            'pressaoArtirial' => $dados['pressaoArtirial'],
            'temperatura'     => $dados['temperatura'],
            'queixasInicias'  => $dados['queixasInicias'],
        ]);
    }

    
}
