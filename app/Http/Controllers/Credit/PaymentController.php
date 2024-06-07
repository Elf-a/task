<?php

namespace App\Http\Controllers\Credit;

use Illuminate\Support\Facades\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePaymentRequest;

use App\Models\Credit;
use App\Models\Payment;
use Illuminate\Support\Facades\DB;
use App\Services\PaymentService;

class PaymentController extends Controller
{
    public function create(Request $request)
    {
        return view('credit.new_payment', ['data' => Credit::getCreditDropdownForDisplay()]);
    }

    public function store(StorePaymentRequest $request, PaymentService $paymentService)
    {
        try {
            $message = $paymentService->processPayment(
                $request->input('unique_credit_id'),
                $request->input('transaction_amount')
            );

            return redirect()->back()->with('success', $message);
            
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
