<?php

namespace App\Http\Requests\Pessoa;

use Illuminate\Foundation\Http\FormRequest;

class AlteraPessoaRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->check();
    }

    public function rules()
    {
        return [
            'email' => 'required|unique:pessoa,email|max:255|email:rfc,dns',
            'nome' => 'required|max:255',
            'profissao' => 'max:60'
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'informe seu e-mail',
            'email.unique' => 'este e-mail não está disponível para uso',
            'nome.required' => 'informe seu nome'
        ];
    }
}
