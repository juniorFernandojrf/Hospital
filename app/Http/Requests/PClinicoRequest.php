<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PClinicoRequest extends FormRequest
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
            'nome'  => 'required|string|max:255',
            'email' => 'required|email|max:255|',
            'telefone' => 'required|min:9|max:9',
            'sexo'     => 'required|in:Masculino,Feminino',
            'especialidade' => 'required|string|max:255',
            'categoria'     => 'required|string|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'nome.required' => 'O campo nome é obrigatório.',
            'nome.string'   => 'O campo nome deve conter apenas letras.',
            'nome.max'      => 'O nome deve ter no máximo 255 caracteres.',

            'email.required' => 'O campo e-mail é obrigatório.',
            'email.email'    => 'Insira um endereço de e-mail válido.',
            'email.max'      => 'O e-mail deve ter no máximo 255 caracteres.',
            'email.unique'   => 'Este e-mail já está cadastrado.',

            'telefone.required' => 'O campo telefone é obrigatório.',
            'telefone.digits'   => 'O telefone deve conter exatamente 9 dígitos.',

            'sexo.required' => 'O campo sexo é obrigatório.',
            'sexo.in'       => 'O sexo deve ser Masculino, Feminino ou Outro.',

            'especialidade.required' => 'O campo especialidade é obrigatório.',
            'especialidade.string'   => 'A especialidade deve conter apenas letras.',
            'especialidade.max'      => 'A especialidade deve ter no máximo 255 caracteres.',

            'categoria.required' => 'O campo categoria é obrigatório.',
            'categoria.string'   => 'A categoria deve conter apenas letras.',
            'categoria.max'      => 'A categoria deve ter no máximo 255 caracteres.',
        ];
    }
}
