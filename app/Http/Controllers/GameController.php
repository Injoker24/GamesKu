<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\PaymentType;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function searchGame(Request $request)
    {
        $game = Game::where('name', 'like', '%' . $request->input('game') . '%')->where('deleted', '=', 'FALSE')->get();
        return view('guest.search', [
            'games' => $game,
            'search' => $request->input('game')
        ]);
    }

    public function viewAllGame()
    {
        return view('allgame', [
            'games' => Game::all()
        ]);
    }

    public function gameDetail(Game $game, Request $request)
    {

        $game = Game::where('name', $request->name)->first();
        $payment = PaymentType::all();

        return view('guest.gameDetail',[
            'games' => $game,
            'payments' => $payment
        ]);
    }
}
