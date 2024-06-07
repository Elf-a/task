<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;


class Credit extends Model
{
    use HasFactory;

    protected $table = 'credits';

    protected $fillable = ['credit_borrower_name', 'credit_amount', 'credit_period', 'unique_credit_id', 'end_date_credit', 'credit_interest', 'credit_total_repayment_amount'];

    public static function boot()
    {
        parent::boot();
        static::creating(function ($credit) {
            $credit->unique_credit_id = 'FY-' . str_pad(Credit::max('id') + 1, 7, '0', STR_PAD_LEFT);
            $credit->credit_interest = Credit::calculateMonthlyPayment($credit->credit_amount, $credit->credit_period);
            $credit->credit_total_repayment_amount = number_format((float)$credit->credit_period * $credit->credit_interest, 2, '.', '');
            $credit->end_date_credit = (Carbon::now())->addMonths( (int) $credit->credit_period);

        });
    }

    public static function calculateMonthlyPayment($amount, $period)
    {
        $annualInterestRate = 7.9 / 100;
        $monthlyInterestRate = $annualInterestRate / 12;
        return $amount * ($monthlyInterestRate * pow(1 + $monthlyInterestRate, $period)) / (pow(1 + $monthlyInterestRate, $period) - 1);
    }

    public static function getTotalCreditAmountByBorrowerName($name)
    {
        return self::select('credit_borrower_name', DB::raw('SUM(credit_amount) as total_credit_amount'))
                    ->where('credit_borrower_name', $name)
                    ->groupBy('credit_borrower_name')
                    ->first();
    }

    public static function findRealCreditId($frontend_credit_id)
    {
        return self::where('unique_credit_id', $frontend_credit_id)->first();
    }

    public static function getCreditDropdownForDisplay()
    {
        return self::select('unique_credit_id', 'credit_borrower_name', 'credit_amount')->get();
    }
}
