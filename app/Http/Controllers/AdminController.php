<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GameController extends Controller
{
    public function manageGamePage()
    {
        return view('admin.manageGame');
    }

    public function manageGameDetail()
    {
        return view('admin.manageGameDetail');
    }

    public function editGamePage()
    {
        return view('admin.editGame');
    }

    public function editGame()
    {

    }

    public function deleteGame()
    {

    }

    public function addGamePage()
    {
        return view('admin.addGame');
    }

    public function addGame()
    {

    }

    public function manageTransactionPage()
    {
        return view('admin.manageTransaction');
    }

    public function manageTransactionDetail()
    {
        return view('admin.manageTransactionDetail');
    }

    public function acceptTransaction()
    {

    }

    public function rejectTransaction()
    {

    }
}
