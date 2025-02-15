<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email'    => 'required|email',
            // 'telefone' => 'required|string|min:9|max:9',
            'senha'    => 'required|string|min:8|regex:/[a-z]/|regex:/[A-Z]/|regex:/[0-9]/|regex:/[@$!%*#?&]/',
        ];
    }

    public function messages()
    {
        return [
            'telefone.required' => 'O campo telefone é obrigatório.',
            'telefone.string'   => 'O campo telefone deve ser uma string.',
            'telefone.max'      => 'O campo telefone não deve exceder 9 caracteres.',
            'telefone.min'      => 'O campo telefone deve ter pelo menos 9 caracteres.',
            'senha.required' => 'O campo senha é obrigatório.',
            'senha.string'   => 'A Senha ou telefone Invalido.',
            'senha.min'      => 'A Senha ou telefone Invalido.',
            'senha.max'      => 'A Senha ou telefone Invalido.',
            'senha.regex'    => 'A Senha ou telefone Invalido.',
        ];
    }
}
