<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\History;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\HistoryDetail;
use App\Models\TransactionDetail;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function manageGamePage()
    {
        return view('admin.manageGame',[
            'games' => Game::all()
        ]);
    }

    public function editGamePage($name)
    {
        // sekalian langsung edit
        $game = Game::where('name', $name)->first();
        $type = $game->topup->first()->topup_type;
        // dd($game->topup, $type);
        return view('admin.editGame',[
            'game' => $game,
        ]);
    }

    // public function editGamePage()
    // {
    //     return view('admin.editGame');
    // }

    public function editGame(Request $request)
    {
        dd($request->all(), $request->input('buzhidao'));
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
        $transaction = TransactionDetail::where('status', 'In Progress')->get();
        return view('admin.manageTransaction', [
            'transactions' => $transaction
        ]);
    }

    public function manageTransactionDetail($id)
    {
        $transactionDetail = TransactionDetail::find($id);
        return view('admin.manageTransactionDetail', [
            'trDetail' => $transactionDetail
        ]);
    }

    public function finalizeTransaction(Request $request)
    {
        $message = '';
        // dd($request->input('submitbutton'));
        switch($request->input('submitbutton')){
            case 'accept':
                TransactionDetail::where('id', $request->id)->update([
                    'status' => 'Completed'
                ]);
                $message = 'Transaction has been accepted';
                // return redirect('/manage-transaction')->with('success', 'Transaction has been accepted');
                break;

            case 'reject':
                TransactionDetail::where('id', $request->id)->update([
                    'status' => 'Rejected'
                ]);
                $message = 'Transaction has been rejected';
                // return redirect('/manage-transaction')->with('reject', 'Transaction has been rejected');
                break;
        }
        // dd($message);
        $tr = TransactionDetail::where('id', $request->id)->first();
        // dd($tr, $tr->transaction->user_id);
        $history = new History();
        $history->user_id = $tr->transaction->user_id;
        $history->save();

        $historyDetail = new HistoryDetail();
        $historyDetail->history_id = $history->id;
        $historyDetail->transaction_detail_id = $tr->id;
        $historyDetail->save();

        return redirect('/manage-transaction')->with('message', $message);
    }


}
