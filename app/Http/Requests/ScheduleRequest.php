<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ScheduleRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'post'     => 'required',
            'channel'  => 'required',
            'datetime' => 'required|date'
        ];
    }
}
