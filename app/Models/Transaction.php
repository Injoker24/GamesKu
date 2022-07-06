<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function transaction_detail()
    {
        return $this->hasOne(TransactionDetail::class);
    }

    public function history_detail()
    {
        return $this->belongsTo(HistoryDetail::class);
    }
}