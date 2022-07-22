<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private function setLang(){
        if(request()->session()->get('locale') != null){
            App::setLocale(request()->session()->get('locale'));
        }
    }

    public function index_login()
    {
        $this->setLang();
        return view('account.login');
    }

    public function index_register()
    {
        $this->setLang();
        return view('account.register');
    }

    public function register(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required',
            'email' => 'required|email:dns',
            'password' => 'required|min:8',
            'confirm_password' => 'required|same:password',
            'terms' => 'accepted'
        ]);
        $validateData["password"] = bcrypt($validateData["password"]);
        $user = User::create($validateData);

        return redirect()->route('login_page');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required|min:8'
        ]);

        if(auth()->attempt($credentials)){
            return redirect()->route('home_page');
        } else {
            return redirect()->back()->withInput()->withErrors(['error' => 'Email or password is incorrect']);
        }
    }

    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('boarding_page');
    }
}
