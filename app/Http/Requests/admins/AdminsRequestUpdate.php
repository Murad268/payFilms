<?php

namespace App\Http\Requests\admins;

use Illuminate\Foundation\Http\FormRequest;

class AdminsRequestUpdate extends FormRequest
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

            $rules["name"] = 'required';
            $rules["surname"] = 'required';
            $rules["login"] = 'required';



        return $rules;
    }

    public function messages(): array
    {
        $customMessages = [];
        $customMessages["name.required"] = "The name field is required.";
        $customMessages["surname.required"] = "The surname field is required.";
        $customMessages["login.required"] = "The login field is required.";
        return $customMessages;
    }
}
