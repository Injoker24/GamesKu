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
        // $transactionDetail = TransactionDetail::whereIn('transaction_id', $transaction->pluck('id'))->get();
        return view('admin.manageTransaction', [
            'transactions' => $transaction
        ]);
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
