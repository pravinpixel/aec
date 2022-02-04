<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class ServiceCreateRequest extends FormRequest
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
            // 'service_name' =>  ['required', Rule::unique('services')->ignore($this->id)->whereNull('deleted_at')],
            // 'output_type_id' =>  ['required', Rule::unique('services')->ignore($this->id)->whereNull('deleted_at')],
        ];
    }
}
