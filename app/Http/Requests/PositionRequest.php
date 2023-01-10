<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PositionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    public function rules()
    {
        return [
            'name' => 'required|min:3'
        ];
    }

    public function  messages()
    {
        $rules = [
            'name.required' => 'Position name is required',
        ];

        return $rules;
    }
}
