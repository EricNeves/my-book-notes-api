<?php

namespace App\Adapters\Web\Controllers\User\RegisterUser;

use Illuminate\Foundation\Http\FormRequest;

class RegisterUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:4',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'     => 'The name field is required.',
            'name.string'       => 'The name must be a string.',
            'name.max'          => 'The name may not be greater than 255 characters.',
            'email.required'    => 'The email field is required.',
            'email.string'      => 'The email must be a string.',
            'email.max'         => 'The email may not be greater than 255 characters.',
            'email.email'       => 'The email must be a valid email address.',
            'email.unique'      => 'The email already exists.',
            'password.required' => 'The password field is required.',
            'password.string'   => 'The password must be a string.',
            'password.min'      => 'The password must be at least 4 characters.',
        ];
    }
}
