<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'title' => 'required|unique:posts|min:10|max:60',
            'content' => 'required|min:500|max:5000',
            'category_id' => 'requried',
            'status_posts_id' => 'status_posts'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Titulo: Require un titulo de por lo menos 10 caracteres',
            'title.min:10' => 'Titulo: Require un titulo de por lo menos 10 caracteres',
            'title.max:60' => 'Titulo: El titulo se puede extender hasta 60 caracteres',
            'title.unique' => 'Titulo: Este ya esta siendo utilizado, escribe otro',
            'content.required' => 'Contenido: Require un contenido de por lo menos 500 caracteres',
            'content.min:500' => 'Contenido: Require un contenido de por lo menos 500 caracteres',
            'content.max:5000' => 'Contenido: El contenido se puede extender hasta 5000 caracteres',
            'category_id.required' => 'Categoria: Seleccione alguna categoria para este post'
        ];
    }
}
