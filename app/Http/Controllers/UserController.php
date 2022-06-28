<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index_login()
    {
        return view('account.login');
    }

    public function index_register()
    {
        return view('account.register');
    }
}
