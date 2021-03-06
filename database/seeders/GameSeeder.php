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
            'name' => "Mobile Legends : Bang Bang",
            'developer' => "Moonton",
            'game_logo' => "/gameAsset/Logo ML.png",
            'game_img' => "/gameAsset/BG ML.png",
            'input_example' => "User ID#Zone ID"
        ]);

        Game::create([
            'name' => "Valorant",
            'developer' => "Riot Games",
            'game_logo' => "/gameAsset/Logo Valorant.png",
            'game_img' => "/gameAsset/BG Valorant.jpg",
            'input_example' => "eb4nn#wut"
        ]);

        Game::create([
            'name' => "PUBG Mobile",
            'developer' => "Level Infinite",
            'game_logo' => "/gameAsset/Logo PUBG.png",
            'game_img' => "/gameAsset/BG PUBG.jpg",
            'input_example' => "User ID#Zone ID"
        ]);

        Game::create([
            'name' => "Apex Legends",
            'developer' => "Electronic Arts",
            'game_logo' => "/gameAsset/Logo Apex.png",
            'game_img' => "/gameAsset/BG Apex.jpg",
            'input_example' => "User ID#Zone ID"
        ]);

        Game::create([
            'name' => "Fallguys",
            'developer' => "Mediatonic",
            'game_logo' => "/gameAsset/Logo Fallguys.png",
            'game_img' => "/gameAsset/BG Fallguys.jpg",
            'input_example' => "User ID#Zone ID"
        ]);

        Game::create([
            'name' => "Clash Royale",
            'developer' => "Supercell",
            'game_logo' => "/gameAsset/Logo CR.jpg",
            'game_img' => "/gameAsset/BG CR.jpg",
            'input_example' => "User ID#Zone ID"
        ]);

        Game::create([
            'name' => "Garena Free Fire: Rampage",
            'developer' => "Garena International I",
            'game_logo' => "/gameAsset/Logo FF.png",
            'game_img' => "/gameAsset/BG FF.jpg",
            'input_example' => "User ID#Zone ID"
        ]);

        Game::create([
            'name' => "Genshin Impact",
            'developer' => "Mihoyo",
            'game_logo' => "/gameAsset/Logo Gensin.jpg",
            'game_img' => "/gameAsset/BG Gensin 2.jpg",
            'input_example' => "User ID#Zone ID"
        ]);



    }
}
