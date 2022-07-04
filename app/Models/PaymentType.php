<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentType extends Model
{
    use HasFactory;

    public function transaction_detail()
    {
        return $this->belongsTo(TransactionDetail::class);
    }
}
