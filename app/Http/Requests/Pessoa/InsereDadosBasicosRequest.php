<?php

namespace App\Http\Requests\Pessoa;

use Illuminate\Foundation\Http\FormRequest;

class InsereDadosBasicosRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nome' => 'required|max:255',
            'senha' => 'required',
            'confirmarsenha' => 'required|same:senha',
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
            'senha.required' => 'Informe sua nova senha.',
            'confirmarsenha.required' => 'Informe a confirmação da nova senha.',
            'confirmarsenha.same' => 'A confirmação de nova senha deve ser igual a nova senha informada.',
            'data_de_nascimento.date_format' => 'A data de nascimento de ser uma data válida no padrão dd/mm/aaaa (dia, mês e ano).',
            'profissao.max' => 'A profissão deve ter um máximo de 60 caracteres.'
        ];
    }
}
