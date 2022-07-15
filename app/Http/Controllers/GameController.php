<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\PaymentType;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function searchGame(Request $request)
    {
        // dd($request->input('game'));
        $game = Game::where('name', 'like', '%' . $request->input('game') . '%')->get();
        return view('guest.search', [
            'games' => $game
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
        // dd($game, $request, $request->name);

        $game = Game::where('name', $request->name)->first();
        $payment = PaymentType::all();
        // dd($game, $topup, $payment);

        return view('guest.gameDetail',[
            'games' => $game,
            'payments' => $payment
        ]);
    }
}
