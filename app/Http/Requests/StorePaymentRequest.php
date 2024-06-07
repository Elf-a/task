<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePaymentRequest extends FormRequest
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
            'unique_credit_id' => 'required|exists:credits,unique_credit_id',
            'transaction_amount' => 'required|numeric|min:1'
        ];
    }

    public function messages()
    {
        return [
            'unique_credit_id.required' => 'Моля, изберете от списъка с кредити.',
            'unique_credit_id.exists'  => 'Кредита несъществува',

            'transaction_amount.required'  => 'Сумата по кредита е задължителна',
            'transaction_amount.min'  => 'Минималната сума за плащане е :min BGN',
            'transaction_amount.numeric'  => 'Използвайте само числа с точка или цели числа.',
        ];
    }
}
