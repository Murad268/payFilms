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
            $rules["address.$lang"] = 'required|string';
        }

        $rules['icon'] = 'image|mimes:jpeg,jpg,png|max:2048';
        $rules['logo'] = 'image|mimes:jpeg,jpg,png|max:2048';
        $rules['email'] = 'required|email';
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
            $customMessages["title.$lang.required"] = "Dil $lang üçün başlıq sahəsi tələb olunur.";
            $customMessages["desc.$lang.required"] = "Dil $lang üçün təsvir sahəsi tələb olunur.";
            $customMessages["copywrite.$lang.required"] = "Dil $lang üçün müəlliflik sahəsi tələb olunur.";
            $customMessages["keywords.$lang.required"] = "Dil $lang üçün açar sözlər sahəsi tələb olunur.";
            $customMessages["address.$lang.required"] = "Dil $lang üçün ünvan sahəsi tələb olunur.";
        }

        $customMessages['icon.image'] = 'İkon şəkil olmalıdır.';
        $customMessages['icon.mimes'] = 'İkon jpeg, jpg və ya png faylı olmalıdır.';
        $customMessages['icon.max'] = 'İkon 2048 kilobaytdan böyük olmamalıdır.';
        $customMessages['logo.image'] = 'Logo şəkil olmalıdır.';
        $customMessages['logo.mimes'] = 'Logo jpeg, jpg və ya png faylı olmalıdır.';
        $customMessages['logo.max'] = 'Logo 2048 kilobaytdan böyük olmamalıdır.';

        $customMessages['email.required'] = 'E-poçt sahəsi tələb olunur.';
        $customMessages['email.email'] = 'Düzgün bir e-poçt ünvanı daxil edin.';
        $customMessages['phone.required'] = 'Telefon sahəsi tələb olunur.';
        $customMessages['facebook.required'] = 'Facebook sahəsi tələb olunur.';
        $customMessages['instagram.required'] = 'Instagram sahəsi tələb olunur.';
        $customMessages['linkedin.required'] = 'LinkedIn sahəsi tələb olunur.';
        $customMessages['twitter.required'] = 'Twitter sahəsi tələb olunur.';

        return $customMessages;
    }
}
