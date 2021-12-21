<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCustomerRequest extends FormRequest
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
            'company_name'   => 'required',
            'contact_person' => 'required',
            'mobile_no'      => 'required|regex:/^([0-9\s\-\+\(\)]*)$/',
            'email'          => 'required|unique:customers|email',
            'user_name'      => 'required'
        ];
    }
}
