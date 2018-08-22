<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'first_name'        => 'required',
            'last_name'         => 'required',
            'email'             => 'required',
            'short_description' => 'required',
            'description'       => 'required'
        ];
    }
}
