<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Topup;
use App\Models\History;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\HistoryDetail;
use App\Models\TransactionDetail;
use Illuminate\Support\Facades\App;

class MemberController extends Controller
{
    private function setLang(){
        if(request()->session()->get('locale') != null){
            App::setLocale(request()->session()->get('locale'));
        }
    }

    public function transactionPage()
    {
        $this->setLang();
        $transaction = Transaction::where('user_id', auth()->user()->id)->get();
        $transactionDetail = TransactionDetail::whereIn('transaction_id', $transaction->pluck('id'))->where('status', 'In Progress')->orWhere('status', 'Waiting for Payment')->get();
        // dd($transactionDetail);
        return view('member.transaction', [
            'transactions' => $transactionDetail
        ]);
    }

    public function transactionDetail($id)
    {
        $this->setLang();
        $transactionDetail = TransactionDetail::find($id);
        return view('member.transactionDetail', [
            'trDetail' => $transactionDetail
        ]);
    }

    public function cancelTransaction($id){
        TransactionDetail::where('id', $id)->update([
            'status' => 'Cancelled'
        ]);

        $history = new History();
        $history->user_id = auth()->user()->id;
        $history->save();

        $historyDetail = new HistoryDetail();
        $historyDetail->history_id = $history->id;
        $historyDetail->transaction_detail_id = $id;
        $historyDetail->save();

        return redirect('/home')->with('success', 'Transaction Cancelled');
    }

    public function uploadPaymentPage($id){
        $this->setLang();
        $transactionDetail = TransactionDetail::find($id);
        if($transactionDetail->status == "In Progress" || $transactionDetail->status == "Rejected" || $transactionDetail->status == "Completed") {
            return redirect()->back();
        }
        return view('member.uploadPayment', [
            'trDetail' => $transactionDetail
        ]);
    }

    public function historyPage()
    {
        $this->setLang();
        $history = auth()->user()->history;
        $historyDetail = HistoryDetail::whereIn('history_id', $history->pluck('id'))->get();
        // dd($history, $historyDetail);
        return view('member.history', [
            'histories' => $historyDetail
        ]);
    }

    public function historyDetail($id)
    {
        $this->setLang();
        $historyDetail = HistoryDetail::find($id);
        return view('member.historyDetail', [
            'hsDetail' => $historyDetail
        ]);
    }

    public function deleteAllHistory()
    {
        $history = auth()->user()->history;
        HistoryDetail::whereIn('history_id', $history->pluck('id'))->delete();
        History::where('user_id', auth()->user()->id)->delete();

        return redirect('/history')->with('success', 'All History has been deleted');
    }

    public function deleteHistory($id)
    {
        $hsID = HistoryDetail::find($id)->history_id;
        HistoryDetail::find($id)->delete();
        History::where('id', $hsID)->delete();
        // dd($id, $hsID);
        return redirect('/history')->with('success', 'History has been deleted');
    }

    public function topupGame(Request $request){
        $this->setLang();
        if(!auth()->check()){
            return redirect()->route('login_page')->with('error', 'You must login first');
        }
        $validated = $request->validate([
            'userID' => 'required',
            'price' => 'required',
            'payment' => 'required',
        ],
        [
            'userID.required' => trans('game_detail.custom.attribute-name.user_id_validate'),
            'price.required' => trans('game_detail.custom.attribute-name.price_validate'),
            'payment.required' => trans('game_detail.custom.attribute-name.payment_validate'),
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

        return redirect()->route('transaction_detail_page', [$transaction->id])->with('success', 'Transaction Added');
    }

    public function uploadPayment(Request $request){
        $this->setLang();
        $validatedData = $request->validate([
            'paymentproof' => 'image|mimes:jpeg,png,jpg'
        ],[
            'paymentproof.image' => trans('up_payment.custom.attribute-name.payment_proof_validate_error')
        ]);

        if(!$request->file('paymentproof')){
            return redirect('/transaction/' . $request->id . '/upload')->with('warning', trans('up_payment.custom.attribute-name.payment_proof_validate_error'));
        }
        else{
            // dd($request->file('paymentproof'));
            $file = $request->file('paymentproof')->store('paymentProof');

            // testing buat yg ga keupload di public/storage. kalau mau coba pakai yang ini $file yang diatas di comment dlu :D
            // $file = $request->file('paymentproof');
            // $file_name = $file->getClientOriginalName();
            // $file->move(public_path('/storage/paymentProof'), $file_name);

            TransactionDetail::where('id', $request->id)->update([
                'status' => 'In Progress',
                'image_path' => $file
            ]);

            // kalau pakai yang yang kedua
            // TransactionDetail::where('id', $request->id)->update([
            //     'status' => 'In Progress',
            //     'image_path' => '/storage/paymentProof' . $file_name
            // ]);
            return redirect('/home')->with('success', trans('up_payment.custom.attribute-name.payment_proof_validate_success'));
        }

    }
}
