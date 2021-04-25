<?php

namespace App\Http\Requests\Pessoa;

use Illuminate\Foundation\Http\FormRequest;

class InsereAlteraEnderecoRequest extends FormRequest
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
             'logradouro' => 'required|max:120',
             'numero' => 'required|max:10',
             'complemento' => 'max:120',
             'bairro' => 'max:120',
             'cep' => 'required|max:15',
             'cidade_exterior' => 'max:255',
             'estado_exterior' => 'max:255',

             'pais_id' => 'required',
             
         ];         
 
     public function messages()
     {
         return [
             'email.required' => 'informe seu logradouro',
             'numero.required' => 'informe o número',
             'pais_id.required' => 'informe seu país'
         ];
     }
}
