<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    use HasFactory;

    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }

    public function topup()
    {
        return $this->hasOne(Topup::class);
    }

    public function PaymentType()
    {
        return $this->hasOne(PaymentType::class);
    }
}
