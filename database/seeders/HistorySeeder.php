<?php

namespace Database\Seeders;

use App\Models\History;
use Illuminate\Database\Seeder;

class HistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        History::create([
            'user_id' => '2'
        ]);

        History::create([
            'user_id' => '3'
        ]);

        History::create([
            'user_id' => '4'
        ]);

        History::create([
            'user_id' => '2'
        ]);

        History::create([
            'user_id' => '3'
        ]);

        History::create([
            'user_id' => '4'
        ]);
    }
}
