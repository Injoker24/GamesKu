<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cookie;

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
       $this->setLang();
        $validateData = $request->validate([
            'name' => 'required',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:8',
            'confirm_password' => 'required|same:password',
            'terms' => 'accepted'
        ],[
            'required' => trans('validation.required'),
            'dns' => trans('validation.email'),
            'unique' => trans('validation.unique'),
            'min' => trans('validation.min.string'),
            'same' => trans('validation.same'),
            'accepted' => trans('validation.accepted')
        ]);
        $validateData["password"] = bcrypt($validateData["password"]);
        $user = User::create($validateData);

        return redirect()->route('login_page');
    }

    public function login(Request $request)
    {
        $this->setLang();
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required|min:8',
        ],[
            'required' => trans('validation.required'),
            'dns' => trans('validation.email'),
            'min' => trans('validation.min.string')
        ]);

        if(auth()->attempt($credentials)){
            if($request->has('checkbox')) {
                Cookie::queue('login_cookie', $request->email, 5);
            }
            return redirect()->route('home_page');
        } else {
            return redirect()->back()->withInput()->withErrors(['error' => trans('validation.custom.attribute-name.check_data')]);
        }
    }

    public function logout(Request $request)
    {
        auth()->logout();
        // $request->session()->invalidate();
        // $request->session()->regenerateToken();
        return redirect()->route('boarding_page');
    }
}
