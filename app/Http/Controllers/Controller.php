<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Models\Game;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function onboarding()
    {
        if(auth()->check()){
            return redirect()->route('home_page');
        }

        return view('guest.boarding', [
            'games' => Game::all()->take(5)
        ]);
    }

    public function homePage()
    {
        return view('home', [
            'games' => Game::all()->take(5)
        ]);
    }

    public function profilePage()
    {
        $user = auth()->user();
        return view('profile', compact('user'));
    }

    public function editProfilePage()
    {
        return view('editProfile');
    }

    public function editProfile()
    {

    }
}
