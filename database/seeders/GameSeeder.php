<?php

namespace Database\Seeders;

use App\Models\Game;
use Illuminate\Database\Seeder;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Game::create([
            'name' => 'Mobile Legends: Bang Bang',
            'developer' => 'Moonton',
            'game_logo' => 'game-logo/mobile-legends',
            'game_image' => 'game-image/mobile-legends',
            'input_example' => 'ml'
        ]);

        Game::create([
            'name' => 'Valorant',
            'developer' => 'Riot Games',
            'game_logo' => 'game-logo/valorant',
            'game_image' => 'game-image/valorant',
            'input_example' => 'vl'
        ]);

        Game::create([
            'name' => 'PUBG Mobile',
            'developer' => 'Level Infinite',
            'game_logo' => 'game-logo/pubg-mobile',
            'game_image' => 'game-image/pubg-mobile',
            'input_example' => 'pm'
        ]);

        Game::create([
            'name' => 'Apex Legends',
            'developer' => 'Electronic Arts',
            'game_logo' => 'game-logo/apex-legends',
            'game_image' => 'game-image/apex-legends',
            'input_example' => 'al'
        ]);

        Game::create([
            'name' => 'Fall Guys',
            'developer' => 'Mediatonic',
            'game_logo' => 'game-logo/fallguys',
            'game_image' => 'game-image/fallguys',
            'input_example' => 'fg'
        ]);

        Game::create([
            'name' => 'Clash Royale',
            'developer' => 'Supercell',
            'game_logo' => 'game-logo/clash-royale',
            'game_image' => 'game-image/clash-royale',
            'input_example' => 'cr'
        ]);

        Game::create([
            'name' => 'Garena Free Fire: Rampage',
            'developer' => 'Garena International I',
            'game_logo' => 'game-logo/free-fire',
            'game_image' => 'game-image/free-fire',
            'input_example' => 'ff'
        ]);

        Game::create([
            'name' => 'Genshin Impact',
            'developer' => 'Hoyoverse',
            'game_logo' => 'game-logo/genshin-impact',
            'game_image' => 'game-image/genshin-impact',
            'input_example' => 'gi'
        ]);


    }
}
