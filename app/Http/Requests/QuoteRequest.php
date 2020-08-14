<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuoteRequest extends FormRequest
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
            'customer_id' => ['required', 'integer', 'exists:customers,id'],
            'user_id' => ['required', 'integer', 'exists:users,id'],
            'details' => ['required', 'array', 'min:1'],
            'details.*.product_id' => ['required', 'string', 'exists:products,id'],
            'details.*.quantity' => ['required', 'numeric'],
            'details.*.sale_price' => ['required', 'numeric']
        ];
    }
}
