<?php

namespace App\Http\Requests\admins;

use Illuminate\Foundation\Http\FormRequest;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class AdminsRequest extends FormRequest
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
        $supportedLanguages = LaravelLocalization::getSupportedLanguagesKeys();

        $rules = [];

        foreach ($supportedLanguages as $lang) {
            $rules["name"] = 'required';
            $rules["surname"] = 'required';
            $rules["login"] = 'required';
            $rules["password"] = 'required';
        }



        return $rules;
    }

    public function messages(): array
    {
        $customMessages = [];
        $customMessages["name.required"] = "The name field is required.";
        $customMessages["surname.required"] = "The surname field is required.";
        $customMessages["login.required"] = "The login field is required.";
        $customMessages["password.required"] = "The password field is required.";
        return $customMessages;
    }
}
