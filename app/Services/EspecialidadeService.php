<?php

namespace App\Services;

use App\Models\Especialidade;
use Illuminate\Support\Facades\Hash;

class EspecialidadeService
{

    public function createEspecidade(array $dados)
    {
        return  Especialidade::create([
            'nome'   => $dados['nome'],
            'estado' => $dados['estado'],
        ]);
    }

    public function updateEspecidade(array $dados, $especialidade)
    {
        return $especialidade->update([
            'nome'   => $dados['nome'],
            'estado' => $dados['estado'],
        ]);
    }

    public function destroy($especialidade)
    {
        return // Deleta o registro
        $especialidade->delete();
   
    }
}
