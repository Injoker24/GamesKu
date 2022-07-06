<?php

namespace Database\Seeders;

use App\Models\Transaction;
use Illuminate\Database\Seeder;

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
            'user_id' => '2'
        ]);

        Transaction::create([
            'user_id' => '3'
        ]);

        Transaction::create([
            'user_id' => '4'
        ]);

        Transaction::create([
            'user_id' => '2'
        ]);

        Transaction::create([
            'user_id' => '3'
        ]);

        Transaction::create([
            'user_id' => '4'
        ]);
    }
}
