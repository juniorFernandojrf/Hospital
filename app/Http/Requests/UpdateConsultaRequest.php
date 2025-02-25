<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateConsultaRequest extends FormRequest
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
            'especialidade_id' => ['required', 'integer', 'exists:especialidades,id'], // O ID da especialidade deve ser um número inteiro e existir na tabela "especialidades".
            'tipo'             => ['required', 'string', 'max:255'], // O tipo deve ser uma string com no máximo 255 caracteres.
            'status'           => ['required', Rule::in(['Ativo', 'Desativo'])], // O status deve ser 'Ativo' ou 'Desativo'.
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
            'tipo.max'                  => 'O campo Tipo não pode ter mais de 255 caracteres.',
            'status.required'           => 'O campo Status é obrigatório.',
            'status.in'                 => 'O campo Status possui um valor inválido.',
        ];
    }
}