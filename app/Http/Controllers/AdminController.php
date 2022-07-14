<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\TransactionDetail;

class AdminController extends Controller
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
        // dd($request->input('submitbutton'));
        switch($request->input('submitbutton')){
            case 'accept':
                TransactionDetail::where('id', $request->id)->update([
                    'status' => 'Completed'
                ]);
                return redirect('/manage-transaction')->with('success', 'Transaction has been accepted');
                break;

            case 'reject':
                TransactionDetail::where('id', $request->id)->update([
                    'status' => 'Rejected'
                ]);
                return redirect('/manage-transaction')->with('reject', 'Transaction has been rejected');
                break;
        }
    }


}
