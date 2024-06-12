<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDealRequest extends FormRequest
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
            'dish_id' => 'required|numeric',
            'price' => 'required|numeric'
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
            'dish_id' => [
                'required' => __('validation.required', ['attribute' => __('dish/shared.name')]),
                'numeric' => __('validation.string', ['attribute' => __('dish/shared.name')])
            ],
            'price' => [
                'required' => __('validation.required', ['attribute' => __('dish/deal.sale_price')]),
                'numeric' => __('validation.numeric', ['attribute' => __('dish/deal.sale_price')])
            ]
        ];
    }
}
