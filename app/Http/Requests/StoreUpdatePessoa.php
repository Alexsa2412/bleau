<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdatePessoa extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nome' => ['required', 'min:3', 'max:160'],
            'email' => ['email:rfc,dns' ,'required', 'min:3', 'max:160'],
            'fone1' =>  ['min:3', 'max:15'],
            'foto' =>  ['image', 'max:3096'],            
            'data_nasc'=> ['date'],
            'nacionalidade' => [],
            'profissao'=> [],
            'fone1'=> [],
            'fone2'=> [],
            'CPF'=> [],
            'RG_NUM'=> [],
            'org_emiss'=> [],
            'uf_org'=> [],
            'passaporte'=> [],
            'logradouro'=> ['min:3', 'max:120'],
            'numero'=> [],
            'complemento'=> [],
            'bairro'=> [],
            'cidade'=> [],
            'estado'=> [],
            'CEP'=> [],
            'pais'=> [],
            'situacao'=> [],
            'aportado'=> [], 
            'banco'=> [],
            'agencia'=> [],
            'conta_corrente'=> [],
            'tipo_operacao'=> [],
            'tipo_conta'=> [],
            'Conta Corrente'=> [],
            'Poupança'=> [],
            'Conta Corrente'=> [],
            'pix'=> [],




        ];
    }
}
