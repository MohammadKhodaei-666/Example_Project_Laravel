<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            "title"=>['required','string','max:100'],
            "slug"=>['required','unique:categories','string'],
            "body"=>['required','string','max:255','nullable'],
            "parent_id"=>['numeric','nullable']
        ];
    }
}
