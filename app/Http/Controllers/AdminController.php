<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\History;
use Illuminate\Http\Request;
use App\Models\HistoryDetail;
use App\Models\Topup;
use App\Models\TransactionDetail;
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
        return view('admin.editGame',[
            'game' => $game,
        ]);
    }

    public function editGame(Request $request)
    {
        // dd($request->all());
        $game = Game::where('name', $request->name)->first();
        $deleted = explode('|', $request->deleted);
        foreach($deleted as $id){
            $game->topup()->where('id', $id)->update([
                'deletedtopup' => true
            ]);
        };
        // dd($deleted, $request->all(), $game->topup, $request->input('nominal') );

        if($request->input('nominal')){
            $price = $request->input('price');
            $idx = 0;
            foreach($request->input('nominal') as $nominal){
                $split = explode(' ', $nominal);
                dump($split[0] . $split[1] . $price[$idx]);
                $topup = new Topup();
                $topup->game_id = $game->id;
                $topup->topup_type = $split[1];
                $topup->amount = $split[0];
                $topup->price = $price[$idx];
                $topup->save();
                $idx++;
            }
        }
        return redirect()->back()->with('success', 'Game has been updated');
    }

    public function deleteGame(Request $request, $name)
    {
        // dd($name);
        $game = Game::where('name', $name)->first();

        $transactionList = TransactionDetail::whereIn('topup_id', $game->topup->pluck('id'))->get();

        // dd($game->topup, $transactionList);
        if(str_contains($transactionList, 'In Progress')){
            $message = 'Game cannot be deleted because there are still transactions in progress';
            return redirect()->back()->with('error', $message);
        }
        $trWaiting = $transactionList->where('status', 'Waiting for Payment');
        foreach($trWaiting as $tr){
            $tr->update([
                'status' => 'Rejected'
            ]);
        }
        Game::where('name',$request->name)->update([
            'deleted' => true
        ]);
        return redirect()->back()->with('success', 'Game has been deleted');


        return redirect('/manage-game');
    }

    public function addGamePage()
    {
        return view('admin.addGame');
    }

    public function addGame(Request $request)
    {
        dd($request);
        $request->validate([
            'gameName' => 'required',
            'gameDeveloper' => 'required',
            'inputExample' => 'required',
            'gameLogo' => 'required|mimes:jpeg,jpg,png|max:15000',
            'gameBG' => 'required|mimes:jpeg,jpg,png|max:15000'
        ]);
        // baru cek sampai sini

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
        switch($request->input('submitbutton')){
            case 'accept':
                TransactionDetail::where('id', $request->id)->update([
                    'status' => 'Completed'
                ]);
                $message = 'Transaction has been accepted';
                break;

            case 'reject':
                TransactionDetail::where('id', $request->id)->update([
                    'status' => 'Rejected'
                ]);
                $message = 'Transaction has been rejected';
                break;
        }

        $tr = TransactionDetail::where('id', $request->id)->first();
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
