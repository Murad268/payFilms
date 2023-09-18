<?php

namespace App\Http\Requests\register;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class LoginRequest extends FormRequest
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
        return [
            'email' => ['required', 'email'],
            'password' => [
                'required'
            ],
        ];
    }



    public function messages(): array
    {
        return [
            'email.required' => 'E-poçt ünvanı mütləqdir.',
            'email.email' => 'Düzgün e-poçt ünvanı daxil edin.',
            'password.required' => 'Şifrə sahəsi mütləqdir.',
        ];
    }
}
