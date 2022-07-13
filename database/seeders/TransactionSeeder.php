<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Transaction;
use App\Models\TransactionDetail;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Transaction::create([
            'user_id' => 2,
        ]);

        Transaction::create([
            'user_id' => 2,
        ]);

        TransactionDetail::create([
            'transaction_id' => 1,
            'topup_id' => 1,
            'payment_type_id' => 1,
            'status' => 'Waiting for Payment',
            'price' => 100000,
            'input_name' => 'Injoker24'
        ]);

        TransactionDetail::create([
            'transaction_id' => 2,
            'topup_id' => 23,
            'payment_type_id' => 4,
            'status' => 'In Progress',
            'price' => 300000,
            'input_name' => 'Nevertheless'
        ]);
    }
}
