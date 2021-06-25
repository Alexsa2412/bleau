<?php

namespace App\Http\Requests\Convite;

use Illuminate\Foundation\Http\FormRequest;

class ConvidarRequest extends FormRequest
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
            'email_do_convidado' => 'required|email|unique:convite',
            'nome_do_convidado' => 'required|max:255'
        ];
    }

    public function messages()
    {
        return [
            'email_do_convidado.required' => 'Informe o e-mail do convidado.',
            'email_do_convidado.email' => 'Utilize um endereço de e-mail válido.',
            'email_do_convidado.unique' => 'Este e-mail já foi utilizado em outro convite.',
            'nome_do_convidado.required' => 'Informe o nome do convidado.',
            'nome_do_convidado.max' => 'Informe um máximo de 255 caracteres para o nome do convidado.'
        ];
    }
}
