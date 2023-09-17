<?php

namespace App\Http\Requests\series;

use Illuminate\Foundation\Http\FormRequest;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class SeriesRequestUpdate extends FormRequest
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
            $rules["name.$lang"] = 'required|string|max:255';
            $rules["slug.$lang"] = 'required|string|max:255|regex:/^[a-zA-Z0-9\-_]+$/';
            $rules["poster"] = 'image|mimes:jpeg,jpg,png|max:2048';
            $rules["banner"] = 'image|mimes:jpeg,jpg,png|max:2048';
            $rules["ytrailer"] = 'required';
            $rules['release'] = 'required';
            $rules['movie_category_id'] = 'required';
            $rules['movie_home_category_id'] = 'required';
            $rules["countries.$lang"] = 'required';
            $rules["directors.$lang"] = 'required';
            $rules["scriptwriters.$lang"] = 'required';
            $rules["actors.$lang"] = 'required';
            $rules['release'] = 'required';
            $rules["desc.$lang"] = 'required';
        }

        return $rules;
    }

    public function messages(): array
    {
        $supportedLanguages = LaravelLocalization::getSupportedLanguagesKeys();

        $customMessages = [];

        foreach ($supportedLanguages as $lang) {
            $customMessages["name.$lang.required"] = "The name field for language $lang is required.";
            $customMessages["slug.$lang.required"] = "The slug field for language $lang is required.";
            $customMessages["slug.$lang.regex"] = "The slug field for language $lang must not contain spaces.";
            $customMessages["poster.image"] = "The poster must be an image.";
            $customMessages["poster.mimes"] = "The poster must be a valid image format (jpeg, jpg, png).";
            $customMessages["poster.max"] = "The poster may not be larger than 2048 kilobytes.";
            $customMessages["banner.image"] = "The banner must be an image.";
            $customMessages["banner.mimes"] = "The banner must be a valid image format (jpeg, jpg, png).";
            $customMessages["banner.max"] = "The banner may not be larger than 2048 kilobytes.";
            $customMessages["length.required"] = "The length field is required.";
            $customMessages["length.numeric"] = "The length must be a numeric value.";
            $customMessages["link.required"] = "The link field for language $lang is required.";
            $customMessages["ytrailer.required"] = "The YouTube trailer field is required.";
            $customMessages["movie_category_id.required"] = "The movie categories field is required.";
            $customMessages["release.required"] = "The release field is required.";
            $customMessages["movie_category_id.required"] = "The home categories field is required.";
            $customMessages["countries.$lang.required"] = "The countries field for language $lang is required.";
            $customMessages["directors.$lang.required"] = "The directors field for language $lang is required.";
            $customMessages["scriptwriters.$lang.required"] = "The scriptwriters field for language $lang is required.";
            $customMessages["actors.$lang.required"] = "The actors field for language $lang is required.";
            $customMessages["desc.$lang.required"] = "The description field for language $lang is required.";
        }
        return $customMessages;
    }
}
