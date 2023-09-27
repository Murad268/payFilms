<?php


namespace App\Http\Requests\headersliders;

use Illuminate\Foundation\Http\FormRequest;

class HeaderSliderRequest extends FormRequest
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

        $rules["img1"] = 'required|image|mimes:jpeg,jpg,png';
        $rules["img2"] = 'required|image|mimes:jpeg,jpg,png';
        $rules["img3"] = 'required|image|mimes:jpeg,jpg,png';
        $rules["img4"] = 'required|image|mimes:jpeg,jpg,png';
        $rules["default_img"] = 'required|image|mimes:jpeg,jpg,png';





        return $rules;
    }

    public function messages(): array
    {
        return [
            'img1.required' => 'Şəklin yüklənməsi mütləqdir.',
            'img2.required' => 'Şəklin yüklənməsi mütləqdir.',
            'img3.required' => 'Şəklin yüklənməsi mütləqdir.',
            'img4.required' => 'Şəklin yüklənməsi mütləqdir.',
            'default_img.required' => 'Şəklin yüklənməsi mütləqdir.',
            'image' => 'Yüklənən faylın şəkil tipində olmağı vacibdir.',
            'mimes' => 'Şəkil faylının formatı yalnızca jpeg, jpg veya png olmalıdır.',
        ];
    }
}
