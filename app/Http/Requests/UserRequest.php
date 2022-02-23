<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            "name"=>['string','max:255','min:2'],
            "phone"=>['numeric','digits:11'],
            "password"=>['string','min:8','confirmed']
        ];
    }
}
