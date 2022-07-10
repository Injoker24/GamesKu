<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MemberController extends Controller
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

    public function topupPage(Request $request)
    {

        return view('member.topup');
    }

    public function gatau(Request $request){
        dd($request);
    }
}
