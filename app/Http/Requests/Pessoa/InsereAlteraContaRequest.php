<?php

namespace App\Http\Requests\Pessoa;

use Illuminate\Foundation\Http\FormRequest;

class InsereAlteraContaRequest extends FormRequest
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

            'agencia' => 'required|max:10',
            'numero' => 'required|max:20',
            'operacao' => 'max:12',
            'tipo' => 'required',
            'pix' => 'max:20',
            'banco_id'=> 'required'
        ];
    }

    public function messages()
    {
        return [
            'agencia.required' => 'número da agência requerido',
            'numero.require' => 'número da conta requerida',
            'tipo.required' => 'informe se é conta corrente ou poupança'
        ];
    }

    public function attributes()
    {
        return [
            'banco_id' => 'banco',
            'tipo' => 'tipo de conta'
        ];
    }
}
