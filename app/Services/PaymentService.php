<?php

namespace App\Services;

use App\Models\Credit;
use App\Models\Payment;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PaymentService
{
    public function processPayment($unique_credit_id, $transaction_amount)
    {
        Log::info('Processing payment', [
            'unique_credit_id' => $unique_credit_id,
            'transaction_amount' => $transaction_amount,
        ]); // Log function can be before finding the record ( if is finded or no, depends on what we want to track)

        $db_credit = Credit::where('unique_credit_id', $unique_credit_id)->first();

        if (!$db_credit) {
            Log::error('Credit not found', ['unique_credit_id' => $unique_credit_id]);
            throw new \Exception('Credit not found.');
        }

        Log::info('Credit found', ['credit_id' => $db_credit->id]);

        if ($transaction_amount > $db_credit->credit_total_repayment_amount) {

            $transaction_amount = $db_credit->credit_total_repayment_amount;
            $message = 'Плащането е успешно! Наредента сума за плащане надвишава остатъчната дължима сума по кредита. Изтеглена е само сумата, която дължите по кредита.';
        } else {
            $message = 'Плащането е успешно!';
        }

        DB::beginTransaction();

        try {
            $db_credit->credit_total_repayment_amount -= $transaction_amount;
            $db_credit->save();

            Payment::create([
                'credit_id' => $db_credit->id,
                'transaction_amount' => $transaction_amount
            ]);

            DB::commit();

            return $message;
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('An error occurred while processing the payment', ['exception' => $e->getMessage()]);
            throw new \Exception('An error occurred while processing the payment: ' . $e->getMessage());
        }
    }
}