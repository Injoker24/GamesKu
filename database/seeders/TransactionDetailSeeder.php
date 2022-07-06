<?php

namespace Database\Seeders;

use App\Models\TransactionDetail;
use Illuminate\Database\Seeder;

class TransactionDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TransactionDetail::create([
            'transaction_id' => '1',
            'topup_id' => '1',
            'payment_type_id' => '1',
            'status' => 'Waiting for Payment',
            'price' => 1680,
            'input_name' => 'ml'
        ]);

        TransactionDetail::create([
            'transaction_id' => '2',
            'topup_id' => '3',
            'payment_type_id' => '2',
            'status' => 'Waiting for Payment',
            'price' => 3688,
            'input_name' => 'ml'
        ]);

        TransactionDetail::create([
            'transaction_id' => '3',
            'topup_id' => '5',
            'payment_type_id' => '3',
            'status' => 'Waiting for Payment',
            'price' => 8436,
            'input_name' => 'ml'
        ]);

        TransactionDetail::create([
            'transaction_id' => '4',
            'topup_id' => '9',
            'payment_type_id' => '4',
            'status' => 'Waiting for Payment',
            'price' => 15000,
            'input_name' => 'vl'
        ]);

        TransactionDetail::create([
            'transaction_id' => '5',
            'topup_id' => '14',
            'payment_type_id' => '5',
            'status' => 'Waiting for Payment',
            'price' => 5000,
            'input_name' => 'pm'
        ]);

        TransactionDetail::create([
            'transaction_id' => '6',
            'topup_id' => '19',
            'payment_type_id' => '6',
            'status' => 'Waiting for Payment',
            'price' => 16000,
            'input_name' => 'al'
        ]);
    }
}
