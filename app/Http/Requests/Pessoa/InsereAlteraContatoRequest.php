<?php

namespace App\Http\Requests\Pessoa;

use Illuminate\Foundation\Http\FormRequest;

class InsereAlteraContatoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
     public function rules()
     {
         return [
             'numero' => 'required|max:20|',
             'tipo_contato' => 'required',
             
             'pais_id'=> 'required'
         ];
     }

     public function messages()
    {
        return [
            'numero.required' => 'informe o número do seu telefone',
            'tipo_contato.require' => 'informe o tipo deste contato',
            'pais_id.required' => 'informe o código de área do seu país'
        ];
    }
}
