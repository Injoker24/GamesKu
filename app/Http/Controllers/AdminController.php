<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\History;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\HistoryDetail;
use App\Models\TransactionDetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function manageGamePage()
    {
        return view('admin.manageGame', [
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

    public function editGame()
    {

    }

    public function deleteGame(Request $request)
    {
        // Ini Old yg Destroy

        // $game = Game::find($request->id);

        // if(isset($game)){
        //     //Storage::delete('public/RealEstate/'.$game->image);
        //     $game->delete();
        // }

        //Game::destroy($request->id);


        $id = $request->id;
        $game = Game::find($id);

        $game->deleted = 1;
        $game->save();

        return redirect('/manage-game');
    }

    public function addGamePage()
    {
        return view('admin.addGame');
    }

    public function addGame(Request $request)
    {
        $request->validate([
            'GameName' => 'required',
            'GameDeveloper' => 'required',
            'InputExample' => 'required',
            'Logo' => 'required|mimes:jpeg,jpg,png|max:15000',
            'BG' => 'required|mimes:jpeg,jpg,png|max:15000'
        ]);

        $name = $request->input('OfficeName');

        $logoName = 'Logo '.$name.'.'.$request->Logo->extension();
        $bgName = 'BG '.$name.'.'.$request->BG->extension();
        Storage::putFileAs('public/gameAsset', $request->file('Image'), $logoName);
        Storage::putFileAs('public/gameAsset', $request->file('Image'), $bgName);

        $game = new Game();

        $game->name = $request->input('GameName');
        $game->developer = $request->input('GameDeveloper');
        $game->game_logo = $logoName;
        $game->game_img = $bgName;
        $game->input_example = $request->input('InputExample');
        $game->deleted = 0;
        $game->save();

        return redirect('/manage-game');
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
