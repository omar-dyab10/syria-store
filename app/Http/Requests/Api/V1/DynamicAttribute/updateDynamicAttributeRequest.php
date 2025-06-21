<?php

namespace App\Http\Requests\Api\V1\DynamicAttribute;

use Illuminate\Foundation\Http\FormRequest;

class updateDynamicAttributeRequest extends FormRequest
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
            'category_id' => 'sometimes|required|exists:categories,id',
            'name_en' => 'sometimes|required|string|max:255',
            'name_ar' => 'sometimes|required|string|max:255',
        ];
    }
    public function messages(): array
    {
        return [
            'category_id.required' => 'The category field is required.',
            'category_id.exists' => 'The selected category is invalid.',
            'name_en.required' => 'The name field is required.',
            'name_en.string' => 'The name must be a string.',
            'name_en.max' => 'The name may not be greater than 255 characters.',
            'name_ar.required' => 'The name field is required.',
            'name_ar.string' => 'The name must be a string.',
            'name_ar.max' => 'The name may not be greater than 255 characters.',
        ];
    }
}
