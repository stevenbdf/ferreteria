<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OfficeRequest extends FormRequest
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
            'name' => ['required', 'string', 'between:3, 255'],
            'phone' => ['required', 'integer', 'digits:8'],
            'address'=> ['required', 'string', 'between:3, 255'],
            'invoice_correlative' => ['required', 'integer'],
            'fiscal_credit_correlative' => ['required', 'integer'],
            'registry_number' => ['required', 'integer'],
            'nit' => ['required', 'string', 'size:14']
        ];
    }
}
