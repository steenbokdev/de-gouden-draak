<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
{
    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        $dishes = $this->get('dishes');

        if ($dishes === null) {
            $dishes = [];
        }

        foreach ($dishes as $key => $dish) {
            $dishes[$key] = json_decode($dish, true);
        }

        $this->merge([
            'dishes' => $dishes,
        ]);
    }

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
            'dishes' => 'required|array',
            'dishes.*' => 'required|array',
            'dishes.*.amount' => 'integer|max:10|min:1',
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
            'dishes.required' => __('customer/order.validation.dishes.required'),
            'dishes.*.required' => __('customer/order.validation.dishes.required'),
            'dishes.*.amount.max' => __('customer/order.validation.dishes.amount.max'),
            'dishes.*.amount.min' => __('customer/order.validation.dishes.amount.min'),
        ];
    }
}
