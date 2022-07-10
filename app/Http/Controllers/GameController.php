<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\PaymentType;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function searchGame()
    {
        return view('guest.search');
    }

    public function viewAllGame()
    {
        return view('guest.allgame', [
            'games' => Game::all()
        ]);
    }

    public function gameDetail(Game $game, Request $request)
    {
        // dd($game, $request, $request->name);

        $game = Game::where('id', $request->id)->first();
        $payment = PaymentType::all();
        // dd($game, $topup, $payment);

        return view('guest.gameDetail',[
            'games' => $game,
            'payments' => $payment
        ]);
    }
}
