<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCreditRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // in real app here will be placed properly logic for that
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'credit_borrower_name' => 'required|min:3|max:120',
            'credit_amount' => 'required|numeric|min:100|max:80000',
            'credit_period' => 'required|integer|between:3,120',
        ];
    }

    public function messages()
    {
        return [
            'credit_borrower_name.required' => 'Името на кредитополучателя е задължително',
            'credit_borrower_name.min'  => 'Името на кредитополучателя е твърде кратко',
            'credit_borrower_name.max'  => 'Името на кредитополучателя е твърде дълго',

            'credit_amount.required'  => 'Сумата за кредит е задължителна',
            'credit_amount.min'  => 'Сумата за кредит е минимум :min BGN',
            'credit_amount.max'  => 'Сумата за кредит е максимум :max BGN',
            'credit_amount.numeric'  => 'Сумата за кредит трябва да цяло число или число с точка разделител',

            'credit_period.required'  => 'Периода за кредит е задължителен',
            'credit_period.between'  => 'Периода за кредит е между 3 и 120 месеца',
            'credit_period.integer'  => 'Периода за кредит трябва да е цяло число.',
        ];
    }
}
