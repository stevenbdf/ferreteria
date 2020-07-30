<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CustomerRequest extends FormRequest
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
            'email' => ['nullable', 'email', Rule::unique('customers')->ignore($this->route('customer'))],
            'phone' => ['nullable', 'integer', 'digits:8'],
            'address' => ['nullable', 'string', 'between:3, 255'],
            'dui' => ['nullable', 'string', 'size:9'],
            'nit' => ['nullable', 'string', 'size:14'],
            'birthdate'  => ['nullable', 'date'],
            'registry_number' => ['nullable', 'integer'],
            'business_item' => ['nullable', 'string', 'between:3, 255']
        ];
    }
}
