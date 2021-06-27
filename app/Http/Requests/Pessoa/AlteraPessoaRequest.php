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
            'profissao' => 'max:60',
            'data_de_nascimento' => 'date|date_format:dmY'
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'Informe seu nome.',
            'profissao.max' => 'A profissão deve ter um máximo de 60 caracteres.',
            'data_de_nascimento.date' => 'A data de nascimento deve ser uma data válida.',
            'data_de_nascimento' => 'A data de nascimento de ser uma data no padrão dd/mm/aaaa (dia, mês e ano).'
        ];
    }
}
