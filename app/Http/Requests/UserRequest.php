<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'full_name' => ['required', 'string', 'between:3, 255'],
            'username' => ['required', 'string', 'between:3, 255'],
            'password' => ['required', 'string', 'confirmed', 'min:6'],
            'type' => ['required', 'boolean'],
            'phone' => ['required', 'integer', 'digits:8'],
            'dui' => ['required', 'string', 'size:9', 'unique:users'],
            'nit' => ['required', 'string', 'size:14', 'unique:users'],
            'email' => ['required', 'email', 'unique:users']
        ];
    }
}
