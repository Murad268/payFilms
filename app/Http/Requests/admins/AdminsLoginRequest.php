<?php

namespace App\Http\Requests\admins;

use Illuminate\Foundation\Http\FormRequest;

class AdminsLoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $rules = [];


        $rules["login"] = 'required';
        $rules["password"] = 'required';



        return $rules;
    }

    public function messages(): array
    {
        $customMessages = [];

        $customMessages["login.required"] = "The login field is required.";
        $customMessages["password.required"] = "The password field is required.";
        return $customMessages;
    }
}
