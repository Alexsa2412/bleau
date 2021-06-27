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
            'data_de_nascimento' => [
                'nullable',
                'date_format:"d/m/Y"'
            ],
            'profissao' => 'max:60'
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'O nome é obrigatório.',
            'nome.max' => 'o nome deve conter um máximo de 255 caracteres.',
            'data_de_nascimento.date_format' => 'A data de nascimento de ser uma data válida no padrão dd/mm/aaaa (dia, mês e ano).',
            'profissao.max' => 'A profissão deve ter um máximo de 60 caracteres.'
        ];
    }
}
