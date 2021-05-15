<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
class UserRegistrationRequest extends FormRequest
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
            'name'=>'required|max:20|min:2',
            'surname'=>'required|min:3|max:30',
            'mail'=>'required|max:100|email|unique:users',
            'password'=>'required|max:100|min:5',
            'password2'=>'required|same:password',

        ];
    }
    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator) : void
    {
        throw new HttpResponseException(response()->json(["errors"=>$validator->errors()], 422));
    }



}
