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
            'nome' => 'required|max:255',
            'profissao' => 'max:60'
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'Informe seu nome'
        ];
    }
}
