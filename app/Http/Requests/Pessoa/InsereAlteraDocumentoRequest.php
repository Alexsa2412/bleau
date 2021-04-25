<?php

namespace App\Http\Requests\Pessoa;

use Illuminate\Foundation\Http\FormRequest;

class InsereAlteraDocumentoRequest extends FormRequest
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
             'numero' => 'required|max:20',
             'orgao_emissor' => 'max:255',
             'tipo_documento' => 'required|max:255'            
         ];         
     }

     public function messages()
    {
        return [
            'numero.required' => 'informe o número',
            'tipo_documento.required' => 'informe o tipo de documento'
        ];
    }
}
