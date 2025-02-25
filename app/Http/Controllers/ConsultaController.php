<?php

namespace App\Http\Controllers;

use App\Http\Requests\ConsultaRequest;
use App\Http\Requests\UpdateConsultaRequest;
use App\Models\Consulta;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Exception;
use Illuminate\Support\Facades\DB;

class ConsultaController extends Controller
{
    /**
     * Exibe a listagem dos recursos.
     */
    public function index()
    {
        return view('Admin.paginas.cadastrar.cadastro_consulta');
    }

    /**
     * Lista todas as consultas cadastradas.
     */
    public function list()
    {
        $consultas = DB::table('especialidades')
            ->join('consultas', 'especialidades.id', '=', 'consultas.especialidade_id')
            ->select('especialidades.nome', 'consultas.*')
            ->get();

        // dd($consultas);

        return view('Admin.paginas.listar.listar_consulta', compact('consultas'));
    }

    /**
     * Armazena um novo recurso no banco de dados.
     */
    public function store(Request $request)
    {
        try {
            // dd($request->all());

            $validated = $request->validate([
                'especialidade_id' => 'required|', // O ID da especialidade deve ser um número inteiro e existir na tabela "especialidades".
                'tipo'             => 'required|string|min:3|max:255', // O tipo deve ser uma string com no máximo 255 caracteres.
                'status'           => 'required|', // O status deve ser um valor válido do enum ConsultaStatus.

            ],([
                'especialidade_id.required' => 'O campo Especialidade é obrigatório.',
                'especialidade_id.integer'  => 'O campo Especialidade deve ser um número inteiro.',
                'especialidade_id.exists'   => 'A especialidade selecionada não existe.',
                'tipo.required'             => 'O campo Tipo é obrigatório.',
                'tipo.string'               => 'O campo Tipo deve ser uma string.',
                'tipo.min'                  => 'O campo Tipo deve ter mais de 2 caracteres.',
                'tipo.max'                  => 'O campo Tipo não pode ter mais de 255 caracteres.',
                'status.required'           => 'O campo Status é obrigatório.',
                'status.enum'               => 'O campo Status possui um valor inválido.',

            ]));
            // dd($validated);
            $dados = Consulta::create($validated);

            return redirect()->route('listar_consulta')->with('success', 'Consulta cadastrada com sucesso!');
        } catch (Exception $e) {
            return back()->with('error', 'Erro ao cadastrar consulta: ' . $e->getMessage());
        }
    }

    /**
     * Exibe o recurso especificado.
     */
    public function show(Consulta $consulta)
    {
        // return view('Admin.paginas.consultas.mostrar', compact('consulta'));
    }

    /**
     * Exibe o formulário de edição do recurso.
     */
    public function edit(String $id)
    {
        $date = Consulta::findOrFail($id);
        // dd($date);

        // Retorna uma view com o formulário de edição
        return view('Admin.paginas.editar.editar_consulta', compact('date'));
    }

    /**
     * Atualiza o recurso especificado no banco de dados.
     */
    public function update(UpdateConsultaRequest $request, Consulta $consulta)
    {
        try {
            $validated = $request->validated();

            $consulta->update($validated);

            return redirect()->route('consultas.index')->with('success', 'Consulta atualizada com sucesso!');
        } catch (Exception $e) {
            return back()->with('error', 'Erro ao atualizar consulta: ' . $e->getMessage());
        }
    }

    /**
     * Remove o recurso especificado do banco de dados.
     */
    public function destroy($consulta)
    {
        try {
            $date = Consulta::findOrFail($consulta);
            $date->delete();

            return redirect()->route('listar_consulta')->with('success', 'Consulta excluída com sucesso!');
        } catch (Exception $e) {
            return back()->with('error', 'Erro ao excluír consulta: ' . $e->getMessage());
        }
    }
}
