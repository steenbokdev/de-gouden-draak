<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDishRequest extends FormRequest
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
            'menu_number' => 'nullable|numeric',
            'menu_addition' => 'nullable|string',
            'name' => 'required|string',
            'price' => 'nullable|numeric|min:0',
            'category' => 'nullable|string',
            'description' => 'nullable|string'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'menu_number.numeric' => __('validation.numeric', ['attribute' => __('dish/shared.menu_number')]),
            'menu_addition.string' => __('validation.string', ['attribute' => __('dish/shared.menu_addition')]),
            'name' => [
                'required' => __('validation.required', ['attribute' => __('dish/shared.name')]),
                'string' => __('validation.string', ['attribute' => __('dish/shared.name')])
            ],
            'price' => [
                'numeric' => __('validation.numeric', ['attribute' => __('dish/shared.price')]),
                'min' => __('validation.min', ['attribute' => __('dish/shared.price'), 'min' => '0'])
            ],
            'category.string' => __('validation.string', ['attribute' => __('dish/shared.category')]),
            'description.string' => __('validation.string', ['attribute' => __('dish/shared.description')])
        ];
    }
}
