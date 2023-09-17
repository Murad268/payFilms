<?php

namespace App\Http\Requests\seasons;

use Illuminate\Foundation\Http\FormRequest;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class SeasonsRequest extends FormRequest
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
            $rules["season_name.$lang"] = 'required|string|max:255';
            $rules["slug.$lang"] = 'required|string|max:255|regex:/^[a-zA-Z0-9\-_]+$/';
        }
        return $rules;
    }

    public function messages(): array
    {
        $supportedLanguages = LaravelLocalization::getSupportedLanguagesKeys();

        $customMessages = [];

        foreach ($supportedLanguages as $lang) {
            $customMessages["season_name.$lang.required"] = "The name field for language $lang is required.";
            $customMessages["slug.$lang.required"] = "The slug field for language $lang is required.";
            $customMessages["slug.$lang.regex"] = "The slug field for language $lang must not contain spaces.";
        }
        return $customMessages;
    }
}
