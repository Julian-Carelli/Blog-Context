<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'category_1' => 'string',
            'category_2' => 'string',
            'category_3' => 'string',
            'category_4' => 'string',
            'category_5' => 'string',
            'category_6' => 'string',
            'category_7' => 'string',
            'category_8' => 'string',
            'category_9' => 'string',
            'category_10' => 'string',
            'category_11' => 'string',
            'category_12' => 'string',
        ];
    }
}
