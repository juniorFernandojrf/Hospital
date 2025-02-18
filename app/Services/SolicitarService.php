<?php

namespace App\Services;

use App\Models\PessoalClinico;
use App\Models\User;
use App\Models\Utente;

class SolicitarService
{
    public function solicitar($id)
    {

        // Encontrar o Utente pelo ID
        $utente = Utente::where('id', $id)->get();
        $dados  = $utente->first();

        if ($dados->status == 'activo') {
            $dados->update([
                'status' => 'inactivo'
            ]);
        } elseif ($dados->status == 'inactivo') {
            $dados->update([
                'status' => 'concluido'
            ]);
        } 

        return $utente->save();
    }
}
