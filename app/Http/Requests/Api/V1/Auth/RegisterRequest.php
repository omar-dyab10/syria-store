<?php

namespace App\Http\Requests\Api\V1\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Password::defaults()],
            'phone' => ['required', 'string', 'max:20'],
            'national_number' => ['required', 'string', 'max:20'],
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'first_name.required' => 'The first name field is required.',
            'first_name.string' => 'The first name must be a string.',
            'first_name.max' => 'The first name may not be greater than 255 characters.',
            'last_name.required' => 'The last name field is required.',
            'last_name.string' => 'The last name must be a string.',
            'last_name.max' => 'The last name may not be greater than 255 characters.',
            'email.required' => 'The email field is required.',
            'email.string' => 'The email must be a string.',
            'email.email' => 'The email must be a valid email address.',
            'email.max' => 'The email may not be greater than 255 characters.',
            'email.unique' => 'The email has already been taken.',
            'password.required' => 'The password field is required.',
            'password.confirmed' => 'The password confirmation does not match.',
            'phone.required' => 'The phone field is required.',
            'phone.string' => 'The phone must be a string.',
            'phone.max' => 'The phone may not be greater than 20 characters.',
            'national_number.required' => 'The national number field is required.',
            'national_number.string' => 'The national number must be a string.',
            'national_number.max' => 'The national number may not be greater than 20 characters.',
        ];
    }
}
