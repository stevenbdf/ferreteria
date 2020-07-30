<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SupplierRequest extends FormRequest
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
            'name' => ['string', 'between:3, 255'],
            'phone' => ['nullable', 'integer', 'digits:8'],
            'email' => ['nullable', 'email', Rule::unique('suppliers')->ignore($this->route('supplier'))],
            'address' => ['nullable', 'string', 'between:3, 255'],
            'nit' => ['nullable', 'string', 'size:14'],
            'registry_number' => ['nullable', 'integer']
        ];
    }
}
