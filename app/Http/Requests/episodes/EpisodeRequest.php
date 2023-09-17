<?php

namespace App\Http\Requests\episodes;

use Illuminate\Foundation\Http\FormRequest;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class EpisodeRequest extends FormRequest
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
            $rules['episode_order'] = 'integer';
            $rules["episode_name.$lang"] = 'required|string|max:255';
            $rules["slug.$lang"] = 'required|string|max:255|regex:/^[a-zA-Z0-9\-_]+$/';
            $rules["length"] = 'required|numeric';
            $rules["link"] = 'required';
            $rules['release'] = 'required';
        }



        return $rules;
    }

    public function messages(): array
    {
        $supportedLanguages = LaravelLocalization::getSupportedLanguagesKeys();

        $customMessages = [];

        foreach ($supportedLanguages as $lang) {
            $customMessages["episode_order.required"] = __("The episode order field is required in $lang");
            $customMessages["episode_order.integer"] = __("The episode order must be an integer in $lang");
            $customMessages["episode_name.$lang.required"] = __("The episode name field is required in $lang");
            $customMessages["episode_name.$lang.string"] = __("The episode name must be a string in $lang");
            $customMessages["episode_name.$lang.max"] = __("The episode name may not be greater than 255 characters in $lang");
            $customMessages["slug.$lang.required"] = __("The slug field is required in $lang");
            $customMessages["slug.$lang.string"] = __("The slug must be a string in $lang");
            $customMessages["slug.$lang.max"] = __("The slug may not be greater than 255 characters in $lang");
            $customMessages["slug.$lang.regex"] = __("The slug format is invalid in $lang");
            $customMessages["length.required"] = __("The length field is required in $lang");
            $customMessages["length.numeric"] = __("The length must be a numeric value in $lang");
            $customMessages["link.required"] = __("The link field is required in $lang");
            $customMessages["release.required"] = "The release field is required.";
        }
        return $customMessages;
    }
}
