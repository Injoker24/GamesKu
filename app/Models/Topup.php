<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topup extends Model
{
    use HasFactory;

    public function transaction_detail()
    {
        return $this->hasMany(TransactionDetail::class);
    }

    public function game()
    {
        return $this->belongsTo(Game::class);
    }
}
