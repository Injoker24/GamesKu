<?php

namespace App\Http\Controllers;

use App\Models\Topup;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class MemberController extends Controller
{
    public function transactionPage()
    {
        $transaction = Transaction::where('user_id', auth()->user()->id)->get();
        $transactionDetail = TransactionDetail::whereIn('transaction_id', $transaction->pluck('id'))->get();
        // dd($transactionDetail);
        return view('member.transaction', [
            'transactions' => $transactionDetail
        ]);
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
        // dd($request, $request->priceinput, $request->btnradio1, $request->button);
        if(!auth()->check()){
            return redirect()->route('login_page')->with('error', 'You must login first');
        }
        $validated = $request->validate([
            'userID' => 'required',
            'price' => 'required',
            'btnradio' => 'required',
        ]);

        $transaction = new Transaction();
        $transaction->user_id = auth()->user()->id;
        $transaction->save();

        $transactionDetail = new TransactionDetail();
        $transactionDetail->transaction_id = $transaction->id;
        $transactionDetail->topup_id = Topup::where('price', $request->price)->first()->id;
        $transactionDetail->payment_type_id = $request->payment;
        $transactionDetail->status = "Waiting for Payment";
        $transactionDetail->price = $request->price;
        $transactionDetail->input_name = $request->userID;
        $transactionDetail->save();

        return redirect()->route('home_page')->with('success', 'transaction added');
    }
}
