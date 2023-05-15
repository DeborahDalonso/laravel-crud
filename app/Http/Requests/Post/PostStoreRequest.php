<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class PostStoreRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'user_id' => 'required|integer|exists:user,id', //para criar o post ele verifica se o user associado realmente existe, cria uma consulta na tabela user, como a consulta é em outra tabela que não a de post é necessario passar o campo da busca (id)
            'title' => 'required|string|unique:posts', //aqui tbm é feita uma query para consultar se o titulo é unico, como o campo title pertence a tabela posts não é necessario especificar o nome da coluna de pesquisa
            'content' => 'required|string|max:1000'
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Esse campo é obrigatorio!',
            'string' => 'Esse campo é do tipo texto',
            'integer' => 'Esse campo é do tipo inteiro numerico!',
            'content.max' => 'O numero maximo de caracteres é 1000',
            'title.unique' => 'Não pode haver dois posts com o mesmo nome',
            'user_id' => 'Não há usuário para associar ao post, vacilão!'
        ];
    }
}
