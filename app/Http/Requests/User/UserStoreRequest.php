<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //Libera qualquer requiquisição
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|string|confirmed',
            'image' => 'required|file|mimetypes:image/jpeg,image/jpg,image/png|image:jpg,jpeg,png',
            'street' => 'required|string',
            'number' => 'required|string',
            'term' => 'accepted'
        ];
    }

    public function messages()
    {
        return [
            'name.string' => 'O nome deve ser uma string!', //aqui especificamos a validação para todo campo name
            'required' => 'Esse campo é obrigatório', //aqui deixamos amplo
            'email' => 'Esse campo deve ser um email',
            'string' => 'Esse campo deve ser uma string!',
            'term.accepted' => 'Para criar um usuário é necessário aceitar os termos de uso'
        ];
    }
}
