<?php

namespace App\Http\Requests\advers;

use Illuminate\Foundation\Http\FormRequest;

class CreateAdversRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function rules(): array
    {

        $rules = [];

        $rules["banner"] = 'image|mimes:jpeg,jpg,png';
        $rules['link'] = 'required';





        return $rules;
    }

    public function messages(): array
    {
        return [
            'banner.required' => 'Şəklin yüklənməsi mütləqdir.',
            'link.required' => 'Linkin verilməsi mütləqdir',
            'default_img.required' => 'Şəklin yüklənməsi mütləqdir.',
            'image' => 'Yüklənən faylın şəkil tipində olmağı vacibdir.',
            'mimes' => 'Şəkil faylının formatı yalnızca jpeg, jpg veya png olmalıdır.',
        ];
    }
}
