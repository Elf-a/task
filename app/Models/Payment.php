<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Credit;

class Payment extends Model
{
    use HasFactory;

    protected $table = 'credit_payments';

    protected $fillable = ['credit_id', 'transaction_amount'];
}
