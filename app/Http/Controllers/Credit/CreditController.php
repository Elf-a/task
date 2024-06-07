<?php

namespace App\Http\Controllers\Credit;

use Illuminate\Support\Facades\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCreditRequest;
use App\Models\Credit;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Services\CreditService;

class CreditController extends Controller
{
    protected $creditService;

    public function __construct(CreditService $creditService)
    {
        $this->creditService = $creditService;
    }

    public function create(Request $request)
    {
        return view('credit.new_credit');
    }

    public function store(StoreCreditRequest $request, CreditService $creditService)
    {
        try {
            $creditService->createCredit($request->validated());

            return redirect()->route('home.index')->with('success', 'Кредита е успешно създаден!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }


}
