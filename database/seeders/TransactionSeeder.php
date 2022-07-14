<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Transaction;
use Illuminate\Database\Seeder;
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
            'due_date' => Carbon::now()->addDays(1),
            'image_path' => '-',
            'input_name' => 'Injoker24'
        ]);

        TransactionDetail::create([
            'transaction_id' => 2,
            'topup_id' => 23,
            'payment_type_id' => 4,
            'status' => 'In Progress',
            'price' => 300000,
            'due_date' => Carbon::now()->addDays(1),
            'image_path' => '/paymentProof/PYBmMvJbWI6d8D608E6UY6LseVi5sGsWnPC0LWCH.jpg',
            'input_name' => 'Nevertheless'
        ]);
    }
}
