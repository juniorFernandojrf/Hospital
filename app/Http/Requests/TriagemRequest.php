<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TriagemRequest extends FormRequest
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
            'utente_id'        => 'required',
            'pressao_arterial' => 'required|string|max:10',
            'temperatura'      => 'required|min:2|max:45',
            'queixas_iniciais' => 'required|string|min:2|max:1000',
        ];
    }
}
