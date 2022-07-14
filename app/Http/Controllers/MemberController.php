<?php

namespace App\Http\Controllers;

use App\Models\Topup;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
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

    public function transactionDetail($id)
    {
        $transactionDetail = TransactionDetail::find($id);
        return view('member.transactionDetail', [
            'trDetail' => $transactionDetail
        ]);
    }

    public function uploadPayment($id){
        $transactionDetail = TransactionDetail::find($id);
        return view('member.uploadPayment', [
            'trDetail' => $transactionDetail
        ]);
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

    // public function topupPage(Request $request)
    // {
        // spertiny gkpke
    //     return view('member.topup');
    // }

    public function gatau(Request $request){
        // $date = now()->toDateTimeString();
        // dd($request, $date);
        if(!auth()->check()){
            return redirect()->route('login_page')->with('error', 'You must login first');
        }
        $validated = $request->validate([
            'userID' => 'required',
            'price' => 'required',
            'payment' => 'required',
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
        $transactionDetail->image_path = null;
        $transactionDetail->input_name = $request->userID;
        $transactionDetail->save();

        return redirect()->route('transaction_detail_page', [$transaction->id])->with('success', 'transaction added');
    }

    public function gatau2(Request $request){
        dd($request, $request->file());
    }
}
