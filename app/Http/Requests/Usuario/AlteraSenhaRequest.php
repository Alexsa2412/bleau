<?php

namespace App\Http\Requests\Usuario;

use Illuminate\Foundation\Http\FormRequest;

class AlteraSenhaRequest extends FormRequest
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
            'senhaatual' => 'required',
            'novasenha' => 'required',
            'confirmarsenha' => 'required|same:novasenha'
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'senhaatual.required' => 'Informe sua senha atual.',
            'novasenha.required' => 'Informe sua nova senha.',
            'confirmarsenha.required' => 'Informe a confirmação da nova senha.',
            'confirmarsenha.same' => 'A confirmação de nova senha deve ser igual a nova senha informada.'
        ];
    }
}
