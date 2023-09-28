<?php

namespace App\Http\Requests\headersliders;

use Illuminate\Foundation\Http\FormRequest;

class HeaderSlidersUpdate extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function rules(): array
    {

        $rules = [];

        $rules["img1"] = 'image|mimes:jpeg,jpg,png';
        $rules["img2"] = 'image|mimes:jpeg,jpg,png';
        $rules["img3"] = 'image|mimes:jpeg,jpg,png';
        $rules["img4"] = 'image|mimes:jpeg,jpg,png';
        $rules["default_img"] = 'image|mimes:jpeg,jpg,png';





        return $rules;
    }

    public function messages(): array
    {
        return [
            'image' => 'Yüklənən faylın şəkil tipində olmağı vacibdir.',
            'mimes' => 'Şəkil faylının formatı yalnızca jpeg, jpg veya png olmalıdır.',
        ];
    }
}
