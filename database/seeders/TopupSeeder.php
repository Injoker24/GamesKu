<?php

namespace Database\Seeders;

use App\Models\Topup;
use Illuminate\Database\Seeder;

class TopupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Topup::create([
            'game_id' => '1',
            'topup_type' => 'diamond',
            'amount' => '3',
            'price' => 1680
        ]);

        Topup::create([
            'game_id' => '1',
            'topup_type' => 'diamond',
            'amount' => '5',
            'price' => 1579
        ]);

        Topup::create([
            'game_id' => '1',
            'topup_type' => 'diamond',
            'amount' => '12',
            'price' => 3688
        ]);

        Topup::create([
            'game_id' => '1',
            'topup_type' => 'diamond',
            'amount' => '19',
            'price' => 5797
        ]);

        Topup::create([
            'game_id' => '1',
            'topup_type' => 'diamond',
            'amount' => '28',
            'price' => 8436
        ]);

        Topup::create([
            'game_id' => '1',
            'topup_type' => 'diamond',
            'amount' => '59',
            'price' => 17760
        ]);

        Topup::create([
            'game_id' => '1',
            'topup_type' => 'diamond',
            'amount' => '170',
            'price' => 51060
        ]);

        Topup::create([
            'game_id' => '1',
            'topup_type' => 'diamond',
            'amount' => '296',
            'price' => 88800
        ]);

        Topup::create([
            'game_id' => '2',
            'topup_type' => 'points',
            'amount' => '125',
            'price' => 15000
        ]);

        Topup::create([
            'game_id' => '2',
            'topup_type' => 'points',
            'amount' => '420',
            'price' => 50000
        ]);

        Topup::create([
            'game_id' => '2',
            'topup_type' => 'points',
            'amount' => '700',
            'price' => 80000
        ]);

        Topup::create([
            'game_id' => '2',
            'topup_type' => 'points',
            'amount' => '1375',
            'price' => 150000
        ]);

        Topup::create([
            'game_id' => '2',
            'topup_type' => 'points',
            'amount' => '2400',
            'price' => 250000
        ]);

        Topup::create([
            'game_id' => '3',
            'topup_type' => 'vip',
            'amount' => '25',
            'price' => 5000
        ]);

        Topup::create([
            'game_id' => '3',
            'topup_type' => 'vip',
            'amount' => '52',
            'price' => 10000
        ]);

        Topup::create([
            'game_id' => '3',
            'topup_type' => 'vip',
            'amount' => '131',
            'price' => 25000
        ]);

        Topup::create([
            'game_id' => '3',
            'topup_type' => 'vip',
            'amount' => '530',
            'price' => 100000
        ]);

        Topup::create([
            'game_id' => '3',
            'topup_type' => 'vip',
            'amount' => '1375',
            'price' => 250000
        ]);

        Topup::create([
            'game_id' => '4',
            'topup_type' => 'Syndicate Gold Pack 1',
            'amount' => '90',
            'price' => 16000
        ]);

        Topup::create([
            'game_id' => '4',
            'topup_type' => 'Syndicate Gold Pack 2',
            'amount' => '280',
            'price' => 35000
        ]);

        Topup::create([
            'game_id' => '4',
            'topup_type' => 'Syndicate Gold Pack 4',
            'amount' => '500',
            'price' => 65000
        ]);

        Topup::create([
            'game_id' => '4',
            'topup_type' => 'Syndicate Gold Pack 6',
            'amount' => '1050',
            'price' => 129000
        ]);

        Topup::create([
            'game_id' => '4',
            'topup_type' => 'Syndicate Gold Pack 8',
            'amount' => '2150',
            'price' => 259000
        ]);

        Topup::create([
            'game_id' => '7',
            'topup_type' => 'diamonds',
            'amount' => '5',
            'price' => 1000
        ]);

        Topup::create([
            'game_id' => '7',
            'topup_type' => 'diamonds',
            'amount' => '12',
            'price' => 2000
        ]);

        Topup::create([
            'game_id' => '7',
            'topup_type' => 'diamonds',
            'amount' => '50',
            'price' => 8000
        ]);

        Topup::create([
            'game_id' => '7',
            'topup_type' => 'diamonds',
            'amount' => '140',
            'price' => 20000
        ]);

        Topup::create([
            'game_id' => '7',
            'topup_type' => 'diamonds',
            'amount' => '720',
            'price' => 100000
        ]);

        Topup::create([
            'game_id' => '7',
            'topup_type' => 'diamonds',
            'amount' => '2180',
            'price' => 300000
        ]);

        Topup::create([
            'game_id' => '8',
            'topup_type' => 'Welkin Moon',
            'amount' => '1',
            'price' => 79000
        ]);

        Topup::create([
            'game_id' => '8',
            'topup_type' => 'Genesis Crystals',
            'amount' => '60',
            'price' => 16000
        ]);

        Topup::create([
            'game_id' => '8',
            'topup_type' => 'Genesis Crystals',
            'amount' => '330',
            'price' => 79000
        ]);

        Topup::create([
            'game_id' => '8',
            'topup_type' => 'Genesis Crystals',
            'amount' => '1090',
            'price' => 249000
        ]);

        Topup::create([
            'game_id' => '8',
            'topup_type' => 'Genesis Crystals',
            'amount' => '2240',
            'price' => 479000
        ]);

        Topup::create([
            'game_id' => '8',
            'topup_type' => 'Genesis Crystals',
            'amount' => '3880',
            'price' => 799000
        ]);

        Topup::create([
            'game_id' => '8',
            'topup_type' => 'Genesis Crystals',
            'amount' => '8080',
            'price' => 1599000
        ]);
    }
}
