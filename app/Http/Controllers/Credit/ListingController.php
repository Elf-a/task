<?php

namespace App\Http\Controllers\Credit;

use Illuminate\Support\Facades\Request;
use App\Http\Controllers\Controller;
use App\Models\Credit;

class ListingController extends Controller
{
    public function show(Request $request)
    {
        return view('credit.listing', ['data' => Credit::all()]);
    }
}
