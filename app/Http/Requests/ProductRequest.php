<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductRequest extends FormRequest
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
            'id' => ['required', 'string',  Rule::unique('products')->ignore($this->route('product'))],
            'department_id' => ['required', 'integer', 'exists:departments,id'],
            'supplier_id' => ['required', 'integer', 'exists:suppliers,id'],
            'description' => ['required', 'string', 'between:3, 255'],
            'image' => ['nullable','file', 'mimes:jpg,jpeg,png','max:200000'],
            'base_cost' => ['numeric'],
            'profit' => ['required','integer'],
            'price' => ['numeric']
        ];
    }
}
