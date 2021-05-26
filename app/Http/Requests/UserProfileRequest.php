<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
class UserProfileRequest extends FormRequest
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
            "name"=>"required|min:5|max:30",
            "surname"=>"required|min:5|max:30"
        ];
    }

    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator) : void
    {
        throw new HttpResponseException(response()->json(["errors"=>$validator->errors()], 422));
    }
}
