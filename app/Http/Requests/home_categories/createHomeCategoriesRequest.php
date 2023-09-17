<?php

namespace App\Http\Requests\home_categories;

use Illuminate\Foundation\Http\FormRequest;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class createHomeCategoriesRequest extends FormRequest
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
            $rules["cat_name.$lang"] = 'required|string|max:255';
            $rules["slug.$lang"] = 'required|string|max:255|regex:/^[a-zA-Z0-9\-_]+$/';
        }



        return $rules;
    }

    public function messages(): array
    {
        $supportedLanguages = LaravelLocalization::getSupportedLanguagesKeys();

        $customMessages = [];

        foreach ($supportedLanguages as $lang) {
            $customMessages["cat_name.$lang.required"] = "The name field for language $lang is required.";
            $customMessages["slug.$lang.required"] = "The slug field for language $lang is required.";
            $customMessages["slug.$lang.regex"] = "The slug field for language $lang must not contain spaces.";
        }


        return $customMessages;
    }
}
