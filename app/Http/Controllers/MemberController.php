<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GameController extends Controller
{
    public function transactionPage()
    {
        return view('member.transaction');
    }

    public function transactionDetail()
    {
        return view('member.transactionDetail');
    }

    public function historyPage()
    {
        return view('member.history');
    }

    public function historyDetail()
    {
        return view('member.historyDetail');
    }

    public function deleteAllHistory()
    {

    }

    public function deleteHistory()
    {

    }

    public function topupPage()
    {
        return view('member.topup');
    }
}
