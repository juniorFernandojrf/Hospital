<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConsultaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        // Permite que qualquer usuário faça esta solicitação.
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'especialidade_id' => 'required|', // O ID da especialidade deve ser um número inteiro e existir na tabela "especialidades".
            'tipo'             => 'required|string|min:3|nmax:255', // O tipo deve ser uma string com no máximo 255 caracteres.
            'status'           => 'required|', // O status deve ser um valor válido do enum ConsultaStatus.
        ];
    }

    /**
     * Custom messages for validation errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
                       
            'especialidade_id.required' => 'O campo Especialidade é obrigatório.',
            'especialidade_id.integer'  => 'O campo Especialidade deve ser um número inteiro.',
            'especialidade_id.exists'   => 'A especialidade selecionada não existe.',
            'tipo.required'             => 'O campo Tipo é obrigatório.',
            'tipo.string'               => 'O campo Tipo deve ser uma string.',
            'tipo.min'                  => 'O campo Tipo deve ter mais de 2 caracteres.',
            'tipo.max'                  => 'O campo Tipo não pode ter mais de 255 caracteres.',
            'status.required'           => 'O campo Status é obrigatório.',
            'status.enum'               => 'O campo Status possui um valor inválido.',
        
        ];
    }
}