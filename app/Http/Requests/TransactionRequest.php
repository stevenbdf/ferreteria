<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransactionRequest extends FormRequest
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
            'user_id' => ['required', 'integer', 'exists:users,id'],
            'product_id' => ['required', 'string', 'exists:products,id'],
            'office_id' => ['required', 'integer', 'exists:offices,id'],
            'type' => ['required', 'boolean'],
            'description' => ['required', 'string', 'between:3, 255'],
            'quantity' => ['required', 'numeric'],
            'amount' => ['required', 'numeric']
        ];
    }
}
