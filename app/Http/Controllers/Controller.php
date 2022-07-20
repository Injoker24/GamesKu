<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Game;
use App\Models\History;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\HistoryDetail;
use App\Models\TransactionDetail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function onboarding()
    {
        if(auth()->check()){
            return redirect()->route('home_page');
        }

        return view('guest.boarding', [
            'games' => Game::all()->take(5)
        ]);
    }

    public function homePage()
    {
        // bagusnya pas admin login baru kerjain ini atau member juga bkal jlanin function ini
        $time = Carbon::now()->format('Y-m-d H:i:s');
        $trData = TransactionDetail::where('status', 'Waiting for Payment')->where('due_date', '<', $time)->get();
        if($trData){
            foreach($trData as $tr){
                $tr->status = 'Rejected';
                $tr->save();
                $userID = Transaction::find($tr->transaction_id)->first()->user_id;

                $history = new History();
                $history->user_id = $userID;
                $history->save();

                $hsDetail = new HistoryDetail();
                $hsDetail->history_id = $history->id;
                $hsDetail->transaction_detail_id = $tr->id;
                $hsDetail->save();
            }
        }
        // dd($time, $trData);
        return view('home', [
            'games' => Game::all()->take(5)
        ]);
    }

    public function profilePage()
    {
        $user = auth()->user();
        return view('profile', compact('user'));
    }

    public function editProfilePage(Request $request)
    {
        // dd($request);
        $validatedData = $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|min:8',
            'confirm_password' => 'required|same:new_password'
        ]);

        if(!Hash::check($validatedData['old_password'], auth()->user()->password)) {
            return back()->with(['error' => 'old password different']);
        }

        // dd(bcrypt($validatedData['old_password']), auth()->user()->password);

        $user = auth()->user();
        $user->fill([
            'password' => Hash::make($validatedData['new_password'])
        ])->save();

        return view('profile', compact('user'));
    }

    public function editProfile()
    {

    }
}
