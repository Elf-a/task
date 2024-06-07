<?php

namespace App\Services;

use App\Models\Credit;
use Illuminate\Support\Facades\DB;

class CreditService
{
    public function createCredit($data)
    {
        $credit_amount = $data['credit_amount'];

        $credit_sum = Credit::getTotalCreditAmountByBorrowerName($data['credit_borrower_name']);

        $new_credit_amount = number_format((float) $credit_amount, 2, '.', '');

        if ($credit_sum !== null) {
            $total_credit_amount = $credit_sum->total_credit_amount + $new_credit_amount;

            if ($total_credit_amount > 80000) {
                throw new \Exception('ГРЕШКА! Общата сума на кредити е надвишена.');
            }
        }

        Credit::create($data);
    }
}