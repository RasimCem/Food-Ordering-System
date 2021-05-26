<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
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
            'phone'=>'required|min:10|max:30',
            'country'=>'required|min:3|max:150',
            'city'=>'required|min:3|max:150',
            'district'=>'required|min:3|max:150',
            'street'=>'required|min:3|max:150',
            'address_description'=>'required|min:5|max:250'
        ];
    }
    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator) : void
    {
        throw new HttpResponseException(response()->json(["errors"=>$validator->errors()], 422));
    }
}
