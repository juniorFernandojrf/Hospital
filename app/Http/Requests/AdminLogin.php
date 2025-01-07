<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminLogin extends FormRequest
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
            'email' => 'required|email|unique:users,email',
            'senha' => 'required|string|min:8|regex:/[a-z]/|regex:/[A-Z]/|regex:/[0-9]/|regex:/[@$!%*#?&]/',

        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'O campo email é obrigatório.',
            'email.email'    => 'O campo email deve ser um endereço de email válido.',
            'email.unique'   => 'Este email já está em uso.',
            'senha.required' => 'O campo senha é obrigatório.',
            'senha.string'   => 'O campo senha deve ser uma string.',
            'senha.min'      => 'O campo senha deve ter pelo menos 8 caracteres.',
            'senha.max'      => 'O campo senha não deve exceder 20 caracteres.',
            'senha.regex'    => 'A senha deve incluir letras maiúsculas, minúsculas, números e caracteres especiais.',
        ];
    }
}
