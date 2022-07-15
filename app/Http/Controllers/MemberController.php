<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Topup;
use App\Models\History;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\HistoryDetail;
use App\Models\TransactionDetail;
use Illuminate\Support\Facades\Redis;
use Symfony\Component\Console\Input\Input;

class MemberController extends Controller
{
    public function transactionPage()
    {
        $transaction = Transaction::where('user_id', auth()->user()->id)->get();
        $transactionDetail = TransactionDetail::whereIn('transaction_id', $transaction->pluck('id'))->where('status', 'In Progress')->orWhere('status', 'Waiting for Payment')->get();
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

    public function uploadPaymentPage($id){
        $transactionDetail = TransactionDetail::find($id);
        if($transactionDetail->status == "In Progress") {
            return redirect()->back();
        }
        return view('member.uploadPayment', [
            'trDetail' => $transactionDetail
        ]);
    }

    public function historyPage()
    {
        $history = History::where('user_id', auth()->user()->id)->get();
        $historyDetail = HistoryDetail::whereIn('history_id', $history->pluck('id'))->get();
        return view('member.history', [
            'histories' => $historyDetail
        ]);
    }

    public function historyDetail($id)
    {
        $historyDetail = HistoryDetail::find($id);
        return view('member.historyDetail', [
            'hsDetail' => $historyDetail
        ]);
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

    public function topupGame(Request $request){
        // $date = now()->toDateTimeString();
        // dd($request, $date);
        if(!auth()->check()){
            return redirect()->route('login_page')->with('error', 'You must login first');
        }
        $validated = $request->validate([
            'userID' => 'required',
            'price' => 'required',
            'payment' => 'required',
        ],
        [
            'userID.required' => 'Please enter your user ID',
            'price.required' => 'Please choose one of the nominals stated',
            'payment.required' => 'Please choose one of the payment methods stated',
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
        $transactionDetail->due_date = Carbon::now()->addDays(1);
        $transactionDetail->image_path = null;
        $transactionDetail->input_name = $request->userID;
        $transactionDetail->save();

        return redirect()->route('transaction_detail_page', [$transaction->id])->with('success', 'Transaction added');
    }

    public function uploadPayment(Request $request){
        $validatedData = $request->validate([
            'paymentproof' => 'image|mimes:jpeg,png,jpg'
        ],[
            'paymentproof.image' => 'Please upload payment proof image'
        ]);

        if(!$request->file('paymentproof')){
            return redirect('/transaction/' . $request->id . '/upload')->with('error', 'Please upload payment proof');
        }
        else{
            // dd($request->file('paymentproof'));
            $file = $request->file('paymentproof')->store('paymentProof');

            TransactionDetail::where('id', $request->id)->update([
                'status' => 'In Progress',
                'image_path' => $file
            ]);
            return redirect('/home')->with('success', 'Payment proof uploaded');
        }

    }
}
