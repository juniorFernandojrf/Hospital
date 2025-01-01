<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'nome' => 'required|string|max:255',
            'telefone' => 'required|string|min:9|max:15',
            'email' => 'required|email|unique:users,email',
            'senha' => 'required|string|min:8|confirmed|regex:/[a-z]/|regex:/[A-Z]/|regex:/[0-9]/|regex:/[@$!%*#?&]/',
            'sexo' => 'required|string',
            'dataAniversario' => 'required|date',
            'morada' => 'required|string|max:255',
            'localizacao' => 'required|string|max:255',
            'estadoCivil' => 'required|string',
            'codigoPostal' => 'required|numeric|min:1000|max:999999',
            'entidadeFinanceira' => 'nullable|string|max:255',
            'numeroUtente' => 'nullable|string|max:255',
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'O campo nome é obrigatório.',
            'nome.string'   => 'O campo nome deve ser uma string.',
            'nome.max'      => 'O campo nome não deve exceder 255 caracteres.',
            'nome.min'      => 'O campo nome deve ter pelo menos 2 caracteres.',
            'email.required'=> 'O campo email é obrigatório.',
            'email.email'   => 'O campo email deve ser um endereço de email válido.',
            'email.unique'  => 'Este email já está em uso.',
            'senha.required' => 'O campo senha é obrigatório.',
            'senha.string'   => 'O campo senha deve ser uma string.',
            'senha.min'      => 'O campo senha deve ter pelo menos 8 caracteres.',
            'senha.max'      => 'O campo senha não deve exceder 20 caracteres.',
            'senha.regex'    => 'A senha deve incluir letras maiúsculas, minúsculas, números e caracteres especiais.',
            "dataAniversario.before" => "A data de aniversário deve ser anterior a hoje.",
            "estadoCivil.in" => "O estado civil deve ser: solteiro, casado, divorciado ou viúvo.",
        ];
    }
}
