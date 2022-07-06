<?php

namespace Database\Seeders;

use App\Models\HistoryDetail;
use Illuminate\Database\Seeder;

class HistoryDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        HistoryDetail::create([
            'history_id' => '1',
            'transaction_id' => '1'
        ]);

        HistoryDetail::create([
            'history_id' => '2',
            'transaction_id' => '2'
        ]);

        HistoryDetail::create([
            'history_id' => '3',
            'transaction_id' => '3'
        ]);

        HistoryDetail::create([
            'history_id' => '4',
            'transaction_id' => '4'
        ]);

        HistoryDetail::create([
            'history_id' => '5',
            'transaction_id' => '5'
        ]);

        HistoryDetail::create([
            'history_id' => '6',
            'transaction_id' => '6'
        ]);
    }
}
