<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCustomerDetailRequest extends FormRequest
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
            'first_name'      => 'required|min:3',
            'last_name'       => 'required|min:3',
            'company_name'    => ['required', Rule::unique('customers')->ignore($this->customer)],
            'organization_no' => 'required',
            'fax'             => 'max:8',
            'phone_no'        => 'max:20',
            'website'         => 'max:50',
            'mobile_no'       => ['required','regex:/^\d{8}$|^\d{12}$/'],
            'email'           => ['required',  Rule::unique('customers')->ignore($this->customer)],
        ];
    }

    public function messages()
    {
        return [
            'mobile_no.regex' => 'Enter digits between 8 to 12'
        ];
    }
}
