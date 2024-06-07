<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Credit\{
    ListingController,
    CreditController,
    PaymentController
};

Route::get('/', function() {
   return redirect('/credit/listing');
});

Route::prefix('credit')->group(function () {
    Route::get('/listing', [ListingController::class, 'show'])->name('home.index');


    Route::prefix('make')->group(function () {
        Route::get('/credit', [CreditController::class, 'create'])->name('home.new_credit');
        Route::get('/payment', [PaymentController::class, 'create'])->name('home.new_payment');
    });        
    
    Route::prefix('store')->group(function () {
        Route::post('/credit', [CreditController::class, 'store'])->name('home.new_credit.store');
        Route::post('/payment', [PaymentController::class, 'store'])->name('home.new_payment.store');
    });
    

});







