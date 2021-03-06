<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Topup;
use App\Models\History;
use Illuminate\Http\Request;
use App\Models\HistoryDetail;
use App\Models\TransactionDetail;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    private function setLang(){
        if(request()->session()->get('locale') != null){
            App::setLocale(request()->session()->get('locale'));
        }
    }

    public function manageGamePage()
    {
        $this->setLang();
        return view('admin.manageGame', [
            'games' => Game::all()
        ]);
    }

    public function editGamePage($name)
    {
        $this->setLang();
        // sekalian langsung edit
        $game = Game::where('name', $name)->first();
        // dd($game,$game->topup);
        return view('admin.editGame',[
            'game' => $game,
        ]);
    }

    public function editGame(Request $request)
    {
        // dd($request);
        $this->setLang();
        $request->validate([
            'gameName' => 'required',
            'gameDeveloper' => 'required',
            'inputExample' => 'required',
        ], [
            'required' => trans('validation.required'),
        ]);


        $game = Game::where('name', $request->name)->first();
        Game::where('name', $request->name)->update([
            'name' => $request->gameName,
            'developer' => $request->gameDeveloper,
            'input_example' => $request->inputExample,
        ]);

        if($request->hasFile('gameLogo')){
            // $file = $request->file('gameLogo')->store('gameAsset');

            $file = $request->file('gameLogo');
            $file_name = $file->getClientOriginalName();
            $file->move(public_path('/storage/gameAsset'), $file_name);

            Game::where('name', $request->name)->update([
                'game_logo' => '/gameAsset/' . $file_name
            ]);
            Storage::delete($game->game_logo);
        }

        if($request->hasFile('gameBackground')){
            // $file = $request->file('gameBackground')->store('gameAsset');

            $file = $request->file('gameBackground');
            $file_name = $file->getClientOriginalName();
            $file->move(public_path('/storage/gameAsset'), $file_name);

            Game::where('name', $request->name)->update([
                'game_img' => '/gameAsset/' . $file_name
            ]);
            Storage::delete($game->game_img);
        }

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
        return redirect('/manage-game')->with('success', 'Game has been updated');
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
        $this->setLang();
        return view('admin.addGame');
    }

    public function addGame(Request $request)
    {
        // dd($request, $request->nominal);
        $this->setLang();
        $request->validate([
            'gameName' => 'required',
            'gameDeveloper' => 'required',
            'inputExample' => 'required',
            'gameLogo' => 'required|mimes:jpeg,jpg,png|max:15000',
            'gameBG' => 'required|mimes:jpeg,jpg,png|max:15000',
            'topupType' => 'required',
            'nominal' => 'required'
        ],
        [
            'gameName.required' => trans('add_game.custom.attribute-name.game_name_validate'),
            'gameDeveloper.required' => trans('add_game.custom.attribute-name.game_developer_validate'),
            'inputExample.required' => trans('add_game.custom.attribute-name.input_example_validate'),
            'gameLogo.required' => trans('add_game.custom.attribute-name.game_logo_validate'),
            'gameBG.required' => trans('add_game.custom.attribute-name.game_bg_validate'),
            'topupType.required' => trans('add_game.custom.attribute-name.topup_type_validate'),
            'nominal.required' => trans('add_game.custom.attribute-name.nominal_validate'),
        ]);
        // baru cek sampai sini

        $game = new Game();
        $game->name = $request->gameName;
        $game->developer = $request->gameDeveloper;
        $game->input_example = $request->inputExample;
        $game->game_logo = $request->gameLogo->store('/gameAsset');
        $game->game_img = $request->gameBG->store('/gameAsset');

        $game->save();

        if($request->nominal){
            $price = $request->price;
            $idx = 0;
            foreach($request->nominal as $nominal){
                $split = explode(' ', $nominal);
                // dump($split[0] . $split[1] . $price[$idx]);
                $topup = new Topup();
                $topup->game_id = $game->id;
                $topup->topup_type = $split[1];
                $topup->amount = $split[0];
                $topup->price = $price[$idx];
                $topup->save();
                $idx++;
            }
        }

        return redirect('/manage-game')->with('success', trans('add_game.custom.attribute-name.add_game_success'));


        // $name = $request->input('OfficeName');

        // $logoName = 'Logo '.$name.'.'.$request->Logo->extension();
        // $bgName = 'BG '.$name.'.'.$request->BG->extension();
        // Storage::putFileAs('public/gameAsset', $request->file('Image'), $logoName);
        // Storage::putFileAs('public/gameAsset', $request->file('Image'), $bgName);


        // return redirect('/manage-game');
    }

    public function manageTransactionPage()
    {
        $this->setLang();
        $transaction = TransactionDetail::where('status', 'In Progress')->get();
        return view('admin.manageTransaction', [
            'transactions' => $transaction
        ]);
    }

    public function manageTransactionDetail($id)
    {
        $this->setLang();
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

        if($request->input('submitbutton') == 'accept'){
            return redirect('/manage-transaction')->with('success', $message);
        }
        else{
            return redirect('/manage-transaction')->with('warning', $message);
        }
        // return redirect('/manage-transaction')->with('info', $message);
    }


}
