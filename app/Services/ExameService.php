<?php

namespace App\Services;

use App\Models\Exame;

class ExameService
{

    public function createExame(array $dados)
    {
        
        return Exame::create([
            'especialidade_id' => $dados['especialidade_id'],
            'tipo'   => $dados['tipo'],
            'status' => $dados['status'],
        ]);
    }

    public function updateExame(array $dados, $especialidade)
    {
        return $especialidade->update([
            'nome'   => $dados['nome'],
            'estado' => $dados['estado'],
        ]);
    }

    public function destroyExame($especialidade)
    {
        return // Deleta o registro
            $especialidade->delete();
    }
}
