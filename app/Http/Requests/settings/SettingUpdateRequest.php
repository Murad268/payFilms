<?php

namespace App\Http\Requests\settings;

use Illuminate\Foundation\Http\FormRequest;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class SettingUpdateRequest extends FormRequest
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
            $rules["title.$lang"] = 'required|string';
            $rules["desc.$lang"] = 'required|string';
            $rules["copywrite.$lang"] = 'required|string';
            $rules["keywords.$lang"] = 'required|string';
        }

        $rules['icon'] = 'image|mimes:jpeg,jpg,png|max:2048';
        $rules['logo'] = 'image|mimes:jpeg,jpg,png|max:2048';
        $rules['phone'] = 'required';
        $rules['facebook'] = 'required';
        $rules['instagram'] = 'required';
        $rules['linkedin'] = 'required';
        $rules['twitter'] = 'required';





        return $rules;
    }

    public function messages()
    {
        $supportedLanguages = LaravelLocalization::getSupportedLanguagesKeys();

        $customMessages = [];

        foreach ($supportedLanguages as $lang) {
            $customMessages["title.$lang.required"] = "The title field for language $lang is required.";
            $customMessages["desc.$lang.required"] = "The desc field for language $lang is required.";
            $customMessages["copywrite.$lang.required"] = "The copywrite field for language $lang is required.";
            $customMessages["keywords.$lang.required"] = "The keywords field for language $lang is required.";
        }

        $customMessages['icon.image'] = 'The icon must be an image.';
        $customMessages['icon.mimes'] = 'The icon must be a jpeg, jpg, or png file.';
        $customMessages['icon.max'] = 'The icon may not be greater than 2048 kilobytes in size.';
        $customMessages['logo.image'] = 'The logo must be an image.';
        $customMessages['logo.mimes'] = 'The logo must be a jpeg, jpg, or png file.';
        $customMessages['logo.max'] = 'The logo may not be greater than 2048 kilobytes in size.';
        return $customMessages;
    }
}
