<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\PaymentType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class GameController extends Controller
{
    private function setLang(){
        if(request()->session()->get('locale') != null){
            App::setLocale(request()->session()->get('locale'));
        }
    }

    public function searchGame(Request $request)
    {
        $this->setLang();
        $game = Game::where('name', 'like', '%' . $request->input('game') . '%')->where('deleted', '=', 'FALSE')->get();
        return view('guest.search', [
            'games' => $game,
            'search' => $request->input('game')
        ]);
    }

    public function viewAllGame()
    {
        $this->setLang();
        return view('allgame', [
            'games' => Game::where('deleted', '=', 'FALSE')->get()
        ]);
    }

    public function gameDetail(Game $game, Request $request)
    {
        $this->setLang();
        $game = Game::where('name', $request->name)->first();
        $payment = PaymentType::all();

        return view('guest.gameDetail',[
            'games' => $game,
            'payments' => $payment
        ]);
    }
}
