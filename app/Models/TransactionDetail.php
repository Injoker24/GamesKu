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
        return $this->belongsTo(Topup::class);
    }

    public function PaymentType()
    {
        return $this->belongsTo(PaymentType::class);
    }

    public function history_detail()
    {
        return $this->hasOne(HistoryDetail::class);
    }
}
