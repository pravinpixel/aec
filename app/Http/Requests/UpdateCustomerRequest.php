<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCustomerRequest extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'company_name'    => 'required',
            'organization_no' => 'required',
            'contact_person'  => 'required',
            'mobile_number'   => 'required|regex:/^([0-9\s\-\+\(\)]*)$/',
            'email'           => ['required', 'unique', Rule::unique('customers')->ignore($this->enquiry, 'id')],
            'enquiry_date'    => 'required',
            'user_name'       => 'required'
        ];
    }
}
